//Ativa Select2 para selects
$.fn.select2.defaults.set("theme", "bootstrap");
$.fn.select2.defaults.set("containerCssClass", ":all:");
$.fn.select2.defaults.set("placeholder", "-- Selecione --");
$.fn.select2.defaults.set("allowClear", true);
//$.fn.select2.defaults.set("language", "pt-BR");

$('select').select2({
    language: "pt-BR",
    templateResult: function (data)
    {
        if (!data.element) {
            return data.text;
        }

        var $element = $(data.element);
        var $wrapper = $('<span></span>');

        $wrapper.addClass($element[0].className);
        $wrapper.text(data.text);

        return $wrapper;
    }
});
$("select.disabled").select2({
    disabled : true,
});

$('.datepicker').datepicker({
    language: "pt-BR"
});
$(".data").on("keyup",function(){
    mascara(this, mdata);
})
$(".fone").on("keyup",function(){
    mascara(this, mtel);
})
$(".cpf").on("keyup",function(){
    mascara(this, mcpf);
})
$(".decimal").on("keyup",function(){
    mascara(this, mvalor);
})
$(".numero").on("keyup",function(){
    mascara(this, mnum);
})
$(".cep").on("keyup",function(){
    mascara(this, mcep);
})

var busca_cep = function(){
    jQuery(".cep").on( "blur", function(){

        var cep     = jQuery(this).val();
        var prefixo = jQuery(this).data("prefixo");

        jQuery.ajax({
            dataType : "json",
            url      : '//viacep.com.br/ws/' + cep +'/json/',
            success : function(dados){

                if( dados.erro ){
                    bootbox.alert({
                        title: "CEP não encontrado.",
                        message: "Preencha seu endereço manualmente.",
                        size:"small"
                    });
                    return false;
                }

                jQuery( "#" + prefixo + "Logradouro").val(dados.logradouro);
                jQuery( "#" + prefixo + "Bairro").val(dados.bairro);
                jQuery( "#" + prefixo + "Cidade").val(dados.localidade);
                jQuery( "#" + prefixo + "Uf").val(dados.uf).trigger("change");

                return true;
            }
        })
    });
}
busca_cep();

var boximagem_modaal = function(){
    jQuery(".box-imagem").modaal({
        type: 'image'
    });
}
boximagem_modaal();

var ckeditor_standard = function(){
    jQuery('.ck').ckeditor(function(){},{
    		width   :'100%',
    		height  : 550,
    		customConfig: config_ck,
    		toolbar : 'Standard'
    });
}
ckeditor_standard();

var ckeditor_small = function(){
    jQuery('.ck-small').ckeditor(function(){},{
    		width   :'100%',
    		height  : 250,
    		customConfig: config_ck,
    		toolbar : 'Basic'
    });
}
ckeditor_small();

$(".lista--offset-select").on("change",function(event){
    $modulo = $(this).data("modulo");
    $numero = this.value;
    window.location = "?mod="+$modulo+"&offset="+$numero;
})
$(".lista--filtro-secoes-select").on("change",function(event){
    $modulo = $(this).data("modulo");
    $numero = this.value;
    window.location = "?mod="+$modulo+"&sid="+$numero;
})

$("button#filtro_secao_limpar").on("click",function(event){
    event.preventDefault()
    window.location = "?mod="+$modulo+"&filtro_secao=false";
})
$(".lista--filtro-grupos-select").on("change",function(event){
    $modulo = $(this).data("modulo");
    $numero = this.value;
    window.location = "?mod="+$modulo+"&gid="+$numero;
})


$("input[name='registros']").on("change",function(event){
  var valor = $(this).prop("checked");
  $("input[name='registro[]']").prop("checked",valor);
})


// $(".botao--salvar").on("click",function(event){
//     event.preventDefault()
//     var form = this;
//     bootbox.confirm(
//         "Salvar as alterações e continuar editando?",
//         function(result)
//         {
//             if(result){
//                 $(form).parents("form").submit();
//             }
//         }
//     );
// })

$(".botao--publicar").on("click",function(event){
    event.preventDefault()
    var form = this;
    bootbox.confirm(
        "Salvar as alterações e publicar o conteúdo? <br />A Situação será modificada para Publicado.",
        function(result)
        {
            if(result){
                $("select#Situacao").val("1");
                $(form).parents("form").submit();
            }
        }
    );
})
