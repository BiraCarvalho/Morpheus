var __Modulo = "Cadastros";

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
                "Nome"  :   "required",
                "Email" :   {
                                "required" : true,
                                "email"    : true
                            }
            }
        }
    )
})
