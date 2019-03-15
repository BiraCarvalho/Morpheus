var __Modulo = "Leads";

jQuery(function()
{
    var main = jQuery("#form-main-" + __Modulo + "Contatos");

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
                    "Assunto"  : "required",
                    "Telefone" : "required",
                    "Mensagem" : "required",
                    "hiddenRecaptcha" : {
                                            required: function () {
                                                var response_field = grecaptcha.getResponse();
                                                if( response_field.length === 0 ){
                                                    return true;
                                                }
                                            }
                                        }
                    }
    })

})
