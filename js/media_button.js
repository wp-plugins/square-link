jQuery(function($) {

    $('#squarelink_buttons_popup button').click(squarelink_insert_shortcode);

    function squarelink_insert_shortcode() {
    	var id = $('#squarelink_select_space').val(); 
	    wp.media.editor.insert('[squarelink id="'+id+'"]');
	}

});