
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'SpeechTherapist'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'SpeechTherapist'); ?> </h2>
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
                                array('name'=>'title'),
                                array('name'=>'name'),
                                array('name'=>'firstname'),
                                array('name'=>'department', 'value'=>$model->department0->name, 'type'=>'raw'),
                                array('name'=>'degrees','type'=>'html'),
                                array('name'=>'status_grade'),
                                array('name'=>'specialty_hospitals', 'value'=>Services::model()->getNameService( $model->specialty_hospitals ), 'type'=>'raw'),
                                array('name'=>'free_link', 'value'=>CHtml::link(CHtml::encode($model->free_link),$model->free_link) , 'type'=>'raw'),
                                array('name'=>'advertisers', 'value'=>SpeechTherapist::model()->getStatus( $model->advertisers ), 'type'=>'raw'),
                                array('name'=>'Private Practice', 'value'=>SpeechTherapist::model()->getSpeechTherapistPractice( $model->id ), 'type'=>'raw'),
                                array('name'=>'specialty_if_advertisers'),
                                array('name'=>'specialty'),
                                array('name'=>'phone_1'),
                                array('name'=>'phone_2'),
                                array('name'=>'fax'),
                                array('name'=>'email_1'),
                                array('name'=>'email_2'),
                                array('name'=>'website','value'=>CHtml::link(CHtml::encode($model->website),$model->website) ,'type'=>'raw'),
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