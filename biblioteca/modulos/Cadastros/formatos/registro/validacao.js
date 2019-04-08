var __Modulo = "Cadastros";

jQuery(function()
{
    var main = jQuery("#form-main-" + __Modulo + "Registro");

    if( main.length == 0 ){
        return false;
    }

    main.validate({
            debug  : false,
            ignore : ".ignore",
            rules  :{
                    "Nome"  : "required",
                    "Email" : {
                                required : true,
                                email    : true
                            },
                    "Senha" : {
                        required : true
                    },
                    "ConfirmarSenha" : {
                        equalTo : "#Senha"
                    },
                    "hiddenRecaptcha" : {
                                            required: function () {
                                                var response_field = grecaptcha.getResponse();
                                                if( response_field.length === 0 ){
                                                    return true;
                                                }
                                            }
                                        }
                    },
            messages: {
                "ConfirmarSenha" :  "A senhas não conferem."
            }
    })

})
