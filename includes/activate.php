<?php

	function ptbt_management_activate_plugin(){
		// Check version of Wordpress
		if( version_compare( get_bloginfo( 'version' ), 4.8, '<' ) ){

			wp_die( __( ' You must update Wordpress to use this plugin', 'ptbt' ) );

		}

		// Add Custom Table to Database
		global $wpdb;
		$createSQL = "
		CREATE TABLE `". $wpdb->prefix ."team_ratings` (
				`R_ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				`team_id` BIGINT(20) UNSIGNED NOT NULL,
				`rating` FLOAT(3,2) UNSIGNED NOT NULL,
				`user_ip` VARCHAR(32) NOT NULL,
				PRIMARY KEY (`R_ID`)
			)	ENGINE=InnoDB ". $wpdb->get_charset_collate() ." AUTO_INCREMENT=1;

		CREATE TABLE `". $wpdb->prefix ."teams` (
				`T_ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				`team_name` FLOAT(3,2) UNSIGNED NOT NULL,
				PRIMARY KEY (`T_ID`)
			)	ENGINE=InnoDB ". $wpdb->get_charset_collate() ." AUTO_INCREMENT=1;";

		require_once ( ABSPATH . '/wp-admin/includes/upgrade.php' );
		dbDelta( $createSQL );
		// End adding Custom Table to Database

	}
