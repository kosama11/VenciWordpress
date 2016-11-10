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


function addMenu()
{
    add_menu_page("Edit Wheel", "Edit Wheel", 4, "edit-wheel", "editWheel");
}


function editWheel()
{
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