<?php

function youtube_package_shortcode()
{
	$socialdao = new SocialDAO();
	$youtube = new YoutubePackage();
	$youtubedao = new YoutubeDAO();

	$socials = $socialdao->buscarPorId(1);
	$yt_options = $youtubedao->buscarPorId(1);

	$youtube->setAuthor($socials->youtube);
	$youtube->setMaxResults($yt_options->max_results);
	$youtube->setStartIndex($yt_options->start_index);

	wp_enqueue_style('youtube-package');
	wp_enqueue_script('youtube-package');

	$pagination = '';

	if ($yt_options->per_page > 0)
	{
		$videos = $youtube->getVideos();
		$paginate = new Paginate($videos, $yt_options->per_page);
		$pages = $paginate->getArrayPaginated();
		$count_pages = count($pages);

		$iframe = '<iframe id="frame-yt" frameborder="0" src="https://youtube.com/embed/' . $videos[0]['id'] . '"></iframe>';
		$pagination = '<div id="pagination-yt">';
		$content = '';

		for ($i = 1; $i <= $count_pages; $i++) {
			if ($i != 1)
			{
				$pagination .= '<span class="page-yt" data-cv="' . $i . '">' . $i . '</span>';
			}
			else
			{
				$pagination .= '<span class="page-yt selected" data-cv="' . $i . '">' . $i . '</span>';
			}
		}

		$pagination .= '</div>';

		for ($i = 0; $i < $count_pages; $i++) {
			if ($i != 0)
			{
				$content .= '<div class="videos-yt-package" id="_cv' . ($i + 1) . '">';
			}
			else
			{
				$content .= '<div class="videos-yt-package db" id="_cv1">';
			}

			foreach ($pages[$i] as $video) {
				$content .= '<div class="vyt" data-id="' . $video['id'] . '">';
				$content .= '<div class="play-yt"><img src="' . $video['thumbnail'] . '"></div>';
				$content .= '<div class="vyt-description">' . $video['title'] . '</div>';
				$content .= '</div>'; 
			}

			$content .= '</div>';
		}
	}
	else
	{
		$videos = $youtube->getVideos();
		$iframe = '<iframe id="frame-yt" frameborder="0" src="https://youtube.com/embed/' . $videos[0] . '"></iframe>';
		$content = '<div class="videos-yt-package db">';

		foreach ($videos as $video) {
			$content .= '<div class="vyt" data-id="' . $video['id'] . '">';
			$content .= '<div class="play-yt"><img src="' . $video['thumbnail'] . '"></div>';
			$content .= '<div class="vyt-description">' . $video['title'] . '</div>';
			$content .= '</div>'; 
		}

		$content .= '</div>';
	}

	return $iframe . $content . $pagination;
}

add_shortcode('youtube-videos-package', 'youtube_package_shortcode');