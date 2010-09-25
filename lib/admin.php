<?php

if ( !class_exists( 'WP_DM_Admin' ) ) :

class WP_DM_Admin {
	
	function wp_dm_admin() {
		$this->__construct();
	}
	
	function __construct() {
		if ( isset( $_POST['wpdm_auth_submit'] ) )
			$this->oauth_init();
			
		add_action( 'admin_menu', array( $this, 'dashboard_hooks' ) );
	}
	
	function dashboard_hooks() {
		add_submenu_page( 'options-general.php', __( 'WP Dailymile', 'wp-dailymile' ), __( 'WP Dailymile','wp-dailymile' ), 'manage_options', 'wp-dailymile', array ( $this, 'display' ) );
	}
	
	function display() {
	
		require_once( dirname(__FILE__) . '/admin-markup.php' );
	}
	
	
	function oauth_init() {
		require_once( dirname(__FILE__) . '/dm-oauth.php' );
		
		$dailymile = new DMOAuth( 'yBNCmBLgnnFnn1MUfQbQ', 'KcdeyI8ceOVNtbx52P3qhUzv0rbnYB5apW6jRANM' );
		$request = $dailymile->getRequestToken();
		
		$token = $request['oauth_token'];
		$_SESSION['wpdm_req_token']  = $token;
		$_SESSION['wpdm_req_secret'] = $request['oauth_token_secret'];
		$_SESSION['wpdm_callback']   = $_GET['wpdm_callback'];
		$_SESSION['wpdm_callback_action'] = $_GET['wpdm_callback_action'];
	
		//if ( $_GET['type'] == 'authorize' ) {
			$url = $dailymile->getAuthorizeURL($token);
	/*	} else {
			$url = $twitter->getAuthenticateURL( $token );
		}*/
		//echo $url;
		require( ABSPATH . WPINC . '/pluggable.php' );
		wp_redirect( $url );
		
		//print_r($request);
	}
}

endif;


?>