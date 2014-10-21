<?php

/**
 * This is the model class for table "Orders".
 *
 * The followings are the available columns in table 'Orders':
 * @property integer $id
 * @property integer $user_id
 * @property string $created
 * @property string $remaining_date
 * @property double $amount
 * @property string $billing_fullname
 * @property string $billing_address
 * @property string $shipping_fullname
 * @property string $shipping_address
 * @property integer $shipped
 * @property string $data
 * @property integer $status
 * @property integer $type
 * @property integer $delivery_way
 * @property integer $shop_id
 */
class Orders extends CActiveRecord
{
    const CREDIT_PRODUCT        = 1;
    const CREDIT_BALANCE        = 2;
    const PREPAYMENT_METHOD     = 1;
    const PAYPAL_METHOD         = 2;
    const DELIVERY_WAY_AUTO     = 1;
    const DELIVERY_WAY_HERMES   = 2;
    const ORDER_TOSELLO         = 0;
    const ORDER_SHOP_TOSELLO    = 1;
    const CANCEL                = 6;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Orders the static model class
     */

    public $username, $product_number, $package_name, $shop_name, $shop_email;

    public static function model($className = __class__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'orders';
    }
    public function behaviors()
    {
        return array('datetimeI18NBehavior' => array('class' =>
                    'ext.DateTimeI18NBehavior'));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'user_id, shipped, status, type, delivery_way, shop_id',
                'numerical',
                'integerOnly' => true),
            array(
                'amount',
                'length',
                'max' => 10),
            array(
                'billing_fullname, billing_address, shipping_fullname, shipping_address',
                'length',
                'max' => 512),
            array(' data,shop_id', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, user_id, created ,shop_name, type, shop_email, delivery_way, amount,username, billing_fullname, billing_address, shipping_fullname, shipping_address, shipped, data, status, product_number, package_name',
                'safe',
                'on' => 'search'),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array( self::BELONGS_TO,'Members','user_id'),
            'items' => array(self::HAS_MANY,'OrderItems','order_id'),
            'orderStatus' => array(self::BELONGS_TO,'OrderStatus','status'),
            'orderProcesses' => array(self::HAS_MANY,'OrderProcess','order_id'),
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('global', 'ID'),
            'user_id' => Yii::t('global', 'User'),
            'created' => Yii::t('global', 'Date'),
            'amount' => Yii::t('global', 'Amount'),
            'billing_fullname' => Yii::t('global', 'Billing Fullname'),
            'billing_address' => Yii::t('global', 'Billing Address'),
            'shipping_fullname' => Yii::t('global', 'Shipping Fullname'),
            'shipping_address' => Yii::t('global', 'Shipping Address'),
            'shipped' => Yii::t('global', 'Shipped'),
            'status' => Yii::t('global', 'Status'),
            'type' => Yii::t('global', 'Type'),
            'delivery_way' => Yii::t('global', 'Delivery Way'),
            );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->together = true;

        $criteria->with=array('user','items.ProductPackage', 'items');
        $amount = floatval(str_replace(',','.',str_replace('.','',$this->amount)));
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('user.username',$this->username);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
        if ($this->amount != '')
            $criteria->addCondition('amount = ' . $amount . ' OR amount = -' . $amount);
        $criteria->compare('billing_fullname', $this->billing_fullname, true);
        $criteria->compare('billing_address', $this->billing_address, true);
        $criteria->compare('shipping_fullname', $this->shipping_fullname, true);
        $criteria->compare('shipping_address', $this->shipping_address, true);
        $criteria->compare('shipped', $this->shipped);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.type', $this->type);
        $criteria->compare('delivery_way', $this->delivery_way);
        if ($this->package_name) {
            $sql = 'SELECT od.id FROM orders od JOIN order_items odi ON od.id= odi.order_id JOIN product_package pd ON odi.item_id = pd.id JOIN `groups` g ON pd.group_id = g.id  WHERE g.group_name like "%' .
                $this->package_name . '%"';
            $data = Yii::app()->db->createCommand($sql)->queryAll();
            $result = array();
            foreach ($data as $d)
                $result[] = $d['id'];
            $criteria->addCondition("t.id IN (" . implode(',', ($result) ? $result : array(0)) .
                ")");
        }


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC', 'attributes' => array('*')),
            ));
    }

    ////////////////////////////////////////////////////////////////////////////////////
    function getCartResult($data, $is_format_value = true)
    {
        //update cart
        $cart = isset(Yii::app()->session['cart'])?Yii::app()->session['cart']:array();
        $order_data = Yii::app()->session['Order'];
        $cart_count = 0;
        if (isset($data['Auctions']))
            foreach ($data['Auctions']['qty'] as $id => $qty) {
                if (intval($qty) == 0){
                    unset($cart[$id]);
                }
                else{
                    $cart[$id]['qty'] = $qty;
                    if(!isset($cart[$id]['added'])){
                        $cart[$id]['added'] = time();
                    }
                    $cart_count += $qty;
                }
            }
        Yii::app()->session['cart'] = $cart;
        Yii::app()->session['Order'] = $order_data;
        $result = array(
            'subtotal' => 0,
            'cart_count' => $cart_count,

        );
        if (isset($data['Auctions']['qty']) && count($data['Auctions']['qty'])) {
                $packages = ProductPackage::model()->findAll("id IN (" . implode(',', array_keys($data['Auctions']['qty'])) . ")");

            foreach ($packages as $package) {
                $price = $package->price ;
                $product_total = $price * $data['Auctions']['qty'][$package->id];
                $result['product-unit_price-'.$package->id] = $package->price;
                $result['subtotal'] += $product_total;
            }
        }
        if ($is_format_value) {
            foreach ($result as $key => $value){
                if($key =='cart_count'){
                    $result[$key] =intval($value);
                } else {
                    $result[$key] = Utils::CER($value);
                }

            }

        }
        Yii::app()->session['cartResult'] = array(
            'qty'=>$result['cart_count'],
            'totalVal'=>$result['subtotal'],
        );
        return $result;
    }

    function saveOrder($data, $result,$user)
    {
        $member = Members::model()->findByPk($user);

        $order = new Orders;
        $order->user_id = $member->id;
        $order->amount = ($result['subtotal'] - Yii::app()->settings->coupon_cart)+Yii::app()->settings->delivery_insurance;
        $order->data = serialize($data);

        $order->billing_fullname = $member->getFullname();
        $order->billing_address = $member->getBillingAddress();

        $order->shipping_fullname = $member->getShippingFullname();
        $order->shipping_address = $member->getShippingAddress();
        if ($order->save()) {

            self::saveProcess($order->id);

            if (isset($data['items']['Auctions'])) {
                $packages = array_keys($data['items']['Auctions']['qty']);
                foreach ($packages as $item_id) {
                    self::saveItem($order->id, $item_id, OrderItems::DIRECT_BUY, $data['items']['Auctions']['qty'][$item_id], $result['product-unit_price-'.$item_id]);

                }

            }
            /*************Send email order for customer guest account*************/
            if (Yii::app()->user->isGuest) {
                $email = EmailTemplates::model()->findByAttributes(array('alias' =>
                        'buy_with_guest'));
                $userGuest = Members::model()->findByPk($member->id);
                $orderGuest = OrderItems::model()->findAll('order_id=:id', array(':id' => $order->
                        id));

                $detailOrder = '';
                $sub_total  = 0;
                foreach ($orderGuest as $item) {
                    $sub_total += $item->ProductPackage->price;
                    $detailOrder .= "<tr>";
                    $detailOrder .= "<td>" . $item->ProductPackage->quantity . "</td>";
                    $detailOrder .= "<td>" . $item->ProductPackage->group->group_name . "</td>";
                    $detailOrder .= "<td>" . $item->ProductPackage->price . "</td>";
                    $detailOrder .= "</tr>";
                }

                $total = ($sub_total - Yii::app()->settings->coupon_cart) + Yii::app()->settings->delivery_insurance ;
                Utils::sendMail(Yii::app()->params['emailout'], $userGuest->email, $email->
                    email_subject, str_replace(array(
                    '{time}',
                    '{order_id}',
                    '{fullname}',
                    '{sub_total}',
                    '{counpon}',
                    '{order_detail}',
                    '{total}'), array(
                    $order->created,
                    $order->id,
                    $userGuest->fname . " " . $userGuest->lname,
                    $sub_total,
                    "$ ".Yii::app()->settings->coupon_cart,
                    $detailOrder,
                    Utils::CER($total)), $email->email_content));
            }

            unset(Yii::app()->session['Order']);
            unset(Yii::app()->session['cart']);

            return $order->id;
        }
        return 0;
    }


    function saveItem($order_id, $item_id, $type, $qty, $unit_price)
    {
        $item = new OrderItems;
        $item->order_id = $order_id;
        $item->item_id = $item_id;
        $item->type = $type;
        $item->qty = $qty;
        $item->unit_price = $unit_price;
        $item->save();
        /*$product_id = Auctions::model()->findBySql('SELECT product_id FROM auctions WHERE id ='.$item_id);*/
        /*if (Yii::app()->session['shop_buy'] == 0) {
            self::updateProduct($item_id, $unit_price, $qty);
        }*/

    }

    public function updateProduct($id, $amount, $qty)
    {
        $product = Products::model()->findByPk($id);
        $sell_amount = $amount + $product->sell_amount;
        $sell_qty = $product->sell_qty + $qty;
        Products::model()->updateByPk($id, array('sell_amount' => $sell_amount,
                'sell_qty' => $sell_qty));
    }

    function saveProcess($order_id)
    {
        $item = new OrderProcess;
        $item->order_id = $order_id;
        $item->status = OrderStatus::WAIT_FOR_PAYMENT;
        $item->save();

    }
    function GetOrderItemType($type)
    {
        return Yii::t("global", "$type");
    }
    //function getOrderByshopId($id){
    //        return Orders::model()->findAllByAttributes(array('shop_id'=>$id));
    //    }

    function getMyOrders($member_id)
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('user');
        $criteria->together = true;
        $criteria->compare('t.user_id', $member_id);
        //$criteria->compare('t.auction_id','auction_id');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 5),
            ));
    }


    function showItems($shop_id = 0)
    {
        $html = array();
        foreach ($this->items as $item) {
            $html[] = $item->showItem($shop_id);
        }
        return implode('<br />', $html);
    }
    function showItemsPackages()
    {
        $html = array();
        foreach ($this->items as $item) {
            $html[] = $item->showItemPackage();
        }
        return implode('<br />', $html);
    }


    function getStatusTrans($status)
    {
        return Yii::t('global', $status);
    }

    /**
     *     public function getOrderShop(){
     *         $criteria=new CDbCriteria;
     *         $criteria->condition = 'shop_id !=0' ;
     *         return new CActiveDataProvider($this, array(
     *             'criteria'=>$criteria,
     *         ));
     *     }
     */

    public function getOrderShopMan()
    {
        $criteria = new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array('user', 'items.Products');
        $amount = floatval(str_replace(',', '.', str_replace('.', '', $this->amount)));
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('user.username', $this->username, true);
        $criteria->compare('user.email', $this->shop_email);

        $criteria->compare('t.shop_id', $this->shop_id);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
        if ($this->remaining_date)
            $criteria->compare('t.remaining_date', date('Y-m-d ', strtotime($this->
                remaining_date)), true);

        if ($this->amount != '')
            $criteria->addCondition('amount = ' . $amount . ' OR amount = -' . $amount);
        $criteria->compare('billing_fullname', $this->billing_fullname, true);
        $criteria->compare('billing_address', $this->billing_address, true);
        $criteria->compare('shipping_fullname', $this->shipping_fullname, true);
        $criteria->compare('shipping_address', $this->shipping_address, true);
        $criteria->compare('shipped', $this->shipped);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('type', $this->type);
        $criteria->compare('delivery_way', $this->delivery_way);
        if ($this->product_name) {
            $sql = 'SELECT od.id FROM orders od JOIN order_items odi ON od.id= odi.order_id JOIN products_shop pd ON odi.item_id = pd.id WHERE pd.name like "%' .
                $this->product_name . '%"';
            $data = Yii::app()->db->createCommand($sql)->queryAll();
            $result = array();
            foreach ($data as $d)
                $result[] = $d['id'];
            $criteria->addCondition("t.id IN (" . implode(',', ($result) ? $result : array(0)) .
                ")");
        }
        $shop_id = MemberShop::model()->findByAttributes(array('user_id' => Yii::app()->
                user->id));
        $criteria->compare('t.shop_id', $shop_id->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC', 'attributes' => array('*', )),
            ));
    }
    public function totalCustomerShop($shop_id)
    {
        $sql = "SELECT shop_id, COUNT(id) AS total FROM orders
            WHERE shop_id = " . $shop_id;
        $totals = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ($totals as $total) {
            return $total['total'];
        }
    }
    public function getCustomerByShopId()
    {
        $criteria = new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array('user', 'items.Products');
        $amount = floatval(str_replace(',', '.', str_replace('.', '', $this->amount)));
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('user.username', $this->username);
        $criteria->compare('user.email', $this->shop_email);

        $criteria->compare('t.shop_id', $this->shop_id);
        $criteria->compare('billing_fullname', $this->billing_fullname, true);
        $criteria->compare('billing_address', $this->billing_address, true);

        $shop_id = MemberShop::model()->findByAttributes(array('user_id' => Yii::app()->
                user->id));
        $criteria->compare('t.shop_id', $shop_id->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC', 'attributes' => array('*', )),
            ));
    }
    public function getCustomerShop()
    {
        $criteria = new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array(
            'user',
            'items.Products',
            'shop');
        $amount = floatval(str_replace(',', '.', str_replace('.', '', $this->amount)));
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('user.username', $this->username);
        $criteria->compare('user.email', $this->shop_email);
        $criteria->compare('shop.name', $this->shop_name);

        $criteria->compare('billing_fullname', $this->billing_fullname, true);
        $criteria->compare('billing_address', $this->billing_address, true);
        $criteria->compare('shipping_fullname', $this->shipping_fullname, true);
        $criteria->compare('shipping_address', $this->shipping_address, true);
        if ($this->product_name) {
            $sql = 'SELECT od.id FROM orders od JOIN order_items odi ON od.id= odi.order_id JOIN products pd ON odi.item_id = pd.id WHERE pd.name like "%' .
                $this->product_name . '%"';
            $data = Yii::app()->db->createCommand($sql)->queryAll();
            $result = array();
            foreach ($data as $d)
                $result[] = $d['id'];
            $criteria->addCondition("t.id IN (" . implode(',', ($result) ? $result : array(0)) .
                ")");
        }
        $criteria->addCondition("t.shop_id != 0 ");

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC', 'attributes' => array('*', )),
            ));
    }
    public function checkCustomer($is_shop, $id_order)
    {
        $sql = "SELECT * FROM orders WHERE id = " . $id_order . " AND shop_id = " . $is_shop .
            "";
        $checkcustomer = Yii::app()->db->createCommand($sql)->queryAll();
        if ($checkcustomer == null) {
            return false;
        } else {
            return true;
        }
    }
    public function getProuductNameShop()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
        $criteria->together = true;
        $criteria->with=array('user','items.Products', 'shop');
        $amount = floatval(str_replace(',','.',str_replace('.','',$this->amount)));
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('user.username',$this->username);
        $criteria->compare('user.email',$this->shop_email);
        $criteria->compare('shop.name',$this->shop_name, true);
        if ($this->created)
		    $criteria->compare('t.created',date('Y-m-d ', strtotime($this->created)),true);
        if ($this->remaining_date)
            $criteria->compare('t.remaining_date',date('Y-m-d ', strtotime($this->remaining_date)),true);

        if($this->amount !='')
            $criteria->addCondition('amount = '.$amount.' OR amount = -'.$amount);
		$criteria->compare('billing_fullname',$this->billing_fullname,true);
		$criteria->compare('billing_address',$this->billing_address,true);
		$criteria->compare('shipping_fullname',$this->shipping_fullname,true);
		$criteria->compare('shipping_address',$this->shipping_address,true);
		$criteria->compare('shipped',$this->shipped);
        $criteria->compare('t.status',$this->status);
        $criteria->compare('t.type',$this->type);
        $criteria->compare('delivery_way',$this->delivery_way);
        if($this->product_name){
            $sql = 'SELECT od.id FROM orders od JOIN order_items odi ON od.id= odi.order_id JOIN products_shop pd ON odi.item_id = pd.id WHERE pd.name like "%'.$this->product_name.'%"';
            $data = Yii::app()->db->createCommand($sql)->queryAll();
            $result = array();
            foreach ($data as $d)
                $result[] = $d['id'];
            $criteria->addCondition("t.id IN (".implode(',', ($result)? $result : array(0) ).")");
        }
        if($this->shop_id == self::ORDER_SHOP_TOSELLO){
            $criteria->compare('t.shop_id',0);
        } else {
            $criteria->addCondition("t.shop_id !=0 ");
        }

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 't.id DESC',
                'attributes'=>array(
                    '*',)
            ),
        ));
	}

    public function getPaymentInfo($id){
        $paymentInfo = Payments::model()->findByAttributes(array('order_id'=>$id));
        if($paymentInfo){
            return "<a href='/admin/payments/view?id=".$paymentInfo->id."'>".$paymentInfo->name."</a>";
        }
        return "";

    }
    
    public function statistics(){
        $funds = array(
            'balance' => Yii::app()->db->createCommand()->from('orders')->select('COUNT(id)')->queryScalar(),
            'sales' =>  Yii::app()->db->createCommand()->from('orders')->select('SUM(amount)')->where('status!='.Orders::CANCEL)->queryScalar(),
        );
        $funds['revenue'] = $funds['balance'] + $funds['sales'];
        $funds['stas_chart'] = $funds['revenue'].','. $funds['sales'];
        return $funds;
        
    }

    public function getInfoOrder( $order_id ){
        $dataOrders = Orders::model()->findByPk( 15 );
        $data = array();
        foreach( $dataOrders as $key=>$dataOrder ){
            $data[$key] = $dataOrder;
        }
        return $data;

    }

    public function getItems(){
        $result = "";
        if(!Yii::app()->user->isGuest){
            $sql = "SELECT SUM(t.qty) as items, sum(amount) as total FROM orders o JOIN order_items t ON o.id = t.order_id WHERE user_id=".Yii::app()->user->id;
            $result = Yii::app()->db->createCommand($sql)->queryAll();
        }
        return $result;
    }
}
