<?php
	
	// create r_create_metaboxes function to add metaboxes
	function r_create_metaboxes(){
		
		// set up metaboxes
		add_meta_box(
			'r_team_options_mb', // id
			__( 'Team Options', 'team' ), // title of metabox
				'r_team_options_mb', // callback
				'teams', // call/define the post type this metabox will appear in
				'normal', // context - normal, side or advanced
				'high' // priority
		);
		
	}