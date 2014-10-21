<div class="head clearfix"></div>
<div class="container-fluid" style="margin: 0!important; padding: 0 !important;">
            <div class="top_text fix_user">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'validation',
                    'enableAjaxValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>
                <?php if($model->hasErrors()){ ?>
                        <p class="error">
                            <?php echo Yii::t('global', 'Please enter your data login again.'); //CHtml::errorSummary($model); ?>
                        </p>
                    <?php } else if(Yii::app()->user->hasFlash('success')){ ?>
                            <div class="info">
                                <?php echo Yii::app()->user->getFlash('success'); ?>
                            </div>
                            <?php }  ?>
                    <div class="table table-bordered table-striped" >
                        <div class="row">
                            <div class="content-input">
                                <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'My username'); ?><span class="red-star" >*</span></div>
                                <div class="col-md-4 col-lg-4">
                                    <input type="text" class="text tooltipsy validate[required] form-control" name="LoginForm[email]" id="LoginForm_email" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="content-input">
                                <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Password'); ?><span class="red-star" >*</span></div>
                                <div class="col-md-4 col-lg-4">
                                    <input type="password" class="text tooltipsy validate[required] form-control" name="LoginForm[password]" id="LoginForm_password" value="" title="<?php echo Yii::t('global', 'Enter your password'); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-accept1 fix_text_center">
                            <div class="col-md-3 col-lg-3"> </div>
                            <span class="formButton5"> <input class="submit1" type="submit" value="Login" id="submitBtn"></span>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
        </div>
</div>