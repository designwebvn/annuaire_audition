<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1>View <small>
                <small><?php echo Yii::t('global', 'Members'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Members'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('members/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('global', 'Edit'); ?>"></i></span>
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

                            array('name'=>'username'),
                            //array('name'=>'gender'),
                            array('name'=>'email'),
                            array('name'=>'language','value'=>$model->getLanguage() ),
                            //array('name'=>'joined'),
                            array('name'=>'role', 'value'=>$model->getValueRoleUsers(), 'type'=>'raw' ),
                            //array('name'=>'ipaddress'),
                            array('name'=>'fname'),
                            array('name'=>'lname'),
                            array('name'=>'function'),
                            array('name'=>'tel_contact_1'),
                            array('name'=>'email_contact_1'),
                            array('name'=>'last_name_contact_2'),
                            array('name'=>'first_name_contact_2'),
                            array('name'=>'function_contact_2'),
                            array('name'=>'tel_contact_2'),
                            array('name'=>'email_contact_2'),
                            array('name'=>'Observation', 'type'=>'raw'),
                            array('name'=>'status', 'value'=>$model->getStatusUser()),
                            array('name'=>Yii::t('global','Signup date'), 'value'=>$model->created),
                            array('name'=>'last_logged'),
                            array('name'=>'changes_log'),
                            //array('name'=>'birthday'),
                            //array('name'=>'address'),
                            //array('name'=>'phone'),
                            //array('name'=>'street'),
                            //array('name'=>'nr'),
                            //array('name'=>'ext_information'),
                            //array('name'=>'postcode'),
                            //array('name'=>'state'),
                            //array('name'=>'city'),
                           /* array(
                                'label'=>Yii::t('global','Country'),
                                'value'=>$model->country->short_name,
                            ),*/
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