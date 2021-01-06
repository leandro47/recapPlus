if ($('#orderService_searchClient').length) {

    $(document).on('keydown', function (event) {

        if (event.keyCode === 13) {

            let searchClient = document.getElementById('searchClient');

            

            $.ajax({
                type: "GET",
                url: `${BASE_URL}/Client/getClientByNameCpf/${searchClient.value}`,
                dataType: 'json',
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