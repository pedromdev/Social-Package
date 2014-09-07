<?php

function youtube_package_shortcode()
{
	$socialdao = new SocialDAO();
	$youtube = new YoutubePackage();
	$youtubedao = new YoutubeDAO();

	$socials = $socialdao->buscarPor_id(1);
	$yt_options = $youtubedao->buscarPor_id(1);

	$youtube->setAuthor($socials->youtube);
	$youtube->setMaxResults($yt_options->max_results);
	$youtube->setStartIndex($yt_options->start_index);

	if ($yt_options > 0)
	{
		$videos = $youtube->getVideos();
		$paginate = new Paginate($videos, $yt_options->per_page);
	}
	else
	{
		$videos = $youtube->getVideos();

	}
}

add_shortcode('youtube-videos-package', 'youtube_package_shortcode');