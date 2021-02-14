if ($('#tireSize_index').length) {

    $(document).ready(function () {
        requestTireSize();
    })

    function requestTireSize() {
        tableArea = $(`#tableTireSize`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/gettiresize`,
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
                            <a class="btn btn-warning text-white" onclick="updateTireSize('${data.id}','${data.description}','${data.status}')"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger text-white" onclick="deleteTireSize('${data.id}','${data.description}','${data.status}')"><i class="fas fa-trash-alt"></i></a>
                         </div>`
                }
            }
            ]
        })
    }

    // Save tire size in the db
    $(document).ready(function () {
        $('#saveTireSize').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/inserttiresize`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalNewSize').modal('hide');
                    $('#tireSize').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestTireSize();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    });

    //edit Tire size in the db
    function updateTireSize(id, description, status) {

        let ind = null;
        (status === 'yes') ? ind = 0 : ind = 1;
        document.getElementById("statusTireSize").options[ind].selected = true;

        $('#idUpdate').val(id);
        $('#description').val(description);

        $('#modalUpdate').modal('show');

        $('#updateTireSize').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/updatetiresize`,
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

                    requestTireSize();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    //Deleta uma série
    function deleteTireSize(id, description) {

        $('#idDelete').val(id);
        $('#descriptionDelete').html(description);

        $('#modalDelete').modal('show');

        $('#deleteTireSize').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/deletetiresize`,
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

                    requestTireSize();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }
}