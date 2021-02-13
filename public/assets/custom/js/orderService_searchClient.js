if ($('#orderService_searchClient').length) {

    $(document).on('keydown', function (event) {

        if (event.keyCode === 13) {

            let searchClient = document.getElementById('searchClient');

            $.ajax({
                type: "GET",
                url: `${BASE_URL}/Client/getClientByNameCpf/${searchClient.value}`,
                dataType: 'json',
                error: (e) => {
                    $('#tableClients tbody').empty();

                    var newRow = $("<tr>");
                    var cols = "";
                    cols += `<td colspan="3" class="text-center">Verifique sua conexão com a internet</td>`;

                    newRow.append(cols); $("#tableClients").append(newRow);
                },
                beforeSend: () => {

                    $('#tableClients tbody').empty();

                    var newRow = $("<tr>");
                    var cols = "";
                    cols += `<td colspan="3" class="text-center">Carregando dados...</td>`;

                    newRow.append(cols); $("#tableClients").append(newRow);
                },
                complete: () => {

                },
                success: function (data) {

                    $('#tableClients tbody').empty();

                    data.forEach(element => {

                        var newRow = $("<tr>");
                        var cols = "";

                        cols += `<td>${element['cnpjCpf']}</td>`;
                        cols += `<td>${element['name']}</td>`;
                        cols += `<td class="text-center"><a class="btn btn-outline-info" href="${BASE_URL}/OrderService/newOrderService/${element['id']}" role="button">Nova OS</a></td>`;

                        newRow.append(cols); $("#tableClients").append(newRow);
                        return false;
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
}