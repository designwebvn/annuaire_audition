
<div class="container">
	<div class="main-left-side" id="directory">
	    <div class="page-header" style="border-bottom: 0px solid !important;">
	        <!-- <h1>
	            <?php echo Yii::t('global', 'Create'); ?>            <small><?php echo Yii::t('global', 'DirectoryOrders'); ?></small>
	        </h1> -->
	    </div>
	    <div class="row-fluid">
	        <div class="span12 contentDivider"></div>
	    </div>
	    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	<?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>