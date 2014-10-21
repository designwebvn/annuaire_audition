<?php

class SuppliersController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Suppliers') ] = array('suppliers/index');
		$this->pageTitle[] = Yii::t('global', 'Suppliers');
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
		$model=new Suppliers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			$model->attributes=$_POST['Suppliers'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
            }
            else{
                $fileName = '';
            }
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SUPPLIERS;
                    $model1->save();
                }

                $otherLink = isset($_POST['SupplierBrands']);
                if( $otherLink ){
                    $links = $_POST['SupplierBrands'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierBrains();
                        $link->supplier_id      = $model->id;
                        $link->brains_id        = $link_id;
                        $link->save();
                    }
                }

                $otherNews = isset($_POST['SupplierNews']);
                if( $otherNews ){
                    $links = $_POST['SupplierNews'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierNews();
                        $link->supplier_id      = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                $otherArticles = isset($_POST['SupplierArticles']);
                if( $otherArticles ){
                    $links = $_POST['SupplierArticles'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierArticles();
                        $link->supplier_id      = $model->id;
                        $link->product_id       = $link_id;
                        $link->save();
                    }
                }

                $otherHearingTv = isset($_POST['SupplierHearingTv']);
                if( $otherHearingTv ){
                    $links = $_POST['SupplierHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierHearingtv();
                        $link->supplier_id      = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }

                $otherEvents = isset($_POST['SupplierEvents']);
                if( $otherEvents ){
                    $links = $_POST['SupplierEvents'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierEvents();
                        $link->supplier_id      = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                $otherAnnoucements = isset($_POST['SupplierAnnouncements']);
                if( $otherAnnoucements ){
                    $links = $_POST['SupplierAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierAnnoucements();
                        $link->supplier_id      = $model->id;
                        $link->annoucement_id         = $link_id;
                        $link->save();
                    }
                }
                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/suppliers/'.$fileName);
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			$model->attributes=$_POST['Suppliers'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->logo   = $modelold->logo ;
            }
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SUPPLIERS;
                    $model1->save();
                }

                SupplierBrains::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherLink = isset($_POST['SupplierBrands']);
                if( $otherLink ){
                    $links = $_POST['SupplierBrands'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierBrains();
                        $link->supplier_id      = $model->id;
                        $link->brains_id        = $link_id;
                        $link->save();
                    }
                }

                SupplierNews::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherNews = isset($_POST['SupplierNews']);
                if( $otherNews ){
                    $links = $_POST['SupplierNews'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierNews();
                        $link->supplier_id      = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                SupplierArticles::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherArticles = isset($_POST['SupplierArticles']);
                if( $otherArticles ){
                    $links = $_POST['SupplierArticles'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierArticles();
                        $link->supplier_id      = $model->id;
                        $link->product_id       = $link_id;
                        $link->save();
                    }
                }

                SupplierHearingtv::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherHearingTv = isset($_POST['SupplierHearingTv']);
                if( $otherHearingTv ){
                    $links = $_POST['SupplierHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierHearingtv();
                        $link->supplier_id      = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }

                SupplierEvents::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherEvents = isset($_POST['SupplierEvents']);
                if( $otherEvents ){
                    $links = $_POST['SupplierEvents'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierEvents();
                        $link->supplier_id      = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                SupplierAnnoucements::model()->deleteAll(
                    "supplier_id = :supplier_id",
                    array(':supplier_id' => $model->id)
                );
                $otherAnnoucements = isset($_POST['SupplierAnnouncements']);
                if( $otherAnnoucements ){
                    $links = $_POST['SupplierAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new SupplierAnnoucements();
                        $link->supplier_id      = $model->id;
                        $link->annoucement_id         = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/suppliers/'.$model->logo);
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
        if (isset($_GET['ajax']) && $_GET['ajax'] == 'pdf-galleries-grid'){
            SupplierPdf::model()->findByPk($id)->delete();
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
		$model=new Suppliers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suppliers']))
			$model->attributes=$_GET['Suppliers'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Suppliers');
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
		$model=Suppliers::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-form')
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
            SupplierPdf::model()->updateAll(array('supplier_id' => $model->id), "list_file IN ('".implode("','", $files)."')");
        }
    }

    function actionUpload(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){
            $folder = Yii::app()->basePath.'/../uploads/suppliers/'.date('Ymd').'/';

            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new SupplierPdf();
                $gallery->list_file = $filename;
                $gallery->save();
            }
        }

    }

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=suppliers.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Suppliers::model()->findAll( 't.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"' );
        echo "id, corporate_name, corporate_name_2, legal_status, advertiser, type, address_1, additional_address, additional_address_2, city_1, website, website_2, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->corporate_name.",".$message->corporate_name_2.",".$message->legal_status.",".$message->advertiser.",".$message->type.",".$message->address_1.",".$message->additional_address.",".$message->additional_address_2.",".$message->city_1.",".$message->website.",".$message->website_2.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Suppliers();
        if(isset($_POST['Suppliers']))
        {
            $start = $_POST['Suppliers']['fromdate'];
            $end   = $_POST['Suppliers']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

}
