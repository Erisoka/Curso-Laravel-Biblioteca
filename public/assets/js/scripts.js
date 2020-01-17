/* Boton Borrar Campos De Formulario*/
$(document).ready(function () {
    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('auto-dismiss') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    //TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    // MUESTRA EL MENU ACTIVO
    //$('ul.sidebar-menu').find('li.active').parents('li').addClass('active');
    $('ul.nav-treeview').find('a.active').parents('li').addClass('menu-open');
    
    // Trabajo con Ventana de Roles.
    // muestra un modal en el layout si el usuario tiene asigando mas de un rol
    const modal = $('#modal-seleccionar-rol'); // llama a la ventana modal del layout
    if (modal.length && modal.data('rol-set') == 'NO') {
        modal.modal('show'); // el modal persiste hasta que escoja un rol
    }
    
    $('.asignar-rol').on('click', function (event) {
        event.preventDefault();
        const data = {
            rol_id: $(this).data('rolid'),
            rol_nombre: $(this).data('rolnombre'),
            _token: $('input[name=_token]').val()
        }
        // con la url web /ajax-sesion enviada a la funcion ajaxRequest
        // se invoca al metodo setSession de AjaxController,
        // que inserta en la sesion la data (rol_id, rol_nombre)
        ajaxRequest(data, '/ajax-sesion', 'asignar-rol'); // 
    });

    // en el header, permite mostrar el modal para cambiar de rol
    // al usuario logueado que tenga mas de 1 rol, y quiera cambiar de rol
    // sin necesidad de hacer logout
    $('.cambiar-rol').on('click', function (event) {
        event.preventDefault();
        modal.modal('show');
    });

    function ajaxRequest(data, url, funcion) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'asignar-rol' && respuesta.mensaje == 'ok') {
                    $('#modal-seleccionar-rol').hide();
                    location.reload();
                }
            }
        });
    }
});