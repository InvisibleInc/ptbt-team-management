<?php
	
	// Set up save post function
	// This is provide 3 arguments, (1) $post_id, (2) $post - contains info about the post itself, (3) $update - booleen value to let you know if it is a new or old post being updated
	function r_save_post_admin( $post_id, $post, $update ){
		
		// check if update is false
		if( !$update ){
			
			return;
			
		}
		
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';
		//die();
		
		// array to submit data and sanitize fields
		$team_data = array();
		$team_data['teamlocation'] = sanitize_text_field( $_POST['r_inputTeamLocation'] );
		$team_data['teamcountry'] = sanitize_text_field( $_POST['r_inputCountry'] );
		$team_data['teamurl'] = sanitize_text_field( $_POST['r_inputTeamURL'] );
		$team_data['teamemail'] = sanitize_email( $_POST['r_inputTeamEmail'] );
		$team_data['teamphone'] = sanitize_text_field( $_POST['r_inputTeamPhone'] );
		$team_data['teamsport'] = sanitize_text_field( $_POST['r_inputTeamSport'] );
		$team_data['team_rating'] = 0;
		$team_data['rating_count'] = 0;
		
		update_post_meta( $post_id, 'team_data', $team_data );
		
	}