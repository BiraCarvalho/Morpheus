jQuery.validator.setDefaults({

	highlight: function(element) {
		$(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		$(element).closest('.form-group').removeClass('has-error');
	},
    errorElement: 'span',
	errorClass: 'span-error',
    errorPlacement: function(error, element) {

        if( element.hasClass("hiddenRecaptcha") ){
          error.prependTo($(".wrap-captcha"));
        }

        if( !element.hasClass("cep") ){
          var label = element.parents().children("label")
          error.insertAfter(label);
        }

        if( element.parents("form") ){
                error.insertAfter(element);
        }

	}
})
