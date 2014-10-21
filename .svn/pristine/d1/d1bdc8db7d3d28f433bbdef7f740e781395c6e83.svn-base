<div class="container-fluid fix-container-product">
   <div class="col-md-3 col-xs-12">
            <span class="address"><?php echo Yii::t('global','Related News'); ?></span>
            <div id="related-new">
                <ul>
                    <?php 
                        foreach( $related_news  as $val ){
                            echo '<li ><a href="'.$val['alias'].'">'.$val['title'].' </a></li>';
                        }
                    ?>
                </ul>
            </div>
   </div>
   <div class="col-md-9 col-xs-12">

        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-9 shopping-cart"><span class="address"><?php echo $model->title; ?></span></div>
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-9  fix-new-top fix-container-product">     
        <div class="col-md-12">
           <div class="col-md-2">
                <?php $img = ($model->image)?$model->image:'no_image.png'; ?>
                <img src="/uploads/blog/<?php echo $img; ?>" class="img-top-blog"/>
           </div>
           <div class="col-md-10">
                <?php echo $model->description; ?>
           </div>
        
        </div>
        <div class="col-md-12 top_text" style="margin: 15px 0 25px 0 !important;">
            <?php echo $content; ?>	
        	<div class="clearfix"></div>
        </div>
       </div>
    </div>
       
 </div>

