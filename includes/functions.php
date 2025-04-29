<?php


/***
 * Insert new address
 * 
 * @param array $args
 * 
 * @return int/wp_error
 */

function wpd_insert_addrress( $args = [] ){

    global $wpdb;

    if ( empty( $data[ 'name' ] ) ){
        return new \WP_Error( 'no-name' , __( 'You must provide a name.' , 'my-plugin' ) );
    }


    $defaults = [
        'name'         => '',
        'address'      => '',
        'phone'        => '',
        'created_by'   => get_current_user_id(),
        'created_at'   => current_time( 'mysql' )
    ];


    $data = wp_parse_args( $args , $defaults );


    
    $inserted = $wpdb->insert( 
        $table_name , 
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%d',
            '%s'
        ]
    );

    if ( ! $inserted ){
        return new \WP_Error( 'failed-to-insert' , __( 'Faild to insert data' , 'my-plugin' ) );
    }


    return $wpdb->insert_id;
}


?>