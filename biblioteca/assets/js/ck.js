CKEDITOR.editorConfig = function( config ) {

		config.forcePasteAsPlainText     = true,
		config.allowedContent            = true,
		//config.pasteFilter               = null,

		config.filebrowserBrowseUrl      = '/biblioteca/node_modules/kcfinder/browse.php?type=file',
		config.filebrowserImageBrowseUrl = '/biblioteca/node_modules/kcfinder/browse.php?type=image',
		config.filebrowserFlashBrowseUrl = '/biblioteca/node_modules/kcfinder/browse.php?type=flash',
		config.filebrowserUploadUrl      = '/biblioteca/node_modules/kcfinder/upload.php?type=file',
		config.filebrowserImageUploadUrl = '/biblioteca/node_modules/kcfinder/upload.php?type=image',
		config.filebrowserFlashUploadUrl = '/biblioteca/node_modules/kcfinder/upload.php?type=flash',

		config.contentsCss  = 'assets/css/ck.css',

		// config.extraPlugins = 'bootstrapTable';
		// config.extraPlugins = 'htmlwriter',
		// config.extraPlugins = 'codesnippet',
		// config.extraPlugins = 'codemirror',
        //
		// config.sourceAreaTabSize = 8,
        //
		// config.codemirror = {
		// 	theme:                  'default',
		// 	lineNumbers:            true,
		// 	lineWrapping:           true,
		// 	matchBrackets:          true,
		// 	autoCloseTags:          true,
		// 	autoCloseBrackets:      true,
		// 	enableSearchTools:      true,
		// 	enableCodeFolding:      true,
		// 	enableCodeFormatting:   true,
		// 	autoFormatOnStart:      true,
		// 	autoFormatOnModeChange: true,
		// 	autoFormatOnUncomment:  true,
		// 	mode:                   'htmlmixed',
		// 	showSearchButton:       true,
		// 	showTrailingSpace:      true,
		// 	highlightMatches:       true,
		// 	showFormatButton:       true,
		// 	showCommentButton:      true,
		// 	showUncommentButton:    true,
		// 	showAutoCompleteButton: true,
		// 	styleActiveLine:        true
		// },

		config.width  = 750,
		config.height = 520,

		config.toolbar = 'Standard',

		config.toolbar_Full =	[
			['Source','-','Save','NewPage','Preview','-','Templates'],
			['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
			['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
			['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
			'/',
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['BidiLtr', 'BidiRtl'],
			['Link','Unlink','Anchor'],
			['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
			'/',
			['Styles','Format','Font','FontSize'],
			['TextColor','BGColor'],
			['Maximize', 'ShowBlocks','-','About']
		],

		config.toolbar_Standard = [
            ['PasteText'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Bold','Italic','Underline','StrikeThrough','TextColor','BGColor'],
			['Outdent','Indent','NumberedList','BulletedList','Link','Unlink'],
			['Image','Embed','Table','HorizontalRule','SpecialChar'],
			['RemoveFormat'],
			['Source'],['CodeSnippet']
		],

		config.toolbar_Basic = [
			['PasteText'],
			['Image'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Bold', 'Italic', '-', 'NumberedList', 'BulletedList'],
			['Link', 'Unlink'],
			['Table'],
			['Source']
		]
};
