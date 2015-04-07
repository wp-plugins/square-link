<?php
/*
Plugin Name: Square Link
Plugin URI: http://www.square-link.com/plugin-wordpress
Description: Ajoutez et gérez vos emplacements publicitaires Square Link directement dans votre interface Wordpress. Rendez-vous dans "Réglages" > "Square Link" pour configurer votre plugin et commencer à ajouter des emplacements.
Version: 2.2
Author: Square Link
Author URI: http://www.square-link.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Ajout de l'API
include_once plugin_dir_path( __FILE__ ).'/square-link-api.php';
// Ajout du widget
include_once plugin_dir_path( __FILE__ ).'/square-link-widget.php';
// Ajout du shortcode
include_once plugin_dir_path( __FILE__ ).'/square-link-shortcode.php';
// Page de configuration
include_once plugin_dir_path( __FILE__ ).'/square-link-config.php';


add_filter('plugin_action_links', 'squareplink_plugin_action_links', 10, 2);

function squareplink_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="options-general.php?page=square-link">Réglages</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}