
<div class="container-fluid">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<div class="row-form clearfix">
		<div class="col-md-3">
            <?php echo $form->labelEx($model,'name'); ?>
        </div>
		<div class="col-md-9">
        <?php echo(Yii::app()->user->isGuest)? $form->textField($model,'name',array('class'=>'form-control' ,'size'=>60,'maxlength'=>150)):$form->textField($model,'name',array('size'=>60,'maxlength'=>150,'value'=>Yii::app()->user->name));?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="col-md-3">
            <?php echo $form->labelEx($model,'emails'); ?>
        </div>
		<div class="col-md-9">
            <?php echo(Yii::app()->user->isGuest)? $form->textField($model,'emails',array( 'class'=>'form-control' ,'size'=>60,'maxlength'=>150)):$form->textField($model,'emails',array('size'=>60,'maxlength'=>150,'value'=>Yii::app()->user->email)); ?>
            <?php echo $form->error($model,'emails'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="col-md-3">
            <?php echo $form->labelEx($model,'questions'); ?>
        </div>
		<div class="col-md-9">
        	<?php // $this->widget('application.widgets.ckeditor.CKEditor', array( 'model' => $model, 'attribute' => 'questions', 'editorTemplate' => 'full' )); ?>
           <?php echo $form->textArea($model,'questions',array('class'=>'form-control' ,'rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'questions'); ?>
        </div>
	</div>

	

	<div class="row-form clearfix">
		<div class="col-md-3">
            <?php echo $form->labelEx($model,'datequestion'); ?>
        </div>
		<div class="col-md-9">
           <?php echo date('d-m-Y'); ?>
        </div>
	</div>



	<div class="footer tar">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Send') : Yii::t('global','Send'), array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->