<?php
	$blocks = array('left'=>2,'mid'=>3,'right'=>5);
	if($blocks):
	echo '<div class="main-news-blks">';
	$i= 0;
	foreach ($blocks as $key => $block) {
		$i++;
		$last 			= ($key == 'right') ? 'last' : '';
		
		$blockRent  	= News::model()->getNewByCategory($block);
		$countComment 	= News::model()->countNewByCategory($blockRent['id']); 
		
		$description 	= Utils::short_description(strip_tags($blockRent['description']),200);	
		$image 	 		= News::model()->renImageNews($blockRent["image"]);

		?>
		<div class="mid-blks-cont  <?php echo $last; ?> ">
			<div class="mid-block-1 boxgrid caption">
				<?php echo $image; ?>
				<h4 class="cat-label <?php echo 'cat-label'.$i; ?> ">
				<a href="news/category/<?php echo $blockRent['catalias']; ?>"><?php echo $blockRent['catname']; ?></a>
				</h4>
				<div class="cover boxcaption">
					<h3>
						<a href="news/view/<?php echo $blockRent['newsalias']; ?>"><?php echo $blockRent['title']; ?></a>
						<span class="topic-icn"><?php echo $countComment; ?></span>
					</h3>
					<p><?php echo $description; ?></p>
					<a href="news/view/<?php echo $blockRent['newsalias']; ?>">MORE
					<i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		</div>

		<?php
	}//end foreach

	echo '</div>';
	endif;
?>

