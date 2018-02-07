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


/*
	// Add filter structure
	// add_filter( 'fitler hook', 'function name' );
	add_filter ( 'the_title', 'ptbt_title' );
	
	// write function - $title is a wordpress variable
	function ptbt_title( $title ){
		
		return 'This is an add filter hook: ' . $title;
		
	}
	
	// Add action structure
	// add_action( 'wp_footer', 'ptbt_footer_shoutout' );
	
	// write function - this echos text to footer
	function ptbt_footer_shoutout() {
		
		echo "Hooked example.";
		
	}
		
*/


/* ! 0. TABLE OF CONTENTS */

/*
	01. Activation and security
	
	1. Add something to page_headers
	
	2. Add favicon feature
	
	3. Modify Site Generator meta tag
	
	4. Add text after each item's content
	
	5. Troubleshooting coding errors and printing variable content
	
	6. Create a shortcode to add Twitter link
	
	7. Create a shortcode with parameters to add Twitter feed to a post or page
	
	8. Create a new enclosing shortcode
	
	9. Add a stylesheet
	
*/

	/* !01. Activation and security  */
	// Make sure we dont expose any info if called directly
	//if( !function_exists( 'add_action' ) ) {
		
	//	die( "Hi there! I'm just a plugin, not much I can do when called directly.");
		
	//}
	
	
	// SETUP
	// Create a CONSTANT for the plugin URL
	define( 'TEAM_PLUGIN_URL', __FILE__ );
	
	// INCLUDES
	include( 'includes/activate.php' ); // activation and secure
	include( 'includes/init.php' ); // add CPTs
	// Include admin init file, used to define metaboxes, etc
	include( 'includes/admin/init.php' );
	
	
	// HOOKS
	
	// register activation - need to better understand this hook
	register_activation_hook( __FILE__, 'ptbt_management_activate_plugin' );
	// Add action hook called init - triggered when WP initialised the data required for the current page and it should be used to set up the plugin
	// The function we want ot call is called team_init - this is where we should set up our custom post
	// See inside init.php in the includes folder
	add_action( 'init', 'team_init' );
	// Hook into when WP initialises the admin to define metaboxesadd metabox when WP initises the admin - in this example call the function team_admin_init - define function in /admin/init.php and include
	add_action( 'admin_init', 'team_admin_init' );
	// Add action Hook to save post
	add_action( 'save_post_team', 'r_save_post_admin', 10, 3 );
	
	
	// SHORTCODES
	
	
	// custom post type
	// custom post type is set up in the init file - found in the includes folder
	add_action( 'init', 'team_init' );