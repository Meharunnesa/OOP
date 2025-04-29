<?php

namespace MyPlugin\Admin;


class Addressbook {

    function plugin_page(){
       $action = isset( $_GET['action'] ) ?  $_GET['action'] : 'list' ;

        
       switch  ( $action ) {
            case 'new' : 
                $template = __DIR__ . '/views/address-new.php';
                break;

            case 'edit' : 
                $template = __DIR__ . '/views/address-edit.php';
                break;

            case 'view' : 
                $template = __DIR__ . '/views/address-view.php';
                break;

            default :
                $template = __DIR__ . '/views/address-list.php';
                break;
       }

       if ( file_exists($template) ){
            include $template;
       }

    }


    /**
     * Handle the form 
     */

    public function form_handler(){
        if( ! isset( $_POST['submit_address'] ) ){
            return; 
        }

        if( ! wp_verify_nonce( $_POST['_wpnonce'] , 'new_address' )){
            wp_die("Are you cheating?" );
        }

        if( ! current_user_can( 'manage_options')){
            wp_die("Are you cheating?" );
        }

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
        $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';


       $insert_id = wpd_insert_addrress([
            'name'      => $name,
            'address'   => $address,
            'phone'     => $phone
       ]);

       

        var_dump( $_POST );
        exit;
    }
}


?>