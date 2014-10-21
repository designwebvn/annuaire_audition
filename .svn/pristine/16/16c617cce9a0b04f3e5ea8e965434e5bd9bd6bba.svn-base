
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Centers'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Centers'); ?> </h2>
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
                            array('name'=>'status', 'value'=>Centers::model()->getStatusCenters( $model->status ), 'type'=>'raw'),
                            array('name'=>'corporate_name_2'),
                            array('name'=>'advertiser', 'value'=>Centers::model()->getStatusCenters( $model->advertiser ), 'type'=>'raw'),
                            array('name'=>'categories','value'=>$model->centersCategory0->name, 'type'=>'raw'),
                            array('name'=>'networks','value'=>$model->networks0->corporate_name, 'type'=>'raw'),
                            array('name'=>'sign'),
                            array('name'=>'purchase_center'),
                            array('name'=>'address'),
                            array('name'=>'additional_address'),
                            array('name'=>'po_box'),
                            array('name'=>'zip_cedex'),
                            array('name'=>'city_cedex'),
                            array('name'=>'city'),
                            array('name'=>'zip'),
                            array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw'),
                            array('name'=>'phone'),
                            array('name'=>'phone_2'),
                            array('name'=>'fax'),
                            array('name'=>'fax_2'),
                            array('name'=>'email'),
                            array('name'=>'email_2'),
                            array('name'=>'email_3'),
                            array('name'=>'website'),
                            array('name'=>'website_2'),
                            array('name'=>'grip'),
                            array('name'=>'description'),
                            array('name'=>'opening_hours'),
                            array('name'=>'image', 'value'=>TrainingCenters::showAdminImageNew( $model->image ), 'type'=>'raw'),
                            array('name'=>'logo', 'value'=>TrainingCenters::showAdminImageNew( $model->logo ), 'type'=>'raw'),
                            array('name'=>'note','type'=>'raw'),
                            array('name'=>'created'),
                            array('name'=>'updated'),
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