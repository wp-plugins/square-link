<?php

add_thickbox();
add_shortcode('squarelink', 'squarelink_shortcode');
add_action('media_buttons', 'squarelink_media_buttons', 15);
add_action('admin_footer', 'squarelink_media_buttons_popup');
add_action('wp_enqueue_media', 'squarelink_scripts');

function squarelink_shortcode( $atts ) {
    
    $api = new squarelink_API();
    $display = $api->getSpace($atts['id']);

	return $display;
}

function squarelink_media_buttons($context) {
    
    $container_id = 'squarelink_media_buttons_popup';
    $title = 'Ajouter un emplacement Square Link';
  
    echo '<a href="#TB_inline?width=600&height=550&inlineId=squarelink_buttons_popup" title="Ajouter un emplacement Square Link" class="button thickbox">Ajouter un emplacement Square Link</a>';
}

function squarelink_media_buttons_popup() {
    $api = new squarelink_API();
    $website = $api->getWebsite(get_option('squarelink_setting_siteid'));


    echo '<div id="squarelink_buttons_popup" style="display:none;">
    <h2>Choisissez l\'emplacement à insérer :</h2>
    <p>Sélectionnez l\'emplacement publicitaire que vous souhaitez insérer sur votre site puis cliquez le bouton ci-dessous.</p>
    <select id="squarelink_select_space">
        <option selected="selected">-- Choisissez un emplacement --</option>';

        $spaces = $website->spaces;
        if(!is_null($spaces)) {
            foreach ($spaces as $space) {
                echo '<option data-token="'.$space->token.'" value="'.$space->token.'"><b>'.$space->name.'</b> ('.$space->width.' x '.$space->height.')</option>';
            }
        }
        echo '
    </select>&nbsp;&nbsp;&nbsp;
    <select id="squarelink_select_align">
        <option value="left" selected="selected">Aligné à gauche</option>
        <option value="center">Centré</option>
        <option value="right">Aligné à droite</option>
    </select>
    <br/><br/>
    <button class="button button-primary button-large">Insérer cet emplacement</button>
    </div>';
}

function squarelink_scripts() {
    $dir = plugin_dir_url( __FILE__ );
    wp_enqueue_script('media_button_script', $dir.'js/media_button.js', array('jquery'), '1.0', true);
    wp_enqueue_style('thickbox_admin_style', $dir.'css/admin.css');
}
