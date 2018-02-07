<?php
	
	function r_team_options_mb(){
		// this will contain the metabox function
		?>
		<div class="form-group">
			<label>Team Location</label>
			<input type="text" class="form-control" name="r_inputTeamLocation">
		</div>
		<div class="form-group">
			<label>Team Country</label>
			<select class="form-control" name="r_inputCountry">
				<option value="">Select Country</option>
				<option value="Canada">Canada</option>
				<option value="France">France</option>
				<option value="Ireland">Ireland</option>
				<option value="United Kingdom">United Kingdom</option>
				<option value="United States">United States</option>
			</select>
		</div>
		<div class="form-group">
			<label>Team URL</label>
			<input type="text" class="form-control" name="r_inputTeamURL">
		</div>
		<div class="form-group">
			<label>Team Email</label>
			<input type="email" class="form-control" name="r_inputTeamEmail">
		</div>
		<div class="form-group">
			<label>Team Phone</label>
			<input type="phone" class="form-control" name="r_inputTeamPhone">
		</div>
		<div class="form-group">
			<label>Team Country</label>
			<select class="form-control" name="r_inputTeamSport">
				<option value="">Select Sport</option>
				<option value="Basketball">Basketball</option>
				<option value="Baseball">Baseball</option>
				<option value="Competitive Dance">Competitive Dance</option>
				<option value="Rugby">Rugby</option>
				<option value="Soccer">Soccer</option>
				<option value="Swimming">Swimming</option>
			</select>
		</div>
		
		<?php
	}