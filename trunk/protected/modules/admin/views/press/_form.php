
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Press'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'press-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>
            <?php $this->widget('widgets.admin.notifications'); ?>
            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'corporate_name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'corporate_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('global','Newspaper Title'); ?>
</label>
                    <div class="controls">
                          <div class="block-fluid wrapper_title_newspaper">
                            <div class="row-form fix-create-group clearfix">
                                <div class="span3">
                                    <input type="text" class="title_newspaper "  value="" placeholder="<?php echo Yii::t('global','Title'); ?>"/>
                                </div>
                                <div class="span3">
                                    <input class="theme_newspaper" type="text" value="" placeholder="<?php echo Yii::t('global','Theme'); ?>" >
                                </div>
                                <div class="span3">
                                    <input class="periodicity_newspaper" value="" placeholder="<?php echo Yii::t('global','Periodicity'); ?>" type="text">
                                </div>
                                <div class="span3">
                                    <div class="btn btn-primary add-title"><?php echo Yii::t('global','Add') ?></div>
                                </div>
                            </div>
                              <div style="margin-top: 15px !important;"></div>
                            <?php if(!$model->isNewRecord) {
                                $this->renderPartial('newspaper_title',compact('model'));
                            } ?>
                        </div>
                        <?php //echo $form->textField($model,'newspaper_title',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'advertisers'); ?>
</label>
                    <div class="controls">
                        <?php
                        $advertisers = Utils::getStatusCommon();
                        echo $form->dropDownList($model, 'advertisers', $advertisers); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Press[description]', 'value' => isset($model->description) ? $model->description : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'image'); ?>
                        <?php if ($model->image):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/press/'.$model->image.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/press/'.$model->image.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_cedex',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_cedex',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
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
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'website'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'website_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'website_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','News'); ?>
                    </label>
                    <div class="controls">
                        <select name="PressNews[]" id="s2_3" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); News::getTree($cats);
                            $selected = $model->getPressNewsId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['title'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </fieldset>

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
                           <!-- <div class="control-group">
                    <label for="fullname" class="control-label"><?php /*echo $form->labelEx($model,'delFlg'); */?>
</label>
                    <div class="controls">
                        <?php /*echo $form->textField($model,'delFlg', array('class'=>'span10')); */?>
                    </div>
                </div>-->
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
<script type="text/javascript">
    var flag = 0;
    $('.add-title').click(function(){
       var title        = $('.title_newspaper').val();
       var theme        = $('.theme_newspaper').val();
       var periodicity  = $('.periodicity_newspaper').val();
        if( title != '' ){
            $('.title_newspaper').removeClass('error_required');
            $('.title_newspaper').val('');
            flag++;
            var html = "<div class='row-form  clearfix group_0"+flag+"' >";
                html+='<div class="isb-right_circle point_group"></div>';
                html+='<div class="row-form fix-create-group clearfix">';
                html+='<div class="span3">';
                html+='<input type="text" name="newspapersTitles[0'+flag+'][nameTitle]" class="title_newspaper'+flag+' validate[required,maxSize[255]] parsley-validated" value="'+title+'" data-required="true" /></div>';
                html+='<div class="span3"><input name="newspapersTitles[0'+flag+'][themeTitle]" class="theme_newspaper'+flag+'" type="text" value="'+theme+'" ></div>';
                html+='<div class="span3"><input name="newspapersTitles[0'+flag+'][periodicityTitle]" class="periodicity_newspaper'+flag+'" value="'+periodicity+'" type="text"></div>';
                html+='<div class="span3"><div class="btn btn-warning  delete-group" onclick="deleteGroup(\''+0+flag+'\')" style="margin-right:5px" ><span class="isw-delete " > <?php echo Yii::t('global','Delete'); ?> </span></div></div></div><div style="margin-top: 5px !important;"></div>';
            $('.wrapper_title_newspaper').append(html);
        }
        else{
            $('.title_newspaper').addClass('error_required');
        }
    });
    function deleteGroup(id_group){
        $('.group_'+id_group).remove();
    }
</script>
    <style>
        .error_required{
            background: none repeat scroll 0 0 rgba(231, 76, 60, 0.3) !important;
            border: 1px solid rgba(231, 76, 60, 0.5) !important;
            color: #c0392b !important;
        }
    </style>