<?php

class DirectoryOrdersController extends SiteBaseController {
    const PAGE_SIZE         = 12;
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Directory Orders') ] = array('directoryOrders/index');
		$this->pageTitle[] = Yii::t('global', 'Directory Orders');
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
		$model=new DirectoryOrders;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DirectoryOrders']))
		{
			$model->attributes=$_POST['DirectoryOrders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['DirectoryOrders']))
		{
			$model->attributes=$_POST['DirectoryOrders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=new DirectoryOrders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DirectoryOrders']))
			$model->attributes=$_GET['DirectoryOrders'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('DirectoryOrders');
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
		$model=DirectoryOrders::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='directory-orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionDirectory(){
        $maps       = Maps::model()->findAll();
        $this->render('directory', compact('maps'));
    }

    public function actionHearingAidSuppliers(){
        $maps       = Maps::model()->findAll();
        $this->render('hearing_aid_suppliers', compact('maps'));
    }

    public function actionDoctors(){
        $maps       = Maps::model()->findAll();
        $this->render('doctors', compact('maps'));
    }

    public function actionInstrumentationORL(){
        $maps       = Maps::model()->findAll();
        $this->render('instrumentation_orl', compact('maps'));
    }

    public function actionServicesORL(){
        $maps       = Maps::model()->findAll();
        $this->render('services_orl', compact('maps'));
    }

    public function actionServices( $alias ){
        $maps       = Maps::model()->findByAttributes(array('alias'=>$alias ));
        $hospitals  = new CActiveDataProvider('Hospitals', array(
            'criteria'=>array(
                'condition'=>"department =".$maps['id'],
            ),
            'pagination'=>array(
                'pageSize'=>self::PAGE_SIZE,
            )
        ));

        $this->render( 'services', compact( 'hospitals', 'maps' ) );
    }

    public function actionDoctorsByDepartment($alias){
        $maps       = Maps::model()->findByAttributes(array('alias'=>$alias ));
        $doctors    = new CActiveDataProvider('Doctors', array(
            'criteria'=>array(
                'condition'=>"department =".$maps['id'],
            ),
            'pagination'=>array(
                'pageSize'=>self::PAGE_SIZE,
            )
        ));

        $this->render( 'doctors_by_department', compact('maps', 'doctors') );
    }

    public function actionSpeechTherapists(){
        $maps       = Maps::model()->findAll();
        $this->render( 'speech_therapists', compact('maps') );
    }

    public function actionAssociativeSector(){
        $maps       = Maps::model()->findAll();
        $this->render('associative_sector', compact('maps'));
    }

    public function actionOrganizations(){
        $categories = AgenciesCategory::model()->findAll();
        $maps       = Maps::model()->findAll();
        $this->render('organizations', compact('maps', 'categories'));
    }

    public function actionTypeAgency( $alias ){
        $types  = AgenciesCategory::model()->findByAttributes(array('alias' => $alias));
        $agency = new CActiveDataProvider('Agencies',array(
            'criteria'=>array(
               /* 'order' => 'id DESC ',*/
                'condition'=> "type = ".$types['id']
            ),
            'pagination'=>array(
                'pageSize'=>self::PAGE_SIZE,
            )
        ));
        $this->render('type_agency', compact('agency', 'types'));
    }

    public function actionDepartment($alias){
        $maps   = Maps::model()->findByAttributes( array('alias'=>$alias) );
        $agency = new CActiveDataProvider('Agencies',array(
            'criteria'=>array(
                'condition'=>"department =".$maps['id'],
            ),
            'pagination'=>array(
                'pageSize'=>self::PAGE_SIZE,
            )
        ));
        $this->render('department_agency', compact( 'maps', 'agency' ));
    }

    public function actionOrthophonistes($alias){
        $maps   = Maps::model()->findByAttributes( array('alias'=>$alias) );
        $speeds = new CActiveDataProvider('SpeechTherapist',array(
            'criteria'=>array(
                'condition'=>"department =".$maps['id'],
            ),
            'pagination'=>array(
                'pageSize'=>self::PAGE_SIZE,
            )
        ));
        $this->render('orthophonistes', compact( 'maps', 'speeds' ));
    }

    public function actionHospitals($alias, $id ){
        $maps       = Maps::model()->findByAttributes(array('alias'=>$alias ));
        $hospitals  = Hospitals::model()->findByPk($id);
        $this->render( 'detail_hospital', compact('hospitals', 'maps') );
    }

    public function actionDetailDoctor($alias, $id){
        $maps       = Maps::model()->findByAttributes(array('alias'=>$alias ));
        $doctor     = Doctors::model()->findByPk($id);
        $this->render( 'detail_doctor', compact('maps', 'doctor') );
    }

    public function actionSpeech($alias, $id ){
        $maps       = Maps::model()->findByAttributes(array('alias'=>$alias ));
        $speechs    = SpeechTherapist::model()->findByPk($id);
        $this->render( 'detail_speech', compact('speechs', 'maps') );
    }

    public function actionAppearDirectory(){
        $this->render('appear-directory');
    }

}
