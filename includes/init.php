<?php
	
function team_init(){
	
	// Register CPT - Teams	
	$labels = array(
		"name" => __( "Teams", "pick_the_best_team", "team" ),
		"singular_name" => __( "Team", "pick_the_best_team", "team" ),
		"menu_name" => __( "Teams", "pick_the_best_team", "team" ),
		"all_items" => __( "All Teams", "pick_the_best_team", "team" ),
		"add_new" => __( "Add New", "pick_the_best_team", "team" ),
		"add_new_item" => __( "Add New Team", "pick_the_best_team", "team" ),
		"edit_item" => __( "Edit Team", "pick_the_best_team", "team" ),
		"new_item" => __( "New Team", "pick_the_best_team", "team" ),
		"view_item" => __( "View Team", "pick_the_best_team", "team" ),
		"view_items" => __( "View Teams", "pick_the_best_team", "team" ),
		"search_items" => __( "Search Team", "pick_the_best_team", "team" ),
		"not_found" => __( "No Teams found", "pick_the_best_team", "team" ),
		"not_found_in_trash" => __( "No Teams found in trash", "pick_the_best_team", "team" ),
		"featured_image" => __( "Team Crest", "pick_the_best_team", "team" ),
		"set_featured_image" => __( "Set Team Crest", "pick_the_best_team", "team" ),
		"remove_featured_image" => __( "Remove Team Crest", "pick_the_best_team", "team" ),
		"use_featured_image" => __( "Use as featured crest for this team", "pick_the_best_team", "team" ),
		"archives" => __( "Team Archives", "pick_the_best_team", "team" ),
	);

	$args = array(
		"label" 				=> __( "Teams", "pick_the_best_team" ),
		"labels" 				=> $labels,
		"description" 			=> __( "This is where you create your teams.", "team" ),
		"public" => true,
		"publicly_queryable" 	=> true,
		"show_ui" 				=> true,
		"show_in_rest" 			=> false,
		"rest_base" 			=> "",
		"has_archive" 			=> true,
		"show_in_menu" 			=> true,
		"exclude_from_search" 	=> true,
		"capability_type" 		=> "post",
		"map_meta_cap" 			=> true,
		"hierarchical" 			=> false,
		"rewrite" 				=> array( "slug" => "teams", "with_front" => true ),
		"query_var" 			=> true,
		"supports" 				=> array( "title", "editor", "thumbnail" ),
		"taxonomies" 			=> array( "category", "post_tag" )
	);

	// register cpt "teams"
	register_post_type( "teams", $args );
	
	// Register CPT - Team Member
	$labels = array(
		"name" => __( "Team Members", "pick_the_best_team", "member" ),
		"singular_name" => __( "Team Member", "pick_the_best_team", "member" ),
		"menu_name" => __( "Team Members", "pick_the_best_team", "member" ),
		"all_items" => __( "All Team Members", "pick_the_best_team", "member" ),
		"add_new" => __( "Add New", "pick_the_best_team", "member" ),
		"add_new_item" => __( "Add New Team Member", "pick_the_best_team", "member" ),
		"edit_item" => __( "Edit Team Member", "pick_the_best_team", "member" ),
		"new_item" => __( "New Team Member", "pick_the_best_team", "member" ),
		"view_item" => __( "View Team Member", "pick_the_best_team", "member" ),
		"view_items" => __( "View Team Members", "pick_the_best_team", "member" ),
		"search_items" => __( "Search Team Members", "pick_the_best_team", "member" ),
		"not_found" => __( "No Team Members found", "pick_the_best_team", "member" ),
		"not_found_in_trash" => __( "No Team Members found in trash", "pick_the_best_team", "member" ),
		"featured_image" => __( "Team Member Photo", "pick_the_best_team", "member" ),
		"set_featured_image" => __( "Set Team Member Photo", "pick_the_best_team", "member" ),
		"remove_featured_image" => __( "Remove Team Member Photo", "pick_the_best_team", "member" ),
		"use_featured_image" => __( "Use as featured photo for this team member", "pick_the_best_team", "member" ),
		"archives" => __( "Team Member Archives", "pick_the_best_team", "member" ),
	);

	$args = array(
		"label" 				=> __( "Team Members", "pick_the_best_team" ),
		"labels" 				=> $labels,
		"description" 			=> __( "This is where you add your team members.", "member" ),
		"public" => true,
		"publicly_queryable" 	=> true,
		"show_ui" 				=> true,
		"show_in_rest" 			=> false,
		"rest_base" 			=> "",
		"has_archive" 			=> true,
		"show_in_menu" 			=> true,
		"exclude_from_search" 	=> true,
		"capability_type" 		=> "post",
		"map_meta_cap" 			=> true,
		"hierarchical" 			=> false,
		"rewrite" 				=> array( "slug" => "team_members", "with_front" => true ),
		"query_var" 			=> true,
		"supports" 				=> array( "title", "thumbnail" ),
		"taxonomies" 			=> array( "category", "post_tag" )
	);

	// register cpt "team members"
	register_post_type( "team members", $args );
	
}

// Custom Post Type sample
// $labels = array(
// 	'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
// 	'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
// 	'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
// 	'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
// 	'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
// 	'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
// 	'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
// 	'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
// 	'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
// 	'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
// 	'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
// 	'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
// 	'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
// 	'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
// );
// 
// $args = array(
// 	'labels'             => $labels,
//     'description'        => __( 'Description.', 'your-plugin-textdomain' ),
// 	'public'             => true,
// 	'publicly_queryable' => true,
// 	'show_ui'            => true,
// 	'show_in_menu'       => true,
// 	'query_var'          => true,
// 	'rewrite'            => array( 'slug' => 'book' ),
// 	'capability_type'    => 'post',
// 	'has_archive'        => true,
// 	'hierarchical'       => false,
// 	'menu_position'      => null,
// 	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
// );
// 
// register_post_type( 'book', $args );		
