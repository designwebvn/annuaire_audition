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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'function'); ?>
		<?php echo $form->textField($model,'function', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_contact'); ?>
		<?php echo $form->textField($model,'phone_contact',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_contact'); ?>
		<?php echo $form->textField($model,'email_contact',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'login'); ?>
		<?php echo $form->textField($model,'login', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enable'); ?>
		<?php echo $form->textField($model,'enable', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observation'); ?>
		<?php echo $form->textField($model,'observation',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_contact_2'); ?>
		<?php echo $form->textField($model,'name_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name_contact_2'); ?>
		<?php echo $form->textField($model,'last_name_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'function_contact_2'); ?>
		<?php echo $form->textField($model,'function_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_contact_2'); ?>
		<?php echo $form->textField($model,'phone_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_contact_2'); ?>
		<?php echo $form->textField($model,'email_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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