
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'SupplierProducts'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'SupplierProducts'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
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
                        array('name'=>'name_supplier', 'value'=>$model->supplier->corporate_name, 'type'=>'raw'),
                        array('name'=>'is_activity', 'value'=>SupplierProducts::getStatus($model->is_activity),'type'=>'raw'),
                        array('name'=>'is_brand', 'value'=>SupplierProducts::getStatus($model->is_brand),'type'=>'raw'),
                        array('name'=>'Reference'),
                        array('name'=>'description','type'=>'raw'),
                        array('name'=>'is_new_product', 'value'=>SupplierProducts::getStatus($model->is_new_product),'type'=>'raw'),
                        array('name'=>'is_best_sale', 'value'=>SupplierProducts::getStatus($model->is_best_sale),'type'=>'raw'),
                        array('name'=>'is_promotion', 'value'=>SupplierProducts::getStatus($model->is_promotion),'type'=>'raw'),
                        array('name'=>'is_highlighted', 'value'=>SupplierProducts::getStatus($model->is_highlighted),'type'=>'raw'),
                        array('name'=>'is_disable_hightlight', 'value'=>SupplierProducts::getStatus($model->is_disable_hightlight),'type'=>'raw'),
                        array('name'=>'chip_id','value'=>$model->chip->name, 'type'=>'raw'),
                        array('name'=>'link_hearingtv', 'value'=>CHtml::link(CHtml::encode($model->link_hearingtv),$model->link_hearingtv) ,'type'=>'raw'),
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
                <h2><?php echo Yii::t('global', 'Image Files'); ?> </h2>
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
                    $pdf = new SupplierProductsFile();
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
                                'name'=>'list_file',
                                'value'=>'$data->showAdminImage()',
                                'type'=>'raw',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'created',
                                'filter'=>'',
                                'type'=>'raw',
                            )

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
                <h2><?php echo Yii::t('global', 'Pdf Files'); ?> </h2>
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
                    $pdf = new SupplierProductsFile();
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pdf-files-grid',
                        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                        'dataProvider'=>$pdf->search( $model->id, SupplierProductsFile::TYPE_PDF ),
                        'filter'=>$pdf,
                        'columns'=>array(
                            array(
                                'name'=>'id',
                                'value'=>'$data->id',
                                'filter'=>'',
                                'htmlOptions'=>array('style'=>'width:35px;')
                            ),
                            array(
                                'name'=>'list_file',
                                'value'=>'SupplierProductsFile::model()->showAdminPdf($data->list_file)',
                                'type'=>'raw',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'created',
                                'filter'=>'',
                                'type'=>'raw',
                            )

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