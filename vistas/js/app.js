// ========================================================================
//  select2
// ========================================================================
$(function() {
    $('select2').select2();
});

// ========================================================================
//  DataTable
// ========================================================================
$(function() {
    $(".dataTable").DataTable( {
            "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
            }
    } );
});

// ========================================================================
//  Eventos Modulo Citas
// ========================================================================
$(function() {

    $(".ver_cita").click(function(e) {
        e.preventDefault();
        $("#modal_cita").modal();
        $("#title_cita").text($(this).data('title'));
        var id_cita = $(this).data('id');
        $.ajax({
                        url: "buscar_cita.php",
                        type : 'POST',
                        data: { id_cita : id_cita },
                        success:
                            function (data) {                                   
                               $("#modal_body_cita").html(data);                               
                            }
        });
    });

});