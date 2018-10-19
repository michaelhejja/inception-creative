<section id="<?php echo($content_layers[$index]['id']); ?>" class="video-gallery">
	<h2 class="screen-reader-text">Video Gallery</h2>
	<div class="Container">
        <h3 class="video-gallery__headline"><?php echo($content_layers[$index]['headline']); ?></h3>
	</div>
	<div class="Container">
	    <div class="Row">
	    	<?php 
	    	$videos = $content_layers[$index]['videos'];

	    	foreach ($videos as $video) {
	    		$vimeo_id = $video["vimeo_id"];
	    		$thumbnail = $video["thumbnail_image"];
	    		$title = $video["title"];
	    		$caption = $video["caption"];
				echo('<div class="Column-3 Column-Tablet-3 Column-Mobile-3"><div class="video-gallery__item" data-video="'.$vimeo_id.'"><div class="video-gallery__icon"><i class="far fa-play-circle"></i></div><div class="video-gallery__highlight"></div><div class="video-gallery__thumbnail" style="background-image: url('.$thumbnail['url'].')"></div></div><div class="video-gallery__title">'.$title.'</div><div class="video-gallery__caption">'.$caption.'</div></div>');
			}
	    	?>
	    </div>	
	</div>
</section>