
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Professionals'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Professionals'); ?> </h2>
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
                            array('name'=>'first_name'),
                            array('name'=>'title'),
                            array('name'=>'email'),
                            array('name'=>'Centers','value'=>Professionals::getProfessionalsCenter($model->id ),'type'=>'raw'),
                            array('name'=>'address'),
                            array('name'=>'city'),
                            array('name'=>'zip'),
                            array('name'=>'training_center','value'=>$model->trainingCenter->school_name,'type'=>'raw'),
                            array('name'=>'year_of_graduation'),
                            array('name'=>'additional_degree', 'type'=>'raw'),
                            array('name'=>'image', 'value'=>$model->showAdminImage(), 'type'=>'raw'),
                            array('name'=>'link_professional_product','type'=>'html'),
                            array('name'=>'link_essay','type'=>'html'),
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