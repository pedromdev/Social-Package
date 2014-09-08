<?php

class YoutubeWidget extends WP_Widget
{
	function __construct()
	{
		parent::WP_Widget(false, $name = 'Youtube Package Widget');	
	}

	function widget($args, $instance)
	{
		$youtube = new YoutubePackage();
		$socialdao = new SocialDAO();
		
		$socials = $socialdao->buscarPorId(1);
		$youtube->setAuthor($socials->youtube);
		$youtube->setMaxResults(1);
		$video = $youtube->getVideos();
		$video = $video[0];

		echo $args['before_widget'];

		echo $args['before_title'] . $instance['yt_package_title'] . $args['after_title'];
		echo '<iframe id="widget-ytp" width="300px" height="150px" src="https://youtube.com/embed/' . $video['id'] .
			'?showinfo=0" style="display:block; margin: 0 auto;" frameborder="0"></iframe>';

		echo $args['after_widget'];
	}

	function form($instance)
	{ 
		$title = $instance['yt_package_title'];
	?>
		<p>
			<label for="<?= $this->get_field_id('yt_package_title') ?>">
				Título<br>
				<input type="text" id="<?= $this->get_field_id('yt_package_title') ?>"
				name="<?= $this->get_field_name('yt_package_title') ?>" value="<?= $title ?>">
			</label>
		</p>
	<?php }

	function update($new_instance, $old_instance)
	{
		return array_merge($old_instance, $new_instance);
	}
}

add_action('widgets_init', create_function('', 'return register_widget("YoutubeWidget");'));