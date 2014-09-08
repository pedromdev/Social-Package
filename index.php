<?php
/*
Plugin Name: Social Package
Plugin URI: https://github.com/pedromarcelojava/Social-Package
Description: Pacote de redes sociais
Version: 1.0
Author: Pedro Marcelo
Author URI: https://github.com/pedromarcelojava/
License: GPL v2
*/

/*
|------------------------------------------
|	CONSTANTES
|------------------------------------------
*/

define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SOCIAL_PACKAGE_ADMIN_MENU', 'social-package');

/*
|------------------------------------------
|	AÇÕES
|------------------------------------------
*/

add_action('admin_menu', 'sp_menu');
register_activation_hook(__FILE__, 'init_socials');
register_uninstall_hook(__FILE__, 'uninstall_socials');

/*
|------------------------------------------
|	INJEÇÃO DE DEPENDÊNCIAS
|------------------------------------------
*/
include(PLUGIN_DIR . 'register-scripts.php');
include(PLUGIN_DIR . 'includes/boot.php');

/*
|------------------------------------------
|	REDES SOCIAIS
|------------------------------------------
*/

$menus_sp = array();

include(PLUGIN_DIR . 'youtube/index.php');
include(PLUGIN_DIR . 'soundcloud/index.php');

/*
|------------------------------------------
|	FUNÇÕES
|------------------------------------------
*/

function sp_menu()
{
	global $menus_sp;

	add_menu_page('Social Package', 'Social Package', 'manage_options', SOCIAL_PACKAGE_ADMIN_MENU, 'social_package_menu');

	function social_package_menu()
	{
		echo '<h1>Social Package</h1>';

		$socialdao = new SocialDAO();

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			include(PLUGIN_DIR . 'request.php');
		}

		$socials = $socialdao->buscarPorId(1);
		
		include(PLUGIN_DIR . 'page.php');
	}

	print_r($menus);

	foreach ($menus_sp as $menu) {
		$menu();
	}
}

function init_socials()
{
	$socialdao = new SocialDAO();
	$youtubedao = new YoutubeDAO();

	$list = $socialdao->listarTodos();

	if (!$list)
	{
		$args = array(
			'youtube' => '',
			'facebook' => '',
			'flickr' => '',
			'twitter' => '',
			'soundcloud' => '',
			'vimeo' => '',
		);

		$socialdao->salvar($args);
	}

	$list = $youtubedao->listarTodos();

	if (!$list)
	{
		$args = array(
			'max_results' => null,
			'start_index' => null,
			'per_page' => null
		);

		$youtubedao->salvar($args);
	}
}

function uninstall_socials()
{
	global $wpdb;

	$wpdb->query("DROP TABLE IF EXISTS $wpdb->social_package");
	$wpdb->query("DROP TABLE IF EXISTS $wpdb->youtube_package");
}