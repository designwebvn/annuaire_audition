<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Events'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('events/create') ?>'"><i class="icon-plus-sign" title="Create events"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">

    <?php
    $catEvents    	    = EventsCategory::getAllCategory();
    $Organizers         = Organizers::getAllOrganizers();
    $active_news 	    = Events::getActiveEvents();
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'events-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('style'=>'width:35px;')
        ),
		'name',
		'location',
        array(
            'name'          => 'type_events',
            'header'        => Yii::t('global', 'Type'),
            'type'          => 'raw',
            'filter'        => $catEvents,
            'value'         => '$data->getEventsCategory($data->type_events)',
            'htmlOptions'=>array('style'=>'width:100px;')
        ),
        array(
            'name'          => 'organizers',
            'header'        => Yii::t('global', 'Organizer'),
            'type'          => 'raw',
            'filter'        => $Organizers,
            'value'         => '$data->getEventOrganizer($data->id)',
            'htmlOptions'=>array('style'=>'width:100px;')
        ),
		//'type_events',
        //'organizer_id',
        array(
            'name' => 'starting_date',
            'header'=>Yii::t('events', 'Starting Date'),
            'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'starting_date',
                        'mode'=>'date',
                        'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                        'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date',
                            'size' => '10',
                            'style' => 'text-align: center'
                        ),
                    ),
                    true)
        ),
        array(
            'name' => 'ending_date',
            'header'=>Yii::t('global', 'Ending Date'),
            'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'ending_date',
                        'mode'=>'date',
                        'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                        'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date_last',
                            'size' => '10',
                            'style' => 'text-align: center'
                        ),
                    ),
                    true)
        ),
        array(
            'name'=>'is_highlight',
            'type' => 'raw',
            'filter'=>$active_news,
            'value' => '$data->getStatusEvents($data->is_highlight)',
            'htmlOptions'=>array('style'=>'width:90px;')
        ),
    array(
        'class'=>'ButtonColumn',
        'template'=>'{view} {update} {delete}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View').'"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'View'),
        'title'       => Yii::t('adminlang', 'View'), ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit').'"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Edit'),
        'title'       => Yii::t('adminlang', 'Edit'), ),
        ),
        'delete' => array
        (
        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete').'"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Delete'),
        'title'       => Yii::t('adminlang', 'Delete') , ),
    ),
        ),
    ),
    ),
    )); ?>


</div>
</div>

</div>
</div>

</div>
<script>
    $('.update-icon-tooltip').tooltip({
    });
    $('.view-icon-tooltip').tooltip({
    });
    $('.delete-icon-tooltip').tooltip({
    });
</script>
<style>
    select{
        width: 110px !important;
    }
</style>