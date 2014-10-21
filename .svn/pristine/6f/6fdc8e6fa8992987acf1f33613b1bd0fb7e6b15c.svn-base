
<?php
	$blockNewProduct  =  Products::model()->renBlockRandomProduct();

	if($blockNewProduct){ ?>
		<div class="news-sec-2 float-width blk-slide-product">
		   <h3 class="sldr-title"><a href="/articles"> <?php echo Yii::t('global','Articles'); ?> </a> </h3>
		   <div class="flexslider news-sldr">
		      <ul class="slides">
				<?php echo $blockNewProduct; ?>
			</ul>
		   </div>
		</div>
	<?php
	}//end if

?>