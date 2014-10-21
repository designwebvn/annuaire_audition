<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <div class="containerHeadline tableHeadline">
                <h2><?php echo Yii::t('global', 'Members'); ?></h2>
                <form>
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('members/create?type='.$type) ?>'"><i class="icon-plus-sign" title="Create Member"></i></span>
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
                            'id'=>'membersTable',
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
                                'username',
                                'email',
                                array(
                                    'name'=>'language',
                                    'value'=>'$data->getLanguage()',
                                    'filter'=>$Languages,
                                    'htmlOptions'=>array('style'=>'width:95px;'),
                                ),
                                array(
                                    'name' => 'created',
                                    'header'=>Yii::t('global', 'Signup date'),
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
                                    'name' => 'last_logged',
                                    'header'=>Yii::t('global', 'Last signin date'),
                                    'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
                                    'filter' => $this->widget('CJuiDateTimePicker', array(
                                                'model'=>$model,
                                                'attribute'=>'last_logged',
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
                                    'class'=>'ButtonColumn',
                                    'header' => 'Actions',
                                    'htmlOptions' => array(
                                        'style' => 'width : 155px !important',
                                    ),
                                    'template'=>'{view} {update} {delete} {changepassword}',
                                    'buttons'=>array
                                    (

                                        'view' => array
                                        (
                                            'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title ="'.Yii::t("adminlang", "View").'"></i></span>',
                                            'options' => array( 'class' => 'tipb view-icon-tooltip',
                                                                'data-original-title' => Yii::t('adminlang', 'View'),
                                                                'title'       => Yii::t('adminlang', 'View'), ),
                                        ),
                                        'update' => array
                                        (
                                            'label'=>'<span class="label green" ><i class="icon-pencil edit" title ="'.Yii::t("adminlang", "Edit").'"></i></span>',
                                            'options' => array( 'class' => 'tipb update-icon-tooltip',
                                                                'data-original-title' => Yii::t('adminlang', 'Edit'),
                                                                'title'       => Yii::t('adminlang', 'Edit'), ),
                                        ),
                                        'delete' => array
                                        (
                                            'label'=>'<span class="label red" ><i class="icon-trash delete" title ="'.Yii::t("adminlang", "Delete").'"></i></span>',
                                            'options' => array( 'class' => 'tipb delete-icon-tooltip',
                                                                'data-original-title' => Yii::t('adminlang', 'Delete'),
                                                                'title'       => Yii::t('adminlang', 'Delete'), ),
                                        ),
                                        'changepassword'=>array(
                                            'label'=>'<span class="label cyan" ><i class="icon-user info" title ="'.Yii::t("adminlang", "Change Password").'"></i></span>',
                                            'url'=>'Yii::app()->createUrl("admin/members/changepass", array("id" => $data->id, "action" => Yii::app()->controller->action->id))',
                                            'options' => array( 'class' => 'tipb change-password',
                                                'data-original-title' => Yii::t('adminlang', 'Change Password'),
                                                'title'       => Yii::t('adminlang', 'Change Password'),
                                            ),

                                        ),
                                    ),
                                ),//
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
    $('.change-password').tooltip({
    });
</script>
<style>
    select{
        width:110px !important;
    }
</style>