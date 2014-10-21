<?php

class SpecialEducationSchoolsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Special Education Schools') ] = array('specialEducationSchools/index');
		$this->pageTitle[] = Yii::t('global', 'Special Education Schools');
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
		$model=new SpecialEducationSchools;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SpecialEducationSchools']))
		{
			$model->attributes=$_POST['SpecialEducationSchools'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
            }
            else{
                $fileName = '';
            }

            $uploadedFilePics=CUploadedFile::getInstance($model,'pics');
            if(!empty($uploadedFilePics)) {
                $rnd = rand(0,9999);
                $fileNamePics = "{$rnd}-{$uploadedFilePics}";  // random number + file name
                $model->pics = $fileNamePics;
            }
            else{
                $fileNamePics = '';
            }
			if($model->save()){
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$fileName);
                }
                if(!empty($uploadedFilePics)) {
                    $uploadedFilePics->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$fileNamePics);
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

		if(isset($_POST['SpecialEducationSchools']))
		{
			$model->attributes=$_POST['SpecialEducationSchools'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->logo    = $modelold->logo ;
            }

            $uploadedFilePics   = CUploadedFile::getInstance($model,'pics');

            if(!empty($uploadedFilePics)) {
                $rnd            = rand(0,9999);
                $fileNamePics   = "{$rnd}-{$uploadedFilePics}";  // random number + file name
                $model->pics    = $fileNamePics;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->pics   = $modelold->pics ;
            }

			if($model->save()){
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$model->logo);
                }
                if(!empty($uploadedFilePics)) {
                    $uploadedFilePics->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$model->pics);
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
		$model=new SpecialEducationSchools('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SpecialEducationSchools']))
			$model->attributes=$_GET['SpecialEducationSchools'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('SpecialEducationSchools');
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
		$model=SpecialEducationSchools::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='special-education-schools-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
