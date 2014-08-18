<?php
/*
Plugin Name: Square Link
Plugin URI: http://www.square-link.com/plugin-wordpress
Description: Ajoutez et gérez vos espaces Square Link facilement et directement dans votre interface Wordpress. Utilisez le widget "Square Link" ou insérez le shortcode suivant [squarelink id="xx"] en remplacant xx par l'identifiant de votre espace.
Version: 1.0
Author: Square Link
Author URI: http://www.square-link.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Ajout du widget
include_once plugin_dir_path( __FILE__ ).'/square-link-widget.php';
// Ajout du shortcode
include_once plugin_dir_path( __FILE__ ).'/square-link-shortcode.php';