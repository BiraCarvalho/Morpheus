var __Modulo = "Questionarios";
console.log("Admin Modulo " + __Modulo);

jQuery(function()
{
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
            respostaToogle(event, this, "/ajax?mod=" + __Modulo);
        }
    );

    jQuery(".questionarios--resultado").on("click", function(event)
        {
            formularioComplete(event, this, "/ajax?mod=" + __Modulo);
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
        console.log("Falta id da pergunta!");
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


var respostaToogle = function(event, element, url)
{
    var jqElement = jQuery(element);

    checkResposta("check", event, element, url);
    jqElement.siblings().removeClass('active');
    jqElement.addClass("active");    
}

var checkResposta = function(action, event, element, url)
{
    event.preventDefault();

    var qid    = jQuery(element).data("indice-id");
    var pid    = jQuery(element).data("pergunta-id");
    var rvalue = jQuery(element).val(); //Resposta

    if(!qid){
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
        "indice_id"      : qid,
        "pergunta_id"    : pid,
        "resposta_value" : rvalue,
    },
    function(data)
    {
        console.log("Check Reposta# " + data.resposta_id);
    },
    "json")
}

var formularioComplete = function(event, element, url)
{
    event.preventDefault();

    var qid  = jQuery(element).data("indice-id");
    var href = jQuery(element).attr("href");

    if(!qid){
        console.log("Falta id do indice!");
        return false;
    }

    jQuery.post(url,
    {
        "op"             : "resultado-complete",
        "indice_id"      : qid,
    },
    function(data)
    {
        console.log("Complete: " + data.complete);

        if(data.complete){
            location.assign(href);
            return;
        }

        bootbox.alert({
            message: "Para ver o resultado é necessário responder todas as perguntas do questionário."
        });
        return false;

    },
    "json")
}
