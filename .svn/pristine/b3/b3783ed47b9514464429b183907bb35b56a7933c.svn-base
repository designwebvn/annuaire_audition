<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/news-letter"> <?php echo Yii::t('global','Newsletter'); ?>  </a>  </h4>
            </li>
        </ul>
    </div>

        <div class="main-left-side" id="newsletter">
        <div class="subscribe lefty">
            <h3 class="sec-title"><?php echo Yii::t('global','NEWSLETTER'); ?></h3>
            <h6><?php echo Yii::t('global','Subscribe to our newsletter and be first to know about new game, music and movie releases.'); ?></h6>
            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'newsletter-form',
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                            )); ?>
            <?php $this->widget('widgets.admin.notifications'); ?>
                <div class="form-group">
                    <input type="email" data-required="true" name="Newsletter[email]" class="form-control" id="newsletter" placeholder="Enter your email adress and hit subscribe">
                    <button class="lefty trans1" type="submit"><?php echo Yii::t('global', 'Subscribe')?></button>
                </div>
            <?php $this->endWidget(); ?>
        </div>
        </div>
         <?php $this->renderPartial('/elements/sidebar_right_newsletter'); ?>
      </div>