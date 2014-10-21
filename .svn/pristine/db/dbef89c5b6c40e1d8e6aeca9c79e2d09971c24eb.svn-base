<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/articles"> <?php echo Yii::t('global','Articles'); ?>  </a>  > <a href="/articles/view/<?php echo $model->alias; ?>"> <?php echo $model->name; ?> </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
        <?php $this->renderPartial('_view', compact('model', 'other_products'));  ?>

        <div class="artcl-comments float-width">
            <?php if(count($model->productComments)>=1): ?>
                <?php
                $data = ProductComments::model()->findAllByAttributes(array( 'product_id'=>$model->id,'is_active'=>ProductComments::STATUS_ACTIVE ),array('order'=>'created DESC'));
                echo '<div class="head-title-comment">';
                echo '<h3 class="sec-title"><i class="fa fa-comment-o"></i> ';
                echo  count($data)>1 ? count($data) . ' '.Yii::t('global','Comments to') : Yii::t('global','One Comment to');
                echo ' “'.$model->name.'”';
                echo '</h3></div>';
                ?>

                <?php $this->renderPartial('_view_comment',array('comments'=>$data)); ?>
            <?php endif; ?>
            <div style="clear: both;"></div>
            <?php
            $this->widget('widgets.admin.notifications');
            $this->renderPartial('_form',array('model'=>$comment,'id'=>$model->id));
            ?>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>