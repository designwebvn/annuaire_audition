
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'SpecialEducationSchools'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'SpecialEducationSchools'); ?> </h2>
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
                            array('name'=>'advertiser', 'value'=>SpecialEducationSchools::model()->getStatus($model->advertiser), 'type'=>'raw'),
                            array('name'=>'typology'),
                            array('name'=>'status'),
                            array('name'=>'overall_capacity'),
                            array('name'=>'management'),
                            array('name'=>'deafnesses'),
                            array('name'=>'structures'),
                            array('name'=>'language_communication'),
                            array('name'=>'support'),
                            array('name'=>'paramedical_care'),
                            array('name'=>'medical_care'),
                            array('name'=>'specific_monitoring'),
                            array('name'=>'special_free_field'),
                            array('name'=>'cochlear_implant'),
                            array('name'=>'grades_of_teaching'),
                            array('name'=>'integration_mechanisms_1'),
                            array('name'=>'integration_mechanisms_2'),
                            array('name'=>'specialized_monitoring'),
                            array('name'=>'fp'),
                            array('name'=>'chains'),
                            array('name'=>'branch'),
                            array('name'=>'grip'),
                            array('name'=>'description','type'=>'raw'),
                            array('name'=>'address'),
                            array('name'=>'additional_address'),
                            array('name'=>'city'),
                            array('name'=>'zip'),
                            array('name'=>'country','value'=>Countries::model()->getCountryById( $model->country ), 'type'=>'raw'),
                            array('name'=>'po_box'),
                            array('name'=>'city_cedex'),
                            array('name'=>'zip_cedex'),
                            array('name'=>'phone_1'),
                            array('name'=>'phone_2'),
                            array('name'=>'fax'),
                            array('name'=>'email_1'),
                            array('name'=>'email_2'),
                            array('name'=>'website', 'value'=>CHtml::link($model->website,$model->website, array('target'=>'_blank') ), 'type'=>'raw' ),
                            array('name'=>'website_2', 'value'=>CHtml::link($model->website_2,$model->website_2, array('target'=>'_blank') ), 'type'=>'raw'),
                            array('name'=>'logo', 'value'=>SpecialEducationSchools::showAdminImageNew( $model->logo ), 'type'=>'raw'),
                            array('name'=>'pics', 'value'=>SpecialEducationSchools::showAdminImageNew( $model->pics ), 'type'=>'raw'),
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