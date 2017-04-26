$(document).ready(function(){

    register_table_row_head_change();

    $('#clientesModalTrigger').click(function() {
        $('#clientesModal').modal();
    });


    $( "#datepicker_presupuesto" ).datepicker({
        "dateFormat":"dd/mm/yy"
    });


    $('#btn_borrar_lineas').on('click', function() {

        var $set = $('tr.active');
        var len = $set.length;

        if (len > 0) {
            $set.each(function () {
                this.remove();
            });
        } else {
            alert("No hay Lineas Seleccionadas");
        }

        calc_importe_total();
    });

    $('#btn_nueva_linea').on('click', function() {

        var line = get_line_for_inserting();

        line.after(
            '<tr class="presupuesto_row table_row_body active" onclick="toggleTableRowActive(this)">' +
            '<td>&nbsp;</td>' +
            '<td><div class="input_row_definicion"><input type="text" value="" maxlength="75"></div></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '</tr>'
        );

    });

    $('#btn_condiciones').on('click', function() {

        var condiciones = [
            '***************** CONDICIONES DE VENTA *****************',
            'IVA: +21%.',
            'Plazo de entrega: de 4 a 6 semanas.',
            'Portes: por cuenta de TASC (Península) para pedidos superiores a',
            '2.000 Eur + IVA.',
            'Forma de pago: la habitual con ustedes.',
            'Instalación, programación y puesta en marcha por cuenta del cliente.',
            'Garantía: 12 meses.',
            'Validez de la oferta: 30 días',
            'No se admitirán devoluciones de equipos una vez formalizado el pedido.',
            '**************************************************************************'
        ];

        for (i = 0; i < condiciones.length; i++) {
            var line = get_line_for_inserting();

            line.after(
                '<tr class="presupuesto_row table_row_body active" onclick="toggleTableRowActive(this)">' +
                '<td>&nbsp;</td>' +
                '<td><div class="input_row_definicion"><input type="text" value="' + condiciones[i] + '" maxlength="75"></div></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '</tr>'
            );
        }

        deactivate_rows();
    });

    $('#btn_insertar_articulo').on('click', function() {
        $('#articulosModal').modal();
    });

    $('#btn_guardar_presupuesto').on('click', function() {

        var url =  "/api/presupuestos/save";

        $('.loading').show();

        ajax_call_guardar_presupuesto(url);
    });

    $('#btn_imprimir_presupuesto').on('click', function() {

        presupuesto_to_pdf();
    });

    $('#btn_clonar_presupuesto').on('click', function() {

        clonar_presupuesto();
    });

    $('#btn_modificar_presupuesto').on('click', function() {

        mod_presupuesto();
    });

    $('.article_row').on('click', function() {

        var codigo = this.dataset.codigo;
        var url =  "/api/articulos/" + codigo;

        $('.loading').show();

        ajax_call_articulo(url);

    });

    $('.client_row').on('click', function() {

        var codigo = this.dataset.codigo;
        var url =  "/api/clientes/" + codigo;

        $('.loading').show();

        ajax_call_cliente(url);

    });

    $('#familia_selector').on('change', function() {

        var value = $(this).val();

        $("#marca_selector").val("");

        $(".article_row").each(function () {
            text = $(this).find('.familia_column')
                .text()
                .replace(/(\r\n|\n|\r)/gm, "")
                .toString()
                .trim()
                .toUpperCase();

            if (text.search(value) > -1) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });


    });

    $('#marca_selector').on('change', function() {

        var value = $(this).val();

        $("#familia_selector").val("");

        $(".article_row").each(function () {
            text = $(this).find('.marca_column')
                .text()
                .replace(/(\r\n|\n|\r)/gm, "")
                .toString()
                .trim()
                .toUpperCase();

            if (text.search(value) > -1) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });


    });

    calc_importe_total();
});
