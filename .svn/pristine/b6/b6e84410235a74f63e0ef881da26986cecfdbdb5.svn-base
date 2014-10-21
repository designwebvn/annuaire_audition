
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'DirectoryOrders'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'DirectoryOrders'); ?> </h2>
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
                            array('name'=>'address'),
                            array('name'=>'city'),
                            array('name'=>'zip'),
                            array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw' ),
                            array('name'=>'is_receive', 'value'=> Press::getStatusPress( $model->is_receive ) , 'type'=>'raw' ),
                            array('name'=>'quanlity'),
                            array('name'=>'prices'),
                            array('name'=>'total'),
                            array('name'=>'check_number', 'value'=> Press::getStatusPress( $model->check_number ) , 'type'=>'raw'),
                            array('name'=>'value_check_number'),
                            array('name'=>'international_mandate', 'value'=> Press::getStatusPress( $model->international_mandate ) , 'type'=>'raw'),
                            array('name'=>'value_international_mandate'),
                            array('name'=>'transfer_to_ocep_edition', 'value'=> Press::getStatusPress( $model->transfer_to_ocep_edition ) , 'type'=>'raw' ),
                            array('name'=>'address_annuaire'),
                            array('name'=>'is_active', 'value'=> Press::getStatusPress( $model->is_active ) , 'type'=>'raw'),
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