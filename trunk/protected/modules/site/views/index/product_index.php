<?php /* <div style="float: left;margin-right: 8px; margin-bottom: 5px; ">
    <div id="prod" style="padding: 0px; vertical-align:top; height:211px; width:250px; margin-top:5px;">

        <div style="width:110px; height:110px; float:left; margin-left:17px; ">
            <a href="#">
                <img src="/uploads/product/31.jpg" alt="pills" hspace="6" border="0" align="left" class="productphoto" width="110" height="180" />
            </a>
        </div>
        <div style="text-align: center; float: left; color: rgb(0, 0, 0); font-family: verdana; font-size: 12px; font-weight: bold; width: 68px; margin-left: 38px; margin-top: 27px; height: 31px; padding-top:6px; background-color:#c5db83;">
            <span class="red12px">&#36;<?php echo Utils::number_format($data->price) ?>  </span>
        </div>
        <div> <a class="addcart" href="/products/detail/<?php echo $data->id ?>">BUY</a> </div>
        <div style=" text-align:center; width:250px; height:30px; float:left; margin-top:10px;">
            <a style="color:#30ade7; font-family:Arial, Helvetica, sans-serif; text-transform: uppercase; font-weight:bold; font-size:16px;" href="/products/detail/<?php echo $data->alias ?>"><?php echo $data->name ?></a>
        </div>
        <div class="shortdescription"><?php echo substr($data->short_desciption,0,30)."..."; ?></div>
    </div>
</div> */ ?>

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
      <div style="text-align: center;" class="red12px">
            <a class="addcart" href="/products/detail/<?php echo $data->alias ?>"> <?php echo Yii::t('global','Buy'); ?> </a>
      </div>
    </div>
     <div class="col-md-12 col-sm-12">
        <p class="name-product" style="min-height: 55px;"> <a style="color:#30ade7; font-family:Arial, Helvetica, sans-serif; text-transform: uppercase; font-weight:bold; font-size:16px;" href="/products/detail/<?php echo $data->alias ?>"> <?php echo $data->name ?> </a> </p>
    </div>
    <div class="col-md-12 col-sm-12" style="min-height: 45px;">
         <?php echo substr($data->short_desciption,0,30)."..."; ?>
    </div>
</div>


