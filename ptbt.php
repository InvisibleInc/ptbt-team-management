<?php

/*
Plugin Name: PtbT Team Management
Plugin URi: http://pickthebestteam.com/team-management/
Description: <strong>Pick the Best Team Management</strong> plugin allows you to create teams and manage players through Wordpress. Add teams, players (junior & senior), track attendence, set up events, track stats. Build a better overview of which players are putting in the work and make you selection choices easier with quality information. <strong>This plugin adds a team management features to Pick the Best Team</strong>.
Version: 0.2
Author: Pick the Best Team
Author URi: pickthebestteam.com
License: GPL2
License URi: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pick-the-best-team
*/


/* ! 0. TABLE OF CONTENTS */

/*
	1. SETUP

	2. INCLUDES

	3. HOOKS

	4. SHORTCODES

*/

	// !01. SETUP
	// Create a CONSTANT for the plugin URL
	define( 'TEAM_PLUGIN_URL', __FILE__ );


	// !02. INCLUDES
	include( 'includes/activate.php' ); // activation and secure
	include( 'includes/init.php' ); // add CPTs
	// Include admin init file, used to define metaboxes, etc
	include( 'includes/admin/init.php' );
	// Include file to save team post
	include( 'includes/process/save-post.php' );
	// Include filter-content file
	include( 'includes/process/filter-content.php' );


	// !03. HOOKS
	// register activation - need to better understand this hook
	register_activation_hook( __FILE__, 'ptbt_management_activate_plugin' );
	// Add action hook called init - triggered when WP initialised the data required for the current page and it should be used to set up the plugin
	// The function we want ot call is called team_init - this is where we should set up our custom post
	// See inside init.php in the includes folder
	add_action( 'init', 'team_init' );
	// Hook into when WP initialises the admin to define metaboxesadd metabox when WP initises the admin - in this example call the function team_admin_init - define function in /admin/init.php and include
	add_action( 'admin_init', 'team_admin_init' );
	// Add action Hook to save post - Create file in the process folder to set up save post
	add_action( 'save_post_teams', 'ptbt_save_post_admin', 10, 3 );
	// Add filter Hook to alter the content
	add_filter( 'the_content', 'ptbt_filter_team_content' );

	// Add filter hook to add User Team to Add New User
	//add_action( 'the_content', 'ptbt_new_user_assign_team' );
	function custom_user_profile_fields($user){
		$teams = wp_query = "SELECT * FROM ``"

	?>
		<h3>Extra profile information</h3>
		<table class="form-table">
		    <tr>
		        <th><label for="team">Team Name</label></th>
		        <td>
		            <span class="description">Select Team</span>

								<select name="team" id="team">
									<option selected="selected" value="<?php echo esc_attr( get_the_author_meta( 'team', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'team', $user->ID ) ); ?></option>
									<option value="Team A">Team A</option>
									<option value="Team B">Team B</option>
									<option value="Team C">Team C</option>
									<option value="Team D">Team D</option>
									<option value="Team E">Team E</option>
							</select>
		        </td>
		    </tr>
		</table>
  <?php
	}
	add_action( 'show_user_profile', 'custom_user_profile_fields' );
	add_action( 'edit_user_profile', 'custom_user_profile_fields' );
	add_action( "user_new_form", "custom_user_profile_fields" );

	function save_custom_user_profile_fields($user_id){
	    # again do this only if you can
	    if(!current_user_can('manage_options'))
	        return false;

	    # save my custom field
	    update_usermeta($user_id, 'team', $_POST['team']);
	}
	add_action('user_register', 'save_custom_user_profile_fields');
	add_action('profile_update', 'save_custom_user_profile_fields');


	// !04. SHORTCODES

	// custom post type
	// custom post type is set up in the init file - found in the includes folder
	add_action( 'init', 'team_init' );
