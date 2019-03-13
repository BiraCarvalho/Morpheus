var __Modulo = "Configuracoes";
console.log("Admin Modulo " + __Modulo);

jQuery(function(){

    jQuery('a[data-toggle="tab"]').on('show.bs.tab', function (e)
    {
        var hash = jQuery(this).attr("href");
        Cookies.set("form-main-tab-" + __Modulo, hash);
        jQuery(this).addClass("active").siblings().removeClass("active");
    })

    var hash = Cookies.get("form-main-tab-" + __Modulo);

    if( !hash ){
        $("#tabs-" + __Modulo + " a:first").tab('show').addClass("active");
    }

    jQuery('a[href="' + hash + '"]').tab('show').addClass("active");

})
