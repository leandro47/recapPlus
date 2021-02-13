
if ($('#orderService_newOrder').length) {

    $('.formContent').multifield({
        section: '.tireForm',
        btnAdd: '#btnAdd',
        btnRemove: '.remove_field'
    });

    function allowField() {

        let formPay = $('#formPay').val();

        if (formPay == 2) {
            $("#customFormPay").removeAttr("disabled")
        }
        else {
            $("#customFormPay").attr("disabled", true)
        }
    }

}