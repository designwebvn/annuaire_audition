<div class="page-header">
    <h1><?php echo Yii::t('global', 'View'); ?> 
    <small><?php echo Yii::t('global', 'ProductPackage'); ?> #<?php echo $model->id; ?></small></h1>
</div>

<div class="row-fluid">
<div class="span12">
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo Yii::t('global', 'ProductPackage'); ?> #<?php echo $model->id; ?></small></h1>
        <ul class="buttons">
            <li><a class="isw-left tipb" href="javascript: history.back()" data-original-title="Back"></a></li>
        </ul> 
    </div>
    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	    array(
            'name'=>'group_name',
            'value'=>CHtml::link( $model->group->group_name, array('/admin/group/view',"id"=>$model->group->id)),
            'type'=>'raw'
        ),
		'quantity',
		'quantity_type',
        array(
            'name'=>'price',
            'value'=>Utils::number_format($model->price)." USD"
        ),
		'price',
		'offers',
		'shipping_type',
		'created',
		'updated',
	),
)); ?>


</div>
</div>