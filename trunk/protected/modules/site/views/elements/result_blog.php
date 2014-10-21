 <div class="col-md-3 col-sm-4 col-xm-4 col-xs-12 product_item"  style="min-height: 211px !important;" >

        <div class="col-md-12 col-sm-12" style="min-height: 50px;">
            <a style="color:#30ade7; font-family:Arial, Helvetica, sans-serif; text-transform: uppercase; font-weight:bold; font-size:16px;" href="/blog/view/<?php echo $data->alias; ?>"><?php echo $data->title; ?></a>
        </div>
        <div class="col-md-12 col-sm-12 fix-container-product" >
        <div class="col-md-5 col-sm-12">
            <?php $img = ($data->image)?$data->image:'no_image.png'; ?>
            <img src="/uploads/blog/<?php echo $img; ?>" class="img-top-blog"/>
        </div>
        <div class="col-md-1 col-sm-12">
        </div>
        <div class="col-md-6 col-sm-12 fix-container-product">
            <?php echo substr($data->description ,0,100)."..."; ?>
        </div>
        </div>
</div>