<div class="clearfix"></div>
<div class="container-fluid" style="margin: 0!important; padding: 0 !important;">
<div class="col-xm-12 col-sm-4 col-md-3 category_home " id="categories" >
    <?php $this->renderPartial('/elements/category') ?>
</div>

<div class="col-md-9 col-sm-8 col-xm-12 item_detail">
    <div class="shopping-cart"><?php echo Yii::t('global','Shopping')?> <span class="address"><?php echo Yii::t('global','Cart')?> </span></div>

        <div class="container-fluid fix-container-product"  >
            <?php echo CHtml::form('', 'post', array('id' => 'cart-form','name'=>'cartForm'));    ?>
            <div class="table-responsive">
                <?php $this->renderPartial('review-products', compact('packages','order')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="float: left;">
                    <tbody>
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-pice"><?php echo Yii::t('global','Subtotal after')?>  <?php echo Utils::CERNoPro(Yii::app()->settings->coupon_cart) ?> <?php echo Yii::t('global','off')?> :</td>
                        <td class="text-pice subtotal_after"> 00.00</td>
                    </tr>
                    <?php if( Yii::app()->settings->delivery_insurance > 0 ): ?>
                    <tr>
                        <td colspan="4" style="text-align: justify;"><span style="color:#1AA1E1; font-size:15px; margin-left: 20px;"><?php echo Yii::t('global','Delivery insurance '); ?> <?php echo Utils::CERNoPro(Yii::app()->settings->delivery_insurance) ?> </span>
                            <span> </span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="4" style="text-align: justify;"><span style="color:#1AA1E1; font-size:15px; margin-left: 20px;"><?php echo Yii::t('global','Shipping Delivery Estimates')?> :</span>
                            <span><?php echo Yii::t('global','Registered Mail (7 days) & Express Courier (3 days)')?> </span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;"><span class="samebill2" style="margin-left:18px;"><?php echo Yii::t('global','Free Delivery Insurance.')?>
                                             <span style="color:#000000;"><?php echo Yii::t('global','Protects all Shipment Deliveries 100%')?></span></span>
                            <span class="tabtotal"><?php echo Yii::t('global','Select Shipping Here')?> :</span>
                            <?php echo Yii::t('global',' Free Express Courier 3 days')?></td>

                    </tr>
                    <tr class="head_row_table">
                        <th colspan="4"></th>
                        <th style="text-align: left;"><?php echo Yii::t('global','Total')?></th>
                        <th style="text-align: right; width: 95px" class="total">00.00 </th>
                    </tr>

                    </tbody>
                </table>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'members-form',
            'enableAjaxValidation'=>false,
            )); ?>
            <div class="table table-bordered table-striped" >
                <div class="row" style="margin-top: 30px;">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'First Name'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'fname',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Last Name'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'lname',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Address'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'address',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'City'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'city',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'State'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'state',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Zipcode'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'postcode',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Country'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->dropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'short_name' ), array('class'=>'form-control validate[required]')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Email'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'email',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input" style="padding-bottom: 20px; margin-bottom: 20px;">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Home Phone'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'phone',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <p style="color:#000000; font-size:14px; font-weight:bold;"><?php echo Yii::t('global', '24/7 Phone & Email Support.'); ?> <br /><?php echo Yii::t('global', ' No Questions Asked. Money back guarantee'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="shopping-cart"><?php echo Yii::t('global', 'DELIVERY'); ?>
                                                <span class="address"><?php echo Yii::t('global', 'ADDRESS'); ?>
                                                </span>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <input name="billing_select" value="0" id="same_as_billing" type="checkbox" style="margin:0 10px; ">
                    <span class="samebill" style="text-transform:none;"><?php echo Yii::t('global', 'Same as the billing address'); ?></span>
                </div>
                <div class="col-md-5 col-lg-5">
                </div>
            </div>
            <div class="table table-bordered table-striped billing_hide">
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'First Name'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_fname',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Last Name'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_lname',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Address'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_address',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'City'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_city',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'State'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_state',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Zipcode'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_postcode',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Country'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->dropDownList($model, 'shipping_country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'short_name' ), array('class'=>'form-control validate[required]')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Email'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_email',array('class'=>'validate[custom[email],required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input" style="padding-bottom: 20px; margin-bottom: 20px;">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Home Phone'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($model,'shipping_phone',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"></div>
                        <div class="col-md-4 col-lg-4"></div>
                    </div>
                </div>
            </div>

            <div class="shopping-cart"><?php echo Yii::t('global', 'Payment'); ?> <span class="address"><?php echo Yii::t('global', 'Method'); ?></span></div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td><img src="/themes/default/images/cc_visa.png" width="100" height="60"></td>
                        <td><img src="/themes/default/images/cc_mastercard.png" width="100" height="60"></td>
                        <td><img src="/themes/default/images/cc_diners.png" width="100" height="60"></td>
                        <td><img src="/themes/default/images/cc_jcb.png" width="100" height="60"></td>
                        <td><img src="/themes/default/images/cc_amex.png" width="100" height="60"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="payment" value="Visa" id="visa" checked/> <label for="visa">Visa</label> </td>
                        <td><input type="radio" name="payment" value=" Master Card" id="ms"/>  <label for="ms">Master Card</label></td>
                        <td><input type="radio" name="payment"value="Diners Club" id="club"/>  <label for="club">Diners Club</label></td>
                        <td><input type="radio" name="payment" value="JCB" id="jcb"/>  <label for="jcb">JCB</label></td>
                        <td><input type="radio" name="payment" value="American Express" id="ae"/> <label for="ae">American Express</label> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="table table-bordered table-striped" >
                <div class="row" style="margin-top: 30px;">
                    <div class="content-input">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Full Name'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($payment,'full_name',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Card Number'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($payment,'card_number',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content-input" style="padding-bottom: 20px; margin-bottom: 20px;">
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'CVV Code'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-4 col-lg-4">
                            <?php echo $form->textField($payment,'cvv_code',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2"><?php echo Yii::t('global', 'Expires'); ?><span class="red-star" >*</span></div>
                        <div class="col-md-2 col-lg-2">
                            <?php
                            $this->widget('CJuiDateTimePicker',array(
                                'model'=>$payment,
                                'attribute'=>'expires_from',
                                'mode'=>'date',
                                'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                                'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                                'htmlOptions'=>array('class'=>'validate[required] form-control fix-validate ')
                            ));
                            ?>
                            <?php echo $form->error($payment,'expires_from'); ?>
                            <?php //echo $form->textField($payment,'expires_from',array('class'=>'validate[required] form-control')); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <?php
                            $this->widget('CJuiDateTimePicker',array(
                                'model'=>$payment,
                                'attribute'=>'expires_to',
                                'mode'=>'date',
                                'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                                'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                                'htmlOptions'=>array('class'=>'validate[required] form-control fix-validate-new ')
                            ));
                            ?>
                            <?php echo $form->error($payment,'expires_to'); ?>
                            <?php //echo $form->textField($payment,'expires_to',array('class'=>'validate[required] form-control')); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-bordered" style="padding-bottom: 20px;" >
                <div class="text-accept" >
                    <span>
                        <?php echo $form->checkBox($model,'subcriber',array('class'=>'validate[required]')); ?>
                    </span> <?php echo Yii::t('global', 'I agree to all the policies and terms laid
                    out in the footer of the site'); ?><span class="red-star" >*</span>
                </div>

            </div>
            <div class="text-accept1">
                <span class="formButton5"> <input class="submit1" type="submit" value="Continue" id="submitBtn"></span>
            </div>
            <?php $this->endWidget(); ?>

        </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        cartState();
    });
    function cartState(){
        $.ajax( {
            type: "POST",
            url: '/cart/stateReview',
            data: $('#cart-form').serialize(),
            success: function(data) {
                data = eval('(' + data + ')');
                /* $.each(data, function(key, value){
                 $('#' + key).html(value + ' &euro;');
                 });*/
                $('.cart_count').text(data.cart_count);
                $('.total').text(data.subtotal);
                var subtotal = data.subtotal.replace(".",'');
                var delivery = '<?php echo Utils::CERNoPro(Yii::app()->settings->delivery_insurance); ?>';
                var coupon ='<?php echo Utils::CERNoPro(Yii::app()->settings->coupon_cart); ?>';
                var subtotal_after = parseFloat(subtotal.substr(1)) - parseFloat(coupon.substr(1)) ;
                var subtotal_after_1 = subtotal_after + parseFloat(delivery.substr(1));

                $('.subtotal_after').text((subtotal_after_1.formatMoney(2, ',', '.')));
            }
        })
    }

    $('#same_as_billing').click(function() {
        if($(this).is(':checked')){
            $('.billing_hide').css('display','none');
        } else {
            $('.billing_hide').css('display','block');
        }
    });
    
  $('.fix-validate').change(function() {
        var valv = $(".fix-validate").val();
        if( valv != '' )
            $('.Payments_expires_fromformError').hide();
        else
            $('.Payments_expires_fromformError').show(); 
  });
  
  $('.fix-validate-new').change(function() {
    var valvn = $(".fix-validate-new").val();
        if( valvn != '' )
            $('.Payments_expires_toformError').hide();
        else
            $('.Payments_expires_toformError').show();
  });

</script>