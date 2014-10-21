<div class="container">
	<div class="main-left-side">
		<!-- The Article -->
		<?php $this->renderPartial('_view', array('model'=>$model));  ?>
		<!-- Article Comments -->
		<div class="artcl-comments float-width">
			<?php if(count($model->newsComments)>=1): ?>
			<?php 
				$data = newsComments::model()->findAllByAttributes(array('news_id'=>$model->id,'is_active'=>NewsComments::STATUS_APPROVED),array('order'=>'created DESC'));
				echo '<div class="head-title-comment">';
				echo '<h3 class="sec-title"><i class="fa fa-comment-o"></i> ';
				echo  count($data)>1 ? count($data) . ' '.Yii::t('global','Comments to') : Yii::t('global','One Comment to'); 
				echo ' “'.$model->title.'”';
				echo '</h3></div>';
			?>

			<?php $this->renderPartial('view_comment',array('post'=>$model,'comments'=>$data)); ?>
			<?php endif; ?>
			
			<?php if(Yii::app()->user->hasFlash('commentNewsSubmitted')): ?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('commentNewsSubmitted'); ?>
				</div>
			<?php else: ?>
				<?php  $this->renderPartial('comment_form',array('model'=>$comment));  ?>
			<?php endif; ?>
			
		</div>
	</div>
<!-- Main Right page -->
<?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>