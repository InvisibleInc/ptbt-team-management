<?php
	
	function ptbt_filter_team_content( $content ){
		
		// This function will always apply to all post types - important to set what post type (teams) to which it applies.
		if( !is_singular( 'teams') ){
			
			return $content;
			
		}
		
		global $post;
		$team_html = file_get_contents( 'team-template.php', true );
		$team_data = get_post_meta( $post->ID, 'team_data', true );	// Grab the meta data
		// Run str_replace to replace the placeholders found in team-template file
		$team_html = str_replace( 'LOCATION_PH', $team_data['teamlocation'], $team_html );
		$team_html = str_replace( 'COUNTRY_PH', $team_data['teamcountry'], $team_html );
		$team_html = str_replace( 'URL_PH', $team_data['teamurl'], $team_html );
		$team_html = str_replace( 'EMAIL_PH', $team_data['teamemail'], $team_html );
		$team_html = str_replace( 'PHONE_PH', $team_data['teamphone'], $team_html );
		$team_html = str_replace( 'SPORT_PH', $team_data['teamsport'], $team_html );
		// Translate our text
		$team_html = str_replace( "LOCATION_I18N", __("Location", "team"), $team_html );
		$team_html = str_replace( "COUNTRY_I18N", __("Country", "team"), $team_html );
		$team_html = str_replace( "URL_I18N", __("URL", "team"), $team_html );
		$team_html = str_replace( "EMAIL_I18N", __("Email", "team"), $team_html );
		$team_html = str_replace( "PHONE_I18N", __("Phone", "team"), $team_html );
		$team_html = str_replace( "SPORT_I18N", __("Sport", "team"), $team_html );
		$team_html = str_replace( "RATE_I18N", __("Rate", "team"), $team_html );
		
		// always return the content plus the amend content $team_html
		return $team_html . $content; 
		
	}