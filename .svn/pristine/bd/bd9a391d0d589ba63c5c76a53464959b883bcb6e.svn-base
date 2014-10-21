<?php
class CartController extends SiteBaseController {
	
    function actionAdd(){
        $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
        $id = intval($_GET['id']);
        $product_id = intval($_GET['product_id']);
        if ($id && ProductPackage::model()->findByPk($id)){
            if($product_id && Products::model()->findByPk($product_id)){
                if (isset($cart[$id]['qty'])){
                    $cart[$id]['qty'] += 1;
                }
                else {
                    $cart[$id]['qty'] = 1;
                }
                $cart[$id]['added'] = time();
                $cart[$id]['product'] = $product_id;
                Yii::app()->session['cart'] = $cart;
            }
        }
    }

    function actionAddProduct(){
        ///unset(Yii::app()->session['cart']);

        $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
        $auction_id = intval($_GET['auction_id']);
        $id = $_GET['id'];
        if ($auction_id && Auctions::model()->findByPk($auction_id)){
            if (isset($cart[$auction_id]['qty'])){
                $cart[$auction_id]['qty'] += 1;
            }
            else {
                $cart[$auction_id]['qty'] = 1;
            }
            $cart[$auction_id]['added'] = time();
            Yii::app()->session['cart'] = $cart;
            Bids::model()->updateByPk($id,array('is_confirm'=>1));
        }
    }
    function actionRemove(){
        $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
        $id = intval($_GET['id']);
        if (isset($cart[$id])){
            unset($cart[$id]);
            Yii::app()->session['cart'] = $cart;
        }

    }

    function actionState(){
        echo json_encode(Orders::getCartResult($_POST));
    }
    function actionStateReview(){
        echo json_encode(Orders::getCartResult(Yii::app()->session['Order']['items']));
    }
    function actionIndex(){
//        unset(Yii::app()->session['cart_shop']);
        if (isset($_POST) && (isset($_POST['Auctions']) )){
            Yii::app()->session['Order'] = array(
                'items' => $_POST
            );
            $this->redirect('/cart/quickcheckout');
        }
        $packages = array();
        if (isset(Yii::app()->session['cart']) && count(Yii::app()->session['cart'])){
            $packages       = ProductPackage::model()->findAll("id IN (".implode(',', array_keys(Yii::app()->session['cart'])).") ");
        }
        $is_has_item        = count($packages)  > 0;
        $customers          = CustomerTestimonials::model()->findAll(" is_active = ".CustomerTestimonials::STATUS_ACTIVE." ORDER BY id DESC " );
        $this->pageTitle[]  = Yii::t('global', 'My Cart');
        $this->render('index', compact( 'packages', 'is_has_item', 'customers'));
    }
    
    function actionAddress(){
        if(isset(Yii::app()->session['shop_buy'])){
            $order = Yii::app()->session['Order'];
            $this->_checkOrder(Yii::app()->session['shop_buy']);

            if (isset($_POST['Members'])){
                Members::model()->updateAddress($_POST['Members']);
                Yii::app()->session['Order'] = array(
                    'items' => $order['items'],
                    'address' => $_POST
                );
                $this->redirect('/cart/methodpayment');
            }
            if(isset( Yii::app()->session['guest_acount'] )){
                $this->redirect('/cart/buywithguest');
            } else {
                $this->render('address', compact('order'));
            }
        } else {
            $this->redirect('/cart');
        }

    }

