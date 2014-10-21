<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/classified-ads"> <?php echo Yii::t('global','Classified Ads'); ?>  </a> > <a href="/formulaire_annonce"> <?php echo Yii::t('global','Formulaire annonce');?> </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
         <div class="artcl-comments float-width">
            <h3 class="sec-title"><?php echo Yii::t('global','Déposer une annonce'); ?></h3>
             <div class="note fix-line-announcements" > Merci de remplir tous les champs suivants pour déposer votre annonce. </div>

             <div class="note fix-line-announcements" > Le champs <b> Coordonnées </b> sera affiché sur le site pour permettre aux personnes intéressées de vous recontacter. </div>

             <div class="note fix-line-announcements" > Le champ Email ne sera pas affiché sur le site mais vous permettra de gérer votre annonce. </div>

             <div class="note announcements-description-rq-fix" >  A la validation du formulaire, vous recevrez un mail de confirmation.
             Votre annonce ne sera affichée sur le site qu'après validation d'un de nos administrateurs. </div>
                 <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'register-announcements-form',
                'htmlOptions'=>array('role'=>'form','data-validate'=>'parsley'),
                'enableAjaxValidation'=>true,

            )); ?>
             <?php  $this->widget('widgets.admin.notifications'); ?>
            <div class="note" style="margin-bottom: 5px"> <span class="fields-require"> * </span> <?php echo Yii::t('global', 'Fields require'); ?> </div>
            <div class="form-group">
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'form-control', 'placeholder'=>Yii::t('global', 'Title').' * ','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Description').' * ','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
                <?php echo $form->error($model,'description'); ?>
            </div>

             <div class="form-group">
                 <?php
                 $listCategories  = CHtml::listData(AnnouncementCategorys::model()->findAll(),'id','name');
                 echo $form->dropDownList( $model, 'category_id', $listCategories, array('prompt'=>Yii::t('global','Select a Category'), 'data-required'=>'true' ) ); ?>
                 <?php echo $form->error($model,'category_id'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Email').' * ','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
                 <?php echo $form->error($model,'email'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Company').' * ','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
                 <?php echo $form->error($model,'company'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Address'),'data-validation-minlength'=>'0','data-trigger'=>'change')); ?>
                 <?php echo $form->error($model,'address'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Zip'),'data-validation-minlength'=>'0','data-trigger'=>'change')); ?>
                 <?php echo $form->error($model,'zip'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'City'),'data-validation-minlength'=>'0','data-trigger'=>'change')); ?>
                 <?php echo $form->error($model,'city'); ?>
             </div>

             <div class="form-group">
                 <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128, 'class'=>'form-control','placeholder'=>Yii::t('global', 'Phone'),'data-validation-minlength'=>'0','data-trigger'=>'change')); ?>
                 <?php echo $form->error($model,'phone'); ?>
             </div>

             <div class="form-group">
                <?php echo CHtml::submitButton( Yii::t('global','Send'), array('class'=>'btn btn-primary') ); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>