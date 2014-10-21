
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1>View <small>
       <small><?php echo Yii::t('global', 'Events'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Events'); ?> </h2>
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
                    array('name'=>'location'),
                    array('name'=>'type_events','value'=>Events::getEventsCategory($model->type_events), 'type'=>'raw' ),
                    array('name'=>'organizer_id','value'=>Events::getEventOrganizer($model->id ),'type'=>'raw'),
                    array('name'=>'address'),
                    array('name'=>'city'),
                    array('name'=>'zip'),
                    array('name'=>'starting_date'),
                    array('name'=>'ending_date'),
                    array('name'=>'logo','value'=>Events::showAdminImageNew( $model->logo ), 'type'=>'html' ),
                    array('name'=>'description','type'=>'raw'),
                    array('name'=>'website1', 'value'=>CHtml::link($model->website1, $model->website1, array('target'=>'_blank')), 'type'=>'raw' ),
                    array('name'=>'website2', 'value'=>CHtml::link($model->website2, $model->website2, array('target'=>'_blank')), 'type'=>'raw'),
                    array('name'=>'pdf','value'=>CHtml::link(CHtml::encode($model->pdf), Yii::app()->baseUrl . '/uploads/events/pdf/'.$model->pdf),'type'=>'raw'),
                    array('name'=>'is_highlight','value'=>Events::getStatusEvents( $model->is_highlight ) ),
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