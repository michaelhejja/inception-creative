<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inception
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="video-modal">
			<div class="video-modal__close"><i class="fas fa-times"></i></div>
		    <div class="video-modal__container">
		    
		    <div id="vimeo-player"></div>

		    <!--
		    	<video class="video-modal__video" controlsList="nodownload" controls>
	              <source src="http://inceptionwp.test/wp-content/uploads/2018/10/ZenFone-Verizon-Wireless.mp4" />
	            </video>
	         -->
		    </div>
			<div class="video-modal__fade"></div>
		</div>

		<?php
			// Dynamically Add Content Layers to the page
		    $index = 0;
			$content_layers = get_field( "content_layers" );

			if($content_layers) {
				foreach ($content_layers as $content_layer) {
					$layout = $content_layer['acf_fc_layout'];
					include("content-layers/".$layout.".php");
					$index++;
				}
			}

			// var_dump($content_layers);
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	

<?php
get_footer();
