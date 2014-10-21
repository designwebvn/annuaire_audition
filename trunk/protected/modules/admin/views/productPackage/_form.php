
<div class="block-fluid">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-package-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'group_id'); ?>
        </div>
		<div class="span9">
             <?php   
                     $group_name = Groups::model()->findAll(' 1 ORDER BY id DESC');
                     foreach ($group_name as $key=>$name){
                        $group_name1[$name['id']] =  $name['group_name'];
                     } 
             ?>
            <?php echo $form->dropDownList( $model, 'group_id', $group_name1 ); ?>
            <?php echo $form->error( $model, 'group_id' ); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'quantity'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'quantity'); ?>
            <?php echo $form->error($model,'quantity'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'quantity_type'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'quantity_type',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'quantity_type'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'price'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'price'); ?>
            <?php echo $form->error($model,'price'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'offers'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'offers'); ?>
            <?php echo $form->error($model,'offers'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'shipping_type'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'shipping_type',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'shipping_type'); ?>
        </div>
	</div>

	<?php /*
    <div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'created'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'created'); ?>
            <?php echo $form->error($model,'created'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'updated'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'updated'); ?>
            <?php echo $form->error($model,'updated'); ?>
        </div>
	</div> */ ?>

	<div class="footer tar">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->