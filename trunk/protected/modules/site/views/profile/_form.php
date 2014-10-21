<div class="container-fluid" style="margin: 0!important; padding: 0 !important;">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validation',
        'enableAjaxValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
        <?php  echo $form->errorSummary($model); ?>
        <div class="table table-bordered table-striped" >
            <div class="row" style="margin-top: 30px;">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'First Name'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'fname',array('class'=>' form-control')); ?>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Last Name'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'lname',array('class'=>' form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Username'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'username',array('class'=>' form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Email'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'email',array('class'=>' form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Password'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->passwordField($model,'password',array('class'=>'validate[minSize[8]] form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Repeat Password'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->passwordField($model,'password2',array('class'=>' validate[equals[Profile_password] form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'City'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'city',array('class'=>' form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Birthday'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php
                        echo $form->dropDownList($model, 'bday', DateHelper::getDays(), array('prompt' => Yii::t('global','Day'),'class' => 'validate[required] form-control fix-drop '));
                        echo $form->dropDownList($model, 'bmonth', DateHelper::getMonths(), array('prompt' => Yii::t('global','Month'),'class' => 'validate[required] form-control fix-drop '));
                        echo $form->dropDownList($model, 'byear', DateHelper::getYears(), array('prompt' => Yii::t('global','Year'),'class' => 'validate[required] form-control fix-drop '));
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Address'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'address',array('class'=>'validate[required] form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'State'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'state',array('class'=>'validate[required] form-control')); ?>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Zipcode'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'postcode',array('class'=>' form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Country'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->dropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'short_name' ), array('class'=>'form-control validate[required]')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-input">
                    <div class="col-md-3 col-lg-3"><?php echo Yii::t('global', 'Home Phone'); ?><span class="red-star" >*</span></div>
                    <div class="col-md-7 col-lg-7">
                        <?php echo $form->textField($model,'phone',array('class'=>'validate[required] form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="table-bordered" style="padding-bottom: 20px;border: none;" >
                <div class="text-accept" >
                    <span>
                        <?php echo $form->checkBox($model,'subcriber',array('class'=>'validate[required]')); ?>
                    </span> <?php echo Yii::t('global', 'I agree to all the policies and terms laid
                    out in the footer of the site'); ?><span class="red-star" >*</span>
                </div>

            </div>
            <div class="text-accept1">
                <span class="formButton5"> <input class="submit1" type="submit" value="Register" id="submitBtn"></span>
            </div>
        </div>
    <?php $this->endWidget(); ?>
</div>


<script type="text/javascript">
$("#validation").validationEngine({promptPosition : "topLeft", scroll: true});
function checkUser(){
    var username = $('.username').val();
    $.get('/profile/checkUser?username='+username, function(html) {
            $('.noticeStatus').html(html);
    });
}


$('#registerbutton').live('click',function(){
       var checkUser = $('.noticeStatus').html();
    if(checkUser == ''){
        $('#validation').submit();
    } else {
        $(window).scrollTop($('#noticeStatus').offset().top);
    }
})



</script>