<div class="page-header">
    <h1><?php echo Yii::t('global', 'Agencies Categories'); ?></h1>
</div>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
