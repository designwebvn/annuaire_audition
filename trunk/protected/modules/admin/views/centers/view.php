
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
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('centers/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                            array('name'=>'categories', 'value'=>Centers::getCenterCategories($model->id ),'type'=>'html'),
                            array('name'=>'networks', 'value'=>Centers::getCenterNetworks($model->id ),'type'=>'html'),
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
                            array('name'=>'grip', 'type'=>'raw'),
                            array('name'=>'description', 'type'=>'raw'),
                            array('name'=>'opening_hours'),
                            array('name'=>'image', 'value'=>TrainingCenters::showAdminImageNew( $model->image ), 'type'=>'raw'),
                            array('name'=>'logo', 'value'=>TrainingCenters::showAdminImageNew( $model->logo ), 'type'=>'raw'),
                            array('name'=>'note','type'=>'raw'),
                            array('name'=>Yii::t('supplierProducts','News'), 'value'=>Centers::getCenterNews($model->id ),'type'=>'html'),
                            array('name'=>Yii::t('events','Hearing Tv'), 'value'=>Centers::getCenterVideo($model->id ),'type'=>'html'),
                            array('name'=>Yii::t('events','Announcements'), 'value'=>Centers::getCenterAnnouncements($model->id ),'type'=>'html'),
                            array('name'=>Yii::t('supplierProducts','Hearing Care Centers'), 'value'=>Centers::getCenterOthers($model->id ),'type'=>'html'),
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