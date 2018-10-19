<section id="<?php echo($content_layers[$index]['id']); ?>" class="fullscreen-title">
	<div class="Container fullscreen-title__content">
		<div class="fullscreen-title__text h1"><?php echo($content_layers[$index]['title']); ?></div>
		<div class="fullscreen-title__text h1"><?php echo($content_layers[$index]['title_line_2']); ?></div>
		<div class="fullscreen-title__text h1"><?php echo($content_layers[$index]['title_line_3']); ?></div>
	</div>

	<div class="fullscreen-title__scroll-button">
	    <div class="fullscreen-title__icon">
			<i class="fas fa-angle-down"></i>
		</div>
	</div>

	<?php 
	$image = $content_layers[$index]['background_image'];
	echo('<span class="fullscreen-title__image" role="img" aria-label="'.$image['alt'].'" style="background-image: url('.$image['url'].')" data-caption="'.$image['caption'].'"></span>');
	?>
</section>