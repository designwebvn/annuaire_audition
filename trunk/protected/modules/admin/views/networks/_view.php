<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('corporate_name')); ?>:</b>
	<?php echo CHtml::encode($data->corporate_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grip')); ?>:</b>
	<?php echo CHtml::encode($data->grip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grip_related_centers')); ?>:</b>
	<?php echo CHtml::encode($data->grip_related_centers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_related_centers')); ?>:</b>
	<?php echo CHtml::encode($data->description_related_centers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advertiser')); ?>:</b>
	<?php echo CHtml::encode($data->advertiser); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('address_1')); ?>:</b>
	<?php echo CHtml::encode($data->address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box')); ?>:</b>
	<?php echo CHtml::encode($data->po_box); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_cedex_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->zip_cedex_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_cedex_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->city_cedex_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_1')); ?>:</b>
	<?php echo CHtml::encode($data->city_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_1')); ?>:</b>
	<?php echo CHtml::encode($data->zip_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number_1a')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_1b')); ?>:</b>
	<?php echo CHtml::encode($data->phone_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_1a')); ?>:</b>
	<?php echo CHtml::encode($data->fax_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_1b')); ?>:</b>
	<?php echo CHtml::encode($data->fax_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_email_1a')); ?>:</b>
	<?php echo CHtml::encode($data->a_email_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_1b')); ?>:</b>
	<?php echo CHtml::encode($data->email_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_1a')); ?>:</b>
	<?php echo CHtml::encode($data->website_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_1b')); ?>:</b>
	<?php echo CHtml::encode($data->website_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_2')); ?>:</b>
	<?php echo CHtml::encode($data->address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->additional_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->po_box_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_cedes_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->zip_cedes_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_cedex_address')); ?>:</b>
	<?php echo CHtml::encode($data->city_cedex_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_2')); ?>:</b>
	<?php echo CHtml::encode($data->city_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_2')); ?>:</b>
	<?php echo CHtml::encode($data->zip_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_2a')); ?>:</b>
	<?php echo CHtml::encode($data->phone_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_2b')); ?>:</b>
	<?php echo CHtml::encode($data->phone_2b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_2a')); ?>:</b>
	<?php echo CHtml::encode($data->fax_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_2b')); ?>:</b>
	<?php echo CHtml::encode($data->fax_2b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_2a')); ?>:</b>
	<?php echo CHtml::encode($data->email_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_2b')); ?>:</b>
	<?php echo CHtml::encode($data->email_2b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_2a')); ?>:</b>
	<?php echo CHtml::encode($data->website_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_2b')); ?>:</b>
	<?php echo CHtml::encode($data->website_2b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>