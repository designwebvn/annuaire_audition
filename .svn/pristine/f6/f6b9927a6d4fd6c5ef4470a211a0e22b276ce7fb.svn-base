<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4><a href="/organizations"> <?php echo Yii::t('global','Organizations'); ?> </a> > <a href="/organizations/type/<?php echo $types['alias']; ?>"> <?php echo Yii::t('global',$types['name']); ?>  </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <h2> <span style="border-bottom: 1px solid #505050;"> <?php echo Yii::t('global',$types['name']); ?> </span> </h2>
                <div class="announcements-content-rq">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$agency,
                    'itemView'=>'../directoryOrders/gridview_type_agency',
                    'summaryText'=>''
                ));
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>