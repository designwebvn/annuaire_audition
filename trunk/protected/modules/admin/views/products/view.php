
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Articles'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Articles'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('articles/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                    array('name'=>'name'),
                    array('name'=>'category', 'header'=>Yii::t('global', 'Category'), 'value'=>Products::getProductCategory($model->id ),'type'=>'raw'),
                    array('name'=>'type' ,'value'=> Products::getTypeProduct($model->type)),
                    array('name'=>'image', 'value'=>Products::showAdminImageNew($model->image), 'type'=>'raw'),
                    array('name'=>'pdf', 'type'=>'raw', 'value'=>CHtml::link(CHtml::encode($model->pdf), Yii::app()->baseUrl . '/uploads/product/pdf/'.$model->pdf) ),
                    array('name'=>'grip', 'type'=>'html'),
                    array('name'=>'description' ,'type'=>'html'),
                    array('name'=>'oder_product_id', 'value'=>Products::getProductOthers( $model->id ), 'type'=>'raw'),
                    array('name'=>'is_home', 'value'=> Products::getStatusProduct($model->is_home) ),
                    array('name'=>Yii::t('supplierProducts','Hearing Care Centers'), 'value'=>Products::getProductsCenters($model->id) ,'type'=>'raw'),
                    array('name'=>Yii::t('supplierProducts','Speech Therapists'), 'value'=>Products::getProductsSpeechTherapists($model->id) ,'type'=>'raw'),
                    array('name'=>Yii::t('supplierProducts','Special Education Schools'), 'value'=>Products::getProductsSpecialEducationSchools($model->id) ,'type'=>'raw'),
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
                    $pdf = new ProductGalleries();
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