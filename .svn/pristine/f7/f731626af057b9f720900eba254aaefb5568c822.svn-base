
<div class="container-fluid">


<!--<div class="row-fluid">

    <ul class="masterActions">
        <li class="active">
            <i class="icon-envelope redText"></i>
            <h1 class="redText"><?php /*echo Yii::t('global','Check & send'); */?></h1>
            <p><?php /*echo Yii::t('global','new messages'); */?></p>
            <div class="notifyCircle red">12</div>
        </li>
        <li>
            <i class="icon-ok-sign cyanText"></i>
            <h1 class="cyanText"><?php /*echo Yii::t('global','Check & add'); */?></h1>
            <p><?php /*echo Yii::t('global','new tasks'); */?></p>
            <div class="notifyCircle cyan">3</div>
        </li>
        <li>
            <i class="icon-shopping-cart greenText"></i>
            <h1 class="greenText"><?php /*echo Yii::t('global','Check & manage'); */?></h1>
            <p><?php /*echo Yii::t('global','new orders'); */?></p>
            <div class="notifyCircle green">254</div>
        </li>
        <li>
            <i class="icon-bar-chart orangeText"></i>
            <h1 class="orangeText"><?php /*echo Yii::t('global','Check'); */?></h1>
            <p><?php /*echo Yii::t('global','statistics'); */?></p>
        </li>
        <li>
            <i class="icon-inbox greyText"></i>
            <h1 class="greyText"><?php /*echo Yii::t('global','Check & upload'); */?></h1>
            <p><?php /*echo Yii::t('global','new files'); */?></p>
            <div class="notifyCircle grey">2</div>
        </li>
    </ul>

</div>-->



<div class="row-fluid">
    <div class="span12 contentDivider"></div>
</div>



<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <i class="icon-group"></i><h2><?php echo Yii::t('global','New Members'); ?></h2>

    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>



<div class="floatingBox table">
<div class="container-fluid">

    <?php
        $Languages = array( 'fr'=>'French', 'en'=>'English' );
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'membersTable_form',
        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'afterAjaxUpdate' => 'reinstallDatePicker',
        'columns'=>array(
            array(
                'name'=>'id',
                'value'=>'$data->id',
                'htmlOptions'=>array('style'=>'width:35px;'),
                //'filter'=>'',
            ),
            'username',
            'email',
            array(
                'name'=>'language',
                'value'=>'$data->getLanguage()',
                'filter'=>$Languages,
                'htmlOptions'=>array('style'=>'width:95px;'),
            ),
            array(
                'name' => 'joined',
                'header'=>Yii::t('global', 'Registered date'),
                'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
                'filter' => $this->widget('CJuiDateTimePicker', array(
                            'model'=>$model,
                            'attribute'=>'joined',
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
                'template'=>'{view} {update} {delete}',
                'buttons'=>array
                (

                    'view' => array
                    (
                        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t("adminlang", "View").'"></i></span>',
                        'url'=>'Yii::app()->createUrl("admin/members/view?id=$data->id ")',
                        'options' => array(
                            'class' => 'tipb view-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'View'),
                            'title'       => 'View',
                        ),
                    ),
                    'update' => array
                    (
                        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t("adminlang", "Edit").'"></i></span>',
                        'url'=>'Yii::app()->createUrl("admin/members/update?id=$data->id ")',
                        'options' => array( 'class' => 'tipb update-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'Edit'),
                            'title'       => 'Edit', ),
                    ),
                    'delete' => array
                    (
                        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t("adminlang", "Delete").'"></i></span>',
                        'url'=>'Yii::app()->createUrl("admin/members/delete?id=$data->id ")',
                        'options' => array( 'class' => 'tipb delete-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'Delete'),
                            'title'       => 'Delete', ),
                    ),
                ),
            ),//
        ),
    )); ?>

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

</div>
</div>
</div>

<style>
    select{
        width:110px !important;
    }
</style>