<?php
	
	function r_team_options_mb( $post ){
		// Create variable to hold the data after its submitted
		$team_data = get_post_meta( $post->ID, 'team_data', true );
		// Check if values are empty and set up default values
		if( empty($team_data) ){
			
			$team_data = array(
				
				'teamlocation' => '',
				'teamcountry' => '',
				'teamurl' => '',
				'teamemail' => '',
				'teamphone' => '',
				'teamsport' => ''
				
			);
			
		}
		
		// this will contain the metabox function
		?>
		<div class="form-group">
			<label>Team Location</label>
			<input type="text" class="form-control" name="r_inputTeamLocation" value="<?php echo $team_data['teamlocation'];?>">
		</div>
		<div class="form-group">
			<label>Team Country</label>
			<select class="form-control" name="r_inputCountry">
				<option value="">Select Country</option>
				<option value="Canada" <?php echo $team_data['teamcountry'] == "Canada" ? "SELECTED" : ""; ?>>Canada</option>
				<option value="France" <?php echo $team_data['teamcountry'] == "France" ? "SELECTED" : ""; ?>>France</option>
				<option value="Ireland" <?php echo $team_data['teamcountry'] == "Ireland" ? "SELECTED" : ""; ?>>Ireland</option>
				<option value="United Kingdom" <?php echo $team_data['teamcountry'] == "United Kingdom" ? "SELECTED" : ""; ?>>United Kingdom</option>
				<option value="United States" <?php echo $team_data['teamcountry'] == "United States" ? "SELECTED" : ""; ?>>United States</option>
			</select>
		</div>
		<div class="form-group">
			<label>Team URL</label>
			<input type="text" class="form-control" name="r_inputTeamURL" value="<?php echo $team_data['teamurl'];?>">
		</div>
		<div class="form-group">
			<label>Team Email</label>
			<input type="email" class="form-control" name="r_inputTeamEmail" value="<?php echo $team_data['teamemail'];?>">
		</div>
		<div class="form-group">
			<label>Team Phone</label>
			<input type="phone" class="form-control" name="r_inputTeamPhone" value="<?php echo $team_data['teamphone'];?>">
		</div>
		<div class="form-group">
			<label>Team Country</label>
			<select class="form-control" name="r_inputTeamSport">
				<option value="">Select Sport</option>
				<option value="Basketball" <?php echo $team_data['teamsport'] == "Basketball" ? "SELECTED" : ""; ?>>Basketball</option>
				<option value="Baseball" <?php echo $team_data['teamsport'] == "Baseball" ? "SELECTED" : ""; ?>>Baseball</option>
				<option value="Competitive Dance" <?php echo $team_data['teamsport'] == "Competitive Dance" ? "SELECTED" : ""; ?>>Competitive Dance</option>
				<option value="Rugby" <?php echo $team_data['teamsport'] == "Rugby" ? "SELECTED" : ""; ?>>Rugby</option>
				<option value="Soccer" <?php echo $team_data['teamsport'] == "Soccer" ? "SELECTED" : ""; ?>>Soccer</option>
				<option value="Swimming" <?php echo $team_data['teamsport'] == "Swimming" ? "SELECTED" : ""; ?>>Swimming</option>
			</select>
		</div>
		
		<?php
	}
	
	// Add Team Staff Function
	function r_team_staff_mb( $post ){
		
		
		
	}