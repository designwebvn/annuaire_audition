<?php

class PracticesController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Practices') ] = array('practices/index');
		$this->pageTitle[] = Yii::t('global', 'Practices');
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
		$model=new Practices;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Practices']))
		{
			$model->attributes=$_POST['Practices'];

			if($model->save()){
                $otherST = isset($_POST['PracticeSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['PracticeSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                               = new PracticeSpeechTherapists();
                        $link->practice_id                  = $model->id;
                        $link->speech_therapists_id         = $link_id;
                        $link->save();
                    }
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

		if(isset($_POST['Practices']))
		{
			$model->attributes=$_POST['Practices'];

			if($model->save()){
                PracticeSpeechTherapists::model()->deleteAll("practice_id = :practice_id", array(':practice_id' => $model->id ) );
                $otherST = isset($_POST['PracticeSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['PracticeSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                               = new PracticeSpeechTherapists();
                        $link->practice_id                  = $model->id;
                        $link->speech_therapists_id         = $link_id;
                        $link->save();
                    }
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
		$model=new Practices('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Practices']))
			$model->attributes=$_GET['Practices'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Practices');
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
		$model=Practices::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='practices-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
