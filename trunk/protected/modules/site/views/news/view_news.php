<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/news/view/<?php echo $model->alias; ?>"> <?php echo $model->title; ?>  </a>  </h4>
            </li>
        </ul>
    </div>
	<div class="main-left-side">
		<?php $this->renderPartial('_view', array('model'=>$model));  ?>
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
<?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>