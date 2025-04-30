<?php


/***
 * Insert new address
 * 
 * @param array $args
 * 
 * @return int/wp_error
 */

function wpd_insert_address( $args = [] ){

    global $wpdb;

    if ( empty( $args[ 'name' ] ) ){
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
        $table_name = $wpdb->prefix . 'address_books',
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


function wpd_get_addresses( $args = [] ) {
    global $wpdb;

    $defaults = [
        'number'  => 20,
        'offset'  => 0,
        'orderby' => 'id',
        'order'   => 'ASC'
    ];

    $args = wp_parse_args( $args, $defaults );

    $table_name = $wpdb->prefix . 'address_books';

    $items = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name
            ORDER BY %s %s
            LIMIT %d, %d",
            $args[ 'orderby' ],$args[ 'order' ],$args[ 'offset' ],$args[ 'number' ]
    ) );

    return $items;

}


?>