<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Services'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('services/create') ?>'"><i class="icon-plus-sign" title="Create"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">

    <?php
    $status = Utils::getStatusCommon();
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'services-grid',
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
        array(
            'name'=>'cochlear_implant',
            'value'=>'Press::getStatusPress($data->cochlear_implant)',
            'filter'=>$status,
        ),
        array(
            'name' => 'created',
            'header'=>Yii::t('global', 'Created'),
            'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'created',
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
        'class'=>'ButtonColumn',
        'header' => Yii::t('global','Actions'),
        'template'=>'{view} {update} {delete} {up} {down}',
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
            'up' => array
            (
                'label'=>'<span class="label cyan" ><i class="icon-arrow-up delete" title="'.Yii::t('adminlang', 'Up').'"></i></span>',
                'options' => array( 'class' => 'tipb up-icon-tooltip',
                    'data-original-title' => Yii::t('adminlang', 'Up'),
                    'title'       => Yii::t('adminlang', 'Up') , ),
                'url'=>'$data->id',
                'click'=>'function(){
                            setUpBanner($(this).attr("href"));
                            return false;
                        }',
            ),
            'down' => array
            (
                'label'=>'<span class="label cyan" ><i class="icon-arrow-down delete" title="'.Yii::t('adminlang', 'Down').'"></i></span>',
                'options' => array( 'class' => 'tipb down-icon-tooltip',
                    'data-original-title' => Yii::t('adminlang', 'Down'),
                    'title'       => Yii::t('adminlang', 'Down') , ),
                'url'=>'$data->id',
                'click'=>'function(){
                            setDownBanner($(this).attr("href"));
                            return false;
                        }',
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
    $('.up-icon-tooltip').tooltip({
    });
    $('.down-icon-tooltip').tooltip({
    });
    function setUpBanner(id){
        $.get('/admin/services/setUp?id='+id, function(html) {
            window.location.reload();
        });
    }
    function setDownBanner(id){
        $.get('/admin/services/setDown?id='+id, function(html) {
            window.location.reload();
        });
    }
</script>
<style>
    select{
        width: 105px !important;
    }
    .button-column{
        width: 190px !important;
    }
</style>