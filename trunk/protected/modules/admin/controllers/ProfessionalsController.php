<?php

class ProfessionalsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Professionals') ] = array('professionals/index');
		$this->pageTitle[] = Yii::t('global', 'Professionals');
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
		$model=new Professionals;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Professionals']))
		{
			$model->attributes=$_POST['Professionals'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
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
                    $model1->type       = Suppliers::PROFESSIONALS;
                    $model1->save();
                }
                $checkcat = isset($_POST['ProfessionalCenters']);
                if( $checkcat ){
                    $cats  = $_POST['ProfessionalCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalCenters();
                        $cat->professional_id = $model->id;
                        $cat->centers_id = $cat_id;
                        $cat->save();
                    }
                }
                $checkArticles = isset($_POST['LinkProfessional']);
                if( $checkArticles ){
                    $cats  = $_POST['LinkProfessional'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalArticles();
                        $cat->professional_id = $model->id;
                        $cat->articles_id = $cat_id;
                        $cat->save();
                    }
                }

                $checkMemories = isset($_POST['LinkEssay']);
                if( $checkMemories ){
                    $cats  = $_POST['LinkEssay'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalMemories();
                        $cat->professional_id = $model->id;
                        $cat->memories_id     = $cat_id;
                        $cat->save();
                    }
                }

                $checkTC = isset($_POST['ProfessionalTrainingCenters']);
                if( $checkTC ){
                    $cats  = $_POST['ProfessionalTrainingCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalTrainingCenters();
                        $cat->professional_id       = $model->id;
                        $cat->training_centers_id   = $cat_id;
                        $cat->save();
                    }
                }

                $checkCES = isset($_POST['ProfessionalSpecialEducationSchools']);
                if( $checkCES ){
                    $cats  = $_POST['ProfessionalSpecialEducationSchools'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalSpecialEducationSchools();
                        $cat->professional_id                   = $model->id;
                        $cat->special_education_schools_id      = $cat_id;
                        $cat->save();
                    }
                }

                $checkAgencies = isset($_POST['ProfessionalAgencies']);
                if( $checkAgencies ){
                    $cats  = $_POST['ProfessionalAgencies'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalAgencies();
                        $cat->professional_id = $model->id;
                        $cat->agencies_id     = $cat_id;
                        $cat->save();
                    }
                }

                $checkDegrees = isset($_POST['ProfessionalDegrees']);
                if( $checkDegrees ){
                    $cats  = $_POST['ProfessionalDegrees'];
                    foreach ($cats as $cat_id){
                        $cat                    = new ProfessionalDegrees();
                        $cat->professional_id   = $model->id;
                        $cat->degree_id         = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$fileName);
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

		if(isset($_POST['Professionals']))
		{
			$model->attributes=$_POST['Professionals'];
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
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::PROFESSIONALS;
                    $model1->save();
                }

                ProfessionalCenters::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkcat = isset($_POST['ProfessionalCenters']);
                if( $checkcat ){
                    $cats  = $_POST['ProfessionalCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalCenters();
                        $cat->professional_id = $model->id;
                        $cat->centers_id = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalArticles::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkArticles = isset($_POST['LinkProfessional']);
                if( $checkArticles ){
                    $cats  = $_POST['LinkProfessional'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalArticles();
                        $cat->professional_id = $model->id;
                        $cat->articles_id = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalMemories::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkMemories = isset($_POST['LinkEssay']);
                if( $checkMemories ){
                    $cats  = $_POST['LinkEssay'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalMemories();
                        $cat->professional_id = $model->id;
                        $cat->memories_id     = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalTrainingCenters::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkTC = isset($_POST['ProfessionalTrainingCenters']);
                if( $checkTC ){
                    $cats  = $_POST['ProfessionalTrainingCenters'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalTrainingCenters();
                        $cat->professional_id       = $model->id;
                        $cat->training_centers_id   = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalSpecialEducationSchools::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkCES = isset($_POST['ProfessionalSpecialEducationSchools']);
                if( $checkCES ){
                    $cats  = $_POST['ProfessionalSpecialEducationSchools'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalSpecialEducationSchools();
                        $cat->professional_id                   = $model->id;
                        $cat->special_education_schools_id      = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalAgencies::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkAgencies = isset($_POST['ProfessionalAgencies']);
                if( $checkAgencies ){
                    $cats  = $_POST['ProfessionalAgencies'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalAgencies();
                        $cat->professional_id = $model->id;
                        $cat->agencies_id     = $cat_id;
                        $cat->save();
                    }
                }

                ProfessionalDegrees::model()->deleteAll(
                    "professional_id = :professional_id",
                    array(':professional_id' => $model->id)
                );
                $checkDegrees = isset($_POST['ProfessionalDegrees']);
                if( $checkDegrees ){
                    $cats  = $_POST['ProfessionalDegrees'];
                    foreach ($cats as $cat_id){
                        $cat = new ProfessionalDegrees();
                        $cat->professional_id = $model->id;
                        $cat->degree_id         = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$model->image);
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
		$model=new Professionals('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Professionals']))
			$model->attributes=$_GET['Professionals'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Professionals');
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
		$model=Professionals::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='professionals-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
