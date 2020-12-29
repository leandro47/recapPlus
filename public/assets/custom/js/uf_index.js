if ($('#tireSize_index').length) {

    $(document).ready(function () {
        requestTireSize();
    })

    function requestTireSize() {
        tableArea = $(`#tableUf`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/tireSize/getAll`,
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
                            <a class="btn btn-warning text-white" onclick="updateUf('${data.id}','${data.descricao}')"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger text-white" onclick="deleteUf('${data.id}','${data.descricao}')"><i class="fas fa-trash-alt"></i></a>
                         </div>`
                }
            }
            ]
        })
    }
}