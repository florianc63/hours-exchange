$( document ).ready( function() {

	$( 'textarea.editor' ).ckeditor();
	
	$("form[data-confirm]").submit(function() {
        if ( ! confirm($(this).attr("data-confirm"))) {
            return false;
        }
    });

} );
