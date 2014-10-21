<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/hearing-TV"> <?php echo Yii::t('global','Hearing TV'); ?>  </a> <?php  if($model->type==Videos::STATUS_PUBLIC) echo ' > <a href="/grand-public">'.Yii::t('global','Grand Public').'</a>'; else if($model->type==0) echo ' > <a href="/videos-pro">'.Yii::t('global','Videos Pro').'</a>';  ?> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
        <?php $this->renderPartial('_view', compact('model'));  ?>

        <!--<div class="artcl-comments float-width">
           <?php /*if(count($model->videoComments)>=1): */?>
                <?php
/*                    $data = VideoComments::model()->findAllByAttributes(array( 'video_id'=>$model->id,'is_active'=>VideoComments::STATUS_ACTIVE ),array('order'=>'created DESC'));
                    echo '<div class="head-title-comment">';
                    echo '<h3 class="sec-title"><i class="fa fa-comment-o"></i> ';
                    echo  count($data)>1 ? count($data) . ' '.Yii::t('global','Comments to') : Yii::t('global','One Comment to');
                    echo ' “'.$model->title.'”';
                    echo '</h3></div>';
                */?>

                <?php /*$this->renderPartial('_view_comment',array('comments'=>$data)); */?>
            <?php /*endif; */?>
           <div style="clear: both;"></div>
           <?php
/*                $this->widget('widgets.admin.notifications');
                $this->renderPartial('_form',array('model'=>$comment,'id'=>$model->id));
           */?>
        </div>-->
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>