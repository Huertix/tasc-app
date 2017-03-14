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

function filter_client_list(element) {

    var count = 0;
    var value = $(element).val();
    value = value.toUpperCase();

    $(".client_list_row").each(function () {
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

function filter_presupuesto_list(element) {

    var count = 0;
    var value = $(element).val();
    value = value.toUpperCase();

    $(".presupuesto_list_row").each(function () {
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
    var total_importe_base = 0;
    var total_importe_iva = 0;
    var total_importe = 0;
    $('.input_row_importe').each( function(index, element) {
        total_importe = total_importe + parseFloat($(element).text());
    });

    total_importe_iva = (total_importe * 21) / 100;

    total_importe_base = total_importe - total_importe_iva;


    $('.total_importe_base').html(total_importe_base.toFixed(2));
    $('.total_importe_iva').html(total_importe_iva.toFixed(2));
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

function ajax_call_articulo(url) {
    $.ajax({
        url: url,
        success: function(result){

            var data = result['articulo'][0];
            var line = get_line_for_inserting();

            line.after(
                '<tr class="presupuesto_row table_row_head" onclick="toggleTableRowActive(this)">' +
                '<td><div class="input_row_articulo">' + data['codigo'] + '</div></td>' +
                '<td><div class="input_row_definicion"><input type="text" value="' + data['nombre'] + '" maxlength="75"></div></td>' +
                '<td><div class="input_row_precio"><input type="text" value="' + data['precio'] + '"></div>' +
                '<div class="input_row_coste" hidden><input type="text" value="' + data['coste'] + '"></div></td>' +
                '<td><div class="input_row_unidades"><input type="text" value="0.00"></div></td>' +
                '<td><div class="input_row_dto"><input type="text" value="0" ></div></td>' +
                '<td><div class="input_row_importe">' + data['precio'] + '</div></td>' +
                '</tr>'
            );

            data['definicion'].forEach( function (row) {

                line = get_line_for_inserting();

                line.after(
                    '<tr class="presupuesto_row table_row_body" onclick="toggleTableRowActive(this)">' +
                    '<td>&nbsp;</td>' +
                    '<td><div class="input_row_definicion"><input type="text" value="' + row + '" maxlength="75"></div></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '</tr>'
                );

            });

            $('#articulosModal').modal('hide');
        },
        complete: function(data) {
            register_table_row_head_change();
            $('.loading').hide();
        }});
}

function ajax_call_cliente(url) {
    $.ajax({
        url: url,
        success: function(result){

            var data = result['cliente'][0];

            console.log(data);

            $('.datos_cliente_codigo').html(data.cliente);
            $('.datos_cliente_nombre').html(data.nombre);
            $('.datos_cliente_cif').html(data.cif);
            $('.datos_cliente_direccion').html(data.direccion);
            $('.datos_cliente_poblacion').html(data.poblacion);
            $('.datos_cliente_provincia').html(data.provincia);
            $('.datos_cliente_credito').html(data.credito);


            $('#clientesModal').modal('hide');

        }});
}

function ajax_call_guardar_presupuesto(url) {

    /* http://stackoverflow.com/questions/30629958/firefox-and-chrome-again-seem-to-parse-dates-differently */
    var dateObject = $("#datepicker_presupuesto").datepicker('getDate');
    var d = new Date($.datepicker.formatDate('MM-dd-yy', dateObject));

    var codigo = check_value_not_empty($('.datos_cliente_codigo').text());
    if (!codigo)
        return null;

    var fecha = check_value_not_empty(formatDate(d));
    if (!fecha)
        return null;

    var importe = check_importe_zero($('.total_importe').text());


    if (codigo && fecha && importe) {
        var data = {
            'cliente': codigo,
            'numero': $('.datos_presupuesto_numero').text(),
            'fecha': fecha,
            'importe': importe
        };

        var line_count = 0;
        data['rows'] = [];

        $('.presupuesto_row').each( function() {
            var line = $(this);
            data['rows'][line_count] = {};
            if (line.hasClass('table_row_head')) {
                data['rows'][line_count]['articulo'] = line.find('.input_row_articulo').text();
                data['rows'][line_count]['definicion'] = line.find('.input_row_definicion :input').val();
                data['rows'][line_count]['precio'] = line.find('.input_row_precio :input').val();
                data['rows'][line_count]['coste'] = line.find('.input_row_coste :input').val();
                data['rows'][line_count]['unidades'] = line.find('.input_row_unidades :input').val();
                data['rows'][line_count]['dto'] = line.find('.input_row_dto :input').val();
                data['rows'][line_count]['importe'] = line.find('.input_row_importe').text();
                data['rows'][line_count]['linia'] = ++line_count;
            } else {
                data['rows'][line_count]['numero'] = data['numero'];
                data['rows'][line_count]['definicion'] = line.find('.input_row_definicion :input').val();
                data['rows'][line_count]['linia'] = ++line_count;
            }

        });


        $.ajax({
            url: url,
            dataType   : 'json',
            contentType: 'application/json; charset=UTF-8',
            data       : JSON.stringify(data),
            type       : 'POST',
            success: function(result){

                console.log(result['sucess']);
                console.log(result['message']);
                // $("#btn_imprimir_presupuesto").prop("hidden",false);
                // $("#btn_guardar_presupuesto").prop("hidden",true);
                // alert("El Presupuesto Número: " + result['presupuesto'] + " ha sido guardado.")
                var numero = result['presupuesto'];
                var url = window.location.origin + '/presupuestos/' + result['presupuesto'];
                window.location.href = url;

            }});
    }

}

function formatDate(d) {

    var dd = d.getDate();
    if ( dd < 10 ) dd = '0' + dd;

    var mm = d.getMonth()+1;
    if ( mm < 10 ) mm = '0' + mm;

    var yyyy = d.getFullYear();

    return yyyy+'-'+mm+'-'+dd+ ' 00:00:00';
}

function check_value_not_empty(value) {

    value = $.trim(value);

    if (value && value != 'NaN-NaN-NaN 00:00:00')  {
        return value;
    } else {
        alert("Comprueba que las Entradas no esten vacías: \n\n\t- Fecha\n\t- Codigo de Cliente\n\t")
        return false;
    }
}

function check_importe_zero(value) {
    if (parseFloat(value) > 0)  {
        return value;
    } else {
        if(confirm("El Presupuesto tiene Importe Cero: \n\n\t- SEGURO QUIERES GUARDARLO??"))
            return value;
        else
            return false;
    }
}

function clonar_presupuesto() {
    var numero = $('.datos_presupuesto_numero').text();
    var url = window.location.origin + '/presupuestos/clonar/' + numero;
    window.location.href = url;
}

function mod_presupuesto() {
    var numero = $('.datos_presupuesto_numero').text();
    var url = window.location.origin + '/presupuestos/modificar/' + numero;
    window.location.href = url;
}

function presupuesto_to_pdf() {
    var numero = $('.datos_presupuesto_numero').text();
    var url = window.location.origin + '/pdf/' + numero;
    window.location.href = url;
}
