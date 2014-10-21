
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'UsersAccount'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'UsersAccount'); ?> </h2>
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
                            array('name'=>'last_name'),
                            array('name'=>'function','value'=>$model->function0->name, 'type'=>'raw' ),
                            array('name'=>'phone_contact'),
                            array('name'=>'email_contact'),
                            array('name'=>'email'),
                            array('name'=>'login'),
                            //array('name'=>'password'),
                            array('name'=>'enable', 'value'=> Press::getStatusPress($model->enable), 'type'=>'raw'),
                            array('name'=>'observation'),
                            array('name'=>'name_contact_2'),
                            array('name'=>'last_name_contact_2'),
                            array('name'=>'function_contact_2','value'=>UsersAccount::getNameFunction($model->function_contact_2), 'type'=>'raw'),
                            array('name'=>'phone_contact_2'),
                            array('name'=>'email_contact_2'),
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