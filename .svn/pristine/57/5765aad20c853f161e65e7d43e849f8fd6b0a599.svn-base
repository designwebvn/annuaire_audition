<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/hearing-TV"> <?php echo Yii::t('global','Hearing TV'); ?>  </a> <?php  if($type==Videos::STATUS_PUBLIC) echo ' > <a href="/grand-public">'.Yii::t('global','Grand Public').'</a>'; else if($type==0) echo ' > <a href="/videos-pro">'.Yii::t('global','Videos Pro').'</a>';  ?> </h4>
            </li>
        </ul>
    </div>

    <div class="float-width sec-cont fix-top-videos-new">
            <div class="col-md-4">
                <div class="img-top-videos"> <a href="/hearing-tv/detail/<?php echo $videoTop->alias; ?>"> <img src="/uploads/video/<?php echo $videoTop->pictures; ?>"> </a> </div>
            </div>
            <div class="col-md-5">
                <div class="title-top-videos"> <a href="/hearing-tv/detail/<?php echo $videoTop->alias; ?>"> <?php echo $videoTop->title; ?> </a> </div>
                <div class="description-top-videos"> <?php echo $videoTop->description; ?></div>
            </div>
            <div class="col-md-3">
                <?php
                $flash = Yii::app()->params['homeUrl'].'/themes/default/plugin/jwplayer/jwplayer.swf';
                $js     = Yii::app()->params['homeUrl'].'/themes/default/plugin/jwplayer/jwplayer.js';
                if(($videoTop->pictures) and $videoTop->pictures !='')
                    $imagesvideo      = '/uploads/video/'.$videoTop->pictures;
                $video = Yii::app()->params['homeUrl'].'/uploads/video/'.$videoTop->video;
                echo "<script type='text/javascript' src='".$js."'></script><div id='mediaspace'></div>
                <script type='text/javascript'>
                    jwplayer('mediaspace').setup({
                        flashplayer: '".$flash."',
                        file: '".$video."',
                        image: '".$imagesvideo."',
                        width: '286',
                        height: '235',
                        autostart: 'false',
                    });
                </script>";
                ?>
            </div>
    </div>

    <div class="float-width ticker fix-ticket-new">
        <ul>
            <li style="margin-top: 0px;">
                <div class="container">
                <div class="col-md-10">
                    <span class="btn btn-primary fix-a-button <?php if( $type!=0 && $type!=Videos::STATUS_PUBLIC ) echo 'btn-danger';  ?>" onclick="document.location.href='/hearing-TV'"> <a href="/hearing-TV"> <?php echo Yii::t('global','Hearing TV'); ?>  </a>  </span>
                    <span class="btn btn-primary fix-a-button <?php if( $type==Videos::STATUS_PUBLIC ) echo 'btn-danger';  ?>" onclick="document.location.href='/grand-public'"> <a href="/grand-public"><?php echo Yii::t('global','Grand Public'); ?></a></span>
                    <span class="btn btn-primary fix-a-button <?php if( $type==0 ) echo 'btn-danger';  ?>" onclick="document.location.href='/videos-pro'"> <a href="/videos-pro"><?php echo Yii::t('global','Videos Pro'); ?></a> </span>
                </div>
                <div class="col-md-2"> <a href="mailto:auditiontv@ocep.fr"> <span class="btn btn-default fix-contact-new-email"><?php echo Yii::t('global','Contact'); ?></span> </a></div>
                </div>
    </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <!--<h3 class="sec-title">
                    <?php /*echo Yii::t('global','Hearing TV'); */?> <?php /* if($type==Videos::STATUS_PUBLIC) echo ' - '.Yii::t('global','Grand Public'); else if($type==0) echo ' - '.Yii::t('global','Videos Pro');  */?>
                </h3>-->
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$videos,
                    'itemView'=>'../elements/hearing_tv',
                    'summaryText'=>''
                ));
                ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>