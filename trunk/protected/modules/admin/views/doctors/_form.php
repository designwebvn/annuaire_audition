
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Doctors'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'doctors-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'title'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model, 'title', array('Professor'=>Yii::t('global','Professor'), 'Doctor'=> Yii::t('global', 'Doctor') )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'first_name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'department'); ?>
                </label>
                <div class="controls">
                    <?php
                    $departments = CHtml::listData( Maps::model()->findAll(),'id','name' );
                    echo $form->dropDownList( $model,'department', $departments );
                    ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'ent'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList( $model,'ent', Utils::getStatusCommon() ); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phoniatricians'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'phoniatricians', Utils::getStatusCommon()); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'free_field'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'free_field',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'degree'); ?>
                    </label>
                    <div class="controls">
                        <select name="DoctorDegrees[]" id="s2_3" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats       = array(); Degrees::getTree($cats);
                            $selected   = $model->getDoctorDegreesId();
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
                            <!--<div class="control-group">
                    <label for="fullname" class="control-label"><?php /*echo $form->labelEx($model,'degrees'); */?>
</label>
                    <div class="controls">
                        <?php /*echo $form->textField($model,'degrees',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); */?>
                        <?php /*//$this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Doctors[degrees]', 'value' => isset($model->degrees) ? $model->degrees : '', 'editorTemplate' => 'full' )); */?>
                    </div>
                </div>-->
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'status_grade'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList( $model,'status_grade', Lookup::model()->items('StatusGrade'),array('prompt'=>'') ); ?>
                        <?php //$this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Doctors[status_grade]', 'value' => isset($model->status_grade) ? $model->status_grade : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'specialty'); ?>
</label>
                    <div class="controls">
                        <?php
                            //$specialty = CHtml::listData( Services::model()->findAll(),'id','name' );
                            echo $form->textField( $model, 'specialty', array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true') );
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'audiometry'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'audiometry', Utils::getStatusCommon()); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'audiometry_ff'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'audiometry_ff',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phoniatry'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'phoniatry', Utils::getStatusCommon()); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phoniatry_ff'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phoniatry_ff',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'speech_therapy'); ?>
</label>
                    <div class="controls">
                        <?php
                            //$speech_therapy = CHtml::listData( SpeechTherapist::model()->findAll(),'id','name' );
                            echo $form->dropDownList( $model,'speech_therapy', Utils::getStatusCommon() );
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'speech_therapy_ff'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'speech_therapy_ff',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'specific_phone_number'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'specific_phone_number',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'specific_fax'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'specific_fax',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Articles'); ?>
                    </label>
                    <div class="controls">
                        <select name="DoctorArticles[]" id="s2_1" multiple="multiple" class="span10"  >
                            <?php
                            $cats = array(); Products::getTree($cats);
                            $selected = $model->getDoctorArticlesId();
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
                        <select name="DoctorHearingTv[]" id="s2_4" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Videos::getTree($cats);
                            $selected = $model->getDoctorHearingTvId();
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
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Special Education Schools'); ?>
                    </label>
                    <div class="controls">
                        <select name="DoctorSpecialEducationSchools[]" id="s2_6" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpecialEducationSchools::getTree($cats);
                            $selected = $model->getDoctorSpecialEducationSchoolsId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['corporate_name'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Agencies'); ?>
                    </label>
                    <div class="controls">
                        <select name="DoctorAgencies[]" id="s2_9" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Agencies::getTree($cats);
                            $selected = $model->getDoctorAgenciesId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['corporate_name'].'</option>';
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