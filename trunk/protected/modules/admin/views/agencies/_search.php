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
		<?php echo $form->label($model,'corporate_name'); ?>
		<?php echo $form->textField($model,'corporate_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'corporate_name_2'); ?>
		<?php echo $form->textField($model,'corporate_name_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'legal_status'); ?>
		<?php echo $form->textField($model,'legal_status', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advertisers'); ?>
		<?php echo $form->textField($model,'advertisers', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service'); ?>
		<?php echo $form->textField($model,'service',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_id'); ?>
		<?php echo $form->textField($model,'address_id',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_address'); ?>
		<?php echo $form->textField($model,'additional_address',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_box'); ?>
		<?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_cedex'); ?>
		<?php echo $form->textField($model,'zip_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_cedex'); ?>
		<?php echo $form->textField($model,'city_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_2'); ?>
		<?php echo $form->textField($model,'phone_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_1'); ?>
		<?php echo $form->textField($model,'email_1',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_2'); ?>
		<?php echo $form->textField($model,'email_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_3'); ?>
		<?php echo $form->textField($model,'email_3',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grip'); ?>
		<?php echo $form->textField($model,'grip',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_2'); ?>
		<?php echo $form->textField($model,'description_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishing'); ?>
		<?php echo $form->textField($model,'publishing', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_2'); ?>
		<?php echo $form->textField($model,'website_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_2'); ?>
		<?php echo $form->textField($model,'address_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_address_2'); ?>
		<?php echo $form->textField($model,'additional_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_2'); ?>
		<?php echo $form->textField($model,'city_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_2'); ?>
		<?php echo $form->textField($model,'zip_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country_2'); ?>
		<?php echo $form->textField($model,'country_2', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_box_cedex_2'); ?>
		<?php echo $form->textField($model,'po_box_cedex_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_cedex_2'); ?>
		<?php echo $form->textField($model,'city_cedex_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_2'); ?>
		<?php echo $form->textField($model,'fax_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->