function collaps_btn(btn) {

    var btn = $(btn).find($('span'));

    if ($(btn).hasClass('glyphicon-chevron-down')) {
        $(btn).removeClass('glyphicon-chevron-down');
        $(btn).addClass('glyphicon-chevron-up');
    } else {
        $(btn).removeClass('glyphicon-chevron-up');
        $(btn).addClass('glyphicon-chevron-down');
    }

}

function collaps_all() {
    $( '.quotation_collapsable_btn' ).each(function() {
        if ($(this).find('span').hasClass('glyphicon-chevron-up')) {
            console.log(this);
            $(this).click();
        }
    });
}