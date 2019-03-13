var __HeaderAutenticacaoUrl = "/ajax?mod=ClientesAutenticacao";

jQuery(function () {
    jQuery(".autenticacao--logon").on("click", function (event) {
        header_autenticacao__logon(event, jQuery(this), __HeaderAutenticacaoUrl);
    })
})

var header_autenticacao__logon = function (event, element, url) {

    event.preventDefault();

    console.log("Header Autenticação");

    var post_data = {
        op       : "autenticacao__header_login",
        redirect : jQuery("#headerAutenticacaoRedirect").val(),
        usuario  : jQuery("#headerAutenticacaoUsuario").val(),
        senha    : jQuery("#headerAutenticacaoSenha").val()
    };

    jQuery.ajax({
        type    : "POST",
        url     : url,
        data    : post_data,
        dataType: "json"
    }).done(function (data) {
        var logon = data.logon;
        if (logon === false) {
            swal({
                title: "Não foi possível efetuar o login. Verifique seus dados e tente novamente.",
                type: "warning",
                showCloseButton: true,
                allowOutsideClick: false
            })
        } else {
            location.href = data.redirect;
        }        
    })
}