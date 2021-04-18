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

$(document).on('click', 'ul li', function () {
    $(this).addClass('active').siblings().removeClass('active');
});

/*Evento que activa los campos de trasalado*/
$('#check_traslado').click(function (e) {
    if ($(this).is(':checked')) {
        $('#cont-form-traslado').removeClass('d-none');
    } else {
        $('#cont-form-traslado').addClass('d-none');
    }
})

$('#check_paciente').click(function (e) {
    if ($(this).is(':checked')) {
        $('#cont-form-paciente').removeClass('d-none');
    } else {
        $('#cont-form-paciente').addClass('d-none');
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
