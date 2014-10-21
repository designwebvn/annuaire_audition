<?php

class MemoriesStudyController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Memories Studies') ] = array('memoriesStudy/index');
		$this->pageTitle[] = Yii::t('global', 'Memories Studies');
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
		$model=new MemoriesStudy;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MemoriesStudy']))
		{
			$model->attributes=$_POST['MemoriesStudy'];
            $uploadedFilePdf=CUploadedFile::getInstance($model,'pdf_file');
            if(!empty($uploadedFilePdf)) {
                $rnd = rand(0,9999);
                $filePdfName = "{$rnd}-{$uploadedFilePdf}";  // random number + file name
                $model->pdf_file = $filePdfName;
            }
            else{
                $filePdfName = '';
            }
			if($model->save()){
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/memories/'.$filePdfName);
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

		if(isset($_POST['MemoriesStudy']))
		{
			$model->attributes=$_POST['MemoriesStudy'];
            $uploadedFilePdf=CUploadedFile::getInstance($model,'pdf_file');
            if(!empty($uploadedFilePdf)) {
                $rnd = rand(0,9999);
                $filePdfName = "{$rnd}-{$uploadedFilePdf}";  // random number + file name
                $model->pdf_file = $filePdfName;
            }
            else{
                $modelold            = $this->loadModel($id);
                $model->pdf_file     = $modelold->pdf_file ;
            }
			if($model->save()){
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/memories/'.$model->pdf_file);
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
		if(Yii::app()->request->isPostRequest)
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
		$model=new MemoriesStudy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MemoriesStudy']))
			$model->attributes=$_GET['MemoriesStudy'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('MemoriesStudy');
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
		$model=MemoriesStudy::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='memories-study-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
