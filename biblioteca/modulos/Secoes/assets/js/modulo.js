var __Modulo = "Secoes";
console.log("Admin Modulo " + __Modulo);

jQuery(function()
{

    jQuery(".form-imagens--remover").on("click", function(event)
        {
            imagensRemover(event, this, "ajax.php?mod=" + __Modulo);
        }
    );

    jQuery(".form-capa--remover").on("click", function(event)
        {
            capaRemover(event, this, "ajax.php?mod=" + __Modulo);
        }
    );
    jQuery(".form-capa--adicionar").on("click", function(event)
        {
            capaAdicionar(event, this, "ajax.php?mod=" + __Modulo);
        }
    );

})

// ---------- Funções (Métodos) ----//

var capaAdicionar = function(event, element, url)
{
    event.preventDefault();

    var uid        = jQuery(element).data("conteudo-id");
    var capa_id    = jQuery(element).data("capa-id");
    var capa_nome  = jQuery(element).data("capa-nome");
    var wrap_class = jQuery(element).data("wrap-class");

    if(!uid){
        console.log("Falta id do conteúdo!");
        return false;
    }

    jQuery.post(url,
    {
        "op"        : "capa-adicionar",
        "uid"       : uid,
        "capa_id"   : capa_id,
        "capa_nome" : capa_nome
    },
    function(data)
    {
        console.log("Add Capa# " + uid);

        var include = jQuery(data.include);
        jQuery(".capa").html(function(){
            return include;
        });

        var btn_remover = ".form-capa--remover";
        jQuery(btn_remover).on( "click", function(event){
            capaRemover(event, this, url);
        });

    },
    "json")
}

var capaRemover = function(event, element, url)
{
    event.preventDefault();

    var uid = jQuery(element).data("conteudo-id");

    if(!uid){
        console.log("Falta id do conteúdo!");
        return false;
    }

    jQuery.post(url,
    {
        "op"  : "capa-remover",
        "uid" : uid
    },
    function(data)
    {
        var capa = jQuery(".capa");
        capa.children("img").remove();
        console.log("Remove Capa# " + uid);
    },
    "json")
}

// ---------- Imagens ------------//
var imagensAtualizar = function(event, json)
{
    event.preventDefault();

    jQuery(".imagens-wrap").append(json.include);
    jQuery("#MidiasImagens").val(json.conteudos);

    $.each( json.uploads, function( key, val ) {
        console.log("Add Imagem# " + val);
        var btn_remover = "#Imagem_" + val + " .form-imagens--remover";
        jQuery(btn_remover).on( "click", function(event){
            imagensRemover(event, this, "ajax.php?mod=" + __Modulo);
        });
    });
}

var imagensRemover = function(event, element, url)
{
    event.preventDefault();

    var imagem_id = jQuery(element).data("imagem-id");
    var uid       = jQuery(element).data("conteudo-id");

    if(!imagem_id){
        console.log("Falta id da imagem!");
        return false;
    }

    jQuery.post(url,
    {
        "op"        :"imagens-remover",
        "imagem_id" : imagem_id,
        "uid"       : uid
    })
    .done(function(data)
    {
        jQuery("#Imagem_" + imagem_id).remove();
        console.log("Remove Imagem# "+imagem_id);
    },
    "json")
}


// ------ FileInput Init Upload de Imagens ------ //
jQuery("#ImagensUpload").fileinput({
    language: "pt-BR",
    allowedFileExtensions: ["jpg","jpeg","png","gif","jpeg"],
    theme       : "gly",
    showClose   : false,
    removeTitle : "Limpar",
    removeLabel : "Limpar",
    removeIcon  : "<span class=\"glyphicon glyphicon-remove\"></span>",
    uploadAsync : false,
    uploadUrl   : "ajax.php?mod=" + __Modulo,
    fileActionSettings: {
        showRemove  : true,
        showUpload  : false,
        showDownload: false,
        showZoom    : false,
        showDrag    : false,
        removeIcon  : "<span class=\"glyphicon glyphicon-remove\"></span>"
    },
    uploadExtraData: function() {
        return {
            op   : "imagens-upload",
            campo: "ImagensUpload",
            uid  : jQuery("#Id").val(),
            slug : jQuery("#Slug").val(),
        };
    }
}).on('filebatchuploadsuccess', function(event, data, previewId, index) {
    $(this).fileinput('clear');
    var response = data.jqXHR.responseJSON;
    imagensAtualizar(event, response);
});
