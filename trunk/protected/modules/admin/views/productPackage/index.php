<div class="page-header">
    <h1><?php echo Yii::t('global', 'Manage'); ?> 
    <small><?php echo Yii::t('global', 'Product Packages'); ?></small></h1>
</div>

<div class="row-fluid"><div class="span12">
<div class="head clearfix">
    <div class="isw-grid"></div>
    <h1><?php echo Yii::t('global', 'Product Packages'); ?></h1>      
    <ul class="buttons">
        <li><a class="isw-plus tipb" href="<?php echo $this->createUrl('productPackage/create') ?>" data-original-title="<?php echo Yii::t('global', 'Create'); ?> <?php echo Yii::t('global', 'ProductPackage'); ?>"></a></li>
    </ul>                        
</div>
<div class="block-fluid table-sorting">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-package-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		array(
            'name'=>'id',
            'htmlOptions'=>array('style'=>'width: 30px'),
        ),
		array(
            'name'=>'group_name',
            'header'=>Yii::t('global','Group name'),
            'type'=>'raw',
            'value'=>'CHtml::link($data->group->group_name,array("/admin/group/view","id"=>$data->group->id))'
        ),
		'quantity',
		'quantity_type',
        array(
            'name'=>'price',
            'value'=>'Utils::number_format($data->price)." USD"'
        ),
		'offers',
        array(
            'name' => 'created',
            'header'=>Yii::t('global', 'Created'),
            'headerHtmlOptions'=> array('style' => 'text-align: center; width:200px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                    'model'=>$model,
                    'attribute'=>'created',
                    'mode'=>'date',
                    'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => true),
                    'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                    'htmlOptions' => array(
                        'id' => 'datepicker_for_due_date',
                        'size' => '10',
                        'style' => 'text-align: center; border-right: 1px solid #dddddd;'
                    ),
                ),
                true)
        ),
		/*
		'shipping_type',
		'created',
		'updated',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div></div>