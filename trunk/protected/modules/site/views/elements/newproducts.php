<?php
/**
*
**/
	$blockRents = Products::model()->getNewProduct();
	//begin block
	if($blockRents){ ?>
		<div class="float-width sec-cont block-boxes">
		<h3 class="sec-title"><?php echo Yii::t('global','News Articles'); ?></h3>
		<div class="top-big-two">
		<?php
		$numChildBlock = count($blockRents) - 1;
		foreach ($blockRents as $key => $blockRent) {
			$comment = Products::model()->countCommentProduct($blockRent['id']);
			$date 	 = Utils::fomatDateCeate($blockRent["created"]);
			$image 	 = Products::model()->renImageProduct($blockRent["image"]);
			$name 	 = $blockRent["name"];
			$link	 = 'articles/view/'.$blockRent['alias'];

			if($key == 0){//begin main block
				$description = Utils::short_description(strip_tags($blockRent["description"]),200);	
				?>
				<div class="big-two-1 blocky boxgrid3 caption">
					<a href="<?php echo $link; ?>"><span class="img"><?php echo $image; ?></span></a>
					<div class="boxcaption3">
						<h3><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h3>
						<p class="artcl-time-1">
							<span><i class="fa fa-clock-o"></i><?php echo $date; ?></span>
							<span><i class="fa fa-comment-o"></i><?php echo $comment; ?></span>
						</p>
						<p><?php echo $description; ?></p>
					</div>
				</div>
				<?php
			}//end main block
			elseif( $numChildBlock > 0 ){//begin child block
				if($key == 1) 	
					echo'<div class="big-two-2 blocky boxgrid3 caption">';
				?>
				<div class="tn-small-1 blocky <?php echo ($key%2 == 0)?'last':''; ?> ">
					<a href="<?php echo $link; ?>" class="toplink"><span class="img"><?php echo $image; ?></span></a>
					<p><span><i class="fa fa-clock-o"></i><?php echo $date; ?></span><span><i class="fa fa-comment-o"></i><?php echo $comment; ?></span></p>
					<h4 class="title-blk"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h4>
				</div>
				<?php
				if( $key == $numChildBlock ) 	
					echo'</div>';//end child block
			}
		}			
		echo '</div></div>';//end block
	 }//exits block
?>

