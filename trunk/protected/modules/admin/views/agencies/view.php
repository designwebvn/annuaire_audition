
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'AGENCIES'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'AGENCIES'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('agencies/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                        //array('name'=>'type', 'value'=>Agencies::getStatus( $model->type ), 'type'=>'raw'),
                        array('name'=>'type', 'value'=>$model->type0->name, 'type'=>'raw'),
                        array('name'=>'department', 'value'=>$model->department0->name, 'type'=>'raw'),
                        array('name'=>'legal_status', 'type'=>'raw'),
                        array('name'=>'advertisers','value'=>Agencies::getStatus($model->advertisers), 'type'=>'raw'),
                        array('name'=>'logo', 'value'=>Agencies::showAdminImageNew( $model->logo ), 'type'=>'raw' ),
                        array('name'=>'service'),
                        array('name'=>'address_id'),
                        array('name'=>'address'),
                        array('name'=>'additional_address'),
                        array('name'=>'city'),
                        array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw'),
                        array('name'=>'zip'),
                        array('name'=>'po_box'),
                        array('name'=>'zip_cedex'),
                        array('name'=>'city_cedex'),
                        array('name'=>'phone'),
                        array('name'=>'phone_2'),
                        array('name'=>'fax'),
                        array('name'=>'email_1'),
                        array('name'=>'email_2'),
                        array('name'=>'email_3'),
                        array('name'=>'grip', 'type'=>'raw'),
                        array('name'=>'description', 'type'=>'raw'),
                        array('name'=>'description_2','type'=>'raw'),
                        array('name'=>'publishing', 'type'=>'raw'),
                        array('name'=>'website'),
                        array('name'=>'website_2'),
                        array('name'=>'email'),
                        array('name'=>'address_2'),
                        array('name'=>'additional_address_2'),
                        array('name'=>'city_2'),
                        array('name'=>'zip_2'),
                        array('name'=>'country_2', 'value'=>Countries::model()->getCountryById( $model->country_2 ), 'type'=>'raw'),
                        array('name'=>'po_box_cedex_2'),
                        array('name'=>'zip_cedex_2'),
                        array('name'=>'city_cedex_2'),
                        array('name'=>'tel_1'),
                        array('name'=>'tel_2'),
                        array('name'=>'fax_2'),
                        /*array('name'=>'image', 'value'=>Agencies::showAdminImageNew( $model->image ), 'type'=>'raw'),*/
                        array('name'=>Yii::t('supplierProducts','News'), 'value'=>Agencies::getAgenciesNews($model->id ),'type'=>'html'),
                        array('name'=>Yii::t('events','Articles'), 'value'=>Agencies::getAgenciesArticles($model->id ),'type'=>'html'),
                        array('name'=>Yii::t('events','Hearing Tv'), 'value'=>Agencies::getAgenciesVideo($model->id ),'type'=>'html'),
                        array('name'=>Yii::t('events','Events'), 'value'=>Agencies::getAgenciesEvents($model->id ),'type'=>'html'),
                        array('name'=>Yii::t('supplierProducts','Hearing Care Centers'), 'value'=>Agencies::getAgenciesCenters($model->id ),'type'=>'html'),
                        array('name'=>Yii::t('supplierProducts','Speech Therapists'), 'value'=>Agencies::getAgenciesSpeechTherapist($model->id ),'type'=>'html'),
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
                    $pdf = new AgenciesGallery();
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