
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'TrainingCenters'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'TrainingCenters'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('trainingCenters/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                        array('name'=>'school_name'),
                        array('name'=>'school_name_2'),
                        array('name'=>'advertiser', 'value'=>TrainingCenters::model()->getStatusTrainingCenters( $model->advertiser ), 'type'=>'raw'),
                        array('name'=>Yii::t('global','Category') , 'value'=>TrainingCenters::model()->getListTrainingCenterType($model->id), 'type'=>'raw'),
                        array('name'=>'degree', 'value'=>TrainingCenters::model()->getListTrainingCenterDegrees($model->id), 'type'=>'raw'),
                        array('name'=>'description_1', 'type'=>'raw'),
                        array('name'=>'description_2', 'type'=>'raw'),
                        array('name'=>'address_1'),
                        array('name'=>'additional_address_1'),
                        array('name'=>'additional_address_2'),
                        array('name'=>'city_1'),
                        array('name'=>'country_1'),
                        array('name'=>'po_box_1'),
                        array('name'=>'po_box_zip_1'),
                        array('name'=>'zip_cedex_1'),
                        array('name'=>'city_cedex_1'),
                        array('name'=>'phone_1_address_1'),
                        array('name'=>'phone_2_address_2'),
                        array('name'=>'fax_address_1'),
                        array('name'=>'fax_address_2'),
                        array('name'=>'address_2'),
                        array('name'=>'additional_address_bis_1'),
                        array('name'=>'additional_address_bis_2'),
                        array('name'=>'city_2'),
                        array('name'=>'country_2'),
                        array('name'=>'zip_2'),
                        array('name'=>'po_box_2'),
                        array('name'=>'zip_cedex_2'),
                        array('name'=>'city_cedex_2'),
                        array('name'=>'phone_1_address_2'),
                        array('name'=>'phone_2_address_21'),
                        array('name'=>'fax_1_address_2'),
                        array('name'=>'fax_2_address_2'),
                        array('name'=>'email_1'),
                        array('name'=>'email_2'),
                        array('name'=>'email_3'),
                        array('name'=>'website'),
                        array('name'=>'website_2'),
                        array('name'=>'logo', 'value'=>TrainingCenters::showAdminImageNew( $model->logo ), 'type'=>'raw'),
                        array('name'=>'image', 'value'=>TrainingCenters::showAdminImageNew( $model->image ), 'type'=>'raw'),
                        array('name'=>Yii::t('supplierProducts','News'), 'value'=>TrainingCenters::model()->getTrainingCenterNews($model->id), 'type'=>'raw'),
                        array('name'=>Yii::t('events','Articles'), 'value'=>TrainingCenters::model()->getTrainingCenterArticles($model->id), 'type'=>'raw'),
                        array('name'=>Yii::t('events','Hearing Tv'), 'value'=>TrainingCenters::model()->getTrainingCenterHearingTv($model->id), 'type'=>'raw'),
                        array('name'=>Yii::t('events','Events'), 'value'=>TrainingCenters::model()->getTrainingCenterEvents($model->id), 'type'=>'raw'),
                        array('name'=>Yii::t('supplierProducts','Speech Therapists'), 'value'=>TrainingCenters::model()->getTrainingCenterSpeechTherapist($model->id), 'type'=>'raw'),
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