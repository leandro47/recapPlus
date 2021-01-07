
if ($('#orderService_newOrder').length) {

    // $(document).foundation();
    $('.btnAdd').click(function () {
        $clone = $('.tireForm1.d-none').clone(true);
        $clone.removeClass('d-none');
        
        $('.tireForm1').append($clone);
        console.log($clone)
    });

    $('.btn_remove').click(function () {
        $(this).parents('.box_pergunta').remove();
    });

}