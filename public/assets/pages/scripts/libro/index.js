$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
        event.preventDefault();
        const form = $(this);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          });
        swalWithBootstrapButtons.fire({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borralo!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarLibro', form);
            }else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Acción Cancelada',
                  'El registro no ha sido borrado :)',
                  'error'
                )
              }
        });
    });

    $('.ver-libro').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verLibro');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'eliminarLibro') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        Biblioteca.notificaciones('El registro fue eliminado correctamente', 'Biblioteca', 'success');
                    } else {
                        Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Biblioteca', 'error');
                    }
                } else if (funcion == 'verLibro') {
                    $('#modal-ver-libro .modal-body').html(respuesta)
                    $('#modal-ver-libro').modal('show');
                }
            },
            error: function () {

            }
        });
    }
});