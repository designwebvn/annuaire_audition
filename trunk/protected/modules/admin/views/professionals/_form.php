
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Professionals'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'professionals-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
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
                        <?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'title'); ?>
</label>
                    <div class="controls">
                        <?php
                        $titleCommon = Utils::getTitleCommon();
                        echo $form->dropDownList( $model, 'title', $titleCommon); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
            <!--<div class="control-group">
                <label for="fullname" class="control-label">
                    <label class="required" for="Professionals_centers"> <?php /*echo Yii::t('global','Centers'); */?> </label>
                </label>
                <div class="controls">
                    <select name="ProfessionalCenters[]" id="s2_2" multiple="multiple" class="span10 validate[required]" >
                        <?php
/*                        $cats = array(); Centers::getTree($cats);
                        $selected = $model->getCategoriesId();
                        foreach ($cats as $cat_id=>$cat){
                            echo '<optgroup  label="">';
                            if( isset( $cat ) )
                                echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['corporate_name'].'</option>';
                            echo '</optgroup>';
                        }
                        */?>
                    </select>
                </div>
            </div>-->
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'training_center'); ?>
</label>
                    <div class="controls">
                        <?php
                        $training_center  = CHtml::listData(TrainingCenters::model()->with('trainingCentersTypes')->findAll('trainingCentersTypes.type_training_id = 2'),'id','school_name');
                        echo $form->dropDownList($model,'training_center', $training_center); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'year_of_graduation'); ?>
</label>
                    <div class="controls">
                        <?php
                        /*$model->year_of_graduation = Utils::date_format24h($model->year_of_graduation, 1);
                        $this->widget('CJuiDateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'year_of_graduation',
                            'mode'=>'date',
                            'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                            'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                        )); */?>
                        <?php
                            $years = array();
                            for($i= 1945; $i<=2025; $i++){
                               $years[$i] = $i;
                            }
                        ?>
                        <?php echo $form->dropDownList($model,'year_of_graduation', $years ); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'profesionnal_de'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->checkBox($model,'profesionnal_de'); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_degree'); ?>
</label>
                    <div class="controls">
                        <?php //echo $form->textField($model,'additional_degree',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                        <?php //$this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Professionals[additional_degree]', 'value' => isset($model->additional_degree) ? $model->additional_degree : '', 'editorTemplate' => 'full' )); ?>
                        <select name="ProfessionalDegrees[]" id="s2_5" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Degrees::getTree($cats);
                            $selected = $model->getProfessionalDegreesId();
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
                          <!--  <div class="control-group">
                    <label for="fullname" class="control-label"><?php /*echo $form->labelEx($model,'link_professional_product'); */?>
</label>
                    <div class="controls">
                        <select name="LinkProfessional[]" id="s2_1" multiple="multiple" class="span10"  >
                            <?php
/*                            $cats = array(); Products::getTree($cats);
                            $selected = $model->getIdProfessionalsArticles();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['name'].'</option>';
                                echo '</optgroup>';
                            }
                            */?>
                        </select>
                    </div>
                </div>-->
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'link_essay'); ?>
</label>
                    <div class="controls">
                        <select name="LinkEssay[]" id="s2_3" multiple="multiple" class="span10"  >
                            <?php
                            $cats = array(); MemoriesStudy::getTree($cats);
                            $selected = $model->getIdMemoriesStudy();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['title'].'</option>';
                                echo '</optgroup>';
                            }
                            ?>
                        </select>
                        <?php //$this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Professionals[link_essay]', 'value' => isset($model->link_essay) ? $model->link_essay : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Articles'); ?>
                    </label>
                    <div class="controls">
                        <select name="LinkProfessional[]" id="s2_1" multiple="multiple" class="span10"  >
                            <?php
                            $cats = array(); Products::getTree($cats);
                            $selected = $model->getIdProfessionalsArticles();
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
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Hearing Care Centers'); ?>
                    </label>
                    <div class="controls">
                        <select name="ProfessionalCenters[]" id="s2_2" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Centers::getTree($cats);
                            $selected = $model->getCategoriesId();
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
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','Training Centers'); ?>
                    </label>
                    <div class="controls">
                        <select name="ProfessionalTrainingCenters[]" id="s2_4" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); TrainingCenters::getTree($cats);
                            $selected = $model->getProfessionalTrainingCentersId();
                            foreach ($cats as $cat_id=>$cat){
                                echo '<optgroup  label="">';
                                if( isset( $cat ) )
                                    echo '<option value="'.$cat_id.'"'.(in_array($cat_id, $selected)?' selected="selected"':'').'>'.$cat['school_name'].'</option>';
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
                        <select name="ProfessionalSpecialEducationSchools[]" id="s2_6" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpecialEducationSchools::getTree($cats);
                            $selected = $model->getProfessionalSpecialEducationSchoolsId();
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
                        <select name="ProfessionalAgencies[]" id="s2_9" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Agencies::getTree($cats);
                            $selected = $model->getProfessionalAgenciesId();
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
                <?php
                $model1 = new ContactBox();
                if( $model->id ){
                    $id_form    = ($model->id)?$model->id:0;
                    $id         = ContactBox::model()->getIdContactBox( Yii::app()->user->id, $id_form, Suppliers::SUPPLIERS );
                    $model_new  = ContactBox::model()->findByPk( $id );
                    $model1     = ( $model_new )?$model_new : $model1;
                }
                ?>
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