<?php

class SupplierProductsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Supplier Products') ] = array('supplierProducts/index');
		$this->pageTitle[] = Yii::t('global', 'Supplier Products');
	}
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SupplierProducts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SupplierProducts']))
		{
			$model->attributes=$_POST['SupplierProducts'];
			if($model->save()){
                $otherLink = isset($_POST['SupplierProductsChip']);
                if( $otherLink ){
                    $links = $_POST['SupplierProductsChip'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsChip();
                        $link->supplier_products_id = $model->id;
                        $link->chip_id              = $link_id;
                        $link->save();
                    }
                }

                $otherVideo = isset($_POST['SupplierProductsHearingTV']);
                if( $otherVideo ){
                    $links = $_POST['SupplierProductsHearingTV'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsHearingTv();
                        $link->supplier_products_id = $model->id;
                        $link->video_id              = $link_id;
                        $link->save();
                    }
                }

                $otherArticles = isset($_POST['SupplierProductsArticles']);
                if( $otherArticles ){
                    $links = $_POST['SupplierProductsArticles'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsArticles();
                        $link->supplier_products_id = $model->id;
                        $link->articles_id          = $link_id;
                        $link->save();
                    }
                }

                $otherCenters = isset($_POST['SupplierProductsHearingCareCenters']);
                if( $otherCenters ){
                    $links = $_POST['SupplierProductsHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsCenters();
                        $link->supplier_products_id = $model->id;
                        $link->centers_id           = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                $this->_saveGalleryPdf($model);
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SupplierProducts']))
		{
			$model->attributes=$_POST['SupplierProducts'];
			if($model->save()){
                SupplierProductsChip::model()->deleteAll(
                    "supplier_products_id = :supplier_products_id",
                    array(':supplier_products_id' => $model->id)
                );
                $otherLink = isset($_POST['SupplierProductsChip']);
                if( $otherLink ){
                    $links = $_POST['SupplierProductsChip'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsChip();
                        $link->supplier_products_id = $model->id;
                        $link->chip_id              = $link_id;
                        $link->save();
                    }
                }

                SupplierProductsHearingTv::model()->deleteAll(
                    "supplier_products_id = :supplier_products_id",
                    array(':supplier_products_id' => $model->id)
                );
                $otherVideo = isset($_POST['SupplierProductsHearingTV']);
                if( $otherVideo ){
                    $links = $_POST['SupplierProductsHearingTV'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsHearingTv();
                        $link->supplier_products_id = $model->id;
                        $link->video_id              = $link_id;
                        $link->save();
                    }
                }

                SupplierProductsArticles::model()->deleteAll(
                    "supplier_products_id = :supplier_products_id",
                    array(':supplier_products_id' => $model->id)
                );
                $otherArticles = isset($_POST['SupplierProductsArticles']);
                if( $otherArticles ){
                    $links = $_POST['SupplierProductsArticles'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsArticles();
                        $link->supplier_products_id = $model->id;
                        $link->articles_id          = $link_id;
                        $link->save();
                    }
                }

                SupplierProductsCenters::model()->deleteAll(
                    "supplier_products_id = :supplier_products_id",
                    array(':supplier_products_id' => $model->id)
                );

                $otherCenters = isset($_POST['SupplierProductsHearingCareCenters']);
                if( $otherCenters ){
                    $links = $_POST['SupplierProductsHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                       = new SupplierProductsCenters();
                        $link->supplier_products_id = $model->id;
                        $link->centers_id           = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                $this->_saveGalleryPdf($model);
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
        if (isset($_GET['ajax']) && ( $_GET['ajax'] == 'image-supplier-product-galleries-grid' || $_GET['ajax'] == 'pdf-supplier-product-galleries-grid' ) ){
            SupplierProductsFile::model()->findByPk($id)->delete();
        }
        else if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new SupplierProducts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SupplierProducts']))
			$model->attributes=$_GET['SupplierProducts'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('SupplierProducts');
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
		$model=SupplierProducts::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    function actionUploadPdf(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){
            $folder = Yii::app()->basePath.'/../uploads/supplier_products/pdf/'.date('Ymd').'/';

            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new SupplierProductsFile();
                $gallery->list_file = $filename;
                $gallery->type      = SupplierProductsFile::TYPE_PDF;
                $gallery->save();
            }
        }

    }

    function _saveGalleryPdf($model){
        $files = array();
        if (isset($_POST['uploader_pdf_count']) && $count = $_POST['uploader_pdf_count']){
            for ($i = 0 ; $i < $count; $i ++){
                if ($_POST["uploader_pdf_{$i}_status"] == 'done')
                    $files[] = date('Ymd').'/'.$_POST["uploader_pdf_{$i}_tmpname"];
            }
        }
        if (count($files)){
            SupplierProductsFile::model()->updateAll(array('product_supplier_id' => $model->id), "list_file IN ('".implode("','", $files)."')");
        }
    }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='supplier-products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    function _saveGallery($model){
        $files = array();
        if (isset($_POST['uploader_count']) && $count = $_POST['uploader_count']){
            for ($i = 0 ; $i < $count; $i ++){
                if ($_POST["uploader_{$i}_status"] == 'done')
                    $files[] = date('Ymd').'/'.$_POST["uploader_{$i}_tmpname"];
            }
        }
        if (count($files)){
            SupplierProductsFile::model()->updateAll(array('product_supplier_id' => $model->id), "list_file IN ('".implode("','", $files)."')");
        }
    }

    function actionUploadImg(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){
            $folder = Yii::app()->basePath.'/../uploads/supplier_products/'.date('Ymd').'/';

            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new SupplierProductsFile();
                $gallery->list_file = $filename;
                $gallery->save();
            }
        }

    }

}
