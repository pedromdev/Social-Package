<?php

/*
|------------------------------------------
|	JAVASCRIPT
|------------------------------------------
*/

wp_register_script(
	'form-package',
	PLUGIN_URL . 'js/form.min.js',
	array('jquery'),
	null,
	true
);

wp_register_script(
	'youtube-package',
	PLUGIN_URL . 'youtube/js/script.js',
	array('jquery'),
	null,
	true
);

/*
|------------------------------------------
|	CSS
|------------------------------------------
*/

wp_register_style(
	'youtube-package',
	PLUGIN_URL . 'youtube/css/style.min.css',
	array(),
	null,
	'screen'
);