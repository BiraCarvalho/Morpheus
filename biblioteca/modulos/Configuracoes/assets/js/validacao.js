var __Modulo = "Configuracoes";

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
                "Titulo"   : "required",
                "Tag"      : "required"
            }
        }
    )
})
