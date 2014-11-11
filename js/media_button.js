jQuery(function($) {

    $('#squarelink_buttons_popup button').click(squarelink_insert_shortcode);

    function squarelink_insert_shortcode() {
    	var id = $('#squarelink_select_space').val(); 
    	var align = $('#squarelink_select_align').val(); 
	    wp.media.editor.insert('<div style="text-align:'+align+';">[squarelink id="'+id+'"]</div><p></p>');
	}

});