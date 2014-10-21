<div class="clearfix">&nbsp;</div>
<div class="container-fluid fix-container-product">
    <?php if(Yii::app()->user->isGuest){ ?>
    <div class="container fix-container-product">
       <div class="slider-box purple-grid fix-boder">
            <div class="message_profile fix-message">
                <h1><span class="frontend_account_index shopware_studio_snippet"><?php echo Yii::t('global','You must login to see this page.'); ?></h1>
                <p>
                    <span class="frontend_account_index shopware_studio_snippet"><?php echo Yii::t('global','Please login to see this page.'); ?></span>
                </p>
            </div>
       </div>
    </div>
    <?php } else { ?>
    <div class="container fix-container-product">
        <div class="personal_settings">
            <div class="message_profile">
                <h2><span class="frontend_account_index shopware_studio_snippet"><?php echo Yii::t('global','Welcome'); ?></span>, <?php echo $model->username; ?></h2>
                <p>
                <span class="frontend_account_index shopware_studio_snippet"><?php echo Yii::t('global','Here you  can edit your persional information. Keep your information up to date, as this\'s neccessary for delivery your winning and purchasing.'); ?></span>
                </p>
            </div>
            <?php if($err!='') echo "<div class='error_pass'>".$err."</div>" ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'validation',
            'enableAjaxValidation'=>false,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>
            <?php $this->widget('widgets.admin.notifications'); ?>
            <?php echo $form->errorSummary($model); ?>

            <div class="row" style="margin-top: 20px;">
                    <div class="col-md-3"> <?php echo $form->labelEx($model,'gender'); ?> </div>
                    <div class="col-md-7 new-fix-gender" >
                        <label for="male"><input type="radio" name="Members[gender]" value="0" id="male" <?php echo ($model->gender ==1)?:"checked"; ?>/> <?php echo Yii::t('global','Male') ?></label>
                        <label for="female"><input type="radio" name="Members[gender]" value="1" <?php echo ($model->gender ==0)?:"checked"; ?> id="female" /> <?php echo Yii::t('global','Female') ?></label>
                        <?php //echo $form->radioButtonList($model,'gender',array('1'=>Yii::t('global','Male'),'0'=>Yii::t('global','Female')),array('separator'=>'','class'=>' radio validate[required]','template'=>'{input}<span>{label}</span>')); ?>  </div>
                    <div class="clearfix">&nbsp;</div>
             </div>

            <div class="row">
                <div class="col-md-3"><?php echo $form->labelEx($model,'fname'); ?> </div>
                <div class="col-md-9" >   <span>
                                    <?php echo $form->textField($model,'fname',array('size'=>40,'maxlength'=>40,'title' => Yii::t('global', 'Enter your first name'),'class' => 'form-control validate[required]')); ?>
                                </span> </div>
                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3"> <?php echo $form->labelEx($model,'lname'); ?> </div>
                <div class="col-md-9" >    <span>
								    <?php echo $form->textField($model,'lname',array('size'=>40,'maxlength'=>40, 'title' => Yii::t('global', 'Enter your last name'),'class' => 'form-control validate[required]' )); ?>
                                </span>
                    <?php echo $form->error($model,'lname'); ?> </div>
                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3"> <?php echo $form->labelEx($model,'birthday'); ?> </div>
                <div class="col-md-9" >

									<?php $tmp= explode('.',$model->birthday); ?>
                    <?php echo $form->dropDownList($model, 'bday', DateHelper::getDays(), array('prompt' =>!isset($tmp[0])?:$tmp[0], 'class'=>'form-control fix-drop'));?>
                    <?php echo $form->dropDownList($model, 'bmonth', DateHelper::getMonths(), array('prompt' => !isset($tmp[1])?:$tmp[1],'class'=>'form-control fix-drop')); ?>
                    <?php echo $form->dropDownList($model, 'byear', DateHelper::getYears(), array('prompt' => !isset($tmp[2])?:$tmp[2],'class'=>'form-control fix-drop')); ?>
                        <?php echo $form->error($model,'birthday'); ?>

                </div>
            </div>

                <div class="clearfix">&nbsp;</div>

            <div class="row">
                <div class="col-md-3">    <?php echo $form->labelEx($model,'street'); ?> </div>
                <div class="col-md-6" >
                <span><?php echo $form->textField($model,'street',array('size'=>40,'maxlength'=>255, 'title' => Yii::t('global', 'Enter your street'),'class' => 'form-control validate[required]')); ?> </div>
                <div class="col-md-3" ><?php echo $form->textField($model,'nr',array('size'=>40,'maxlength'=>255, 'class' => ' form-control validate[required] last', 'title' => Yii::t('global', 'Enter your address'))); ?></div>
                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">   <?php echo $form->labelEx($model,'ext_information'); ?> </div>
                <div class="col-md-9" >
                <span>
                    <?php echo $form->textField($model,'ext_information',array('size'=>40,'maxlength'=>255, 'title' => Yii::t('global', 'Enter your extra information '),'class'=>'form-control' )); ?>
                </span>
                    <?php echo $form->error($model,'ext_information'); ?> </div>
                    <div class="clearfix">&nbsp;</div>
                </div>


            <div class="row">
                <div class="col-md-3">   <label><?php echo $form->labelEx($model,'postcode'); ?></label> </div>
                <div class="col-md-4" >
                    <?php echo $form->textField($model,'postcode', array('class' => 'form-control validate[required] first', 'title' => Yii::t('global', 'Enter your Post Code '))); ?>
                </div>
                <div class="col-md-5" >
                    <?php echo $form->textField($model,'city', array('title' => Yii::t('global', 'Enter your city'),'class' => 'form-control validate[required]')); ?>
                 </div>

                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3" >     <?php $country = CHtml::listData(Countries::model()->findAllByAttributes(array('is_active' => 1)), 'id', 'short_name' );
                    foreach ($country as $key=>$value){
                        $country[$key] = Yii::t('global', $value);
                    }
                    echo $form->labelEx($model,'country_id'); ?> </div>
                <div class="col-md-9" >  <span id="country">
									<?php echo $form->dropDownList($model, 'country', $country,array('class'=>'form-control')); ?>
								</span> </div>
                    <?php echo $form->error($model,'country'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3" >	    <?php echo $form->labelEx($model,'phone'); ?> </div>
                <div class="col-md-9" >	 <span>
								    <?php echo $form->textField($model,'phone',array('size'=>40,'maxlength'=>40, 'title' => Yii::t('global', 'Enter your phone'),'class'=>'form-control' )); ?>
                                </span> </div>
                    <?php echo $form->error($model,'phone'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3" >	 <?php echo $form->labelEx($model,'username'); ?> </div>
                <div class="col-md-9" >   <span>
								    <?php echo $model->username ;//$form->textField($model,'username',array('size'=>60,'maxlength'=>155,'onchange'=>'checkUser()','class'=>'username', 'title' => Yii::t('global', 'Enter your first name '))); ?>
                        <div class="noticeStatus" id="noticeStatus"></div>
                                </span> </div>
                    <?php echo $form->error($model,'username'); ?>
                    <div class="clearfix">&nbsp;</div>

                </div>

            <div class="row">
                <div class="col-md-3" >    <?php echo $form->labelEx($model,'email'); ?> </div>
                <div class="col-md-9" >     <span>
								    <?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>155, 'title' => Yii::t('global', 'Enter your desired email address'),'class'=>"form-control validate[required]")); ?>
                                </span> </div>
                    <?php echo $form->error($model,'email'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>
            <div class="row">
                <div class="col-md-12 ">
                    <label><?php echo Yii::t('global','Change Password'); ?></label>
                </div>
            </div>
            <div class="error_password"></div>
            <div class="row">
                <div class="col-md-3" >  <?php echo $form->labelEx($model,'password'); ?> </div>
                    <div class="col-md-9" >    <span>
                                    <?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40,'class'=>'form-control validate[minSize[8]]', 'title' => Yii::t('global', 'Enter your desired password '),'value'=>'')); ?>
                                </span> </div>
                    <?php echo $form->error($model,'password'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>

            <div class="row">
                <div class="col-md-3" > <?php echo $form->labelEx($model,'npassword'); ?> </div>
                <div class="col-md-9" >    <span>
                                    <?php echo $form->passwordField($model,'password2',array('size'=>40,'maxlength'=>40, 'class' => 'form-control validate[minSize[8]] ')); ?>
                                </span> </div>
                    <?php echo $form->error($model,'npassword'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>
            <div class="row">
                <div class="col-md-3" >    <?php echo $form->labelEx($model,'npassword2'); ?> </div>
                <div class="col-md-9" >    <span>
                                    <?php echo $form->passwordField($model,'npassword2',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
                                </span> </div>
                    <?php echo $form->error($model,'npassword2'); ?>
                    <div class="clearfix">&nbsp;</div>
                </div>


            <div class="row">
                <div class="col-md-4" > </div>
                <div class="col-md-4" style="padding-top: 25px;"> <?php echo CHtml::submitButton( Yii::t('global','Save'), array('class'=>'btn btn-primary registerbutton', 'id'=>'registerbutton','onclick'=>'return false' )); ?> </div>
                <div class="col-md-4" ></div>
                <div class="clearfix">&nbsp;</div>
            </div>



            <?php $this->endWidget(); ?>
           
        </div>
        <table><tr><td height=10px></td></tr></table>
        <br /> 
    </div><!--#end col-left-->
    
    <?php } ?>
    <div class="clearfix"></div>

</div>
<script type="text/javascript">

    $("#validation").validationEngine({promptPosition : "topLeft", scroll: true});
    $('#registerbutton').live('click',function(){
        var oldPassword = $('#Members_password').val();
        var newPassword = $('#Members_password2').val();
        var newPasswordCon = $('#Members_npassword2').val();
        if(oldPassword != '' && newPassword == ''){
            $('.error_password').html('<?php echo Yii::t('global','New password cant empty') ?>');
        } else if (newPassword != '' && newPasswordCon != newPassword){
            $('.error_password').html('<?php echo Yii::t('global','New password confirm not same new password') ?>')
        } else {
            $('#validation').submit();
        }
    });
    setTimeout(function(){},10000);

</script>