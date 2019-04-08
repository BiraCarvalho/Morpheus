//Seção Título
var article__titulo = $("#article--titulo").text();
$("#navbar--titulo").text(article__titulo);



$(".data").on("keyup",function(){
    mascara(this, mdata);
})
$(".telefone").on("keyup",function(){
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

// $("a[rel='box-imagem']").magnificPopup({
// 	type:"image",
// 	image:{
// 		titleSrc: 'title'
// 	},
// 	gallery:{
// 		enabled:true
// 	}
// });

// $(".box-imagem").magnificPopup({
// 	type:"image",
// 	image:{
// 		titleSrc: 'title'
// 	}
// });

// $(".iframe").magnificPopup({
// 	type:"video"
// });

$(".alert--flash").show( 300 ).delay( 15000 ).slideUp( 400 );

if( $(".filestyle").length ){
    $(".filestyle").fileinput();
}

//Plugin de paginação com bootstrap : Bootpage*

// var pagina_atual = $(".paginador").data('pagina-atual');
// var pagina_total = $(".paginador").data('pagina-total');

// $('.paginador').bootpag({
// 	page: pagina_atual,
// 	maxVisible: 6,
// 	leaps: true,
// 	prev: '<',
// 	next: '>',
// 	firstLastUse: true,
// 	first: '<<',
// 	last: '>>',
// 	total: pagina_total,
// 	wrapClass: 'pagination justify-content-center'
// }).on('page', function(event, num){

// 	var pagina_href  = $(this).data('pagina-href');
// 	var query_string = $(this).data('pagina-query-string');
// 	query_string = query_string ? query_string : "";

// 	location.href = pagina_href + "/pagina/" + num + query_string;
// });