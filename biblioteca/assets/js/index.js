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

$("a[rel='box-imagem']").magnificPopup({
	type:"image",
	image:{
		titleSrc: 'title'
	},
	gallery:{
		enabled:true
	}
});

$(".box-imagem").magnificPopup({
	type:"image",
	image:{
		titleSrc: 'title'
	}
});

$(".iframe").magnificPopup({
	type:"video"
});

$(".alert--flash").show( 300 ).delay( 15000 ).slideUp( 400 );

if( $(".filestyle").length ){
    $(".filestyle").fileinput();
}

//Plugin de paginação com bootstrap : Bootpage*

var pagina_atual = $(".paginador").data('pagina-atual');
var pagina_total = $(".paginador").data('pagina-total');

$('.paginador').bootpag({
	page: pagina_atual,
	maxVisible: 6,
	leaps: true, 
	prev: '<',
	next: '>',
	firstLastUse: true,
	first: '<<',
	last: '>>',
	total: pagina_total,
	wrapClass: 'pagination justify-content-center'
}).on('page', function(event, num){
	
	var pagina_href  = $(this).data('pagina-href');
	var query_string = $(this).data('pagina-query-string');
	query_string = query_string ? query_string : "";
	
	location.href = pagina_href + "/pagina/" + num + query_string;
});


var infiniteScrollContainer   = $('.resultados-container');
var infiniteScrollQueryString = infiniteScrollContainer.data("query-string");
var infiniteScrollPageMax     = infiniteScrollContainer.data('paginas-total');
var infiniteScrollMoreButton  = $('.view-more-button');

if( infiniteScrollPageMax > 1 ){

    infiniteScrollContainer.infiniteScroll({
        path: function(){
            var pageNumber  = this.pageIndex + 1;
            if( pageNumber <= infiniteScrollPageMax ){
                return "/brinquedos-e-acessorios/pagina/" + pageNumber + "/" + infiniteScrollQueryString
            }
            return false;        
        }, 
        append: ".resultado-item",
        history: false,
        button: '.view-more-button',
        checkLastPage: true,
    });

    // get Infinite Scroll instance
    var infScroll = infiniteScrollContainer.data('infiniteScroll');

    infiniteScrollContainer.on( 'load.infiniteScroll', onPageLoad );

    function onPageLoad() {

        if ( infScroll.loadCount == 1 ) {
            // after 2nd page loaded
            // disable loading on scroll
            infiniteScrollContainer.infiniteScroll( 'option', {
            loadOnScroll: false,
            });
            // show button
            infiniteScrollMoreButton.show();
            // remove event listener
            infiniteScrollContainer.off( 'load.infiniteScroll', onPageLoad );
        }

    }
}