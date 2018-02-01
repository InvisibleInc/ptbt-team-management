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
	1. Add something to page_headers
	
	2. Add favicon feature
	
	3. Modify Site Generator meta tag
	
	4. Add text after each item's content
	
	5. Troubleshooting coding errors and printing variable content
	
	6. Create a shortcode to add Twitter link
	
	7. Create a shortcode with parameters to add Twitter feed to a post or page
	
	8. Create a new enclosing shortcode
	
*/

	/* !1. Add something to page_headers  */
	
	// For example this is useful for adding scripts, stylesheets
	add_action( 'wp_head', 'ptbt_add_something_to_header');
	
	function ptbt_add_something_to_header() { ?>
		
		<script>wp</script>
		
	<?php }
		
		
	/* !2. Add favicon feature */
	
	// Favicon Feature
	add_action( 'wp_head', 'ptbt_add_favicon' );
	
	function ptbt_add_favicon() {
		
		$site_icon_url = get_site_icon_url();
		
			if( !empty( $site_icon_url ) ) {
				
				wp_site_icon();
				
			} else {
				// path to favicon
				$icon_url = plugins_url( 'favicon.ico', __FILE__ );
				
			?>
			
			<link rel="shortcut icon" href="<?php echo $icon_url; ?>" />
			
			<?php }
		
	}
	
	/* !3. Modify Site Generator meta tag */
	
	// Using add_filter to modify the generator meta tag
	
	// Doesn't seem to work for some reason
	add_filter( 'the_generator', 'ptbt_generator_filter', 10, 2 );
	
	function ptbt_generator_filter ( $html, $type ) {
		
		if ( $type == 'xhtml' ) {
			
			$html = preg_replace( '("Wordpress.*?")', '"Robert Lee"', $html );
			
		}
		
		return $html;
		
	}
	
	/* !4. Add text after each item's content */
	
	// Register function
	/*add_filter( 'the_content', 'ptbt_add_on_content' );
	
	function ptbt_add_on_content( $the_content ) {
		
		// Set initial value of $new_content variable to previous
		// content
		
		$new_content = $the_content;
		
		// Append something to the content
		
		$new_content .= "<div class='alert alert-info'><h3>Info alert</h3></div>";
		
		return $new_content;
		
	}
	*/
	/* !5. Troubleshooting coding errors and printing variable content */
	add_filter( 'wp_nav_menu_objects', 'ptbt_new_nav_menu_items', 10, 2 );
	
	function ptbt_new_nav_menu_items( $sorted_menu_items, $args ) {
		
		// Check IF user is logged in, continue if not logged in
		
		if( is_user_logged_in() == FALSE ) {
			
			// Loop through all menu items received
			// Place each item's key in $key variable
			
			foreach ( $sorted_menu_items as $key => $sorted_menu_item ) {
				
				// Check IF menu title matches search string
				if( 'Private Area' == $sorted_menu_item->title ) {
					
					// Remove item from menu array if found using item key
					unset( $sorted_menu_items[ $key ] );
					
				}
				
			}
			
		}
		
		// Uncomment to see how the content of the variable is structured
		// print_r( $sorted_menu_items );
		return $sorted_menu_items;
		
	}
	
	/* !6. Create a shortcode to add Twitter link */
	add_shortcode( 'tl', 'ptbt_twitter_link_shortcode' );
	
	function ptbt_twitter_link_shortcode( $atts ) {
		
		$output = '<a href="https://twitter.com/RKL15">';
		
		$output .= 'Twitter Feed</a>';
		
		return $output;
		
	}
	
	/* !7. Create a shortcode with parameters to add Twitter feed to a post or page */
	add_shortcode( 'twitterfeed', 'ptbt_twitter_embed_shortcode' );
	
	// Shortcode implementation
	function ptbt_twitter_embed_shortcode( $atts ) {
		
		extract( shortcode_atts( array( 
			
			'user_name' => 'ylefebvre' 
			
		), $atts ) );
		
		if ( !empty( $user_name ) ) {
			
			$output1 = '<a class="twitter-timeline" href="';
			$output1 .= esc_url( 'https://twitter.com/'. $user_name );
			$output1 .= '"Tweets by ' . esc_html( $user_name );
			$output1 .= '</a><script async ';
			$output1 .= 'src="//platform.twitter.com/widgets.js"';
			$output1 .= ' charset="utf-8"></script>';
		} else {
			
			$output1 = '';
			
		}
		
		return $output1;
		
	}
	
	/* !8. Create a new enclosing shortcode,eg make someting private based on is user logged in */
	add_shortcode( 'private', 'ptbt_private_shortcode' );
	
	function ptbt_private_shortcode( $atts, $content = null ) {
		
		if ( is_user_logged_in() ) {
			
			return '<div class"private">' . $content . '</div>';
			
		} else {
			
			
			$output2 = '<div class="register">';
			$output2 .= 'You need to become a member to access ';
			$output2 .= 'this content.</div>';
			
			return $output2;
			
		}
		
	}