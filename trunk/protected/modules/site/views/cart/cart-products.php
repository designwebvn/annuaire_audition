<table class="table table-bordered table-striped">
    <thead>
    <tr class="head_row_table">
        <th>PRODUCT</th>
        <th>
            PRODUCT NAME
        </th>
        <th>
            QTY
        </th>
        <th>
            REMOVE
        </th>
        <th>
            PRICE
        </th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($packages as $package){ ?>
        <tr>
            <td><img class="img_cart" <?php echo "src='".Yii::app()->params['homeUrl']."/uploads/product/".$package->group->product->image."'"?>/> </td>
            <td class=" des_product_cart">
                <?php echo $package->group->product->name."<br/>" ?>
                <label>
                ( <?php echo $package->quantity." ". $package->quantity_type;
                        if($package->offers>0){
                            echo " +".$package->offers." ".Yii::t('global','Free tabs').", ";
                        }
                        $save = ( $package->group->product->price *($package->quantity + $package->offers ) ) - $package->price;
                        if($save >0){
                            echo Yii::t('global','SAVE')." ";
                            echo Utils::CER($save).", ";
                        }
                        echo " ".$package->shipping_type;
                 ?>
                )
                </label>
                <?php
                $packagesize = ProductPackage::model()->checkPackageSize($package->group->id,$package->quantity);

                if($packagesize) { ?>
                    <a href="/cart/upgradePackage?id=<?php echo $packagesize->id ?>&old_id=<?php echo $package->id ?>"><?php echo Yii::t('global','Upgrade cart to {quantity} {quantity_type} of {group_name}{price}',array('{quantity}'=>$packagesize['quantity'],'{quantity_type}'=>$packagesize['quantity_type'],'{group_name}'=>$package->group->group_name,'{price}'=>Utils::CER($packagesize['price']))) ?></a>
                <?php } ?>

            </td>
            <td>
                <input class="qty_cart" name="Auctions[qty][<?php echo $package->id?>]" value="<?php echo Yii::app()->session['cart'][$package->id]['qty']?>"  />
            </td>
            <td>
                <a href="#content_cart" onclick="removeCartItem(this, <?php echo $package->id?>)">
                    <img src="/themes/default/images/delete.png" />
                </a>
            </td>
            <td>
                <?php echo Utils::CER($package->price) ?>
            </td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>