<div class="col-md-4 col-sm-4 col-xm-4 col-xs-12 product_item " >

    <div class="col-md-6 col-xs-12 wrapper_img_product">
        <a href="/products/detail/<?php echo $data->alias ?>">
            <?php $img = ( $data->image )?$data->image:'no_image.png'; ?>
            <img class="img-product_item" <?php echo "src='".Yii::app()->params['homeUrl']."/uploads/product/".$img."'" ?> alt="<?php echo $data->name ?>"  />
        </a>
    </div>
    <div class="col-md-6 col-xs-12">
      <div class="fix-price_product red12px">
      <?php echo Utils::CER($data->price);  ?>
      </div>
      <div style="text-align: center;">
            <a class="addcart" href="/products/detail/<?php echo $data->alias ?>"> BUY </a>
      </div>
    </div>
     <div class="col-md-12 col-sm-12">
        <p class="name-product" style="min-height: 55px;"> <a style="color:#30ade7; font-family:Arial, Helvetica, sans-serif; text-transform: uppercase; font-weight:bold; font-size:16px;" href="/products/detail/<?php echo $data->alias ?>"> <?php echo $data->name ?> </a> </p>
    </div>
    <div class="col-md-12 col-sm-12" style="min-height: 45px;">
         <?php echo substr($data->short_desciption,0,30)."..."; ?>
    </div>
</div>