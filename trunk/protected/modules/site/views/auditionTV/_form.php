<div class="cmnt-reply-form float-width">
    <h3 class="sec-title"><?php echo Yii::t('global','LEAVE A RESPONSE'); ?></h3>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'comment-form',
        'htmlOptions'=>array('role'=>'form','data-validate'=>'parsley'),
        'enableAjaxValidation'=>true,

    )); ?>

    <p class="note"><?php echo Yii::t('global','Fields are required'); ?>.</p>

    <div class="form-group">
        <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>'Author','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>'Subject','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
        <?php echo $form->error($model,'subject'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'form-control','placeholder'=>'Content','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    <input name="VideoComments[video_id]" value="<?php echo $id; ?>" type="hidden">
    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="form-group">
            <div class="block-capcha">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model,'verifyCode',array('size'=>60,'maxlength'=>12, 'class'=>'form-control','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
            </div>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','POST YOUR COMMENT') : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
