<?php
/*
Plugin Name: WP-Dailymile
Plugin URI: http://teleogistic.net/code/wordpress/wp-dailymile
Description: Changes your life
Version: 0.1
Author: Boone and Rebecca Gorges
Author URI: 
*/


if ( !class_exists( 'WP_Dailymile_Loader' ) ) :

class WP_Dailymile_Loader {

	// PHP4 loader
	function anthologize_loader () {
		session_start();
		$this->__construct();
	}
	
	function __construct() {
	
		if ( is_admin() ) {
			require_once( dirname(__FILE__) . '/lib/admin.php' );
			$admin = new WP_DM_Admin;
		}
			
	
	}
}

endif;

function wp_dailymile_loader() {
	$wp_dailymile = new WP_Dailymile_Loader();
}
add_action( 'init', 'wp_dailymile_loader' );

/*
App Details (edit)
Callback URL
http://teleogistic.net/code/wordpress/wp-dailymile
Support URL
http://teleogistic.net/code/wordpress/wp-dailymile
OAuth Details
Consumer Key
yBNCmBLgnnFnn1MUfQbQ
Consumer Secret
KcdeyI8ceOVNtbx52P3qhUzv0rbnYB5apW6jRANM
Request Token URL
http://api.dailymile.com/oauth/request_token
Access Token URL
http://api.dailymile.com/oauth/access_token
Authorize URL
http://api.dailymile.com/oauth/authorize
Supported Request Signing Functions
HMAC-SHA1

*/

?>