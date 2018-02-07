<?php
	// Create enqueue function
	function r_admin_enqueue(){
		// Use global variable $typenow to set it to current post type
		global $typenow;
		
		if( $typenow != "teams" ){
			return;
		}
		
		// This hook is exclusively for enqueuing files on the admin side
		wp_register_style( 
			'ptbt_bootstrap', plugins_url( '/assets/styles/bootstrap.css', TEAM_PLUGIN_URL)
		);
		
		// Set to only load on the custom post type - teams
		wp_enqueue_style( 'ptbt_bootstrap' );
		
	}