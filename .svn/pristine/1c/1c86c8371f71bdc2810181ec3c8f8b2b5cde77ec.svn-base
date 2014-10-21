<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4><a href="/services-ORL"> <?php echo Yii::t('global','Services ORL'); ?> </a> > <a href="/services/<?php echo $maps['type'] ?>/<?php echo $maps['alias']; ?>"> <?php echo Yii::t('global',$maps['name']); ?>  </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <h2> <span style="border-bottom: 1px solid #505050;"> <?php echo Yii::t('global',$maps['name']); ?> </span> </h2>
                <div class="announcements-content-rq">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$hospitals,
                        'itemView'=>'../directoryOrders/gridview_service_orl',
                        'summaryText'=>'',
                        'viewData'=>array( 'alias'=>$maps['alias'] ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>