$(document).ready(function() {

    $('input[type="text"]').change(function(){
        this.value = $.trim(this.value);
    });

    $.validator.addMethod("formAlphanumeric", function(value, element) {
        var pattern1 = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
        return this.optional(element) || pattern1.test(value);
    }, "El campo debe tener un valor alfanumérico");

    $.validator.addMethod("email", function(value, element) {
        var pattern2 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
        return this.optional(element) || pattern2.test(value);
    }, "Debe ingresar un email válido");

    $.validator.addMethod("codigo_postal", function(value, element) {
        var pattern2 = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
        return this.optional(element) || pattern2.test(value);
    }, "Debe ingresar un código postal válido");

    

    /*
    $.validator.addMethod("password", function(value, element) {
        var pattern3 = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$/;
        return this.optional(element) || pattern3.test(value);
    }, "Por favor introduzca una contraseña");
    */

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
            nombre_negocio: {
                required: true,
                minlength: 5,
                maxlength: 100
                
            },
            tel: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            calle: {
                required: true,
                maxlength: 100,
                minlength: 5
            },
            colonia: {
                required: true,
                maxlength: 50
                
            },

            cp: {
                required: true,
                codigo_postal:true
            },
            
            descripcion: {
                required: true,
                maxlength: 500
            },
            

            politica_privacidad:{
                required: true
            }
        },

        messages: {

            nombre_negocio: {
                required: 'Por favor introduzca el nombre del negocio',
                formAlphanumeric: "El nombre solo puede contener letras",
                minlength: "Debe tener al menos 5 caracteres"
                
            },

            tel: {
                required: "Por favor introduzca un teléfono de contacto",
                minlength: "Ingrese un teléfono válido de 10 dígitos",
                maxlength: "Ingrese un teléfono válido de 10 dígitos"
               
            },

            calle: {
                required: "Por favor introduzca la dirección",
                minlength: "Debe tener al menos 5 caracteres",
                maxlength: "Solo se admite un máximo de 100 caracteres"
                
            },

            colonia: {
                required: "Por favor introduzca la colonia",
                maxlength: "Solo se admite un máximo de 50 caracteres"
                
            },

            cp: {
                required: "Por favor introduzca el código postal",
                codigo_postal: "Debe ingresar un código postal válido"
                
                
            },

            descripcion: {
                required: "Porfavor introduzca una breve descripción",
                maxlength: "Solo se admite un máximo de 500 caracteres"
            },


            politica_privacidad: {
                required: "Debe aceptar la política de privacidad"
            },


        },

    });

});