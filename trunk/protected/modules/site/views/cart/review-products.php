

<table class="table table-bordered table-striped" style="float: left;">
    <thead>
    <tr class="head_row_table">
        <th style="text-align: center;">Product</th>
        <th style="text-align: center;">Product Name</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">QTY</th>
        <th style="text-align: center;">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($packages as $package){ ?>
        <tr>
            <td height="61" align="center"><img <?php echo 'src="'.Yii::app()->params['homeUrl'].'/uploads/product/'.$package->group->product->image.'"'  ?> class="productphotocart" /></td>
            <td height="61" align="center"><?php echo $package->group->product->name ?></td>
            <td height="61" align="center"><?php echo Utils::CER($package->price) ?></td>
            <td height="61" align="center"><?php echo $order['items']['Auctions']['qty'][$package->id] ?></td>
            <td height="61" align="center"><?php echo Utils::CER($package->price * $order['items']['Auctions']['qty'][$package->id]) ?> </td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
