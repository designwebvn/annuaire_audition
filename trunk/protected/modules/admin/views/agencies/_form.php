<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.gears.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.silverlight.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.flash.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.browserplus.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.html5.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/plupload.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js' ); ?>
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','AGENCIES'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'agencies-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                        'enctype' => 'multipart/form-data',
                        'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'corporate_name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'corporate_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'corporate_name_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'corporate_name_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'type'); ?>
</label>
                    <div class="controls">
                        <?php
                        $type = CHtml::listData( AgenciesCategory::model()->findAll(),'id','name' );
                        echo $form->dropDownList($model,'type', $type ); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'legal_status'); ?>
</label>
                    <div class="controls">
                        <?php
                        //$legal_status = Utils::getStatusCommon();
                        echo $form->textField($model,'legal_status',array('size'=>60,'maxlength'=>150, 'class'=>'span10') ); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'advertisers'); ?>
</label>
                    <div class="controls">
                        <?php
                        $advertisers = Utils::getStatusCommon();
                        echo $form->dropDownList($model,'advertisers', $advertisers ); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'logo'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->fileField($model,'logo'); ?>
                    <?php echo $form->error($model,'logo'); ?>
                    <?php if ($model->logo):?>
                        <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/agencies/'.$model->logo.'"'?> rel="group">
                                <img class="img-polaroid" <?php echo 'src="/uploads/agencies/'.$model->logo.'"'?> style="height: 65px;"/>
                            </a></div>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'service'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'service',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address_id'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'address_id',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'additional_address',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
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
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zip_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_cedex'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_cedex',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email_1'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_1',array('size'=>60,'maxlength'=>150, 'class'=>'span10', 'data-required'=>'true')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'grip'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Agencies[grip]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'basic' )); ?>
                        <?php //echo $form->textField($model,'grip',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Agencies[description]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'full' )); ?>
                        <?php //echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description_2'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Agencies[description_2]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'full' )); ?>
                        <?php //echo $form->textField($model,'description_2',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'publishing'); ?>
</label>
                    <div class="controls">
                        <?php
                        //$publishing = Utils::getStatusCommon();
                        echo $form->textField($model,'publishing', array('size'=>60,'maxlength'=>150, 'class'=>'span10') ); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'additional_address_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'additional_address_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'city_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'country_2'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listCountry2  = CHtml::listData(Countries::model()->findAll('is_active = 0'),'id','short_name');
                        echo $form->dropDownList($model,'country_2', $listCountry2);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'po_box_cedex_2'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'po_box_cedex_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'tel_1'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'tel_1',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'tel_2'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->textField($model,'tel_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax_2'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fax_2',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                    </div>
                </div>
                           <!-- <div class="control-group">
                    <label for="fullname" class="control-label"><?php /*echo $form->labelEx($model,'image'); */?>
</label>
                    <div class="controls">
                        <?php /*echo $form->fileField($model,'image'); */?>
                        <?php /*echo $form->error($model,'image'); */?>
                        <?php /*if ($model->image):*/?>
                            <div style="margin:10px;"><a class="fancybox" <?php /*echo 'href="/uploads/agencies/'.$model->image.'"'*/?> rel="group">
                                    <img class="img-polaroid" <?php /*echo 'src="/uploads/agencies/'.$model->image.'"'*/?> style="height: 65px;"/>
                                </a></div>
                        <?php /*endif;*/?>
                    </div>
                </div>-->
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
                </label>
                <div class="controls">
                    <?php if ($model->id):?>
                        <div class="block-fluid table-sorting">

                            <?php
                            $gallery=new AgenciesGallery();
                            $gallery->unsetAttributes();  // clear any default values
                            $gallery->attributes=$_GET['AgenciesGalleries'];
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'image-agencies-galleries-grid',
                                'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                                'dataProvider'=>$gallery->search($model->id),
                                'columns'=>array(
                                    array(
                                        'name'=>'list_file',
                                        'header'=>Yii::t('global', 'Uploaded Image'),
                                        'value' => '$data->showImage()',
                                        'type' => 'html'
                                    ),
                                    array(
                                        'class'=>'CButtonColumn',
                                        'template'=>'{delete}',
                                        'buttons'=>array(
                                            'delete'=>array(
                                                'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete').'"></i></span>',
                                                'options' => array( 'class' => 'tipb delete-icon-tooltip',
                                                    'data-original-title' => Yii::t('adminlang', 'Delete'),
                                                    'title'       => Yii::t('adminlang', 'Delete') , ),

                                            ),
                                        ),
                                    ),
                                ),
                            )); ?>
                        </div>
                    <?php endif;?>
                    <div id="uploader"><center><?php echo Yii::t('global','Browser don\'t support a HTML5') ?></center></div>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            var uploader = $("#uploader").pluploadQueue({
                                runtimes : 'html5', // html5 uploader
                                url : '<?php echo $this->createUrl('agencies/upload/')?>', // server uploader
                                max_file_size : '6mb',
                                chunk_size : '6mb',
                                unique_names : true,
                                dragdrop : true,
                                //resize : {width : 320, height : 240, quality : 100},
                                filters : [
                                    {title : "Image files", extensions : "jpg,gif,png"}
                                ]
                                ,
                                init : {
                                    FilesAdded: function(up, files) {
                                        up.start();
                                    },
                                    UploadComplete: function(up, files) {
                                    }
                                }
                            });

                        });
                    </script>
                </div>
            </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('events','News'); ?>
                    </label>
                    <div class="controls">
                        <select name="AgenciesNews[]" id="s2_7" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); News::getTree($cats);
                            $selected = $model->getAgenciesNewsId();
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
                        <select name="AgenciesArticles[]" id="s2_1" multiple="multiple" class="span10"  >
                            <?php
                            $cats = array(); Products::getTree($cats);
                            $selected = $model->getAgenciesArticlesId();
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
                        <select name="AgenciesHearingTv[]" id="s2_9" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Videos::getTree($cats);
                            $selected = $model->getAgenciesVideoId();
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
                        <select name="AgenciesEvents[]" id="s2_6" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Events::getTree($cats);
                            $selected = $model->getAgenciesEventsId();
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
                        <select name="AgenciesHearingCareCenters[]" id="s2_5" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Centers::getTree($cats);
                            $selected = $model->getAgenciesCentersId();
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
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Speech Therapists'); ?>
                    </label>
                    <div class="controls">
                        <select name="AgenciesSpeechTherapists[]" id="s2_3" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpeechTherapist::getTree($cats);
                            $selected = $model->getAgenciesSpeechTherapistId();
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