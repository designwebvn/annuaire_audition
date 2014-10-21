
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
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('events/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                    array('name'=>Yii::t('events','News'),'value'=>Events::getEventNews($model->id ),'type'=>'raw'),
                    array('name'=>Yii::t('events','Hearing Tv'),'value'=>Events::getEventVideos($model->id ),'type'=>'raw'),
                    array('name'=>Yii::t('supplierProducts','Hearing Care Centers'),'value'=>Events::getEventCenters($model->id ),'type'=>'raw'),
                    array('name'=>Yii::t('events','Training Centers'),'value'=>Events::getEventTrainingCenters($model->id ),'type'=>'raw'),
                    array('name'=>Yii::t('supplierProducts','Speech Therapists'),'value'=>Events::getEventSpeechTherapists($model->id ),'type'=>'raw'),
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
                <h2><?php echo Yii::t('global', 'Contact'); ?> </h2>
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
                    $model1 = new ContactBox();
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pdf-files-grid',
                        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
                        'dataProvider'=>$model1->searchNew( Yii::app()->user->id, $model->id, Suppliers::SUPPLIERS ),
                        'columns'=>array(
                            array(
                                'name'=>'id',
                                'value'=>'$data->id',
                                'filter'=>'',
                                'htmlOptions'=>array('style'=>'width:35px;')
                            ),
                            array(
                                'name'=>'last_name',
                                'value'=>'$data->last_name',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'first_name',
                                'value'=>'$data->first_name',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'Function',
                                'value'=>'$data->Function',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'tel_contact_1',
                                'value'=>'$data->tel_contact_1',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'email_contact_1',
                                'value'=>'$data->email_contact_1',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'email',
                                'value'=>'$data->email',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'username',
                                'value'=>'$data->username',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'status',
                                'value'=>'$data->status',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'last_name_contact_2',
                                'value'=>'$data->last_name_contact_2',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'first_name_contact_2',
                                'value'=>'$data->first_name_contact_2',
                                'filter'=>'',
                            ),
                            array(
                                'name'=>'email_contact_2',
                                'value'=>'$data->email_contact_2',
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