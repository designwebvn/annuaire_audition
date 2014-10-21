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
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Chips'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'chips-form',
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
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->fileField($model,'image'); ?>
                    <?php echo $form->error($model,'image'); ?>
                    <?php if ($model->image):?>
                        <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/chips/'.$model->image.'"'?> rel="group">
                                <img class="img-polaroid" <?php echo 'src="/uploads/chips/'.$model->image.'"'?> style="height: 65px;"/>
                            </a></div>
                    <?php endif;?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'range_id'); ?>
</label>
                    <div class="controls">
                        <?php $ranges = Ranges::model()->findAll();
                        foreach ($ranges as $key=>$name){
                            $range_name1[$name['id']] =  $name['name'];
                        } ?>


                        <?php echo $form->dropDownList($model,'range_id',$range_name1); ?>
                        <?php //echo $form->textField($model,'range_id', array('class'=>'span10')); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo Yii::t('global','Pdf Files'); ?>
                </label>
                <div class="controls">
                    <?php if ($model->id):?>
                        <div class="block-fluid table-sorting">

                            <?php
                            $gallery=new SupplierProductsPdf();
                            $gallery->unsetAttributes();  // clear any default values
                            $_GET['ProductGalleries']['product_id'] = $model->id;
                            $gallery->attributes=$_GET['ProductGalleries'];
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'product-galleries-grid',
                                'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                                'dataProvider'=>$gallery->search($model->id),
                                'columns'=>array(
                                    array(
                                        'name'=>'list_file',
                                        'header'=>Yii::t('global', 'Uploaded pdf'),
                                        'value' => '$data->list_file',
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
                                url : '<?php echo $this->createUrl('chips/upload/')?>', // server uploader
                                max_file_size : '6mb',
                                chunk_size : '6mb',
                                unique_names : true,
                                dragdrop : true,
                                //resize : {width : 320, height : 240, quality : 100},
                                filters : [
                                    {title : "Pdf files", extensions : "pdf"}
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