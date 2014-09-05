<?php

global $wpdb;

$wpdb->__set('social_package', $wpdb->prefix . 'social_package');

$sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->social_package . "(
	id_social_package INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	youtube VARCHAR(70) NULL,
	facebook VARCHAR(70) NULL,
	";