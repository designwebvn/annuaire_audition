<?php

class SpeechTherapistController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Speech Therapists') ] = array('speechTherapist/index');
		$this->pageTitle[] = Yii::t('global', 'Speech Therapists');
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
		$model=new SpeechTherapist;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SpeechTherapist']))
		{
			$model->attributes=$_POST['SpeechTherapist'];
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SPEECH_THERAPIST;
                    $model1->save();
                }
                $otherPractice = isset($_POST['SpeechTherapistPractice']);
                if( $otherPractice ){
                    $cats = $_POST['SpeechTherapistPractice'];
                    foreach ($cats as $cat_id){
                        $cat                        = new SpeechTherapistPractices();
                        $cat->speech_therapist_id   = $model->id;
                        $cat->practices_id          = $cat_id;
                        $cat->save();
                    }
                }

                $otherHTv = isset($_POST['SpeechTherapistSpecialEducationSchools']);
                if( $otherHTv ){
                    $links = $_POST['SpeechTherapistSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new SpeechTherapistSpecialEducationSchools();
                        $link->speech_therapist_id          = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                $otherA = isset($_POST['SpeechTherapistAgencies']);
                if( $otherA ){
                    $links = $_POST['SpeechTherapistAgencies'];
                    foreach ($links as $link_id){
                        $link                               = new SpeechTherapistAgencies();
                        $link->speech_therapist_id          = $model->id;
                        $link->agencies_id                  = $link_id;
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

		if(isset($_POST['SpeechTherapist']))
		{
			$model->attributes=$_POST['SpeechTherapist'];
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SPEECH_THERAPIST;
                    $model1->save();
                }
                SpeechTherapistPractices::model()->deleteAll(
                    "speech_therapist_id = :speech_therapist_id",
                    array(':speech_therapist_id' => $model->id)
                );
                $otherPractice = isset($_POST['SpeechTherapistPractice']);
                if( $otherPractice ){
                    $cats = $_POST['SpeechTherapistPractice'];
                    foreach ($cats as $cat_id){
                        $cat                        = new SpeechTherapistPractices();
                        $cat->speech_therapist_id   = $model->id;
                        $cat->practices_id          = $cat_id;
                        $cat->save();
                    }
                }

                SpeechTherapistSpecialEducationSchools::model()->deleteAll("speech_therapist_id = :speech_therapist_id", array(':speech_therapist_id' => $model->id ) );
                $otherHTv = isset($_POST['SpeechTherapistSpecialEducationSchools']);
                if( $otherHTv ){
                    $links = $_POST['SpeechTherapistSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new SpeechTherapistSpecialEducationSchools();
                        $link->speech_therapist_id          = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                SpeechTherapistAgencies::model()->deleteAll("speech_therapist_id = :speech_therapist_id", array(':speech_therapist_id' => $model->id ) );
                $otherA = isset($_POST['SpeechTherapistAgencies']);
                if( $otherA ){
                    $links = $_POST['SpeechTherapistAgencies'];
                    foreach ($links as $link_id){
                        $link                               = new SpeechTherapistAgencies();
                        $link->speech_therapist_id          = $model->id;
                        $link->agencies_id                  = $link_id;
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
		$model=new SpeechTherapist('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SpeechTherapist']))
			$model->attributes=$_GET['SpeechTherapist'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('SpeechTherapist');
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
		$model=SpeechTherapist::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='speech-therapist-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start , $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=speechTherapist.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = SpeechTherapist::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, title, name, firstname, status_grade, free_link, advertisers, specialty_if_advertisers, specialty, phone_1, phone_2, email_1, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->title.",".$message->name.",".$message->firstname.",".$message->status_grade.",".$message->free_link.",".$message->advertisers.",".$message->specialty_if_advertisers.",".$message->specialty.",".$message->phone_1.",".$message->phone_2.",".$message->email_1.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new SpeechTherapist();
        if(isset($_POST['SpeechTherapist']))
        {
            $start = $_POST['SpeechTherapist']['fromdate'];
            $end   = $_POST['SpeechTherapist']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

}
