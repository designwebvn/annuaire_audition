
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Networks'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Networks'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('networks/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                            array('name'=>'grip', 'type'=>'html'),
                            array('name'=>'description', 'type'=>'html'),
                            array('name'=>'grip_related_centers', 'type'=>'html'),
                            array('name'=>'description_related_centers', 'type'=>'html'),
                            array('name'=>'advertiser', 'value'=>Networks::model()->getStatusNetwork( $model->advertiser ), 'type'=>'raw' ),
                            array('name'=>'address_1'),
                            array('name'=>'additional_address'),
                            array('name'=>'po_box'),
                            array('name'=>'zip_cedex_address_1'),
                            array('name'=>'city_cedex_address_1'),
                            array('name'=>'city_1'),
                            array('name'=>'zip_1'),
                            array('name'=>'phone_number_1a'),
                            array('name'=>'phone_1b'),
                            array('name'=>'fax_1a'),
                            array('name'=>'fax_1b'),
                            array('name'=>'a_email_1a'),
                            array('name'=>'email_1b'),
                            array('name'=>'website_1a'),
                            array('name'=>'website_1b'),
                            array('name'=>'address_2'),
                            array('name'=>'additional_address_2'),
                            array('name'=>'po_box_address_2'),
                            array('name'=>'zip_cedes_address_2'),
                            array('name'=>'city_cedex_address'),
                            array('name'=>'city_2'),
                            array('name'=>'zip_2'),
                            array('name'=>'phone_2a'),
                            array('name'=>'phone_2b'),
                            array('name'=>'fax_2a'),
                            array('name'=>'fax_2b'),
                            array('name'=>'email_2a'),
                            array('name'=>'email_2b'),
                            array('name'=>'website_2a'),
                            array('name'=>'website_2b'),
                            array('name'=>'logo', 'value'=>$model->showAdminImage(), 'type'=>'raw' ),
                            array('name'=>Yii::t('events','News'), 'value'=>Networks::getNetworkNews($model->id) ,'type'=>'raw'),
                            array('name'=>Yii::t('global','Articles'), 'value'=>Networks::getNetworkArticles($model->id) ,'type'=>'raw'),
                            array('name'=>Yii::t('events','Hearing Tv'), 'value'=>Networks::getNetworkVideos($model->id) ,'type'=>'raw'),
                            array('name'=>Yii::t('events','Events'), 'value'=>Networks::getNetworkEvents($model->id) ,'type'=>'raw'),
                            array('name'=>Yii::t('supplierProducts','Announcements'), 'value'=>Networks::getNetworkAnnouncements($model->id) ,'type'=>'raw'),
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