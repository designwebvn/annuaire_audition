<div class="title_category">
    <h4> <?php echo Yii::t('global','PRODUCT CATEGORY'); ?> <span class="arrow_cat"><img src="/themes/default/images/arrow-down.png" class="down_category" width="30px"></span></h4>
</div>
<ul>
    <?php 
        $categorys              = Categories::model()->findAll(  );
         $aliasParent           = isset($_GET['alias'])?$_GET['alias']:'1cs';
         $idCates               = ProductCategories::model()->GetListCategoryId( $aliasParent );
         $Cate                  = array(); 
         foreach ( $idCates as $idCate ){
                $Cate[] = $idCate['category_id'];
         }
         foreach ($categorys as $cate ){
         $ChildCategory         = Products::model()->getProductByCate( $cate->id );
         if( count($ChildCategory) >= 1 ){
        ?>
        <li class="category"> <a style="font-weight:bold;" href="/products/category/<?php echo $cate->alias; ?>" rel="nested"><?php echo $cate->name; ?></a>
        <?php 
        
        foreach ( $ChildCategory as $childCate ){
         ?>
        <ul  style="<?php if( !in_array( $cate->id, $Cate  ) ) { echo 'display:none; '; } ?> margin: 0 5px 0 10px; outline: none;">
            <li class="productname"> <a href="/products/detail/<?php echo $childCate['alias']; ?>" <?php echo ( $aliasParent == $childCate['alias'] )?'class="active-category"':''; ?>><img src="/themes/default/images/dot-icon.png" width="16px"/> <?php echo $childCate['name']; ?></a> </li>     
        </ul>
        <?php 
        } 
        ?>
    </li>
    <?php 
            }
        }
    ?>
    
    <?php /*<li class="category"> <a style="font-weight:bold;" href="#" rel="nested">Category1</a>
        <ul  style="display:none;">
            <li class="productall"><a href="#"><b>All Products</b></a></li>
            <li class="productname"><a href="#">Product</a> </li>
            <li class="productname"><a href="#">Product</a> </li>
            <li class="productname"><a href="#">Product</a> </li>
            <li class="productname"><a href="#">Product</a> </li>
            <li class="productname"><a href="#">Product</a> </li>
        </ul>
    </li> */ ?>

</ul>