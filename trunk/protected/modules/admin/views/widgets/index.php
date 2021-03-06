<div class="page-header">
    <h1><?php echo Yii::t('global', 'Manage'); ?> 
    <small><?php echo Yii::t('global', 'Widgets'); ?></small></h1>
</div>

<div class="row-fluid"><div class="span12">
<div class="head clearfix">
    <div class="isw-grid"></div>
    <h1><?php echo Yii::t('global', 'Widgets'); ?></h1>      
    <ul class="buttons">
        <li><a class="isw-plus tipb" href="<?php echo $this->createUrl('widgets/create') ?>" data-original-title="<?php echo Yii::t('global', 'Create'); ?> <?php echo Yii::t('global', 'Widgets'); ?>"></a></li>
    </ul>                        
</div>
<div class="block-fluid table-sorting">

<?php 

$columns = array('id', 'title', 'alias');
$allLang = Languages::model()->findAll();
foreach( $allLang as $key => $value ) {
    $columns[]  = array(
        'header' => '<div align="center"><img src="/uploads/flag/'.$value->icon.'" /></div>',
        'value' => '$data->languageButton("'.$value->region_code.'")' ,
        'type' => 'raw',
        'htmlOptions'=>array( 'style'=>'text-align: center' )
    );
}
$columns[] = array(
 'class'=>'CButtonColumn',
 'template'=>'{delete}',
);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'widgets-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=> $columns
)); ?>
</div>
</div></div>