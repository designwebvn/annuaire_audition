<?php

class NewsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'News') ] = array('news/index');
		$this->pageTitle[] = Yii::t('global', 'News');
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
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
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
            if( strlen($_POST['News']['grip']) == 8 )
            {
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input grip news'));
                $this->redirect(array('news/create'));
            }
            if( strlen($_POST['News']['description']) == 8 )
            {
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input Description news'));
                $this->redirect(array('news/create'));
            }

			if($model->save()){

                $otherCenter = isset($_POST['NewsHearingCareCenters']);
                if( $otherCenter ){
                    $links = $_POST['NewsHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new NewsCenters();
                        $link->news_id          = $model->id;
                        $link->centers_id       = $link_id;
                        $link->save();
                    }
                }

                $otherST = isset($_POST['NewsSpecialEducationSchools']);
                if( $otherST ){
                    $links = $_POST['NewsSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new NewsSpecialEducationSchools();
                        $link->news_id                      = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/news/'.$fileName);
                }
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/news/pdf/'.$filePdfName);
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

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
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
                NewsCenters::model()->deleteAll("news_id = :news_id", array(':news_id' => $model->id ) );
                $otherCenter = isset($_POST['NewsHearingCareCenters']);
                if( $otherCenter ){
                    $links = $_POST['NewsHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new NewsCenters();
                        $link->news_id          = $model->id;
                        $link->centers_id       = $link_id;
                        $link->save();
                    }
                }

                NewsSpecialEducationSchools::model()->deleteAll("news_id = :news_id", array(':news_id' => $model->id ) );
                $otherST = isset($_POST['NewsSpecialEducationSchools']);
                if( $otherST ){
                    $links = $_POST['NewsSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new NewsSpecialEducationSchools();
                        $link->news_id                      = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/news/'.$model->image);
                }
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/news/pdf/'.$model->pdf);
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
            NewsGalleries::model()->findByPk($id)->delete();
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('News');
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
		$model=News::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
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
            NewsGalleries::model()->updateAll(array('news_id' => $model->id), "filename IN ('".implode("','", $files)."')");
        }
    }

    function actionUpload(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){
            $folder = Yii::app()->basePath.'/../uploads/news_gallery/'.date('Ymd').'/';

            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new NewsGalleries();
                $gallery->filename = $filename;
                $gallery->save();
            }
        }

    }

}