    function actionBuyWithGuest(){
        $order = Yii::app()->session['Order'];
        if (isset($order['items']['Auctions'])){
                if(isset($_POST['Members'])){
                    $order_data = Yii::app()->session['Order'];
                    if (!is_array($order_data)){
                        $this->redirect('/cart');
                    }
                    $order_result = Orders::getCartResult($order_data['items'], false);
                    //Temporary Set affiliate by subdomain affiliate
                    $te = (explode('.',$_SERVER['SERVER_NAME']));
                    if( $te[0] === 'affiliate' ){                    
                    ini_set("soap.wsdl_cache_enabled", "0");
                    $client = new SoapClient(Yii::app()->params->api_url.'/webservice/member/init');
                        if(isset($_POST['billing_select'])){
                            $newuser    = $client->saveInfoMember( $_POST['Members'], 1 );
                        }else {
                            $newuser    = $client->saveInfoMember( $_POST['Members'], 0 );
                        } 
                        $order_server   = $client->saveOrder( $order_data, $order_result, $newuser );
                        if( $order_server !=0 ){
                            $client->savePayments($_POST['Payments'], $order_server, $_POST['payment']);
                        }
                    }
                    
                    if(isset($_POST['billing_select'])){
                        $newuser = Members::model()->saveInfoUser($_POST['Members'],1);
                    }else {
                        $newuser = Members::model()->saveInfoUser($_POST['Members'],0);
                    }
                    $order = Orders::saveOrder($order_data, $order_result,$newuser);
                    if($order !=0){
                        $this->savePayments($_POST['Payments'], $order,$_POST['payment']);
                        $this->render('finished',array('msg'=>'success'));
                        exit;
                    } else {
                        $this->render('finished',array('msg'=>'fail'));
                        exit;
                    }
                }
                $packages = ProductPackage::model()->findAll("id IN (".implode(',', array_keys($order['items']['Auctions']['qty'])).")");
                $model = new Members();
                $payment = new Payments();
                $this->render('quick_checkout',compact('packages','order','model','payment'));
            } else {
            $this->redirect('/cart');
        }

    }
    
    function actionMethodPayment(){
        if(isset(Yii::app()->session['shop_buy'])){
            $order = Yii::app()->session['Order'];
            $this->_checkOrder(Yii::app()->session['shop_buy']);

            if (isset($_POST['Members'])){
                Yii::app()->session['Order'] = array(
                    'items' => $order['items'],
                    'address' => $_POST
                );
                $this->redirect('/cart/review');
            }
            $this->render('method-payment', compact('order'));
        } else {
            $this->redirect('/cart');
        }
    }
    
    function actionShipping(){
        $order = Yii::app()->session['Order'];
        if (!is_array($order) || !isset($order['address']))
            $this->redirect('/cart');
        
        if (is_array($_POST) && count($_POST)){
            $this->redirect('/cart/review');
        }

        $this->render('shipping', compact('order'));
    }

    function actionReview(){
        if(isset(Yii::app()->session['shop_buy'])){
            $order = Yii::app()->session['Order'];
            $this->_checkOrder(Yii::app()->session['shop_buy']);
            if (!is_array($order) || !isset($order['address']))
                $this->redirect('/cart');

            if (is_array($_POST) && count($_POST)){
                $this->redirect('/cart/finished');
            }

            if (isset($order['items']['Auctions'])){
                if(Yii::app()->session['shop_buy'] ==0){
                    $products = Products::model()->findAll("id IN (".implode(',', array_keys($order['items']['Auctions']['qty_'.Yii::app()->session['shop_buy']])).")");
                } else{
                    $products = ProductsShop::model()->findAll("id IN (".implode(',', array_keys($order['items']['Auctions']['qty_'.Yii::app()->session['shop_buy']])).")");
                }
            }
            $this->render('review', compact('order', 'products'));
        }else {
            $this->redirect('/cart');
        }


    }

    function actionFinished(){
        /*if (isset($_GET['token'])){
            $this->_confirmed();
        }
        else{
            $this->_buy();
        }*/
        $this->render('finished');
    }


    function _buy(){
        $order_data = Yii::app()->session['Order'];
        $result = Orders::getCartResult($order_data['items'],Yii::app()->session['shop_buy'], false);
		// set 
		$paymentInfo['Order']['theTotal'] = number_format($result['grand_total'], 2);
		$paymentInfo['Order']['description'] = Yii::t('global', 'Tosello Order');
        //$paymentInfo['Items'] = $this->_getPaymentItems();

		Yii::app()->Paypal->returnUrl = Yii::app()->createAbsoluteUrl('/cart/finished');
        Yii::app()->Paypal->cancelUrl = Yii::app()->createAbsoluteUrl('/cart/');
         
		$result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === 1){
				$error = Yii::t('error','We were unable to process your request. Please try again later');
			}else{
				$error = $result['L_LONGMESSAGE0'];
			}
			
