<?php

class ProductsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Articles') ] = array('products/index');
		$this->pageTitle[] = Yii::t('global', 'Articles');
	}
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $images = ProductGalleries::model()->findAllByAttributes(array('product_id' => $id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'images'        =>$images,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Products;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $fileName = '';
            }
            $uploadedFilePdf=CUploadedFile::getInstance($model,'pdf');
            if(!empty($uploadedFilePdf)) {
                $rnd = rand(0,9999);
                $filePdfName = "{$rnd}-{$uploadedFilePdf}";  // random number + file name
                $model->pdf = $filePdfName;
            }
            else{
                $filePdfName = '';
            }
			if($model->save()){
                $checkcat = isset($_POST['ProductCategories']);
                if( !$checkcat ){
                    Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input category product'));
                    $this->redirect(array('products/create'));
                }
                else{
    			     $cats = $_POST['ProductCategories'];
                     foreach ($cats as $cat_id){
                        $cat = new ProductCategories;
                        $cat->product_id = $model->id;
                        $cat->category_id = $cat_id;
                        $cat->save();
                     }
                }
               if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/product/'.$fileName);
               }
               if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/product/pdf/'.$filePdfName);
               }
               $this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['Products']))
		{
            $model->attributes=$_POST['Products'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->image   = $modelold->image ;
            }

            $uploadedFilePdf=CUploadedFile::getInstance($model,'pdf');
            if(!empty($uploadedFilePdf)) {
                $rnd = rand(0,9999);
                $filePdfName = "{$rnd}-{$uploadedFilePdf}";  // random number + file name
                $model->pdf = $filePdfName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->pdf     = $modelold->pdf ;
            }
            if($model->save()){
                ProductCategories::model()->deleteAll(
                    "product_id = :product_id",
                    array(':product_id' => $model->id)
                );
                $checkcat = isset($_POST['ProductCategories']);
                if( !$checkcat ){
                    Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input category product'));
                    $this->redirect(array('update','id'=>$model->id));
                }
                else{
                    $cats = $_POST['ProductCategories'];
                    foreach ($cats as $cat_id){
                        $cat = new ProductCategories;
                        $cat->product_id = $model->id;
                        $cat->category_id = $cat_id;
                        $cat->save();
                    }
                }
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/product/'.$model->image);
                }
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/product/pdf/'.$model->pdf);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

    

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        if (isset($_GET['ajax']) && $_GET['ajax'] == 'product-galleries-grid'){
            ProductGalleries::model()->findByPk($id)->delete();
		}
        elseif(Yii::app()->request->isPostRequest)
		{  
            //Delete by Product Group
    
           	if($this->loadModel($id)->delete()){
       	        ProductGroups::model()->deleteAll('product_id = ?' , array($id));
            }

            // we only allow deletion via POST request
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,Yii::t('error','Invalid request. Please do not repeat this request again.'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new Products('search');
		$model->unsetAttributes();  // clear any default values
        //$model->is_home=Products::STATUS_ACTIVE;
		if(isset($_GET['Products'])) {
			$model->attributes=$_GET['Products'];
        }
		$this->render('index',array(
			'model'=>$model,
		));
	}
    

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,Yii::t('error','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    function actionUpload(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){            
            $folder = Yii::app()->basePath.'/../uploads/product_gallery/'.date('Ymd').'/';
            
            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new ProductGalleries;
                $gallery->filename = $filename;
                $gallery->save();
            }
        }
        
    }

    function actionHideProduct(){
        $this->layout = false;
        $product_id = $_GET['id'];
        $campaign_id = $_GET['inactive'];
        $campaign = Campaign::model()->findByPk($campaign_id);
        if($campaign->inactive_product == null){
            $inactive = array();
        } else {
            $inactive = explode(',',$campaign->inactive_product);
        }
        if(!in_array($product_id,$inactive)){
            $inactive[] = $product_id;
            $campaign->inactive_product = implode(',',$inactive);
            $campaign->save();
        }
    }
    function actionRestoreProduct(){
        $this->layout = false;
        $product_id = $_GET['id'];
        $campaign_id = $_GET['inactive'];
        $campaign = Campaign::model()->findByPk($campaign_id);
        $inactive = explode(',',$campaign->inactive_product);
        if(($key = array_search($product_id, $inactive)) !== false) {
            unset($inactive[$key]);
            $campaign->inactive_product = implode(',',$inactive);
            $campaign->save();
        }
    }
    function actionDeleteProduct(){
        $this->layout = false;
        $product_id = $_GET['id'];
        Products::model()->findByPk($product_id)->delete();
    }

}
