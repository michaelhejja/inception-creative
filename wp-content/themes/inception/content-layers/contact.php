<section id="<?php echo($content_layers[$index]['id']); ?>" class="contact">
    <h2 class="screen-reader-text">Contact</h2>
	<div class="Container">
		<div class="Row">
			<div class="Column-8 Offset-1 Column-Tablet-6 Offset-Tablet-0 Column-Mobile-3">
				<h3 class="contact__headline">Contact Us</h3>
			</div>
		</div>
		<div class="Row Align-Center">
			<div class="Column-3 Offset-1 Column-Tablet-3 Offset-Tablet-0 Column-Mobile-3">
				<div class="contact__map">
					<div class="contact__map-inner">
						<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=116%20Chambers%20St%20Fl.%205%20%20New%20York%2C%20NY%2010007&t=&z=13&ie=UTF8&iwloc=&output=embed&ie=UTF8&t=&z=14&iwloc=B" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

						<!--
							&zoom=12&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0xf5f5f5&style=element:labels.icon%7Cvisibility:off&style=element:labels.text.fill%7Ccolor:0x616161&style=element:labels.text.stroke%7Ccolor:0xf5f5f5&style=feature:administrative.land_parcel%7Celement:labels.text.fill%7Ccolor:0xbdbdbd&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0x959595&style=feature:administrative.neighborhood%7Celement:labels.text.fill%7Ccolor:0x959595%7Cweight:0.5&style=feature:poi%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:poi.park%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:road%7Cweight:0.5&style=feature:road%7Celement:geometry%7Ccolor:0xb4b4b4&style=feature:road%7Celement:geometry.fill%7Cweight:0.5&style=feature:road%7Celement:labels.text.stroke%7Ccolor:0xffffff%7Cweight:2.5&style=feature:road.arterial%7Cweight:0.5&style=feature:road.arterial%7Celement:geometry.fill%7Cweight:0.5&style=feature:road.arterial%7Celement:labels.text.fill%7Ccolor:0x9a9a9a&style=feature:road.arterial%7Celement:labels.text.stroke%7Ccolor:0xffffff%7Cweight:2.5&style=feature:road.highway%7Celement:geometry%7Ccolor:0xdadada&style=feature:road.highway%7Celement:geometry.fill%7Cweight:0.5&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0x959595&style=feature:road.highway%7Celement:labels.text.stroke%7Ccolor:0xffffff%7Cweight:2.5&style=feature:road.highway.controlled_access%7Celement:geometry.fill%7Cweight:0.5&style=feature:road.highway.controlled_access%7Celement:labels.text.stroke%7Ccolor:0xffffff%7Cweight:2.5&style=feature:road.local%7Celement:geometry.fill%7Cweight:0.5&style=feature:road.local%7Celement:labels.text.fill%7Ccolor:0xc2c2c2&style=feature:road.local%7Celement:labels.text.stroke%7Ccolor:0xffffff%7Cweight:2.5&style=feature:transit.line%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:transit.station%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:water%7Celement:geometry%7Ccolor:0xcddee8&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&size=480x360
						-->
					</div>
				</div>
			</div>
			<div class="Column-3 Offset-1 Column-Tablet-3 Offset-Tablet-0 Column-Mobile-3">
				<div class="contact__company">
					<?php echo($content_layers[$index]['company_name']); ?>
				</div>
				<div class="contact__address">
					<div><?php echo($content_layers[$index]['address_line_1']); ?></div>
					<div><?php echo($content_layers[$index]['address_line_2']); ?></div>
				</div>
				<a href="tel:6463701912" class="contact__phone">
					<i class="fas fa-phone"></i><span class="contact__label"><?php echo($content_layers[$index]['phone_number']); ?></span>
				</a>
				<a href="mailto:lindsey@incepcreative.com" class="contact__email">
					<i class="fas fa-envelope"></i><span class="contact__label"><?php echo($content_layers[$index]['email']); ?></span>
				</a>
			</div>
		</div>
	</div>

	<?php 
		$image = $content_layers[$index]['background_image'];
		echo('<span class="contact__image" role="img" aria-label="'.$image['alt'].'" style="background-image: url('.$image['url'].')" data-caption="'.$image['caption'].'"></span>');
		?>
</section>