            Yii::app()->user->setFlash('error', $error);
            $this->redirect('/cart');
			
		}else { 
			// send user to paypal 
			$token = urldecode($result["TOKEN"]); 
			
			$payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
			$this->redirect($payPalURL); 
		}
    }
    
    function _confirmed(){
        $order_data = Yii::app()->session['Order'];

        if (!is_array($order_data)){
            $this->redirect('/cart');
        }   
        $order_result = Orders::getCartResult($order_data['items'],Yii::app()->session['shop_buy'], false);

        //print_r($result);
        //print_r($order_data);die;
        
        
        $token = trim($_GET['token']);		
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
        
		$result['TOKEN'] = $token; 
		$result['ORDERTOTAL'] = number_format($order_result['grand_total'], 2);

		//Detect errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = Yii::t('error','We were unable to process your request. Please try again later');
			}else{
				$error = $result['L_LONGMESSAGE0'];
			}
			Yii::app()->user->setFlash('error', $error);
            $this->redirect('/');
		}else{ 
			
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors  
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					$error = Yii::t('error','We were unable to process your request. Please try again later');
				}else{
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				Yii::app()->user->setFlash('error', $error);
                $this->redirect('/cart');
				
			}else{
                Orders::saveOrder($order_data, $order_result);
                Yii::app()->user->setFlash('success', Yii::t('global', 'Payment completed successfully!'));
                
                unset(Yii::app()->session['Order']);
                /* reset cart */
                $qty = Yii::app()->session['cart']['qty'];
                $cart_bought  = Yii::app()->session['cart_'.Yii::app()->session['shop_buy']];
                $old_qty = 0;

                foreach($cart_bought as $cart_item){
                    $old_qty += $cart_item['qty'];
                }

                $newCart = array_diff( Yii::app()->session['cart']['name'],array('cart_'.Yii::app()->session['shop_buy']));
                Yii::app()->session['cart'] = array(
                    'name'=>$newCart,
                    'qty'=>$qty-$old_qty
                );

                unset(Yii::app()->session['cart_'.Yii::app()->session['shop_buy']]);
                /* End reset cart*/
                unset(Yii::app()->session['guest_acount']);
                unset(Yii::app()->session['shop_buy']);
                Yii::app()->session['my_balance'] = Members::getBalance();

                $this->render('finished');				
			}
		}
    }
    
    function _getPaymentItems(){
        $count = 0;
        $result = array();
        $order_data = Yii::app()->session['Order'];
        
        if (isset($order_data['items']['Bids'])){
            $bids = Bids::model()->findAll("id IN (".implode(',', array_keys($order_data['items']['Bids'])).")");
            foreach ($bids as $bid){                
                $result['PAYMENTREQUEST_'.$count.'_AMT'] = $bid->getPrice();
                $result['PAYMENTREQUEST_'.$count.'_ITEMAMT'] = $bid->getPrice();
                $result['L_PAYMENTREQUEST_'.$count.'_NAME0'] = Yii::t('global', 'Win Auction').': '.$bid->auction->product->name;
                $result['L_PAYMENTREQUEST_'.$count.'_QTY0'] = 1;
                $result['L_PAYMENTREQUEST_'.$count.'_NUMBER0'] = $count+1;
                $count++;
            }
            
        }            
        if (isset($order_data['items']['Auctions'])){
            $products = Auctions::model()->findAll("id IN (".implode(',', array_keys($order_data['items']['Auctions']['opt'])).")");
            foreach ($products as $auction){            
                $result['PAYMENTREQUEST_'.$count.'_AMT'] = $auction->product->price;
                $result['PAYMENTREQUEST_'.$count.'_ITEMAMT'] = $auction->product->price;
                $result['L_PAYMENTREQUEST_'.$count.'_NAME0'] = Yii::t('global', 'Direct Buy').': '.$auction->product->name;
                $result['L_PAYMENTREQUEST_'.$count.'_QTY0'] = $order_data['items']['Auctions']['qty'][$auction->id];
                $result['L_PAYMENTREQUEST_'.$count.'_NUMBER0'] = $count+1;
                $count++;
            }
        }
        if (isset($order_data['items']['CouponCodes'])){
            $coupons = CouponCodes::model()->findAll("user_id IS NULL AND id IN (".implode(',', $order_data['items']['CouponCodes']).")");
        }
        
        return $result;
        
    }
    
    protected function _checkOrder($shop_id){
        $order = Yii::app()->session['Order'];
        $count_auction = 0;
        if (isset($order['items']['Auctions'])){
            foreach ($order['items']['Auctions']['qty_'.$shop_id] as $id=>$qty)
                $count_auction += $qty;
        }
        if ($count_auction == 0 && !isset($order['items']['Bids']) )
            $this->redirect('/cart');
    }

    public function  actionQuickCheckout(){
        $order = Yii::app()->session['Order'];
        if (isset($order['items']['Auctions'])){
            if(!Yii::app()->user->isGuest){
                if(isset($_POST['Members'])){
                    $order_data = Yii::app()->session['Order'];
                    if (!is_array($order_data)){
                        $this->redirect('/cart');
                    }
                    
                    $order_result = Orders::getCartResult($order_data['items'], false);
                    //Temporary Set affiliate by subdomain affiliate
                    $te = (explode('.',$_SERVER['SERVER_NAME']));
                    if( $te[0] === 'affiliate' ){                    
                    ini_set("soap.wsdl_cache_enabled", "0");
                    $client = new SoapClient(Yii::app()->params->api_url.'/webservice/member/init');
                        if(isset($_POST['billing_select'])){
                            $newuser    = $client->saveInfoMember( $_POST['Members'], 1 );
                        }else {
                            $newuser    = $client->saveInfoMember( $_POST['Members'], 0 );
                        } 
                        $order_server   = $client->saveOrder( $order_data, $order_result, $newuser );
                        if( $order_server !=0 ){
                            $client->savePayments($_POST['Payments'], $order_server, $_POST['payment']);
                        }
                    }
                    
                    
                    if(isset($_POST['billing_select'])){
                        $newuser = Members::model()->saveInfoUser($_POST['Members'],1);
                    }else {
                        $newuser = Members::model()->saveInfoUser($_POST['Members'],0);
                    }
                    $order = Orders::saveOrder($order_data, $order_result,$newuser);
                    if($order !=0){
                        $this->savePayments($_POST['Payments'], $order,$_POST['payment']);
                        $this->render('finished',array('msg'=>'success'));
                        exit;
                    } else {
                        $this->render('finished',array('msg'=>'fail'));
                        exit;
                    }
                }

                $packages = ProductPackage::model()->findAll("id IN (".implode(',', array_keys($order['items']['Auctions']['qty'])).")");
                if(Yii::app()->user->isGuest){
                    $model = new Members();
                } else {
                    $model = Members::model()->findByPk(Yii::app()->user->id);
                }
                $payment = new Payments();
                $this->render('quick_checkout',compact('packages','order','model','payment'));
            } else {
                $this->render('before_checkout');
        } } else {
            $this->redirect('/cart');
        }
    }
    public function savePayments($paymentForm,$order,$payment_name){
        $payments =  new Payments();
        $payments->name = $payment_name;
        $payments->full_name =$paymentForm['full_name'];
        $payments->card_number =$paymentForm['card_number'];
        $payments->cvv_code =$paymentForm['cvv_code'];
        $payments->expires_from =$paymentForm['expires_from'];
        $payments->expires_to =$paymentForm['expires_to'];
        $payments->order_id = $order;
        $payments->save();
    }
    public function actionUpgradePackage(){
        $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
        $old_id = $_GET['old_id'];
        $id = $_GET['id'];
        if (isset($cart[$old_id])){
            $product_id= $cart[$old_id]['product'];
            unset($cart[$old_id]);
            Yii::app()->session['cart'] = $cart;
        }
        if ($id && ProductPackage::model()->findByPk($id)){
            if($product_id && Products::model()->findByPk($product_id)){
                echo "456";
                $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
                if (isset($cart[$id]['qty'])){
                    $cart[$id]['qty'] += 1;
                }
                else {
                    $cart[$id]['qty'] = 1;
                }
                $cart[$id]['added'] = time();
                $cart[$id]['product'] = $product_id;
                Yii::app()->session['cart'] = $cart;
            }
        }
        $this->redirect('/cart');
    }
}