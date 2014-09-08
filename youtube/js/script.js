(function($){
	$('.page-yt').click(function(){
		var id = '#_cv' + $(this).data('cv');

		$('.db').fadeOut(150, function(){
			$(this).removeClass('db');
		});

		$(id).delay(150).fadeIn(150,function(){
			$(this).addClass('db');
		});

		$('.page-yt').each(function(){
			$(this).removeClass('selected');
		});

		$(this).addClass('selected');

		return false;
	});

	$('.vyt').click(function(){
		var t = $("#frame-yt").offset().top - 80;
		var src = 'https://youtube.com/embed/' + $(this).data('id') + '?autoplay=true';
		$('html, body').animate({scrollTop : t}, 'slow');
		$('#frame-yt').attr('src', src);
		return false;
	});
})(jQuery.noConflict());