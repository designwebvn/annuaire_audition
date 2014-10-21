
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Training Centers'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'training-centers-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'school_name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'school_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'school_name_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'school_name_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'advertiser'); ?>
</label>
                    <div class="controls">
                        <?php
                        $advertisers = Utils::getStatusCommon();
                        echo $form->dropDownList($model,'advertiser', $advertisers); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'type_of_training'); ?>
</label>
                    <div class="controls">
                        <select name="TrainingCentersType[]" id="s2_2" multiple="multiple" class="span10 validate[required]">
                            <?php
                            $cats = array(); TypeTraining::getTree($cats);
                            $selected = $model->getCategoriesId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['name'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>
                        <?php
                        /*$listTypeOfTraining  = CHtml::listData(TypeTraining::model()->findAll(),'id','name');
                        echo $form->dropDownList($model,'type_of_training', $listTypeOfTraining); */?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'degree'); ?>
</label>
                    <div class="controls">
                        <select name="TrainingCentersDegrees[]" id="s2_3" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats       = array(); Degrees::getTree($cats);
                            $selected   = $model->getIdTrainingCentersDegrees();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['name'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>
                        <?php //echo $form->textField($model,'degree',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description_1'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'TrainingCenters[description_1]', 'value' => isset($model->description_1) ? $model->description_1 : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description_2'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'TrainingCenters[description_2]', 'value' => isset($model->description_2) ? $model->description_2 : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'country_1'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listCountry  = CHtml::listData(Countries::model()->findAll('is_active = 0'),'id','short_name');
                        echo $form->dropDownList($model,'country_1', $listCountry);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box_zip_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box_zip_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_cedex_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_cedex_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_cedex_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_cedex_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_1_address_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_1_address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_2_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_2_address_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax_address_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax_address_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax_address_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address_bis_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address_bis_1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address_bis_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address_bis_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'country_2'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listCountry  = CHtml::listData(Countries::model()->findAll('is_active = 0'),'id','short_name');
                        echo $form->dropDownList($model,'country_2', $listCountry);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_cedex_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_cedex_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_cedex_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_cedex_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_1_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_1_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone_2_address_21'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_2_address_21',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax_1_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax_1_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax_2_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax_2_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_1',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_3'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_3',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'website_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'website_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'logo'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'logo'); ?>
                        <?php if ($model->logo):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/audios/'.$model->logo.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/audios/'.$model->logo.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'image'); ?>
                        <?php if ($model->image):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/audios/'.$model->image.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/audios/'.$model->image.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                    </div>
                </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','News'); ?>
                    </label>
                    <div class="controls">
                        <select name="TrainingCenterNews[]" id="s2_9" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); News::getTree($cats);
                            $selected = $model->getTrainingCenterNewsId();
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

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Articles'); ?>
                    </label>
                    <div class="controls">
                        <select name="TrainingCenterArticles[]" id="s2_1" multiple="multiple" class="span10"  >
                            <?php
                            $cats = array(); Products::getTree($cats);
                            $selected = $model->getTrainingCenterArticlesId();
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

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Hearing Tv'); ?>
                    </label>
                    <div class="controls">
                        <select name="TrainingCenterHearingTv[]" id="s2_4" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Videos::getTree($cats);
                            $selected = $model->getTrainingCenterHearingTvId();
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

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Events'); ?>
                    </label>
                    <div class="controls">
                        <select name="TrainingCenterEvents[]" id="s2_6" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Events::getTree($cats);
                            $selected = $model->getTrainingCenterEventsId();
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

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Speech Therapists'); ?>
                    </label>
                    <div class="controls">
                        <select name="TrainingCenterSpeechTherapists[]" id="s2_5" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpeechTherapist::getTree($cats);
                            $selected = $model->getTrainingCenterSpeechTherapistId();
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