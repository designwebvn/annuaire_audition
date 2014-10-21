<div class="container">
    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="main-left-side" id="advancedSearch">
                <div class="news-sec-1 float-width">
                    <form class="navbar-form float-width" role="search" action="/search-advanced" method="post">
                        <div class="form-group float-width">
                            <h2 class="sec-title"><?php echo Yii::t('global','Advanced Search'); ?></h2>
                            <input id="mbHeadSearchInput" class="form-control autocomplete" name="q" value ="<?php echo $keyword; ?>" type="text" placeholder="<?php echo Yii::t('global', 'Input keyword')?>">
                            <select name="category" id="fillter-category">
                                <?php
                                    $arr = array( 1=>'Articles', 2=>'Products', 3=>'Hearing TV' );
                                    foreach( $arr as $key=>$val ){ ?>
                                        <option value="<?php echo $key; ?>" <?php if( $key==$category ){ echo 'selected = "selected"'; } ?> ><?php echo Yii::t('global',$val); ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" id="mbHeadSearchButton"><?php echo Yii::t('global', 'Search')?></button>
                    </form>
                </div>
            </div>

            <div class="float-width sec-cont2">
                <div role="alert" class="alert alert-success alert-dismissible">
                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?php echo Yii::t('global','Total have'); ?> <?php echo count($data->getData() ); ?> <?php echo Yii::t('global','result search with keyword') ?> <strong> <?php echo $search; ?> </strong>
                </div>
                <?php
                if( $category == 1 )
                    $file_name = 'result_search';
                else if( $category == 2 )
                    $file_name = 'result_search_product';
                else if( $category == 3 )
                    $file_name = 'result_search_videos';

                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$data,
                    'itemView'=>'../elements/'.$file_name,
                    'summaryText'=>''
                ));
                ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>