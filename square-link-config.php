<?php

add_action('admin_menu', 'squarelink_register_submenu_page');
add_action('admin_init', 'squarelink_init_settings');

function squarelink_register_submenu_page() {
	add_submenu_page( 'options-general.php', 'Square Link', 'Square Link', 'manage_options', 'square-link', 'squarelink_submenu_page' ); 
}

function squarelink_submenu_page() {
	
	if(!current_user_can('manage_options'))
    {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Render the settings template
    include(sprintf("%s/square-link-config-page.php", dirname(__FILE__)));

}

function squarelink_init_settings()
{
    register_setting('squarelink_settings_group', 'squarelink_setting_siteid');
} 