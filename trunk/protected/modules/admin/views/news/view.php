
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1>View <small>
       <small><?php echo Yii::t('global', 'News'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'News'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('news/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
                        <div class="add-on add-on-middle add-on-mini minimizeTable "><i class="icon-caret-down"></i></div>
                        <div class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></div>
                    </div>
                </form>
            </div>
            <div class="floatingBox table table-view-user">
                <div class="container-fluid">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                    'htmlOptions' => array('class' => 'table-hover', 'style'=>'width:100% !important;'),
                    'data'=>$model,
                    'attributes'=>array(
                   // array('name'=>'id'),
                    array('name'=>'title'),
                    array('name'=>'description','type'=>'html'),
                    array('name'=>'grip','type'=>'html'),
                    array('name'=>'image', 'value'=>News::showAdminImageNew( $model->image ), 'type'=>'raw' ),
                    array('name'=>'category_id','value'=>News::getNewsCategory( $model->category_id ), 'type'=>'raw' ),
                    array('name'=>'pdf','value'=>CHtml::link(CHtml::encode($model->pdf), Yii::app()->baseUrl . '/uploads/news/pdf/'.$model->pdf),'type'=>'raw'),
                    array('name'=>'external_link','value'=>CHtml::link(CHtml::encode($model->external_link),$model->external_link) ,'type'=>'raw'),
                    array('name'=>'video','value'=>CHtml::link(CHtml::encode($model->video),$model->video) ,'type'=>'raw'),
                    array('name'=>'is_active','value'=>News::getStatusNews( $model->is_active )),
                    array('name'=>Yii::t('supplierProducts','Hearing Care Centers'), 'value'=>News::getNewsCenters($model->id) ,'type'=>'raw'),
                    array('name'=>Yii::t('supplierProducts','Special Education Schools'), 'value'=>News::getNewsSpecialEducationSchools($model->id) ,'type'=>'raw'),
                    array('name'=>'created'),
                    array('name'=>'updated'),
                    ),
                    )); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Photos'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <div class="add-on add-on-middle add-on-mini minimizeTable "><i class="icon-caret-down"></i></div>
                        <div class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></div>
                    </div>
                </form>
            </div>
            <div class="floatingBox table table-view-user">
                <div class="container-fluid">
                    <?php
                    $pdf = new NewsGalleries();
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'img-files-grid',
                        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                        'dataProvider'=>$pdf->search( $model->id ),
                        'filter'=>$pdf,
                        'columns'=>array(
                            array(
                                'name'=>'id',
                                'value'=>'$data->id',
                                'filter'=>'',
                                'htmlOptions'=>array('style'=>'width:35px;')
                            ),
                            array(
                                'name'=>'filename',
                                'value'=>'$data->showImage()',
                                'type'=>'raw',
                                'filter'=>'',
                            ),
                        ),
                    )); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content{
        font-size: 14px !important;
    }
</style>