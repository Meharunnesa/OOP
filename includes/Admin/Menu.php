<?php

namespace MyPlugin\Admin;


/**
 * Menu header class
 * 
 */
class Menu{


    function __construct() {
        add_action( 'admin_menu' , [ $this , 'admin_menu' ] );
    }

    public function admin_menu(){
        $parent_slug = 'my-plugin';
        $capability =  'manage_options';

        add_menu_page(
            __( 'My Plugin' , 'my-plugin'),
            __( 'Test Menu' , 'my-plugin'),
            $capability,
            $parent_slug,
            [ $this , 'address_book' ],
            'dashicons-welcome-learn-more'
        );

        add_submenu_page(
            $parent_slug,
            __( 'Address Book' , 'my-plugin'),
            __( 'Address Book' , 'my-plugin'),
            $capability,
            $parent_slug,
            [ $this , 'address_book' ]
        );

        add_submenu_page(
            $parent_slug,
            __( 'Setting' , 'my-plugin'),
            __( 'Settings' , 'my-plugin'),
            $capability,
            'menu-settings',
            [ $this , 'settings' ]
        );
    }

    public function address_book(){
        $addressbook = new Addressbook(); // addressbook classs
        $addressbook->plugin_page(); // call plugin_page function
    }

    public function settings(){
        echo "this is the submenu of menu";
    }
}

?>