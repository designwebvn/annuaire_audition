<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/classified-ads/<?php echo $category['id']; ?>"> <?php echo Yii::t('global',$category['name']); ?>  </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <?php if($top_announcements[0]['id']): ?>
                <div class="sec-1-big float-width petite_annonce">
                    <div class="container-fluid">
                        <div class="col-md-3">
                            <?php $image = ($top_announcements[0]['image'] != '')?$top_announcements[0]['image']:'no_image.gif'; ?>
                            <img src="/uploads/announcements/<?php echo $image; ?>" class="img-petite-annonce">
                        </div>
                        <div class="col-md-9">
                            <div class="lefty announcements-content-rq">
                                <h3><?php echo Utils::fomatDateCeate($top_announcements[0]['created']); ?> - <?php echo $top_announcements[0]['title']; ?></h3>
                                <p><?php echo $top_announcements[0]['description']; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endif ?>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$announcements,
                    'itemView'=>'../announcements/announcements_category',
                    'summaryText'=>''
                ));
                ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>