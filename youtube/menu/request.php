<?php

$args = null;

if (!is_null($_POST['max_results']) &&
	(is_numeric($_POST['max_results']) && intval($_POST['max_results']) == floatval($_POST['max_results'])))
{
	$args['max_results'] = $_POST['max_results'];
}

if (!is_null($_POST['start_index']) &&
	(is_numeric($_POST['start_index']) && intval($_POST['start_index']) == floatval($_POST['start_index'])))
{
	$args['start_index'] = $_POST['start_index'];
}

if (!is_null($_POST['per_page']) &&
	(is_numeric($_POST['per_page']) && intval($_POST['per_page']) == floatval($_POST['per_page'])))
{
	$args['per_page'] = $_POST['per_page'];
}

$youtubedao->atualizar($args, 1);
echo '<div class="wrap"><div id="message" class="updated"><p>Opções atualizadas com sucesso</p></div></div>';