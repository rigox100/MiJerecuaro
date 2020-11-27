$(document).ready(function() {


    $.validator.addMethod("formAlphanumeric", function(value, element) {
        var pattern1 = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
        return this.optional(element) || pattern1.test(value);
    }, "El campo debe tener un valor alfanumérico");

    $.validator.addMethod("email", function(value, element) {
        var pattern2 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
        return this.optional(element) || pattern2.test(value);
    }, "Debe ingresar un email válido");

   
    $("#form").validate({
       
        wrapper: 'span',
        errorPlacement: function(error, element) {
            error.css({
                'padding-left': '10px',
                'margin-right': '20px',
                'padding-bottom': '2px',
                'color': 'red',
                'font-size': 'small'
            });
            error.addClass("arrow")
            error.insertAfter(element);
        },


        rules: {
      
            email: {
                required: true,
                maxlength: 50,
                email: true
            },
            password: {
                required: true
                
                
            }

            
        },

        messages: {

            email: {
                required: "Por favor introduzca su email",
                maxlength: "Solo se admite un máximo de 50 caracteres",
                email: "Debe ingresar un email válido"
            },

            password: {
                required: "Por favor introduzca una contraseña"
                
            },

            
            


        },

    });

});