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

function filter(element) {

    var count = 0;
    var value = $(element).val();
    value = value.toUpperCase();

    $(".client_row").each(function () {
        text = $(this)
            .text()
            .replace(/(\r\n|\n|\r)/gm, "")
            .toString()
            .trim()
            .toUpperCase();
        if (text.search(value) > -1) {
            $(this).show();
            count++;
            $("input[name='list_matched']").show();
        }
        else {
            $(this).hide();
        }
    });

}

function toggleTableRowActive(row) {
    if ($(row).hasClass("active")) {
        $(row).removeClass("active")
    } else {
        $(row).addClass("active")
    }
}

function get_line_for_inserting() {
    var $set = $('tr.active');
    var len = $set.length;
    var target = null;

    if (len > 0) {
        $set.each(function(index, element) {
            if (index == len - 1) {
                target = $(this);
            }
        });
    } else {
        target = $('.prespuesto_table tr:last');
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }

    return target;
}

function calc_importe_total () {
    var total_importe = 0;
    $('.input_row_importe').each( function(index, element) {
        total_importe = total_importe + parseFloat($(element).text());
    });

    $('.total_importe').html(total_importe.toFixed(2));
}

function register_table_row_head_change() {
    // UPDATE IMPORT ROWS
    $('.table_row_head').on('change', function() {
        var precio = parseFloat($(this).find(".input_row_precio :input").val());
        var unidades = parseFloat($(this).find(".input_row_unidades :input").val());
//                var iva = parseFloat($(this).find(".input_row_iva :input").val());
        var dto = parseFloat($(this).find(".input_row_dto :input").val());

        var base =  ( precio * unidades );
//                var importe_iva = ( base * iva ) / 100;
//                var importe = base + importe_iva;
        var importe = base;

        var importe_descuento = ( importe * dto ) / 100;
        importe = importe - importe_descuento;

        $(this).find(".input_row_importe").html(importe.toFixed(2));

        calc_importe_total();

    });
}
