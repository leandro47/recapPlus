if ($('#client_index').length) {

    $(document).ready(function () {
        requestDatas();
    })

    function requestDatas() {
        tableArea = $(`#tableClient`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/getclient`,
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
                data: "cnpjCpf",
                class: "text-left",
            },
            {
                data: "name",
                class: "text-left"
            },
            {
                data: "phone",
                class: "text-left"
            },
            {
                data: "dataRegister",
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
                            <a class="btn btn-info text-white" onclick="viewClient('${data.id}','${data.name_city}','${data.cnpjCpf}','${data.name}','${data.type}','${data.cep}','${data.district}','${data.street}','${data.number}','${data.phone}','${data.phone2}','${data.dataRegister}')"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-warning text-white" onclick="updateClient('${data.id}','${data.name_city}','${data.cnpjCpf}','${data.name}','${data.type}','${data.cep}','${data.district}','${data.street}','${data.number}','${data.phone}','${data.phone2}','${data.initials}','${data.cod_ibge}')"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger text-white" onclick="deleteClient('${data.id}','${data.name}')"><i class="fas fa-trash-alt"></i></a>
                         </div>`
                }
            }
            ]
        })
    }

    // Save clients
    $(document).ready(function () {
        $('#saveClient').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/insertclient`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalNewClient').modal('hide');
                    $('#cpfCnpj').val('');
                    $('#razaoSocial').val('');
                    $('#tipo').val('');
                    $('#cep').val('');
                    $('#uf').val('');
                    $('#cidade').val('');
                    $('#bairro').val('');
                    $('#logradouro').val('');
                    $('#numero').val('');
                    $('#telefone1').val('');
                    $('#telefone2').val('');

                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    });

    // API VIA CEP 
    function requestCep() {
        let cep = document.getElementById('cep');
        let bairro = document.getElementById('bairro');
        let logradouro = document.getElementById('logradouro');
        let ufInput = document.getElementById('uf');
        let cityInput = document.getElementById('cidade');

        if (cep.value === '') {
            bairro.value = '';
            logradouro.value = '';
            ufInput.value = '';
            cityInput.value = '';
        }
        else {
            $.ajax({
                type: "GET",
                url: `https://viacep.com.br/ws/${cep.value}/json/`,
                success: function (data) {

                    if (!data.erro == true) {

                        requestUf(data.uf, data.ibge);
                        bairro.value = data.bairro;
                        logradouro.value = data.logradouro;
                    }
                    else {
                        bairro.value = '';
                        logradouro.value = '';
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    }

    function requestUf(uf, ibge = null) {

        let ufInput = document.getElementById('uf');

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getufbyinitials/${uf}`,
            dataType: 'json',
            success: function (data) {

                $('#uf option').each(function () {

                    if ($(this).attr('value') == data[0]['initials']) {
                        $(this).attr('selected', true);
                    }
                });

                RequestCitybyUf(uf, ibge);
            },
            error: function (data) {
                ufInput.value = '';
            }
        });
    }

    function RequestCitybyUf(uf = null, ibge = null) {

        if (uf === null) {
            uf = $("#uf option:selected").val();
        }

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getcitybyuf/${uf}`,
            dataType: 'json',
            success: function (data) {

                //Preeche os estados com a cidades
                $("#cidade option").remove();

                data.map(({
                    id,
                    name_city
                }) => {
                    $('#cidade').append(`<option value='${id}'>${name_city}</option>`);
                });

                //Seleciona a possivel cidade correta
                if (ibge !== null)
                    requestCityByIbge(ibge)
            },
            error: function (data) {

            }
        });
    }

    function requestCityByIbge(ibge) {

        let cityInput = document.getElementById('cidade');

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getcityibge/${ibge}`,
            dataType: 'json',
            success: function (data) {

                $('#cidade option').each(function () {

                    if ($(this).attr('value') == data[0]['id']) {
                        $(this).attr('selected', true);
                    }
                });
            },
            error: function (data) {
                cityInput.value = '';
            }
        });
    }

    // Visualiza Cliente 
    function viewClient(id, nameCity, cpfcnpj, name, type, cep, district, street, number, phone, phone2, dataRegister) {

        $('#viewName').html(name);
        $('#viewId').html(id);
        $('#viewCpfCnpj').html(cpfcnpj);
        $('#viewType').html(type);
        $('#viewDataRegister').html(dataRegister);

        $('#ViewCep').html(cep);
        $('#viewCity').html(nameCity);
        $('#viewDistrict').html(district);
        $('#viewStreet').html(street);
        $('#viewNumber').html(number);

        $('#viewPhone1').html(phone);
        $('#viewPhone2').html(phone2);

        $('#modalView').modal('show');
    }

    //Deleta cliente
    function deleteClient(id, description) {

        $('#idDelete').val(id);
        $('#descriptionDelete').html(description);

        $('#modalDelete').modal('show');

        $('#deleteClient').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/client/delete`,
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

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    //Atualia Cliente
    function updateClient(id, nameCity, cpfcnpj, name, type, cep, district, street, number, phone, phone2, initials, cod_ibge) {

        let ind = null;
        (type === 'fis') ? ind = 0 : ind = 1;
        document.getElementById("updateTipo").options[ind].selected = true;

        //Paste datas in inputs
        $('#idUpdate').val(id);
        $('#updateCpfCnpj').val(cpfcnpj);
        $('#updateRazaoSocial').val(name);
        $('#updateCep').val(cep);
        $('#updateBairro').val(district);
        $('#updateLogradouro').val(street);
        $('#updateNumero').val(number);
        $('#updateTelefone1').val(phone);
        $('#updateTelefone2').val(phone2);

        $('#updateUf option').each(function () {

            $(this).removeAttr('selected', true);

            if ($(this).attr('value') == initials) {
                $(this).attr('selected', true);
            }
        });

        updateRequestCitybyUf(initials, cod_ibge)


        $('#modalUpdate').modal('show');

        $('#updateClient').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/Client/update`,
                data: dados,
                dataType: 'json',
                success: function (data) {
                 
                    Swal.fire({
                        icon: data.data.status,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    $('#modalUpdate').modal('hide');

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    // API VIA CEP 
    function updateRequestCep() {
        let cep = document.getElementById('updateCep');
        let bairro = document.getElementById('updateBairro');
        let logradouro = document.getElementById('updateLogradouro');
        let ufInput = document.getElementById('updateUf');
        let cityInput = document.getElementById('updateCidade');

        if (cep.value === '') {
            bairro.value = '';
            logradouro.value = '';
            ufInput.value = '';
            cityInput.value = '';
        }
        else {
            $.ajax({
                type: "GET",
                url: `https://viacep.com.br/ws/${cep.value}/json/`,
                success: function (data) {

                    if (!data.erro == true) {

                        updateRequestUf(data.uf, data.ibge);
                        bairro.value = data.bairro;
                        logradouro.value = data.logradouro;
                    }
                    else {
                        bairro.value = '';
                        logradouro.value = '';
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    }

    function updateRequestUf(uf, ibge = null) {

        let ufInput = document.getElementById('updateUf');

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/Uf/getByInitials/${uf}`,
            dataType: 'json',
            success: function (data) {

                $('#updateUf option').each(function () {

                    if ($(this).attr('value') == data[0]['initials']) {
                        $(this).attr('selected', true);
                    }
                });

                updateRequestCitybyUf(uf, ibge);
            },
            error: function (data) {
                ufInput.value = '';
            }
        });
    }

    function updateRequestCitybyUf(uf = null, ibge = null) {

        if (uf === null) {
            uf = $("#updateUf option:selected").val();
        }

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/City/getByUf/${uf}`,
            dataType: 'json',
            success: function (data) {

                //Preeche os estados com a cidades
                $("#updateCidade option").remove();

                data.map(({
                    id,
                    name_city
                }) => {
                    $('#updateCidade').append(`<option value='${id}'>${name_city}</option>`);
                });

                //Seleciona a possivel updateCidade correta
                if (ibge !== null)
                    updateRequestCityByIbge(ibge)
            },
            error: function (data) {

            }
        });
    }

    function updateRequestCityByIbge(ibge) {

        let cityInput = document.getElementById('updateCidade');

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/City/getByIbge/${ibge}`,
            dataType: 'json',
            success: function (data) {

                $('#updateCidade option').each(function () {

                    if ($(this).attr('value') == data[0]['id']) {
                        $(this).attr('selected', true);
                    }
                });
            },
            error: function (data) {
                cityInput.value = '';
            }
        });
    }
}