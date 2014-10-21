<?php

class EventsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Events') ] = array('events/index');
		$this->pageTitle[] = Yii::t('global', 'Events');
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
		$model=new Events;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
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
                $checkcat = isset($_POST['EventOrganizers']);
                if( !$checkcat ){
                    Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input Organizers'));
                    $this->redirect(array('events/create'));
                }
                else{
                    $cats = $_POST['EventOrganizers'];
                    foreach ($cats as $cat_id){
                        $cat = new EventOrganizers();
                        $cat->event_id = $model->id;
                        $cat->organizers_id = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/events/'.$fileName);
                }
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/events/pdf/'.$filePdfName);
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

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
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
                EventOrganizers::model()->deleteAll(
                    "event_id = :event_id",
                    array(':event_id' => $model->id)
                );
                $checkcat = isset($_POST['EventOrganizers']);
                if( !$checkcat ){
                    Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Input Organizers'));
                    $this->redirect(array('update','id'=>$model->id));
                }
                else{
                    $cats = $_POST['EventOrganizers'];
                    foreach ($cats as $cat_id){
                        $cat = new EventOrganizers();
                        $cat->event_id = $model->id;
                        $cat->organizers_id = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/events/'.$model->logo);
                }
                if(!empty($uploadedFilePdf)) {
                    $uploadedFilePdf->saveAs(Yii::app()->basePath.'/../uploads/events/pdf/'.$model->pdf);
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
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Events');
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
		$model=Events::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
