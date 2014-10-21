<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4><a href="/speech-therapists"> <?php echo Yii::t('global','Speech Therapists'); ?> </a> > <a href="/orthophonistes/<?php echo $maps['type'] ?>/<?php echo $maps['alias']; ?>"> <?php echo Yii::t('global',$maps['name']); ?>  </a> > <a href="/speech/<?php echo $maps['alias']; ?>/<?php echo $speechs['id'].'-'.Yii::app()->func->makeAlias($speechs['title']); ?>"> <?php echo $speechs['title']; ?> </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2 fix-content-speech">
                <h2> <span style="border-bottom: 1px solid #505050;"> <?php echo $speechs['title']; ?> </span> </h2>
                <div class="announcements-content-rq">
                        <div class="speech-left"><?php echo Yii::t('global','Name'); ?></div> <div class="speech-right"> <?php echo $speechs['name']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','First Name'); ?></div> <div class="speech-right"> <?php echo $speechs['firstname']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Degrees'); ?></div> <div class="speech-right"> <?php echo $speechs['degrees']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Status grade'); ?></div> <div class="speech-right"> <?php echo $speechs['status_grade']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Specialty'); ?></div> <div class="speech-right"> <?php echo $speechs['specialty']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Phone 1'); ?></div> <div class="speech-right"> <?php echo $speechs['phone_1']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Phone 2'); ?></div> <div class="speech-right"> <?php echo $speechs['phone_2']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Fax'); ?></div> <div class="speech-right"> <?php echo $speechs['fax']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Email 1'); ?></div> <div class="speech-right"> <?php echo $speechs['email_1']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Email 2'); ?></div> <div class="speech-right"> <?php echo $speechs['email_2']; ?> </div>
                        <div class="speech-left"><?php echo Yii::t('global','Website'); ?></div> <div class="speech-right"> <?php echo CHtml::link( $speechs['website'], $speechs['website'], array('target'=>'_blank') ) ; ?> </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>