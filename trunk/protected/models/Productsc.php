 <?php

 /**
  * This is the model class for table "products".
  *
  * The followings are the available columns in table 'products':
  * @property integer $id
  * @property string $name
  * @property string $image
  * @property string $created
  * @property string $updated
  * @property string $description
  * @property integer $is_home
  * @property string $alias
  *
  * The followings are the available model relations:
  * @property ProductCategories[] $productCategories
  * @property ProductGalleries[] $productGalleries
  */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	const STATUS_ACTIVE                 = 1;
	const STATUS_PUBLIC                 = 1;
	public $category;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}
	public function behaviors()
	{
		return array('datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior')); 
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pdf', 'file', 'allowEmpty'=>true, 'types'=>'pdf', 'message'=>'pdf files only', 'on'=>'create'),
			array('pdf', 'file', 'allowEmpty'=>true, 'types'=>'pdf', 'message'=>'pdf files only', 'on'=>'update'),
			array('name, type, grip, description', 'required'),
			array('type, is_home', 'numerical', 'integerOnly'=>true),
			array('name, alias, type, image, pdf, grip', 'length', 'max'=>255),
			array('created, updated, description', 'safe'),
			array('id, name, pdf, grip, oder_product_id, image, created, updated, description, is_home, alias, category', 'safe', 'on'=>'search'),
			array('alias', 'CheckUniqueAlias'),
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
			'productCategories' => array(self::HAS_MANY, 'ProductCategories', 'product_id'),
			'productComments' => array(self::HAS_MANY, 'ProductComments', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'name' => Yii::t('global', 'Name'),
			'alias' => Yii::t('global', 'Alias'),
			'type' => Yii::t('global', 'Type'),
			'image' => Yii::t('global', 'Image'),
			'pdf' => Yii::t('global', 'Pdf'),
			'grip' => Yii::t('global', 'Grip'),
			'oder_product_id' => Yii::t('global', 'Link Oder  Article'),
			'description' => Yii::t('global', 'Description'),
			'is_home' => Yii::t('global', 'Disable in home ?'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
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

		$criteria=new CDbCriteria;
		$criteria->together = true;
		$criteria->with = array('productCategories.category');
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.image',$this->image,true);
		$criteria->compare('t.created',$this->created,true);
		$criteria->compare('t.updated',$this->updated,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('is_home',$this->is_home);
		$criteria->compare('category.id',$this->category);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('oder_product_id',$this->oder_product_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'t.id DESC',
				'attributes'=>array(
					'category'=>array(
						'asc'=>'category.name',
						'desc'=>'category.name DESC',
					),
					'*',
				),
			),
		));
	}

	public function getCategoriesId(){
		if ($this->id){        
			$models = ProductCategories::model()->findAllByAttributes(array('product_id' => $this->id)); 
			$arr = array();
			foreach ($models as $model)
				$arr[] = $model->category_id;
				
			return $arr;
		}
		return array();
	}
	
	
	function GetProductNew( $limit ){
		$criteria = new CDbCriteria;
		$criteria->together = true;
		$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	} 
	
	function showAdminImage(){
		if($this->image !=''){
			return '<a class="fancybox" href="/uploads/product/'.$this->image.'" rel="group">
						<img class="img-polaroid fix_image_products" src="/uploads/product/'.$this->image.'" style="height: 40px;"/>
					</a>';
		}
		else{
			return null;
		}
	}
	
	function showAdminImageNew( $image ){
        if( $image !='' ){
		return '<a class="fancybox" href="/uploads/product/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/product/'.$image.'" style="height: 40px;"/>
				</a>';
        }
        else{
            return null;
        }
	}
	
	function getIdsOfCategory($category_id){
		$results = array();
		$ids = ProductCategories::model()->findAllByAttributes(array('category_id' => $category_id));
		foreach ($ids as $id){
			$results[]  = $id->product_id;
		}
		return $results;
	}    
	
	function canDelete(){
		//return $this->auction_count == 0;
	}

	function getProductCategory($id){
		$catProducts = ProductCategories::model()->findAllByAttributes(array('product_id' => $id));
		$listCatProduct ="";
		foreach($catProducts as $catProduct){
			$listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/categories/view/?id='.$catProduct['category']['id']).">".$catProduct['category']['name']."</a></label>";
		}
		return $listCatProduct;
	}
	
	function getStatusProduct($status){
		if($status==self::STATUS_ACTIVE)
			return Yii::t('global','Enable');
		return Yii::t('global','Disable');
	}

	function getActiveProduct(){
		$active_product = array(
		  Yii::t('global','Disable'),
		  Yii::t('global','Enable')
		);
		return $active_product;
	}

	function getTypeProduct($status){
		if($status==self::STATUS_PUBLIC)
			return Yii::t('global','Public');
		return Yii::t('global','Professional');
	}

	function getPublicProduct(){
		$public_product = array(
			Yii::t('global','Professional'),
			Yii::t('global','Public')		  
		);
		return $public_product;
	}

	function getProductByCate( $cate_id, $limit = 0 ){
		 $tableProduct = Products::tableName();
		 $sql = "SELECT products.*
				FROM products 
				INNER JOIN product_categories
				ON products.id = product_categories.product_id
				WHERE product_categories.category_id = ".$cate_id." ORDER BY products.id DESC";
		 if( $limit > 0 )
			$sql .= " LIMIT ".$limit;
		 return Yii::app()->db->createCommand($sql)->queryAll();
	}
	
	/**
	 * Check alias and language combination
	 */
	public function CheckUniqueAlias()
	{
		if( $this->isNewRecord )
		{
			// Check if we already have an alias with those parameters
			if( self::model()->exists('alias=:alias', array(':alias' => $this->alias) ) ){
				$this->alias .= '-1';
				$this->CheckUniqueAlias();
			}
		}
		else
		{
			// Check if we already have an alias with those parameters
			if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )         {
				$this->alias .= '-1'.$this->id;;
				$this->CheckUniqueAlias();
			}
		}
	}
	
	public function CheckUniqueAliasNew( $id ,$alias )
	{
			// Check if we already have an alias with those parameters
			if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $id, ':alias' => $alias ) ) )         {
				  $alias .= '-'.$id;
			}
			return $alias;
	}
	
	public function getAliasLabels(  ){
			$this->alias = strtolower(str_replace(' ', '-', $this->name));
			$this->alias = strtolower(str_replace('~[^-\w]+~', '', $this->alias));
			$this->alias = preg_replace('/[^A-Za-z0-9_\-]/', '', $this->alias);
			$this->alias = strtolower(str_replace("'", '', $this->alias));  
			$this->alias = $this->CheckUniqueAliasNew( $this->id, $this->alias );
			Yii::app()->db->createCommand()
					->update( 'products',
						array( 'alias' => $this->alias ),
						'id =:id',
						array( ':id'=> $this->id )
					);
		}
	
	/**
	 * Before save operations
	 */
	public function beforeSave()
	{
		$this->alias = strtolower(str_replace(' ', '-', $this->name));
		$this->alias = strtolower(str_replace(array('+', '&'), '', $this->alias));
			
		return parent::beforeSave();
	}
	
	public function getTotalProduct()
	{
		return Yii::app()->db->createCommand("SELECT COUNT(*) FROM products ")->queryScalar();
	}
	
	function getProductRecommend( $limit = 10 ){
		$table_product = self::tableName();
		return Yii::app()->db->createCommand()
											->select('*')
											->from( $table_product )
											//->where('is_home=1')
											->order('id DESC')
											->limit( $limit )
											->queryAll();
	}   
	public function getNameProduct($product_id){
		$result = Products::model()->find(array(
					'select'=>'name',
					'condition'=>'id=:id',
					'params'=>array( ':id'=>$product_id ) )
			);

		  return  $result['name'];
	} 
	
	public function getAllProductsByLikeName($name,$free_shipping,$reduced,$in_stock,$category,$price){
		//var_dump($free_shipping);exit();
		 $criteria = new CDbCriteria();
		 $sort     = 'id DESC'; 
		if(isset($_POST['sort']))
		   Yii::app()->session['sort'] = $_POST['sort'];
		$sort = isset(Yii::app()->session['sort'])?Yii::app()->session['sort']:$sort;
		$product_ids = Products::model()->getIdsOfProductsLikeName($name,$free_shipping,$reduced,$in_stock,$price);
		$criteria->order = $sort;
		if($free_shipping!='')
			$free_shipping = "AND shipping_cost=0";
		if($reduced!='')
			$reduced = "AND discount_percent!=0";
		if($in_stock!='')
			$in_stock = "AND shipping_immediately=1";
		if($price!=''){
			$min = strstr($price, '-',true);
			$max = substr(strrchr($price, "-"), 1);
			$price = " AND price_purchase BETWEEN $min AND $max";
		 }
		 if($category!=''&&$category!='null'){
			 $criteria->join="JOIN product_categories ON t.id = product_categories.product_id";
			 $category = " AND product_categories.category_id=".$category;
		 }elseif($category!='null'){
			$criteria->join="JOIN product_categories ON t.id = product_categories.product_id";
			$category = " AND product_categories.category_id=0";
		 }else{
			$category='';
		 }
		$criteria->condition = "t.id IN (".implode(',' , ($product_ids)? $product_ids: array(0)).")".$free_shipping." ".$reduced." ".$in_stock.$category.$price;
		$products=new CActiveDataProvider('Products', array(
			'criteria'=>$criteria,
		));
		return $products;
	}
	 public function getAllProductsLikeName($name,$free_shipping,$reduced,$in_stock,$category,$price){
		$product_ids = Products::model()->getIdsOfProductsLikeName($name,$free_shipping,$reduced,$in_stock,$price);
		  $join = '';
		 if($free_shipping!='')
			$free_shipping = "AND shipping_cost=0";
		if($reduced!='')
			$reduced = "AND discount_percent!=0";
		if($in_stock!='')
			$in_stock = "AND shipping_immediately=1";
		if($price!=''){
			$min = strstr($price, '-',true);
			$max = substr(strrchr($price, "-"), 1);
			$price = " AND price_purchase BETWEEN $min AND $max";
		 }
		 if($category!=''&&$category!='null'){
			 $join="INNER JOIN product_categories ON products.id = product_categories.product_id";
			 $category = " AND product_categories.category_id=".$category;
		 }elseif($category!='null'){
			$join="INNER JOIN product_categories ON products.id = product_categories.product_id";
			$category = " AND product_categories.category_id=0";
		 }else{
			$category='';
		 }
		$results = Products::model()->findAllBySql("SELECT * FROM products ".$join." WHERE products.id IN (".implode(',' , ($product_ids)? $product_ids: array(0)).")".$free_shipping." ".$reduced." ".$in_stock.$category.$price);
		return $results;
	}
	public function getIdsOfProductsLikeName($name,$free_shipping,$reduced,$in_stock,$price){
		$results = array();
		 if($free_shipping!='')
			$free_shipping = "AND shipping_cost=0";
		if($reduced!='')
			$reduced = "AND discount_percent!=0";
		if($in_stock!='')
			$in_stock = "AND shipping_immediately=1";
		$product_ids = Products::getIdsOfProductByLikeName($name);
		$join = '';
		 if($price!=''){
			$min = strstr($price, '-',true);
			$max = substr(strrchr($price, "-"), 1);
			$price = " AND price_purchase BETWEEN $min AND $max";
		 }
		 $sql = "SELECT * FROM products  WHERE products.id IN (".implode(',' , ($product_ids)? $product_ids: array(0)).")".$free_shipping." ".$reduced." ".$in_stock.$price;
		$ids = Yii::app()->db->createCommand($sql)->queryAll();       
		foreach ($ids as $id){
				$results[]  = $id['id'];  
		}
		return $results;
	}
	 public function getIdsOfProductByLikeName($name){
		$results = array();
		$ids = Products::model()->findAllBySql("SELECT * FROM products WHERE `name` LIKE '%".$name."%'");
		foreach ($ids as $id){
			$results[]  = $id->id;
		}
		return $results;
	}
	
	public function getSearchProductByName($name){
		$criteria = new CDbCriteria();
		$criteria->condition = "name like '%".$name."%'";
		$productshop=new CActiveDataProvider('Products', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>12,
			),
		));
		return $productshop;
	}
	public function getProductAll(){
		$products = new CActiveDataProvider('Products');
		return $products;
	}
	
	public function checkStatusHide($product,$campaign_id){
		$campaign = Campaign::model()->findByPk($campaign_id);
		if(in_array($product,explode(',',$campaign->inactive_product))){
			return false;
		}else {
			return true;
		}
	}

	public function checkStatusRestore($product,$campaign_id){
		$campaign = Campaign::model()->findByPk($campaign_id);
		if(in_array($product,explode(',',$campaign->inactive_product))){
			return true;
		}else {
			return false;
		}
	}
	public function checkStatusDelete($product,$campaign_id){
		if(in_array($campaign_id,explode(',',$product))){
			return true;
		}else {
			return false;
		}
	}
	//get new block home page
	public function getNewProduct(){
		return Products::model()->findAllByAttributes(array('is_home'=>1),array('order'=>'created DESC','limit'=> 5));
	}

	public function countCommentProduct($id){
		$countComment =  ProductComments::model()->countByAttributes(array('product_id'=>$id));
		if($countComment > 1)
			return $countComment.' comments';
		else
			return $countComment.' comment';		
	}

	public function renImageProduct($image,$alt='',$class=''){

		if($image == '')   	$image = 'noimage.png';
		if($alt!='') 		$alt 	= ' alt="'.$alt.'" ';
		if($class!='') 		$class = ' class="'.$class.'" ';		

		return '<img '.$alt.' '.$class.' src="/uploads/product/'.$image.'"/>';
	}
	public function getRandomProduct(){
		return Products::model()->findAllByAttributes(array('is_home'=>1),array('select'=>'*, rand() as rand','order'=>'rand','limit'=> 20));
	}

	public function renBlockRandomProduct(){
		$blockRents = $this->getRandomProduct();
		$html ='';
		foreach ($blockRents as $blockRent) {

			$date 	 = Utils::fomatDateCeate($blockRent["created"]);
			$image 	 = $this->renImageProduct($blockRent["image"]);
			$description = Utils::short_description(strip_tags($blockRent["description"]),80);

			$html .= '<li>
						<div class="trans2 slide-sngl">
						   <a class="text-center" href="/products/view/'.$blockRent['alias'].'">'.$image.'</a>
						   <h4><a href="/products/view/'.$blockRent['alias'].'">'.$blockRent["name"].'</a></h4>
						   <p>'.$description.'</p>
						   <h6><span><i class="fa fa-clock-o"></i>'.$date.'</span></h6>
						</div>
					 </li>';
		}
		return $html;
	}
	//block cat by id
	public function renCatproduct($cat_id){
		$blockRents = $this->getProductByCate($cat_id,4);
		$cat	 =  Categories::model()->getCatById($cat_id);
		$html = '';
		 if($blockRents){
			$html .='<div class="news-sec-1 float-width">
				 <div class="float-width sec-cont3 block-cat-product">
				 <h3 class="sec-title"><a href="products/category/'.$cat->alias.'">'.$cat->name.'</a></h3>';

			foreach ($blockRents as $blockRent) {
				$image 	 = $this->renImageProduct($blockRent["image"],'','blocky');
				$html .= '<div class="sec-1-sm">
								 <a href="/products/view/'.$blockRent["alias"].'">'.$image.'</a>
								 <div class="sec-1-sm-text blocky">
									<h3><a href="/products/view/'.$blockRent["alias"].'">'.$blockRent["name"].'</a></h3>
									<h6><span><i class="fa fa-clock-o"></i>'.Utils::fomatDateCeate($blockRent["created"]).'</span><span><i class="fa fa-comment-o"></i>'.$this->countCommentProduct($blockRent['id']).'</span></h6>
									<p>'.Utils::short_description(strip_tags($blockRent["description"]),80).'</p>
								 </div>
						  </div>';
			}
			$html .='</div></div>';
		}
		return $html;

	}

    function totalCommentById( $id ){
        return ProductComments::model()->countByAttributes(array('product_id'=>$id,'is_active'=>ProductComments::STATUS_ACTIVE));
    }

}