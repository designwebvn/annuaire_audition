<div class="main-footers">
    <?php $this->renderPartial('/elements/footer_menu'); ?>
    <div class="container">
        <!-- Category footer -->
        <div class="cat-ftr-cont float-width">
            <div class="cat-ftr-cont-sngl lefty cat-brd-1">

            </div>
            <div class="cat-ftr-cont-sngl lefty cat-brd-2">

            </div>
            <div class="cat-ftr-cont-sngl lefty cat-brd-3">

            </div>
            <div class="cat-ftr-cont-sngl lefty cat-brd-4">

            </div>
            <div class="cat-ftr-cont-sngl lefty cat-brd-5">

            </div>
        </div>
        <!-- Info footer -->
        <div class="info-ftr float-width">
            <div class="mag-info lefty">
                <a class="ftr-logo" href="<?php echo Yii::app()->params['homeUrl']; ?>"><img alt="" src="/themes/default/img/logo-amine-footer.png" /></a>
                <p> <?php $about_us = Custompages::model()->find('alias = "about-us" AND language="'.Yii::app()->language.'"' ); echo Utils::short_description(strip_tags($about_us->content),250); ?> <a href="/about-us"><?php echo Yii::t('global','READ ABOUT US'); ?></a></p>
                <div class="scl-ftr float-width">
                    <h3><?php echo Yii::t('global','STAY IN TOUCH!'); ?></h3>
                    <ul>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="Facebook" class="trans1 fb-ftr" ></a></li>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="Twitter" class="trans1 tw-ftr"></a></li>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="Pinterest" class="trans1 pin-ftr"></a></li>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="YouTube" class="trans1 yt-ftr"></a></li>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="Instagram" class="trans1 ins-ftr"></a></li>
                        <li><a href="<?php echo Yii::app()->params['homeUrl']; ?>" data-toggle="tooltip" data-placement="bottom" title="Vimeo" class="trans1 vm-ftr"></a></li>
                    </ul>
                </div>
            </div>
            <div class="post-ftr lefty">
                <h3><?php echo Yii::t('global','LATEST POSTS'); ?></h3>
                <?php
                    $news = News::model()->findAll('is_active = '.News::STATUS_ACTIVE.' ORDER BY id DESC LIMIT 3');
                    foreach( $news as $new ):
                ?>
                <div class="pst-ftr-sngl float-width">
                    <a href="/news/view/<?php echo $new->alias; ?>" class="lefty pst-ftr-img fix-img-latest-new"><?php echo News::model()->renImageNews($new->image); ?></a>
                    <h5 class="title-latest-post"><a href="/news/view/<?php echo $new->alias; ?>"> <?php echo $new->title; ?> </a> </h5>
                    <h6 class="lefty"><span><i class="fa fa-clock-o"></i><?php echo Utils::fomatDateCeate( $new->created ); ?></span><span><i class="fa fa-comment-o"></i><?php echo News::model()->countNewByCategory($new->id); ?> <?php echo Yii::t('global','comments'); ?></span></h6>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="twts-ftr lefty">
                <h3><?php echo Yii::t('global','LATEST VIDEO'); ?></h3>
                <ul>
                    <?php
                        $videos = Videos::model()->findAll('is_home = '.Videos::STATUS_ACTIVE.' ORDER BY id DESC LIMIT 3');
                        foreach( $videos as $video ):
                    ?>
                        <li class="content-latest-video">
                                <div class="img-video-latest-footer"><a href="/hearing-tv/detail/<?php echo $video->alias ?>"> <?php echo Videos::model()->renImageVideo($video->pictures); ?> </a></div>
                                <div class="description-video-latest-footer">
                                    <div class="title-video-latest-rq"><a href="/hearing-tv/detail/<?php echo $video->alias ?>"> <?php echo $video->title; ?> </a> </div>
                                    <div class="information-latest-video"><i class="fa fa-clock-o"></i> <?php echo Utils::fomatDateCeate( $video->created ); ?> </span>  <span> <i class="fa fa-comment-o"> </i> <?php echo Videos::model()->totalCommentById($video->id); ?> <?php echo Yii::t('global','comments'); ?></div>
                                </div>

                        </li>
                    <?php endforeach; ?>
                </ul>
                <h6><a href="/hearing-TV" class="all-twts righty trans1"> <?php echo Yii::t('global','Read all'); ?></a></h6>
            </div>
        </div>
    </div>
</div>
<!-- Copy right footer -->
<div class="copy-rt-ftr">
    <div class="container">
        <a class="lefty">Annuaire Audition OCEP &#169; Copyright 2014, All Rights Reserved</a>
        <a href="<?php echo Yii::app()->params['homeUrl']; ?>" class="righty">Design et Développement par: Prisma-Design</a>
    </div>
</div>