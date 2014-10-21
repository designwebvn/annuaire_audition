
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important;">
        <h1>
            <?php echo Yii::t('global', 'Export'); ?>            <small><?php echo Yii::t('global', 'Centers'); ?></small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider" style="margin-bottom: 79px;"></div>
    </div>

    <div class="row-fluid">
    <div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','centers'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
    <div class="container-fluid">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'centers-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'enctype' => 'multipart/form-data',
            'class'=>'form-horizontal contentForm',
            'data-validate'=>'parsley',
        )
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo Yii::t('export','From date'); ?>
        </label>
        <div class="controls">
            <?php
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model,
                'name'=>"Centers[fromdate]",
                'mode'=>'datetime',
                'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                'language' => Yii::app()->language=='en'?'':Yii::app()->language,
            )); ?>
        </div>
    </div>

    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo Yii::t('export','To date'); ?>
        </label>
        <div class="controls">
            <?php
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model,
                'name'=>"Centers[todate]",
                'mode'=>'datetime',
                'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                'language' => Yii::app()->language=='en'?'':Yii::app()->language,
            )); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Export') : Yii::t('global','Export'), array('class'=>'btn btn-primary')); ?>
            <button class="btn" type="reset"><?php echo Yii::t('global','Reset'); ?></button>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    </div>
    </div>

    </div>
    </div>


</div>