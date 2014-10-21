<?php
	$this->pageTitle[] = $model->title;

	$image 	 = News::model()->renImageNews($model->image);
	$comment = News::model()->countNewByCategory($model->id);
	$date 	 = Utils::fomatDateCeate($model->created);

?>
<div class="artcl-main float-width">
	 <div class="artcl-prev-nxt float-width">
	 </div>
	 <div class="artcl-body float-width">
			<h2><?php  echo $model->title;?></h2>
			<h5>
				 <span><i class="fa fa-clock-o"></i><?php echo $date; ?></span>
				 <span><i class="fa fa-comment-o"></i><?php echo $comment; ?></span>
			</h5>
			<article class="float-width articl-data">
				 <?php echo $image; ?>
				 <div><?php  echo $model->description;?></div>
			</article>
	 </div>
</div>

