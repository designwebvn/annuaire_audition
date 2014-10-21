<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/articles"> <?php echo Yii::t('global','Articles'); ?>  </a>   </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$products,
                    'itemView'=>'list_all_products',
                    'summaryText'=>''
                ));
                ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>