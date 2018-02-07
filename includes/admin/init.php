<?php
	
	function team_admin_init(){
		// link to create metaboxes file
		include( 'create-metaboxes.php' );
		include( 'team-options.php' );
		include( 'enqueue.php' );
		
		// Use the hook 'add_meta_boxes_(post name)' to add metaboxes for custom post types
		// It will only allow us to add metaboxes to our cpts
		add_action( 'add_meta_boxes_teams', 'r_create_metaboxes');
		// Add assets using admin enqueue hook, create new function and include it
		add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
		
	}