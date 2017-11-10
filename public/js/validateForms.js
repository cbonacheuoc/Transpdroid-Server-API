/*!
 * Clase que activa las validaciones de los formularios
 * *
 *  Necesita esta llamada
 *  <script src="{{ asset("js/validateForms.js") }}" type="text/javascript"></script>
 *  
 */

$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    onfocusout: false,
    //	validClass: 'stay',
    highlight: function (element, errorClass, validClass) {
        $(element).addClass(errorClass); //.removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass(errorClass); //.addClass(validClass);
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorPlacement: function (error, element) {

        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        } else {
            error.insertAfter(element);
        }
        console.log(element);
        element.focus();
    }
});