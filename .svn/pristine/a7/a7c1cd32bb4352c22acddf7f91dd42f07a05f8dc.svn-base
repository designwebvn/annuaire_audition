
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Agencies'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Agencies'); ?> </h2>
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
                        //array('name'=>'type', 'value'=>Agencies::getStatus( $model->type ), 'type'=>'raw'),
                        array('name'=>'type', 'value'=>$model->type0->name, 'type'=>'raw'),
                        array('name'=>'department', 'value'=>$model->department0->name, 'type'=>'raw'),
                        array('name'=>'legal_status', 'value'=>Agencies::getStatus( $model->legal_status ), 'type'=>'raw'),
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
                        array('name'=>'grip'),
                        array('name'=>'description'),
                        array('name'=>'description_2'),
                        array('name'=>'publishing', 'value'=>Agencies::getStatus( $model->publishing ), 'type'=>'raw'),
                        array('name'=>'website'),
                        array('name'=>'website_2'),
                        array('name'=>'email'),
                        array('name'=>'address_2'),
                        array('name'=>'additional_address_2'),
                        array('name'=>'city_2'),
                        array('name'=>'zip_2'),
                        array('name'=>'country_2', 'value'=>Countries::model()->getCountryById( $model->country_2 ), 'type'=>'raw'),
                        array('name'=>'po_box_cedex_2'),
                        array('name'=>'city_cedex_2'),
                        array('name'=>'fax_2'),
                        array('name'=>'image', 'value'=>Agencies::showAdminImageNew( $model->image ), 'type'=>'raw'),
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