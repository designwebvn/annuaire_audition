<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'press_id'); ?>
		<?php echo $form->textField($model,'press_id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theme'); ?>
		<?php echo $form->textField($model,'theme',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periodicity'); ?>
		<?php echo $form->textField($model,'periodicity',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated'); ?>
		<?php echo $form->textField($model,'updated', array('class'=>'span10')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->