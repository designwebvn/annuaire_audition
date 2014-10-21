<?php if(($index+3)%3 ==0) {
    if($index !=0) {
        echo "</div>";
        echo "<div class='wrapper_row_best_seller fix_best_seller' >";
    } else {
        echo "<div class='wrapper_row_best_seller' >";
    }
}  ?>
<div class="top-pr-item <?php  if ( ($index+1)%3 == 0 ) echo 'right-top'; else echo ''; ?>">
     <?php $img = ( $data->image )?$data->image:'no_image.png'; ?>
    <a href="/products/detail/<?php echo $data->alias ?>"><img class="img-top-product" <?php echo "src='".Yii::app()->params['homeUrl']."/uploads/product/".$img."'" ?>/></a>
    <div class="content-product">
        <a class="buy-link" href="/products/detail/<?php echo $data->alias ?>">
            <div class="buy-top <?php if( ($index+2)%3 ==0) echo 'top-buy-two'; else if ( ($index+1)%3 == 0 ) echo 'top-buy-three'; else echo ''; ?>"> <?php echo Yii::t('global','Buy'); ?> </div></a>
        <div class="name-product"><a href="/products/detail/<?php echo $data->alias ?>"> <?php echo $data->name ?> </a></div>
        <div class="shiping-fee"> + <?php echo $data->type_shipping; ?> </div>
    </div>
    <div class="price-product">
        <div class="text-price"><?php echo Yii::t('global','PRICE FROM'); ?></div>
        <div class="value-price"> <?php echo Utils::CER($data->price);  ?></div>
    </div>
</div>
<?php if($index== (Yii::app()->settings->number_best_seller -1)) echo "</div>" ?>