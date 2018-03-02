<?php
	
	// create ptbt_create_metaboxes function to add metaboxes
	function ptbt_create_metaboxes(){
		
		// set up metaboxes
		add_meta_box(
			'ptbt_team_options_mb', // id
			__( 'Team Options', 'team' ), // title of metabox
				'ptbt_team_options_mb', // callback
				'teams', // call/define the post type this metabox will appear in
				'normal', // context - normal, side or advanced
				'high' // priority
		);
		
		// set up metaboxes
		add_meta_box(
			'ptbt_team_staff_mb', // id
			__( 'Team Staff', 'team' ), // title of metabox
				'ptbt_team_staff_mb', // callback
				'teams', // call/define the post type this metabox will appear in
				'normal', // context - normal, side or advanced
				'high' // priority
		);
		
	}