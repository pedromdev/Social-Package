<?php

class SocialDAO extends MasterDAOPackage
{
	public function __construct()
	{
		global $wpdb;

		$this->table = $wpdb->social_package;
		$this->primary_key = 'id_social_package';

		parent::__construct();
	}
}