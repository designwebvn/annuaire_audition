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
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','News'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'news-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                ));
            $this->widget('widgets.admin.notifications');
            ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'title'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'News[description]', 'value' => isset($model->description) ? $model->description : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'grip'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'News[grip]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'basic' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'image'); ?>
                        <?php echo $form->error($model,'image'); ?>
                        <?php if ($model->image):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/news/'.$model->image.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/news/'.$model->image.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                     </div>
                </div>

            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo Yii::t('global','Photos'); ?>
                </label>
                <div class="controls">
                    <?php if ($model->id):?>
                        <div class="block-fluid table-sorting">

                            <?php
                            $gallery=new NewsGalleries();
                            $gallery->unsetAttributes();  // clear any default values
                            $gallery->attributes=$_GET['NewsGalleries'];
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'product-galleries-grid',
                                'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                                'dataProvider'=>$gallery->search($model->id),
                                'columns'=>array(
                                    array(
                                        'name'=>'filename',
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
                                url : '<?php echo $this->createUrl('news/upload/')?>', // server uploader
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

                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'category_id'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listCategories  = CHtml::listData(NewsCategorys::model()->findAll('parent_id != 0'),'id','name');
                        echo $form->dropDownList($model,'category_id', $listCategories);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'pdf'); ?>
</label>
                    <div class="controls">
                        <?php
                        echo $form->fileField($model,'pdf');

                        $lenghtNum = 20;
                        $pdfLeght 	= strlen($model->pdf);
                        if($pdfLeght>$lenghtNum){
                            $pdfStart 	= $pdfLeght - $lenghtNum;
                            $pdfName 	= substr( $model->pdf , $pdfStart, $lenghtNum);
                            $pdfName 	= '... '.$pdfName;
                        }
                        else{
                            $pdfName = $model->pdf;
                        }

                        if($model->pdf):
                            echo "<a style='padding-left:20px;color:#616161;' href='/uploads/news/pdf/".$model->pdf."' >".$pdfName."</a>";
                        endif;
                        ?>
                    </div>
                </div>

           <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'external_link'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'external_link',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'video'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'is_active'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->checkBox($model,'is_active'); ?>
                </div>
            </div>

            <fieldset class="fieldset_modules">
                <legend><?php echo Yii::t('global','Modules'); ?></legend>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Hearing Care Centers'); ?>
                    </label>
                    <div class="controls">
                        <select name="NewsHearingCareCenters[]" id="s2_5" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); Centers::getTree($cats);
                            $selected = $model->getNewsCentersId();
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
                    <label for="fullname" class="control-label"><?php echo Yii::t('supplierProducts','Special Education Schools'); ?>
                    </label>
                    <div class="controls">
                        <select name="NewsSpecialEducationSchools[]" id="s2_3" multiple="multiple" class="span10 validate[required]" >
                            <?php
                            $cats = array(); SpecialEducationSchools::getTree($cats);
                            $selected = $model->getNewsSpecialEducationSchoolsId();
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