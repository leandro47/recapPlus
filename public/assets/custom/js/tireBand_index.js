if ($('#tireBand_index').length) {

    $(document).ready(function () {
        requestTireBand();
    })

    function requestTireBand() {
        tableArea = $(`#tableBand`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/gettireband`,
                dataType: "json",
                cache: false,
                dataSrc: (data) => {
                    return data || []
                },
                error: (e) => {
                    $("#btnNew").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
                },
                beforeSend: () => {
                    $("#btnNew").attr("disabled", true).find("i").removeClass("fa-plus").addClass("fa-spinner fa-spin")
                },
                complete: () => {
                    $("#btnNew").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
                }
            },
            order: [
                [0, 'desc']
            ],
            columns: [{
                data: "id",
                class: "text-left",
            },
            {
                data: "description",
                class: "text-left",
            },
            {
                data: "status",
                class: "text-left"
            },
            {
                class: "text-center",
                orderable: false,
                data: null,
                defaultContent: ``,
                render: function (data, type, row, meta) {
                    return `
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-warning text-white" onclick="updateTireBand('${data.id}','${data.description}','${data.status}')"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger text-white" onclick="deleteTireBand('${data.id}','${data.description}','${data.status}')"><i class="fas fa-trash-alt"></i></a>
                         </div>`
                }
            }
            ]
        })
    }

    // Save tire Band in the db
    $(document).ready(function () {
        $('#saveTireBand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/inserttireband`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalNewBand').modal('hide');
                    $('#tireBand').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestTireBand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    });

    //edit Tire Band in the db
    function updateTireBand(id, description, status) {

        let ind = null;
        (status === 'yes') ? ind = 0 : ind = 1;
        document.getElementById("statusTireBand").options[ind].selected = true;

        $('#idUpdate').val(id);
        $('#description').val(description);

        $('#modalUpdate').modal('show');

        $('#updateTireBand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/updatetireband`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalUpdate').modal('hide');
                    $('#description').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestTireBand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    //Deleta uma série
    function deleteTireBand(id, description) {

        $('#idDelete').val(id);
        $('#descriptionDelete').html(description);

        $('#modalDelete').modal('show');

        $('#deleteTireBand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/deletetireband`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalDelete').modal('hide');
                    $('#descriptionDelete').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestTireBand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }
}