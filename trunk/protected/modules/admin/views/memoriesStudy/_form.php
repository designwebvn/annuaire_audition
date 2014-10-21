
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','memories-study'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'memories-study-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'title'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'grip'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'MemoriesStudy[grip]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'full' )); ?>
                        <?php //echo $form->textArea($model,'grip',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'date'); ?>
</label>
                    <div class="controls">
                        <?php
                        $years = array();
                        for($i= 1945; $i<=2025; $i++){
                            $years[$i] = $i;
                        }
                        ?>
                        <?php echo $form->dropDownList($model,'date',$years); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'pdf_file'); ?>
</label>
                    <div class="controls">
                        <?php
                        echo $form->fileField($model,'pdf_file');

                        $lenghtNum = 20;
                        $pdfLeght 	= strlen($model->pdf_file);
                        if($pdfLeght>$lenghtNum){
                            $pdfStart 	= $pdfLeght - $lenghtNum;
                            $pdfName 	= substr( $model->pdf_file , $pdfStart, $lenghtNum);
                            $pdfName 	= '... '.$pdfName;
                        }
                        else{
                            $pdfName = $model->pdf_file;
                        }

                        if($model->pdf_file):
                            echo "<a style='padding-left:20px;color:#616161;' href='/uploads/memories/".$model->pdf_file."' >".$pdfName."</a>";
                        endif;
                        ?>
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