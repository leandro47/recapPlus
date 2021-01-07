
if ($('#orderService_newOrder').length) {

    var wrapper = $(".tireForm1");
    var add_button = $("#buttonAdc");

    var x = 1;
    $(add_button).click(function (e) {
        e.preventDefault();

        x++;
        var form = '<div id="tireForm' + x + '">' +
            '<div class="card border-secondary mb-1" style="max-width: 100rem;">' +
            '<div class="card-body text-secondary">' +
            '<div class="row">' +
            '<div class="col-sm-12 text-right">' +
            '<a href="#!" class="btn btn-danger btn-sm" onclick="removeField(' + x + ')" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i> Remover</a>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tireBrand' + x + '" class="control-label"> Marca <span> <strong>*</strong></span></label>' +
            '<select class="custom-select" name="tireBrand' + x + '" id="tireBrand' + x + '">' +
            '<option value="yes">Ativo</option>' +
            '<option value="no">Inativo</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tireBand' + x + '" class="control-label"> Banda <span> <strong>*</strong></span></label>' +
            '<select class="custom-select" name="tireBand' + x + '" id="tireBand' + x + '">' +
            '<option value="yes">Ativo</option>' +
            '<option value="no">Inativo</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tireSize' + x + '" class="control-label"> Medida <span> <strong>*</strong></span></label>' +
            '<select class="custom-select" name="tireSize' + x + '" id="tireSize' + x + '">' +
            '<option value="yes">Ativo</option>' +
            '<option value="no">Inativo</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tireNumber' + x + '" class="control-label"> Número <span> <strong>*</strong></span></label>' +
            '<input type="text" class="form-control" id="tireNumber' + x + '" name="tireNumber' + x + '" placeholder="Número pneu" required>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tireDot' + x + '" class="control-label"> Dot <span> <strong>*</strong></span></label>' +
            '<input type="text" class="form-control" id="tireDot' + x + '" name="tireDot' + x + '" placeholder="Número dot" required>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="fire' + x + '" class="control-label"> Fogo <span> <strong>*</strong></span></label>' +
            '<input type="text" class="form-control" id="fire' + x + '" name="fire' + x + '" placeholder="Número fogo" required>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="tirePrice' + x + '" class="control-label"> Preço <span> <strong>*</strong></span></label>' +
            '<input type="text" class="form-control" id="tirePrice' + x + '" name="tirePrice' + x + '" placeholder="Preço" required>' +
            '</div>' +
            '</div>' +

            '<div class="col-sm-12 col-md-6 col-lg-3">' +
            '<div class="form-group">' +
            '<label for="warranty' + x + '" class="control-label"> Garantia <span> <strong>?</strong></span></label>' +
            '<select class="custom-select" name="warranty' + x + '" id="warranty' + x + '">' +
            '<option value="yes">Sim</option>' +
            '<option value="no">Não</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '</div>' +

            '</div>' +
            '</div>' +

            '<div class="row">' +
            '<div class="col-sm-12 ">' +
            '<hr>' +
            '</div>' +
            '</div>' +
            '</div>';

        $(wrapper).append(form);
    });

    function removeField(id) {
        $('#tireForm' + id).remove();
    }

}