<?php

wp_register_script(
	'form-package',
	PLUGIN_URL . 'js/form.min.js',
	array('jquery'),
	null,
	true
);