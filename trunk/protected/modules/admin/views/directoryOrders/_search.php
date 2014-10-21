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
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_receive'); ?>
		<?php echo $form->textField($model,'is_receive', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quanlity'); ?>
		<?php echo $form->textField($model,'quanlity', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prices'); ?>
		<?php echo $form->textField($model,'prices', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_number'); ?>
		<?php echo $form->textField($model,'check_number', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value_check_number'); ?>
		<?php echo $form->textField($model,'value_check_number',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'international_mandate'); ?>
		<?php echo $form->textField($model,'international_mandate', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value_international_mandate'); ?>
		<?php echo $form->textField($model,'value_international_mandate',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transfer_to_ocep_edition'); ?>
		<?php echo $form->textField($model,'transfer_to_ocep_edition', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_annuaire'); ?>
		<?php echo $form->textField($model,'address_annuaire',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active', array('class'=>'span10')); ?>
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