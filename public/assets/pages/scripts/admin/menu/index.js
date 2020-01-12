$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
            }
        });
    });

    $('.eliminar-menu').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
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
                window.location.href = url;
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
    })

    $('#nestable').nestable('expandAll');
});