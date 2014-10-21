<?php

$contents 	 = Slidershow::model()->getslideShow();


if($contents){
	?>
	<div class="flex-container">
		<div class="flexslider hm-slider">
			<ul class="slides">
			<?php foreach ($contents as $item) { 
				$image 			= str_replace("\"","'",$item->image);
				if($image == '') 
					$image = 'noimage.png';
				?>
				<li>
					<img alt="" src="/uploads/animation/<?php echo $image; ?>"  />
					<div class="hm-sldr-caption">
						<h3><a href="http://annuaire-audition.com"><?php echo $item->name; ?></a></h3>
						<p><?php echo $item->content; ?></p>
					</div>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
	<?php
}

			
		