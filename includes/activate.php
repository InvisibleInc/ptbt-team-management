<?php
	
	function ptbt_management_activate_plugin(){
		// Check version of Wordpress
		if( version_compare( get_bloginfo( 'version' ), 4.8, '<' ) ){
			
			wp_die( __( ' You must update Wordpress to use this plugin', 'ptbt' ) );
			
		}
		
	}