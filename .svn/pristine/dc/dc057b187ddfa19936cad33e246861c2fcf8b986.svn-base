
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Services'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Services'); ?> </h2>
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
                        array('name'=>'cochlear_implant', 'value'=>Press::model()->getStatusPress( $model->cochlear_implant ), 'type'=>'raw' ),
                        /*array('name'=>'department', 'value'=>$model->department0->name, 'type'=>'raw'),*/
                        array('name'=>'title_1'),
                        array('name'=>'description_1'),
                        array('name'=>'email_1'),
                        array('name'=>'title_2'),
                        array('name'=>'description_2'),
                        array('name'=>'email_2'),
                        array('name'=>'title_3'),
                        array('name'=>'description_3'),
                        array('name'=>'email_3'),
                        array('name'=>'ranking', 'value'=> $this->widget('ext.dzRaty.DzRaty', array(
                                'name' => 'my_rating_service',
                                'value' => $model->ranking,
                                'options' => array(
                                    'readOnly' => TRUE,
                                ),
                                'htmlOptions' => array(
                                    'class' => 'my-rating-class',
                                ),
                            )) ),
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
    .my-rating-class{
        position: absolute;
        top: 405px;
        left: 632px;
    }
</style>