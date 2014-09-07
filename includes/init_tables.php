<?php

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

global $wpdb;

$wpdb->__set('social_package', $wpdb->prefix . 'social_package');

$sql = 
"CREATE TABLE IF NOT EXISTS " . $wpdb->social_package . "(
	id_social_package INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	youtube VARCHAR(70) NULL,
	facebook VARCHAR(70) NULL,
	flickr VARCHAR(25) NULL,
	soundcloud VARCHAR(40) NULL,
	twitter VARCHAR(50) NULL,
	vimeo VARCHAR(40) NULL
);";

dbDelta($sql);

$wpdb->__set('youtube_package', $wpdb->prefix . 'youtube_package');

$sql = 
"CREATE TABLE IF NOT EXISTS " . $wpdb->youtube_package . "(
	id_youtube_package INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	max_results INT(3) NULL,
	start_index INT(3) NULL,
	per_page INT(3) NULL
);";

dbDelta($sql);