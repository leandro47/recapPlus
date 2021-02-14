if ($('#tireBrand_index').length) {

    $(document).ready(function () {
        requestTireBrand();
    })

    function requestTireBrand() {
        tableArea = $(`#tableBrand`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/gettirebrand`,
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
                            <a class="btn btn-warning text-white" onclick="updateTireBrand('${data.id}','${data.description}','${data.status}')"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger text-white" onclick="deleteTireBrand('${data.id}','${data.description}','${data.status}')"><i class="fas fa-trash-alt"></i></a>
                         </div>`
                }
            }
            ]
        })
    }

    // Save tire Brand in the db
    $(document).ready(function () {
        $('#saveTireBrand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/inserttirebrand`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalNewBrand').modal('hide');
                    $('#tireBrand').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestTireBrand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    });

    //edit Tire Brand in the db
    function updateTireBrand(id, description, status) {

        let ind = null;
        (status === 'yes') ? ind = 0 : ind = 1;
        document.getElementById("statusTireBrand").options[ind].selected = true;

        $('#idUpdate').val(id);
        $('#description').val(description);

        $('#modalUpdate').modal('show');

        $('#updateTireBrand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/updatetirebrand`,
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

                    requestTireBrand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    //Deleta uma série
    function deleteTireBrand(id, description) {

        $('#idDelete').val(id);
        $('#descriptionDelete').html(description);

        $('#modalDelete').modal('show');

        $('#deleteTireBrand').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/deletetirebrand`,
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

                    requestTireBrand();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }
}