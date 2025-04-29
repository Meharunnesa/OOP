<?php
/*
 * Plugin Name:       My OOP Plugin
 * Description:       This plugin used to practice for oop 
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bristy
 * Text Domain:       bop
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * main class
 */

final class MyPlugin {


    /**
     * plugin version
     * 
     * @var string
     */

    const version = '1.0';


    /**
     * class constructor
     * 
     * @return \MyPlugin
     */

    private function __construct(){
        $this->define();

        register_activation_hook(
            __FILE__,
            [ $this , 'activated']
        );

        add_action( 'plugins_loaded' , [ $this , 'init_plugin'] );
    }

    /**
     * initializes singleton
     * 
     * @return \MyPlugin
     */

    public static function init(){
        static $instance = false ;

        if ( ! $instance ){
            $instance = new self();
        }

        return $instance;
    }

    /**
     * define constant
     * 
     * @return void
     */

    public function define(){
        define( 'MY_PLUGIN_VERSION' , self::version );
        define( 'MY_PLUGIN_FILE' , __FILE__ );
        define( 'MY_PLUGIN_DIR' , __DIR__ );
        define( 'MY_PLUGIN_URL' , plugins_url( '' , MY_PLUGIN_FILE ) );
        define( 'MY_PLUGIN_ASSETS' , MY_PLUGIN_URL . '/assets' );
    }

    /**
     * plugin activated function
     * 
     * @return void
     */

    public function activated(){

        $installer = new \MyPlugin\Installer();

        $installer->run();
    }

    /**
     * initializes the plugin
     * 
     * @return void
     */

    public function init_plugin(){

        if ( is_admin() ){
            new \MyPlugin\Admin();
        }else{
            new \MyPlugin\Frontend();
        }
        
    }

}


/**
 * initializes the main class
 * 
 * @return \MyPlugin
 */

function my_plugin(){
    return MyPlugin::init();
}

my_plugin();

?>