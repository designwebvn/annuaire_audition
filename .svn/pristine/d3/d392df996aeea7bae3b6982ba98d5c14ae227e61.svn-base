
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Suppliers'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Suppliers'); ?> </h2>
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
                        array('name'=>'corporate_name'),
                        array('name'=>'corporate_name_2'),
                        array('name'=>'legal_status'),
                        array('name'=>'logo', 'value'=>Suppliers::showAdminImageNew( $model->logo ), 'type'=>'raw' ),
                        array('name'=>'advertiser','value'=>Suppliers::getStatus($model->advertiser), 'type'=>'raw' ),
                        array('name'=>'type'),
                        array('name'=>'grip_ent'),
                        array('name'=>'description_ent_1'),
                        array('name'=>'description_ent_2'),
                        array('name'=>'description_ent_3'),
                        array('name'=>'grip_hearing_aids'),
                        array('name'=>'description_hearing_aids_1'),
                        array('name'=>'description_hearing_aids_2'),
                        array('name'=>'description_hearing_aids_3'),
                        array('name'=>'address_1'),
                        array('name'=>'additional_address'),
                        array('name'=>'additional_address_2'),
                        array('name'=>'city_1'),
                        array('name'=>'zip_1'),
                        array('name'=>'po_box'),
                        array('name'=>'zip_cedex_cp_cedex'),
                        array('name'=>'city_cedex'),
                        array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw'),
                        array('name'=>'phone'),
                        array('name'=>'phone_2'),
                        array('name'=>'fax'),
                        array('name'=>'fax_2'),
                        array('name'=>'email_1'),
                        array('name'=>'email_2'),
                        array('name'=>'address_2'),
                        array('name'=>'address_2_additional'),
                        array('name'=>'address_2_additional_2'),
                        array('name'=>'zip'),
                        array('name'=>'city_2'),
                        array('name'=>'zip_2'),
                        array('name'=>'website'),
                        array('name'=>'website_2'),
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
                    $pdf = new SupplierPdf();
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pdf-files-grid',
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
                                'value'=>'Suppliers::model()->showAdminPdf($data->list_file)',
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