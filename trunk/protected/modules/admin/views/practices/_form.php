
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','practices'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'practices-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Practices[description]', 'value' => isset($model->description) ? $model->description : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Speech Therapists'); ?>
                    </label>
                    <div class="controls">
                        <select name="PracticeSpeechTherapists[]" id="s2_4" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpeechTherapist::getTree($cats);
                            $selected = $model->getPracticesSpeechTherapistId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['name'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>

                    </div>
                </div>

            </fieldset>

                            <div class="control-group">
                    <div class="controls">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
                        <button class="btn" type="reset"><?php echo Yii::t('global','Reset'); ?></button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>
    </div>