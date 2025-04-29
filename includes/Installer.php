<?php

namespace MyPlugin;

/**
 * Installer class
 */
class Installer {
    

    /**
     * 
     * run the installer
     * 
     */

    public function run(){
        $this->add_version();
        $this->creates_table();
    }

    public function add_version(){

        $installed = get_option( 'my_plugin_installed');

        if ( ! $installed ){
            update_option( 'my_plugin_installed' , time() );
        }

        update_option( 'my_plugin_version' , MY_PLUGIN_VERSION );
    }


    public function creates_table(){
        global $wpdb;

        $charset_collate = $wpdb-> get_charset_collate();

        $table_name = $wpdb->prefix . 'address_books';

        $schema = "CREATE TABLE IF NOT EXISTS `$table_name` (
            `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(100) NOT NULL,
            `address` varchar(255) NOT NULL,
            `phone` varchar(30) NOT NULL,
            `created_by` bigint(20) unsigned NOT NULL,
            `created_at` datetime NOT NULL
          )  $charset_collate" ;


        if ( ! function_exists( 'dbDelta' ) ){
            require_once  ABSPATH . 'wp-admin/includes/upgrade.php' ;
        }

        dbDelta( $schema );
    }


}

?>