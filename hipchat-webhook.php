<?php
/**
 * Plugin Name: Hipchat Webhook
 * Description: ~
 * Author: Drew Jaynes
 * License: GPLv2
 * Version: 0.1
 */

/**
 * Load $api_key from elsewhere.
 */
require_once( 'secrets.php' );

$args = array(
	'method' => 'POST',
	'body'   => array(
		'room_id'        => 602229,
		'from'           => 'WP.com VIP',
		'message'        => 'Somebody just pushed code to VIP for review',
		'notify'         => 0,
		'color'          => 'purple',
		'message_format' => 'html',
		'format'         => 'json',
		'auth_token'     => $api_key
	)
);

$resp = wp_remote_post( 'https://api.hipchat.com/v1/rooms/message', $args );

if ( '200' == wp_remote_retrieve_response_code( $resp ) ) {
	error_log( 'success' );
}
