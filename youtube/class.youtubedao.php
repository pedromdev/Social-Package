<?php

class YoutubeDAO extends MasterDAOPackage
{
	public function __construct()
	{
		global $wpdb;

		$this->table = $wpdb->youtube_package;
		$this->primary_key = 'id_youtube_package';

		parent::__construct();
	}
}