var __Modulo = "SistemaUsuarios";

jQuery(function()
{
    var main = jQuery("#form-main-" + __Modulo);

    if( main.length == 0 ){
        return false;
    }

    main.validate(
        {
            debug  : false,
            ignore : ".ignore",
            rules: {
                "SistemaGruposId" : "required",
                "Nome"   : "required",
                "Login"  : "required",
                "Email"  :  {
                                required : true,
                                email    : true
                            },
                "SenhaNova" : {
                                required: function () {                                    
                                    return $("#SenhaExiste").val() == "false";
                                },
                                minlength: 6,
                                maxlength: 20
                            }                            
            }
        }
    )
})
