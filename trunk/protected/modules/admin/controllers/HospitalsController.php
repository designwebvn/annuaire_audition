<?php

class HospitalsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Hospitals') ] = array('hospitals/index');
		$this->pageTitle[] = Yii::t('global', 'Hospitals');
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
		$model=new Hospitals;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hospitals']))
		{
			$model->attributes=$_POST['Hospitals'];
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::HOSPITAL;
                    $model1->save();
                }

                $checkcat = isset($_POST['HospitalServicesCate']);
                if( $checkcat ){
                    $cats = $_POST['HospitalServicesCate'];
                    foreach ($cats as $cat_id){
                        $cat = new HospitalServices();
                        $cat->hospitals_id = $model->id;
                        $cat->services_id = $cat_id;
                        $cat->save();
                    }
                }

                $checkC = isset($_POST['HospitalHearingCareCenters']);
                if( $checkC ){
                    $cats = $_POST['HospitalHearingCareCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new HospitalCenters();
                        $cat->hospital_id = $model->id;
                        $cat->centers_id = $cat_id;
                        $cat->save();
                    }
                }

                $checkcat = isset($_POST['HospitalSpeechTherapists']);
                if( $checkcat ){
                    $cats = $_POST['HospitalSpeechTherapists'];
                    foreach ($cats as $cat_id){
                        $cat                        = new HospitalSpeechTherapist();
                        $cat->hospital_id           = $model->id;
                        $cat->speech_therapist_id   = $cat_id;
                        $cat->save();
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

		if(isset($_POST['Hospitals']))
		{
			$model->attributes=$_POST['Hospitals'];
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::HOSPITAL;
                    $model1->save();
                }

                HospitalServices::model()->deleteAll(
                    "hospitals_id = :hospitals_id",
                    array(':hospitals_id' => $model->id)
                );
                $checkcat = isset($_POST['HospitalServicesCate']);
                if( $checkcat ){
                    $cats = $_POST['HospitalServicesCate'];
                    foreach ($cats as $cat_id){
                        $cat = new HospitalServices();
                        $cat->hospitals_id = $model->id;
                        $cat->services_id = $cat_id;
                        $cat->save();
                    }
                }

                HospitalCenters::model()->deleteAll(
                    "hospital_id = :hospital_id",
                    array(':hospital_id' => $model->id)
                );
                $checkC = isset($_POST['HospitalHearingCareCenters']);
                if( $checkC ){
                    $cats = $_POST['HospitalHearingCareCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new HospitalCenters();
                        $cat->hospital_id = $model->id;
                        $cat->centers_id = $cat_id;
                        $cat->save();
                    }
                }

                HospitalSpeechTherapist::model()->deleteAll(
                    "hospital_id = :hospital_id",
                    array(':hospital_id' => $model->id)
                );
                $checkcat = isset($_POST['HospitalSpeechTherapists']);
                if( $checkcat ){
                    $cats = $_POST['HospitalSpeechTherapists'];
                    foreach ($cats as $cat_id){
                        $cat                        = new HospitalSpeechTherapist();
                        $cat->hospital_id           = $model->id;
                        $cat->speech_therapist_id   = $cat_id;
                        $cat->save();
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
		$model=new Hospitals('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hospitals']))
			$model->attributes=$_GET['Hospitals'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Hospitals');
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
		$model=Hospitals::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='hospitals-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
