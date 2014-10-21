<?php

class TrainingCentersController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Training Centers') ] = array('trainingCenters/index');
		$this->pageTitle[] = Yii::t('global', 'Training Centers');
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
		$model=new TrainingCenters;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TrainingCenters']))
		{
			$model->attributes=$_POST['TrainingCenters'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $fileName = '';
            }

            $uploadedFileLogo=CUploadedFile::getInstance($model,'logo');
            if(!empty($uploadedFileLogo)) {
                $rnd = rand(0,9999);
                $fileNameLogo = "{$rnd}-{$uploadedFileLogo}";  // random number + file name
                $model->logo = $fileNameLogo;
            }
            else{
                $fileNameLogo = '';
            }
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::TRAININGCENTER;
                    $model1->save();
                }
                $checkcat = isset($_POST['TrainingCentersType']);
                if( $checkcat ){
                    $cats = $_POST['TrainingCentersType'];
                    foreach ($cats as $cat_id){
                        $cat = new TrainingCentersType();
                        $cat->training_centers_id = $model->id;
                        $cat->type_training_id = $cat_id;
                        $cat->save();
                    }
                }

                $checkDegrees = isset($_POST['TrainingCentersDegrees']);
                if( $checkDegrees ){
                    $cats = $_POST['TrainingCentersDegrees'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCentersDegrees();
                        $cat->training_centers_id   = $model->id;
                        $cat->degrees_id            = $cat_id;
                        $cat->save();
                    }
                }

                $checkNews = isset($_POST['TrainingCenterNews']);
                if( $checkNews ){
                    $cats = $_POST['TrainingCenterNews'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterNews();
                        $cat->training_center_id    = $model->id;
                        $cat->news_id               = $cat_id;
                        $cat->save();
                    }
                }

                $checkArticles = isset($_POST['TrainingCenterArticles']);
                if( $checkArticles ){
                    $cats = $_POST['TrainingCenterArticles'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterArticles();
                        $cat->training_center_id    = $model->id;
                        $cat->product_id               = $cat_id;
                        $cat->save();
                    }
                }

                $checkHearingTV = isset($_POST['TrainingCenterHearingTv']);
                if( $checkHearingTV ){
                    $cats = $_POST['TrainingCenterHearingTv'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterHearingTv();
                        $cat->training_center_id    = $model->id;
                        $cat->video_id              = $cat_id;
                        $cat->save();
                    }
                }

                $checkEvents = isset($_POST['TrainingCenterEvents']);
                if( $checkEvents ){
                    $cats = $_POST['TrainingCenterEvents'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterEvents();
                        $cat->training_center_id    = $model->id;
                        $cat->event_id              = $cat_id;
                        $cat->save();
                    }
                }

                $checkST = isset($_POST['TrainingCenterSpeechTherapists']);
                if( $checkST ){
                    $cats = $_POST['TrainingCenterSpeechTherapists'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterSpeechTherapists();
                        $cat->training_center_id    = $model->id;
                        $cat->speech_therapists_id  = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$fileName);
                }
                if(!empty($uploadedFileLogo)) {
                    $uploadedFileLogo->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$fileNameLogo);
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

		if(isset($_POST['TrainingCenters']))
		{
			$model->attributes=$_POST['TrainingCenters'];
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

            $uploadedFileLogo=CUploadedFile::getInstance($model,'logo');

            if(!empty($uploadedFileLogo)) {
                $rnd = rand(0,9999);
                $fileNameLogo = "{$rnd}-{$uploadedFileLogo}";  // random number + file name
                $model->logo = $fileNameLogo;
            }
            else{
                $modelOldLogo   = $this->loadModel($id);
                $model->logo   = $modelOldLogo->logo ;
            }

			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::TRAININGCENTER;
                    $model1->save();
                }
                TrainingCentersType::model()->deleteAll(
                    "training_centers_id = :training_centers_id",
                    array(':training_centers_id' => $model->id)
                );
                $checkcat = isset($_POST['TrainingCentersType']);
                if( $checkcat ){
                    $cats = $_POST['TrainingCentersType'];
                    foreach ($cats as $cat_id){
                        $cat = new TrainingCentersType();
                        $cat->training_centers_id = $model->id;
                        $cat->type_training_id = $cat_id;
                        $cat->save();
                    }
                }

                TrainingCentersDegrees::model()->deleteAll(
                    "training_centers_id = :training_centers_id",
                    array(':training_centers_id' => $model->id)
                );
                $checkDegrees = isset($_POST['TrainingCentersDegrees']);
                if( $checkDegrees ){
                    $cats = $_POST['TrainingCentersDegrees'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCentersDegrees();
                        $cat->training_centers_id   = $model->id;
                        $cat->degrees_id            = $cat_id;
                        $cat->save();
                    }
                }

                TrainingCenterNews::model()->deleteAll(
                    "training_center_id = :training_center_id",
                    array(':training_center_id' => $model->id)
                );
                $checkNews = isset($_POST['TrainingCenterNews']);
                if( $checkNews ){
                    $cats = $_POST['TrainingCenterNews'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterNews();
                        $cat->training_center_id    = $model->id;
                        $cat->news_id               = $cat_id;
                        $cat->save();
                    }
                }
                TrainingCenterArticles::model()->deleteAll(
                    "training_center_id = :training_center_id",
                    array(':training_center_id' => $model->id)
                );
                $checkArticles = isset($_POST['TrainingCenterArticles']);
                if( $checkArticles ){
                    $cats = $_POST['TrainingCenterArticles'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterArticles();
                        $cat->training_center_id    = $model->id;
                        $cat->product_id               = $cat_id;
                        $cat->save();
                    }
                }
                TrainingCenterHearingTv::model()->deleteAll(
                    "training_center_id = :training_center_id",
                    array(':training_center_id' => $model->id)
                );
                $checkHearingTV = isset($_POST['TrainingCenterHearingTv']);
                if( $checkHearingTV ){
                    $cats = $_POST['TrainingCenterHearingTv'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterHearingTv();
                        $cat->training_center_id    = $model->id;
                        $cat->video_id              = $cat_id;
                        $cat->save();
                    }
                }
                TrainingCenterEvents::model()->deleteAll(
                    "training_center_id = :training_center_id",
                    array(':training_center_id' => $model->id)
                );
                $checkEvents = isset($_POST['TrainingCenterEvents']);
                if( $checkEvents ){
                    $cats = $_POST['TrainingCenterEvents'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterEvents();
                        $cat->training_center_id    = $model->id;
                        $cat->event_id              = $cat_id;
                        $cat->save();
                    }
                }
                TrainingCenterSpeechTherapists::model()->deleteAll(
                    "training_center_id = :training_center_id",
                    array(':training_center_id' => $model->id)
                );
                $checkST = isset($_POST['TrainingCenterSpeechTherapists']);
                if( $checkST ){
                    $cats = $_POST['TrainingCenterSpeechTherapists'];
                    foreach ($cats as $cat_id){
                        $cat                        = new TrainingCenterSpeechTherapists();
                        $cat->training_center_id    = $model->id;
                        $cat->speech_therapists_id  = $cat_id;
                        $cat->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$model->image);
                }
                if(!empty($uploadedFileLogo)) {
                    $uploadedFileLogo->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$model->logo);
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
		$model=new TrainingCenters('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TrainingCenters']))
			$model->attributes=$_GET['TrainingCenters'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('TrainingCenters');
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
		$model=TrainingCenters::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='training-centers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=formations.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = TrainingCenters::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, school_name, school_name_2, advertiser, type_of_training, degree, address_1, email_1, website, website_2, logo, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->school_name.",".$message->school_name_2.",".$message->advertiser.",".$message->type_of_training.",".$message->degree.",".$message->address_1.",".$message->email_1.",".$message->website.",".$message->website_2.",".$message->logo.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Press();
        if(isset($_POST['Press']))
        {
            $start = $_POST['Press']['fromdate'];
            $end   = $_POST['Press']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

}
