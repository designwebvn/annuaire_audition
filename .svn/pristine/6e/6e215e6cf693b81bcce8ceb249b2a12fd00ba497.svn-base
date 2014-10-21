
<div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h1><?php echo Yii::t('global','Directory orders'); ?></h1>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'directory-orders-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>
            <?php echo $form->errorSummary($model); ?>
                <!-- name -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- address -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- city -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- zip -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- country -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'country'); ?>
                    </label>
                    <div class="controls">
                        <?php
                        $listCountry  = CHtml::listData(Countries::model()->findAll('is_active = 0'),'id','short_name');
                        echo $form->dropDownList($model,'country', $listCountry);
                        ?>
                    </div>
                </div>
                <!-- is_receive -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'is_receive'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'is_receive'); ?>
                    </div>
                </div>
                <!-- quanlity -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'quanlity'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'quanlity', array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- price -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'prices'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'prices', array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- total -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'total'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'total', array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <!-- check_number -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'check_number'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'check_number'); ?>
                    </div>
                </div>
                <!-- value_check_number -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'value_check_number'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'value_check_number',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                <!-- international_mandate -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'international_mandate'); ?>
                </label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'international_mandate'); ?>
                    </div>
                </div>
                <!-- value_international_mandate -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'value_international_mandate'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'value_international_mandate',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                <!-- transfer_to_ocep_edition -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'transfer_to_ocep_edition'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'transfer_to_ocep_edition'); ?>
                    </div>
                </div>
                <!-- address_annuaire -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address_annuaire'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address_annuaire',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                <!-- is_active -->
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'is_active'); ?>
                </label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'is_active'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
                        <button class="btn" type="reset">Reset</button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>
    </div>
<script>
    $(document).ready(function() {
        $('.quanlity-directory,.price-directory').change(function(e) {
            var quanlity = $('.quanlity-directory').val();
            var price    = $('.price-directory').val();
            if( quanlity != '' && price != '' ){
                var total = quanlity * price;
                $('.total_directory').val(""+total+"");
            }
        });
    });
</script>