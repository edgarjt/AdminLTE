$(document).ready(function () {
    $('#recordsTable').DataTable({
        //para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
});
var id_paciente = "";
var param_trasalado;
var param_operador;

$(document).on('click', 'ul li', function () {
    $(this).addClass('active').siblings().removeClass('active');
});

/*Evento que activa los campos de trasalado*/
$('#trasladoCheck').click(function (e) {
    if ($(this).is(':checked')) {
        $('#cont-form-traslado').removeClass('d-none');
        $('#addOperador').prop('disabled', true);
    } else {
        $('#cont-form-traslado').addClass('d-none');
        $('#addOperador').prop('disabled', false);
    }
})

/*Search paciente*/
$('#search_name, #search_surname').change(function (e) {
    var name = $('.name_pac').val();
    var surname = $('.surname_pac').val();

    $.ajax({
        data: {"name_paciente" : name, "apellidos_paciente" : surname},
        type: "GET",
        dataType: "json",
        url: linkData + 'bitacora/searchRecords',
    })
        .done(function( data ) {
            if (data.status) {
                var date = new Date(data.data.created_at);
                $('#alert-register').removeClass('d-none');
                $('.alert-register').html(
                    '<p>'+data.message+': </p>'+
                    '<p>Nombre: <strong>'+data.data.nombre_paciente+ ' ' +data.data.apellidos_paciente+'</strong></p>'+
                    '<p>Tipo de servicio: <strong>'+data.data.tip_servicio+'</strong></p>'+
                    '<p>Fecha de registro: <strong>'+moment(date).format('YYYY-MM-DD')+'</strong></p>'
                );
            }else {
                $('#alert-register').addClass('d-none');
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "La solicitud a fallado: " +  textStatus);
            }
        });
});

$('#addPaciente').click(function (e) {
    $('#addTraslado').removeAttr('disabled');
    $('#addOperador').prop('disabled', false);

    var params = {
        pac_nombre: $('#pac_nombre').val(),
        pac_apellidos: $('#pac_apellidos').val(),
        pac_edad: $('#pac_edad').val(),
        pac_sexo: $('.pac_sexo').val(),
        hos_fk_id: null,
        fallecidoCheck: $('#fallecidoCheck').is(':checked')
    }


    if (params.pac_nombre == '' && params.pac_apellidos == '') {
        $('#warnig-pac').html('<span id="message-pac"><b>No se asigno datos del paciente, puede continuar con el registro</b></span>')
        return false;
    }else {
        $('#message-pac').remove();
    }

    $.ajax({
        data: params,
        type: "POST",
        dataType: "json",
        url: linkData + 'api/paciente/addPaciente',
    }).done(function( data ) {

        if (data.status) {
            console.log(data);
            id_paciente = data.data.pac_id;
            $('#not-register_pac').addClass('d-none');
            $('#register_pac').removeClass('d-none');
        }else {
            alert(data.message);
        }

    }).fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
    });

});

$('#addTraslado').click(function () {
    param_trasalado = {
        bit_hora_llamada: $('#bit_hora_llamada').val(),
        bit_hora_salida: $('#bit_hora_salida').val(),
        bit_num_ambulancia: $('#bit_num_ambulancia').val(),
        bit_hora_traslado: $('#bit_hora_traslado').val(),
        bit_hora_llegada: $('#bit_hora_llegada').val(),
        bit_llegada_base: $('#bit_llegada_base').val(),
        bit_llegada_hospital: $('#bit_llegada_hospital').val(),
        hos_fk_id: $('.hos_fk_id').val()
    }

    $('#not-register_tras').addClass('d-none');
    $('#register_tras').removeClass('d-none');
    $('#addOperador').removeAttr('disabled');
});

$('#addOperador').click(function () {
    param_operador = {
        bit_nombre_operador: $('#bit_nombre_operador').val(),
        bit_nombre_paramedico: $('#bit_nombre_paramedico').val(),
        bit_dir_servicio: $('#bit_dir_servicio').val(),
        bit_km_salida_base: $('#bit_km_salida_base').val(),
        bit_km_llegada_base: $('#bit_km_llegada_base').val(),
        bit_folio_frap: $('#bit_folio_frap').val(),
        bit_folio_c4: $('#bit_folio_c4').val(),
        bit_tel_reporte: $('#bit_tel_reporte').val(),
        tip_servicio_fk_id: $('.tip_servicio_fk_id').val(),
        delegacion_fk_id: $('.delegacion_fk_id').val(),
        bit_situacion_traslado: $('#bit_situacion_traslado').val(),
    }

    var params = {
        bit_hora_llamada: param_trasalado ? param_trasalado.bit_hora_llamada : '',
        bit_hora_salida: param_trasalado ? param_trasalado.bit_hora_salida : '',
        bit_hora_llegada: param_trasalado ? param_trasalado.bit_hora_llegada : '',
        bit_num_ambulancia: param_trasalado ? param_trasalado.bit_num_ambulancia : '',
        bit_hora_traslado: param_trasalado ? param_trasalado.bit_hora_traslado : '',
        bit_llegada_hospital: param_trasalado ? param_trasalado.bit_llegada_hospital : '',
        bit_llegada_base: param_trasalado ? param_trasalado.bit_llegada_base : '',

        bit_nombre_operador: param_operador.bit_nombre_operador,
        bit_nombre_paramedico: param_operador.bit_nombre_paramedico,
        bit_dir_servicio: param_operador.bit_dir_servicio,
        bit_km_salida_base: param_operador.bit_km_salida_base,
        bit_km_llegada_base: param_operador.bit_km_llegada_base,
        bit_folio_frap: param_operador.bit_folio_frap,
        bit_folio_c4: param_operador.bit_folio_c4,
        bit_tel_reporte: param_operador.bit_tel_reporte,
        bit_situacion_traslado: param_operador.bit_situacion_traslado,
        tip_servicio_fk_id: param_operador.tip_servicio_fk_id,
        delegacion_fk_id: param_operador.delegacion_fk_id,
        pac_fk_id: id_paciente,
        hos_fk_id: param_trasalado ? param_trasalado.hos_fk_id : '',
    }

    $.ajax({
        data: params,
        type: "POST",
        dataType: "json",
        url: linkData + 'api/bitacora/addRecords',
    }).done(function( data ) {
        console.log(data);
        location.href = linkData + 'bitacora/records';

    }).fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
    });


    $('#not-register_ope').addClass('d-none');
    $('#register_ope').removeClass('d-none');
    console.log(param_operador);
})

$('.delete_bitacora').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var table = $('#recordsTable').DataTable();

    Swal.fire({
        title: 'Esta seguro de borrar este registro',
        text: "No se prodra revertir despues de aceptar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            table.row($(this).parents('tr')).remove().draw();
            $.ajax({
                data: {'id' : id},
                type: "DELETE",
                dataType: "json",
                url: linkData + 'bitacora/deleteRecords',
            }).done(function( data ) {

                if (data.status) {
                    console.log(data);
                }else {
                    alert(data.message);
                }

            }).fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                }
            });
        }
    })

});
