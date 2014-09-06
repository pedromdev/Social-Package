<?php

global $menus_sp;

$menus_sp[] = 'youtube_menu_admin';

function youtube_menu_admin()
{
	add_submenu_page(SOCIAL_PACKAGE_ADMIN_MENU, 'Youtube', 'Youtube', 'manage_options', 'youtube-package', 'yt_menu');
}

function yt_menu()
{
	echo '<h1>Youtube</h1>';

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include(PLUGIN_DIR . 'youtube/menu/request.php');
	}

	include(PLUGIN_DIR . 'youtube/menu/page.php');
}