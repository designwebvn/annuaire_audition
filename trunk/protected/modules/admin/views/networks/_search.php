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
		<?php echo $form->label($model,'grip'); ?>
		<?php echo $form->textField($model,'grip',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grip_related_centers'); ?>
		<?php echo $form->textField($model,'grip_related_centers',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_related_centers'); ?>
		<?php echo $form->textField($model,'description_related_centers',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advertiser'); ?>
		<?php echo $form->textField($model,'advertiser', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_1'); ?>
		<?php echo $form->textField($model,'address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_address'); ?>
		<?php echo $form->textField($model,'additional_address',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_box'); ?>
		<?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_cedex_address_1'); ?>
		<?php echo $form->textField($model,'zip_cedex_address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_cedex_address_1'); ?>
		<?php echo $form->textField($model,'city_cedex_address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_1'); ?>
		<?php echo $form->textField($model,'city_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_1'); ?>
		<?php echo $form->textField($model,'zip_1',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number_1a'); ?>
		<?php echo $form->textField($model,'phone_number_1a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_1b'); ?>
		<?php echo $form->textField($model,'phone_1b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_1a'); ?>
		<?php echo $form->textField($model,'fax_1a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_1b'); ?>
		<?php echo $form->textField($model,'fax_1b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_email_1a'); ?>
		<?php echo $form->textField($model,'a_email_1a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_1b'); ?>
		<?php echo $form->textField($model,'email_1b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_1a'); ?>
		<?php echo $form->textField($model,'website_1a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_1b'); ?>
		<?php echo $form->textField($model,'website_1b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_2'); ?>
		<?php echo $form->textField($model,'address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_address_2'); ?>
		<?php echo $form->textField($model,'additional_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_box_address_2'); ?>
		<?php echo $form->textField($model,'po_box_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_cedes_address_2'); ?>
		<?php echo $form->textField($model,'zip_cedes_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_cedex_address'); ?>
		<?php echo $form->textField($model,'city_cedex_address',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
		<?php echo $form->label($model,'phone_2a'); ?>
		<?php echo $form->textField($model,'phone_2a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_2b'); ?>
		<?php echo $form->textField($model,'phone_2b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_2a'); ?>
		<?php echo $form->textField($model,'fax_2a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_2b'); ?>
		<?php echo $form->textField($model,'fax_2b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_2a'); ?>
		<?php echo $form->textField($model,'email_2a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_2b'); ?>
		<?php echo $form->textField($model,'email_2b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_2a'); ?>
		<?php echo $form->textField($model,'website_2a',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_2b'); ?>
		<?php echo $form->textField($model,'website_2b',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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