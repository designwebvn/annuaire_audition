<div class="artcl-main float-width">
    <div class="artcl-prev-nxt float-width">
    </div>
    <div class="artcl-body float-width">
        <h2><?php  echo $model->name;?></h2>
        <h5>
            <span><i class="fa fa-clock-o"></i><?php echo Utils::fomatDateCeate($model->created); ?></span>
            <span><i class="fa fa-comment-o"></i><?php echo Products::model()->totalCommentById( $model->id ); ?></span>
        </h5>
        <article class="float-width articl-data" style="float: left;">
            <?php if($model->grip): ?>  <div class="content-product-rq"> <?php  echo $model->grip; ?> </div> <?php endif; ?>
            <div class="content-product-rq"><?php  echo $model->description;?> </div>
            <?php if( $model->pdf ): ?> <div class="content-product-rq"> <b><?php echo Yii::t('global','Pdf'); ?> :</b> <?php  echo $model->pdf; ?> </div> <?php endif; ?>  <br>
            <?php if($other_products):?> <div class="content-product-rq"> <b> <?php echo Yii::t('global','See also'); ?>: </b> </div>  <br>
                                         <div class="content-product-rq" style="margin-left: 15px;"> <?php echo $other_products;?> </div>
            <?php endif; ?>
        </article>
    </div>
</div>
<style>
    .articl-data p{
        float:none !important;
    }
</style>