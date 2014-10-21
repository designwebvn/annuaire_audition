
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Announcements'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Announcements'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('announcements/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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
                        array('name'=>Yii::t('global', 'COMPANY') ),
                        array('name'=>'address'),
                        array('name'=>'zip'),
                        array('name'=>'city'),
                        array('name'=>'phone'),
                        array('name'=>'category_id', 'header'=>Yii::t('global', 'Category'), 'value'=>Yii::t('global',$model->category->name) ),
                        array('name'=>'reference'),
                        array('name'=>'title'),
                        array('name'=>'email'),
                        array('name'=>'image', 'value'=>Announcements::showAdminImageNew( $model->image ), 'type'=>'raw'),
                        array('name'=>'grip','type'=>'html'),
                        array('name'=>'description','type'=>'html'),
                        array('name'=>'is_highlight', 'value'=>Announcements::getStatus( $model->is_highlight ), 'type'=>'raw'),
                        array('name'=>Yii::t('supplierProducts','Hearing Care Centers'), 'value'=>Announcements::getAnnouncementsCenters($model->id) ,'type'=>'raw'),
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