var __Modulo = "Questionarios";
console.log("Admin Modulo " + __Modulo);

jQuery(function()
{
    var operacao = jQuery(".nav-tabs").data("operacao");

    if(operacao == "editar"){

        var hash = Cookies.get("form-main-tab-" + __Modulo);
        jQuery('.nav-tabs a[href="' + hash + '"]').tab('show');

        jQuery('a[data-toggle="tab"]').on('show.bs.tab', function (e)
        {
            var hash = jQuery(this).attr("href");
            Cookies.set("form-main-tab-" + __Modulo, hash);
        })

    }else{
        Cookies.remove("form-main-tab-" + __Modulo);
    }

    jQuery(".form-meta--remover").on("click", function(event)
        {
            metaRemover(event, this, "/ajax?mod=" + __Modulo);
        }
    );

    jQuery(".form-meta--adicionar").on("click", function(event)
        {
            metaAdicionar(event, this, "/ajax?mod=" + __Modulo);
        }
    );


    jQuery(".questionarios--resposta").on("click", function(event)
        {
            toogleResposta(event, this, "/ajax?mod=" + __Modulo);
        }
    );

})

// ---------- Funções (Métodos) ----//

// ---------- Metadados ------------//
var metaAdicionar = function(event, element, url)
{
    event.preventDefault();

    var uid        = jQuery(element).data("conteudo-id");
    var wrap_class = jQuery(element).data("wrap-class");

    if(!uid){
        console.log("Falta id do conteúdo!");
        return false;
    }

    jQuery.post(url,
    {
        "op"  :"metadados-adicionar",
        "uid" : uid,
        "tag" :"MetaCampo"
    },
    function(data)
    {
        console.log("Add Meta# " + data.meta_id);

        var meta = jQuery(data.include);
        jQuery("." + wrap_class).append(function(){
            return meta.hide();
        });
        ckeditor_small();
        meta.slideDown();

        var btn_remover = "#MetaCampo_" + data.meta_id + " .form-meta--remover";
        jQuery(btn_remover).on( "click", function(event){
            metaRemover(event, this, url);
        });

    },
    "json")
}

var metaRemover = function(event, element, url)
{
    event.preventDefault();

    var meta_id = jQuery(element).data("meta-id");

    if(!meta_id){
        console.log("Falta id do metadado!");
        return false;
    }

    jQuery.post(url,
    {
        "op"      :"metadados-remover",
        "meta_id" : meta_id
    })
    .done(function(data)
    {
        var meta = jQuery("#MetaCampo_" + meta_id);
        meta.slideUp(800);
        setTimeout( function(){
            meta.remove();
        }, 1000 );

        console.log("Remove Meta# "+meta_id);
    },
    "json")
}


var toogleResposta = function(event, element, url)
{
    var jqElement = jQuery(element);

    
    checkResposta("check", event, element, url);
    jqElement.siblings().removeClass('active');
    jqElement.addClass("active");    
    
    // if( jqElement.hasClass('active') ){
    // }
    // else{

    //     checkResposta("uncheck", event, element, url);
    //     jqElement.siblings().removeClass('active');
    //     jqElement.addClass("active");

    // }
}

var checkResposta = function(action, event, element, url)
{
    event.preventDefault();

    var cid    = jQuery(element).data("cadastro-id");
    var pid    = jQuery(element).data("pergunta-id");
    var rvalue = jQuery(element).val(); //Resposta

    if(!cid){
        console.log("Falta id do cadastro de clientes!");
        return false;
    }

    if(!pid){
        console.log("Falta id da pergunta!");
        return false;
    }

    if(!rvalue){
        console.log("Falta id da resposta!");
        return false;
    }

    jQuery.post(url,
    {
        "op"             : "resposta-" + action,
        "cadastro_id"    : cid,
        "pergunta_id"    : pid,
        "resposta_value" : rvalue,
    },
    function(data)
    {
        console.log("Check Reposta# " + data.resposta_id);
    },
    "json")
}


