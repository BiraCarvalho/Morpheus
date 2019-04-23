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

    jQuery(".form-perguntas--adicionar").on("click", function(event)
        {
            perguntaAdicionar(event, this, "/ajax?mod=" + __Modulo);
        }
    );
    jQuery(".form-perguntas--remover").on("click", function(event)
        {
            perguntaRemover(event, this, "/ajax?mod=" + __Modulo);
        }
    );

    jQuery(".questionarios--resposta").on("click", function(event)
        {
            toogleResposta(event, this, "/ajax?mod=" + __Modulo);
        }
    );

})

// ---------- Funções (Métodos) ----//

// ---------- Perguntadados ------------//
var perguntaAdicionar = function(event, element, url)
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
        "op"  :"perguntas-adicionar",
        "uid" : uid
    },
    function(data)
    {
        console.log("Add Perguntas# " + data.pergunta_id);

        var perguntas = jQuery(data.include);
        jQuery("." + wrap_class).append(function(){
            return perguntas.hide();
        });
        ckeditor_small();
        perguntas.slideDown();

        var btn_remover = "#PerguntaCampo_" + data.pergunta_id + " .form-perguntas--remover";
        jQuery(btn_remover).on( "click", function(event){
            perguntaRemover(event, this, url);
        });

    },
    "json")
}

var perguntaRemover = function(event, element, url)
{
    event.preventDefault();

    var pergunta_id = jQuery(element).data("perguntas-id");

    if(!pergunta_id){
        console.log("Falta id do perguntadado!");
        return false;
    }

    jQuery.post(url,
    {
        "op"      :"perguntas-remover",
        "pergunta_id" : pergunta_id
    })
    .done(function(data)
    {
        var perguntas = jQuery("#PerguntaCampo_" + pergunta_id);
        perguntas.slideUp(800);
        setTimeout( function(){
            perguntas.remove();
        }, 1000 );

        console.log("Remove Perguntas# "+pergunta_id);
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

    var iid    = jQuery(element).data("indice-id");
    var pid    = jQuery(element).data("pergunta-id");
    var rvalue = jQuery(element).val(); //Resposta

    if(!iid){
        console.log("Falta id do indice!");
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
        "indice_id"      : iid,
        "pergunta_id"    : pid,
        "resposta_value" : rvalue,
    },
    function(data)
    {
        console.log("Check Reposta# " + data.resposta_id);
    },
    "json")
}


