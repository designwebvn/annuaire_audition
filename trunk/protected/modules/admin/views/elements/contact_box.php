<fieldset class="fieldset_contact">
    <legend><?php echo Yii::t('global','Contact'); ?></legend>
    <?php $model1 = new ContactBox(); ?>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'last_name'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'last_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'first_name'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'first_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'Function'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'Function',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'tel_contact_1'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'tel_contact_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'email_contact_1'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'email_contact_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'email'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'email',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'username'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'username',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'password'); ?>
        </label>
        <div class="controls">
            <?php echo $form->passwordField($model1,'password',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'status'); ?>
        </label>
        <div class="controls">
            <?php echo $form->checkBox($model1,'status'); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'observation'); ?>
        </label>
        <div class="controls">
            <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'ContactBox[observation]', 'value' => isset($model->observation) ? $model->observation : '', 'editorTemplate' => 'full' )); ?>
            <?php //echo $form->textArea($model1,'observation',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'last_name_contact_2'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'last_name_contact_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'first_name_contact_2'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'first_name_contact_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'function_contact_2'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'function_contact_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'tel_contact_2'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'tel_contact_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="fullname" class="control-label"><?php echo $form->labelEx($model1,'email_contact_2'); ?>
        </label>
        <div class="controls">
            <?php echo $form->textField($model1,'email_contact_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
        </div>
    </div>
</fieldset>