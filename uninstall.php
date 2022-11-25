<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  LIW-POS
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
die();

// Access the database via SQL
global $wpdb;
$general_settings_table =  $prefix."offices";
$query = "Drop table if exists {$general_settings_table}";
$wpdb->query( $query );
