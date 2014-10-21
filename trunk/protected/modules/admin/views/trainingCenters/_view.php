<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_name')); ?>:</b>
	<?php echo CHtml::encode($data->school_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_name_2')); ?>:</b>
	<?php echo CHtml::encode($data->school_name_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advertiser')); ?>:</b>
	<?php echo CHtml::encode($data->advertiser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_of_training')); ?>:</b>
	<?php echo CHtml::encode($data->type_of_training); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree')); ?>:</b>
	<?php echo CHtml::encode($data->degree); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_1')); ?>:</b>
	<?php echo CHtml::encode($data->description_1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description_2')); ?>:</b>
	<?php echo CHtml::encode($data->description_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_1')); ?>:</b>
	<?php echo CHtml::encode($data->address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_1')); ?>:</b>
	<?php echo CHtml::encode($data->city_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_1')); ?>:</b>
	<?php echo CHtml::encode($data->country_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box_1')); ?>:</b>
	<?php echo CHtml::encode($data->po_box_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box_zip_1')); ?>:</b>
	<?php echo CHtml::encode($data->po_box_zip_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_cedex_1')); ?>:</b>
	<?php echo CHtml::encode($data->zip_cedex_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_cedex_1')); ?>:</b>
	<?php echo CHtml::encode($data->city_cedex_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_1_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->phone_1_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_2_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_2_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->fax_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->fax_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_2')); ?>:</b>
	<?php echo CHtml::encode($data->address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address_bis_1')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address_bis_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address_bis_2')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address_bis_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_2')); ?>:</b>
	<?php echo CHtml::encode($data->city_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_2')); ?>:</b>
	<?php echo CHtml::encode($data->country_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_2')); ?>:</b>
	<?php echo CHtml::encode($data->zip_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box_2')); ?>:</b>
	<?php echo CHtml::encode($data->po_box_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_cedex_2')); ?>:</b>
	<?php echo CHtml::encode($data->zip_cedex_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_cedex_2')); ?>:</b>
	<?php echo CHtml::encode($data->city_cedex_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_1_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_1_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_2_address_21')); ?>:</b>
	<?php echo CHtml::encode($data->phone_2_address_21); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_1_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->fax_1_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_2_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->fax_2_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_1')); ?>:</b>
	<?php echo CHtml::encode($data->email_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_2')); ?>:</b>
	<?php echo CHtml::encode($data->email_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_3')); ?>:</b>
	<?php echo CHtml::encode($data->email_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_2')); ?>:</b>
	<?php echo CHtml::encode($data->website_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>