
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','users-account'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'users-account-form',
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'last_name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'function'); ?>
</label>
                    <div class="controls">
                        <?php
                            $listFunction  = CHtml::listData(UsersModule::model()->findAll('is_active = 1'),'id','name');
                            echo $form->dropDownList($model,'function', $listFunction);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_contact'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_contact',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_contact'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_contact',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'login'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'login', array('class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>

            <?php if( !$model->id ){ ?>
            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'password'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
            <?php } ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'enable'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'enable'); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'observation'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'observation',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name_contact_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'last_name_contact_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'last_name_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'function_contact_2'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listFunction  = CHtml::listData(UsersModule::model()->findAll('is_active = 1'),'id','name');
                        echo $form->dropDownList($model,'function_contact_2', $listFunction);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_contact_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_contact_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_contact_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>

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