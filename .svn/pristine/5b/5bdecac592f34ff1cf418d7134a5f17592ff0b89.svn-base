 <div class="container">
 <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="main-left-side" id="advancedSearch">
                <div class="news-sec-1 float-width">
                    <form class="navbar-form float-width" role="search" action="/search-advanced" method="post">
                            <div class="form-group float-width">
                                <h2 class="sec-title"><?php echo Yii::t('global','Advanced Search'); ?></h2>
                                <input id="mbHeadSearchInput" class="form-control autocomplete" name="q" value ="<?php echo $search; ?>" type="text" placeholder="<?php echo Yii::t('global', 'Input keyword')?>">
                                <select name="category" id="fillter-category">
                                    <option value="1"><?php echo Yii::t('global','Articles'); ?></option>
                                    <option value="2"><?php echo Yii::t('global','Products'); ?></option>
                                    <option value="3"><?php echo Yii::t('global','Hearing TV'); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" id="mbHeadSearchButton"><?php echo Yii::t('global', 'Search')?></button>
                    </form>
                </div>
            </div>

            <div class="float-width sec-cont2">
                <div role="alert" class="alert alert-success alert-dismissible">
                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?php echo Yii::t('global','Total have'); ?> <?php echo count($news->getData() ); ?> <?php echo Yii::t('global','result search with keyword') ?> <strong> <?php echo $search; ?> </strong>
                </div>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$news,
                    'itemView'=>'../elements/result_search',
                    'summaryText'=>''
                ));
                ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>