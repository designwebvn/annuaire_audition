<!-- Main Body -->
<div class="container">
 <!-- Main Left side -->
 <div class="main-left-side">
		<!-- Single Category News Blocks -->
		<div class="news-sec-1 float-width">
			 <div class="float-width sec-cont2">       
					<h3 class="sec-title"><?php echo $cat->name; ?></h3>
					<?php			
						$this->widget('zii.widgets.CListView', array(
													'dataProvider'=>$posts,
													'itemView'=>'list_cat_products',
													'summaryText'=>''
						));
					?>
			 </div>
		</div>
 </div>
 <!-- Main Right side -->
 <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>