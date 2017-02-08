$(document).ready(function(){

    register_table_row_head_change();

    $('#clientesModalTrigger').click(function() {
        $('#clientesModal').modal();
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
            '<tr class="tabel_row_body active" onclick="toggleTableRowActive(this)">' +
            '<td>&nbsp;</td>' +
            '<td><div class="input_row_definicion"><input type="text" value="" maxlength="75"></div></td>' +
            '<td></td>' +
            '<td></td>' +
//                        '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '</tr>'
        );

    });

    $('#btn_insertar_articulo').on('click', function() {
        $('#articulosModal').modal();
    });


    $('.article_row').on('click', function() {

        var codigo = this.dataset.codigo;
        var url =  "/api/articulos/" + codigo;

        $.ajax({
            url: url,
            success: function(result){

                var data = result['articulo'][0];
                var line = get_line_for_inserting();

                line.after(
                    '<tr class="table_row_head active" onclick="toggleTableRowActive(this)">' +
                    '<td><div class="input_row_articulo">' + data['codigo'] + '</div></td>' +
                    '<td><div class="input_row_definicion"><input type="text" value="' + data['nombre'] + '" maxlength="75"></div></td>' +
                    '<td><div class="input_row_precio"><input type="text" value="' + data['precio'] + '"></div></td>' +
                    '<td><div class="input_row_unidades"><input type="text" value="0.00"></div></td>' +
//                                    '<td><div class="input_row_iva"><input type="text" value="' + data['tipo_iva'] + '"></div></td>' +
                    '<td><div class="input_row_dto"><input type="text" value="0" ></div></td>' +
                    '<td><div class="input_row_importe">' + data['precio'] + '</div></td>' +
                    '</tr>'
                );

                data['definicion'].forEach( function (row) {

                    line = get_line_for_inserting();

                    line.after(
                        '<tr class="table_row_body active" onclick="toggleTableRowActive(this)">' +
                        '<td>&nbsp;</td>' +
                        '<td><div class="input_row_definicion"><input type="text" value="' + row + '" maxlength="75"></div></td>' +
                        '<td></td>' +
                        '<td></td>' +
//                                    '<td></td>' +
                        '<td></td>' +
                        '<td></td>' +
                        '</tr>'
                    );

                });

                $('#articulosModal').modal('hide');
            },
            complete: function(data) {
                register_table_row_head_change();
            }});

    });

    $('.client_row').on('click', function() {

        var codigo = this.dataset.codigo;
        var url =  "/api/clientes/" + codigo;

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
    });

    $('#familia_selector').on('change', function() {

        var value = $(this).val();

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
