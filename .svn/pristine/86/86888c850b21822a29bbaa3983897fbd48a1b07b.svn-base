
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1>View <small>
       <small><?php echo Yii::t('global', 'Press'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Press'); ?> </h2>
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
                    //array('name'=>'id'),
                    array('name'=>'name'),
                    array('name'=>'corporate_name'),
                    array('name'=>'newspaper_title', 'value'=>Press::model()->getNewspapersTitle($model->id) ,'type'=>'raw'),
                    array('name'=>'advertisers', 'value'=>Press::model()->getStatusPress( $model->advertisers ), 'type'=>'raw' ),
                    array('name'=>'description','type'=>'html'),
                    array('name'=>'image', 'value'=>$model->showAdminImage(), 'type'=>'raw' ),
                    array('name'=>'address'),
                    array('name'=>'additional_address'),
                    array('name'=>'city'),
                    array('name'=>'zip'),
                    array('name'=>'po_box'),
                    array('name'=>'zip_cedex'),
                    array('name'=>'city_cedex'),
                    array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw'),
                    array('name'=>'phone'),
                    array('name'=>'fax'),
                    array('name'=>'email'),
                    array('name'=>'website'),
                    array('name'=>'phone_2'),
                    array('name'=>'email_2'),
                    array('name'=>'website_2'),
                    //array('name'=>'delFlg'),
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