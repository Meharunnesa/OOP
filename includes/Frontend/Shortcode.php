<?php

namespace MyPlugin\Frontend;

/**
 * Shortcode
 */
class Shortcode {

    /**
     * Initialize the class
     */

    function __construct(){
        add_shortcode( 'shortcode' , [ $this , 'my_shortcode'] );
    }

    /**
     * Shortcode 
     * 
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */

    public function my_shortcode( $atts , $content = ''){
        return "this is a shortcode";
    }
}


?>