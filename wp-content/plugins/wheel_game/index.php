<?php
/*
Plugin Name: Wheel Game
Plugin URI:
Description:
Version: 0.1
Author: Alexander Dimitrov (omFg!)
Author URI:
License:
Text Domain:
*/



function wheel_game_activation() {
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    global $wpdb;
    $db_table_name = $wpdb->prefix . 'wheel_game';
    if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
        if ( ! empty( $wpdb->charset ) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

		$sql = "CREATE TABLE " . $db_table_name . " (
			`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`firstname` varchar(30) NOT NULL,
			`lastname` varchar(30) NOT NULL,
			`tel` bigint(20) NOT NULL,
			`email` varchar(50) NOT NULL,
			`ipaddress` varchar(20) NOT NULL,
			`reward` varchar(50) NOT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;";
		dbDelta( $sql );
	}
}
register_activation_hook(__FILE__, 'wheel_game_activation');


function addMenu()
{
    add_menu_page("Edit Wheel", "Edit Wheel", 4, "edit-wheel", "editWheel");
}


function editWheel()
{
    echo '<link rel="stylesheet" type="text/css" href="'.site_url().'/wp-content/plugins/wheel_game/css/style.css"/>';
    include "edit_wheel.php";
}

function viewWheel()
{
    echo '<link rel="stylesheet" type="text/css" href="'.site_url().'/wp-content/plugins/wheel_game/css/style.css"/>';
    include "inc/config.php";
    include "view_whell.php";
}
add_action("admin_menu", "addMenu");
add_action("wp_head", "viewWheel");