<?php

class ProductsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Articles') ] = array('articles/index');
		$this->pageTitle[] = Yii::t('global', 'Articles');
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
            if( strlen($_POST['Products']['grip']) == 8 )
            {
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input grip news'));
                $this->redirect(array('articles/create'));
            }
            if( strlen($_POST['Products']['description']) == 8 )
            {
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input Description news'));
                $this->redirect(array('articles/create'));
            }
            if($model->save()){
                $checkcat = isset($_POST['ProductCategories']);
                if( !$checkcat ){
                    Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input category product'));
                    $this->redirect(array('articles/create'));
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

                $otherLink = isset($_POST['ProductOthers']);
                if( $otherLink ){
                    $links = $_POST['ProductOthers'];
                    foreach ($links as $link_id){
                        $link                   = new ProductOthers();
                        $link->product_id       = $model->id;
                        $link->other_product_id = $link_id;
                        $link->save();
                    }
                }

                $otherCenter = isset($_POST['ArticlesHearingCareCenters']);
                if( $otherCenter ){
                    $links = $_POST['ArticlesHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new ProductsCenters();
                        $link->products_id       = $model->id;
                        $link->centers_id = $link_id;
                        $link->save();
                    }
                }

                $otherST = isset($_POST['ArticlesSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['ArticlesSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                   = new ProductsSpeechTherapists();
                        $link->products_id       = $model->id;
                        $link->speech_therapists_id = $link_id;
                        $link->save();
                    }
                }

                $otherSES = isset($_POST['ArticlesSpecialEducationSchools']);
                if( $otherSES ){
                    $links = $_POST['ArticlesSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new ProductsSpecialEducationSchools();
                        $link->products_id                  = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }
                $this->_saveGallery($model);
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

                ProductOthers::model()->deleteAll("product_id = :product_id", array(':product_id' => $model->id ) );
                $otherLink = isset($_POST['ProductOthers']);
                if( $otherLink ){
                    $links = $_POST['ProductOthers'];
                    foreach ($links as $link_id){
                        $link                   = new ProductOthers();
                        $link->product_id       = $model->id;
                        $link->other_product_id = $link_id;
                        $link->save();
                    }
                }

                ProductsCenters::model()->deleteAll("products_id = :products_id", array(':products_id' => $model->id ) );
                $otherCenter = isset($_POST['ArticlesHearingCareCenters']);
                if( $otherCenter ){
                    $links = $_POST['ArticlesHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new ProductsCenters();
                        $link->products_id       = $model->id;
                        $link->centers_id = $link_id;
                        $link->save();
                    }
                }

                ProductsSpeechTherapists::model()->deleteAll("products_id = :products_id", array(':products_id' => $model->id ) );
                $otherST = isset($_POST['ArticlesSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['ArticlesSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                   = new ProductsSpeechTherapists();
                        $link->products_id       = $model->id;
                        $link->speech_therapists_id = $link_id;
                        $link->save();
                    }
                }

                ProductsSpecialEducationSchools::model()->deleteAll("products_id = :products_id", array(':products_id' => $model->id ) );
                $otherSES = isset($_POST['ArticlesSpecialEducationSchools']);
                if( $otherSES ){
                    $links = $_POST['ArticlesSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new ProductsSpecialEducationSchools();
                        $link->products_id                  = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);

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
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

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
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

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
			throw new CHttpException(404,'The requested page does not exist.');
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

    function _saveGallery($model){
        $files = array();
        if (isset($_POST['uploader_count']) && $count = $_POST['uploader_count']){
            for ($i = 0 ; $i < $count; $i ++){
                if ($_POST["uploader_{$i}_status"] == 'done')
                    $files[] = date('Ymd').'/'.$_POST["uploader_{$i}_tmpname"];
            }
        }
        if (count($files)){
            ProductGalleries::model()->updateAll(array('product_id' => $model->id), "filename IN ('".implode("','", $files)."')");
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

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=products.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Products::model()->findAll( 't.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"' );
        echo "id, name, alias, type, image, pdf, is_home, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->name.",".$message->alias.",".$message->type.",".$message->image.",".$message->pdf.",".$message->is_home.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Products();
        if(isset($_POST['Products']))
        {
            $start = $_POST['Products']['fromdate'];
            $end   = $_POST['Products']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }


}
