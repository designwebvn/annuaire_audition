<div style="clear: both;"></div>
<div class="container-fluid" style="margin: 0!important; padding: 0 !important;">
    <div class="col-xm-12 col-sm-4 col-md-3 category_home " id="categories" >
        <?php $this->renderPartial('/elements/category') ?>
    </div>
    <div class="col-md-9 col-sm-8 col-xm-12 item_detail">
        <h4 class="our_product"> <span class="shooping_cart">SHOPPING </span> CART </h4>
        <div class="col-md-12 col-sm-12 col-xm-12">
            <div class="content_cart" id="content_cart">
                <?php if (!$is_has_item):?>
                    <div class="vote-content fix-cart">
                        <?php echo Yii::t('global', 'You have no items in your shopping cart.')?>

                    </div>
                <?php else: ?>
                    <?php echo CHtml::form('', 'post', array('id' => 'cart-form')); ?>
                    <div class="table_product_cart">
                        <div class="table-responsive" >
                            <?php $this->renderPartial('cart-products', compact('packages')); ?>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xm-12">
                                <span class="subtotal">
                                    <span class="text_subtotal">Subtotal :</span>
                                    <span class="price_subtotal _subtotal" id="subtotal">00.00</span>
                                </span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xm-12 btn_carts">
                        <div class="continue_shoping  col-md-4 col-sm-5 col-lg-3">
                                    <span class="formButton5" style="float:left; margin-left:10px;">
                                        <a href="/"> <input type="button" class="submit1" name="go" value="CONTINUE SHOPPING"></a>
                                    </span>
                        </div>

                        <div class="continue_shoping  col-sm-4 col-lg-3">
                                    <span class="formButton2" style="float:left; margin-left:10px;">
                                        <input type="submit" class="" name="go" value="QUICK CHECKOUT">
                                    </span>
                        </div>
                    </div>
                    <?php echo CHtml::endForm(); ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 our_customer">
                    <p class="text_our_custommer" ><?php echo Yii::t('global','VIEW OUR CUSTOMER TESTIMONIALS'); ?></p>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php foreach ( $customers as $customer) { ?>
                        <div class="wrapper_our_customer">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                            <img class="img-product_item" <?php echo "src='".Yii::app()->params['homeUrl']."/uploads/product/".$customer->image."'" ?> />
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <h4 class="name_customer" style="text-transform: uppercase;"><?php echo $customer->name; ?></h4>
                                <p  class="description_customer">
                                    <?php echo $customer->content; ?>
                                </p>
                            </div>
                        </div>
                  <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        document.getElementById('content_cart').scrollIntoView();
        $('.qty_cart').change(function(){
            cartState()
        });
        //$('.bid-item, .product-opt').click(function(){cartState()});
        cartState();
    });
    function cartState(){
        $.ajax( {
            type: "POST",
            url: '/cart/state',
            data: $('#cart-form').serialize(),
            success: function(data) {
                data = eval('(' + data + ')');
               /* $.each(data, function(key, value){
                    $('#' + key).html(value + ' &euro;');
                });*/
                $('.cart_count').text(data.cart_count);
                $('.price_subtotal').text(data.subtotal);
            }
        })
    }

    function removeCartItem(obj, id){
        $(obj).parent().parent().fadeOut('slow', function(){
            $(this).remove();
            cartState();
        });

        var n = $(obj).parent().parent().parent().find('.product').size();
        if((n-1)==0){
            $('.introduce_0').parent().html('');

        }
        $.get('/cart/remove?id='+id+'&shop_id=0');

    }
</script>