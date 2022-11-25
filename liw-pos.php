<?php
/**
 * @package LIW-POS
 * @version 1.0.0
 */
/*
Plugin Name: LIW POS
Plugin URI: #
Description: Point of sales (POS) plugin that adds
Author: shakir
Version: 0.0.1
Author URI: https://www.linkedin.com/in/shakir-uz-zaman/
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/
defined("ABSPATH") or die("You are not permitted in this housee ");
/**
 * * TO DO
 * * 1 : installing event
 * * 2 : Uninstalling event
 */

Class Liwpos{
    function activate() {
		// create db tables
        $this->do_db_tables();
        flush_rewrite_rules();

	}

	function deactivate() {
		// flush rewrite rules
        flush_rewrite_rules();

	}

	function uninstall() {
	        // remeove db tabels

	}
    /**
     * Creates/updates the database tables.
     *
     * @since    1.0.0
     * @param    string   $prefix
     * @global   object   $wpdb
     */
    private function do_db_tables(string $prefix="null")
    {

        global $wpdb;
        $prefix = $wpdb->prefix . 'liwpos_';

        $general_settings_table =  $prefix."offices";

        $charset_collate = "";

        if ( !empty($wpdb->charset) )
            $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} ";

        if ( !empty($wpdb->collate) )
            $charset_collate .= "COLLATE {$wpdb->collate}";

        $sql = "
        CREATE TABLE {$general_settings_table} (
            id bigint(20) NOT NULL,
            updated_at datetime NOT NULL,
            updated_by bigint(20) Default NULL,
            name varchar(100) Default NULL,
            info varchar(100) Default NULL,
            address varchar(100) Default NULL,
            details text Default NULL,
            logo varchar(100) default NULL,
            icon varchar(100) default NULL,

            PRIMARY KEY  (id)
        ) {$charset_collate} ENGINE=InnoDB;
        ";
        $wpdb->query(
            $sql
        );
    }
}

$Liwpos = new Liwpos();
// activation
register_activation_hook( __FILE__, array( $Liwpos, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $Liwpos, 'deactivate' ) );
