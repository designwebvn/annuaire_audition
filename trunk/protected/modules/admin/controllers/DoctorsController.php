<?php

class DoctorsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Doctors') ] = array('doctors/index');
		$this->pageTitle[] = Yii::t('global', 'Doctors');
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
		$model=new Doctors;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Doctors']))
		{
			$model->attributes=$_POST['Doctors'];
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::DOCTORS;
                    $model1->save();
                }
                $otherDD = isset($_POST['DoctorDegrees']);
                if( $otherDD ){
                    $links = $_POST['DoctorDegrees'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorDegrees();
                        $link->doctor_id                    = $model->id;
                        $link->degree_id                    = $link_id;
                        $link->save();
                    }
                }
               $otherA = isset($_POST['DoctorArticles']);
                if( $otherA ){
                    $links = $_POST['DoctorArticles'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorArticles();
                        $link->doctor_id                    = $model->id;
                        $link->product_id                    = $link_id;
                        $link->save();
                    }
                }
                $otherHTv = isset($_POST['DoctorHearingTv']);
                if( $otherHTv ){
                    $links = $_POST['DoctorHearingTv'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorHearingTv();
                        $link->doctor_id                    = $model->id;
                        $link->video_id                    = $link_id;
                        $link->save();
                    }
                }
                $otherSES = isset($_POST['DoctorSpecialEducationSchools']);
                if( $otherSES ){
                    $links = $_POST['DoctorSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorSpecialEducationSchools();
                        $link->doctor_id                    = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }
                $otherAgs = isset($_POST['DoctorAgencies']);
                if( $otherAgs ){
                    $links = $_POST['DoctorAgencies'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorAgencies();
                        $link->doctor_id                    = $model->id;
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

		if(isset($_POST['Doctors']))
		{
			$model->attributes=$_POST['Doctors'];
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::DOCTORS;
                    $model1->save();
                }

                DoctorDegrees::model()->deleteAll("doctor_id = :doctor_id", array(':doctor_id' => $model->id ) );
                $otherDD = isset($_POST['DoctorDegrees']);
                if( $otherDD ){
                    $links = $_POST['DoctorDegrees'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorDegrees();
                        $link->doctor_id                    = $model->id;
                        $link->degree_id                    = $link_id;
                        $link->save();
                    }
                }

                DoctorArticles::model()->deleteAll("doctor_id = :doctor_id", array(':doctor_id' => $model->id ) );
                $otherA = isset($_POST['DoctorArticles']);
                if( $otherA ){
                    $links = $_POST['DoctorArticles'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorArticles();
                        $link->doctor_id                    = $model->id;
                        $link->product_id                    = $link_id;
                        $link->save();
                    }
                }

                DoctorHearingTv::model()->deleteAll("doctor_id = :doctor_id", array(':doctor_id' => $model->id ) );
                $otherHTv = isset($_POST['DoctorHearingTv']);
                if( $otherHTv ){
                    $links = $_POST['DoctorHearingTv'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorHearingTv();
                        $link->doctor_id                    = $model->id;
                        $link->video_id                    = $link_id;
                        $link->save();
                    }
                }

                DoctorSpecialEducationSchools::model()->deleteAll("doctor_id = :doctor_id", array(':doctor_id' => $model->id ) );
                $otherSES = isset($_POST['DoctorSpecialEducationSchools']);
                if( $otherSES ){
                    $links = $_POST['DoctorSpecialEducationSchools'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorSpecialEducationSchools();
                        $link->doctor_id                    = $model->id;
                        $link->special_education_schools_id = $link_id;
                        $link->save();
                    }
                }

                DoctorAgencies::model()->deleteAll("doctor_id = :doctor_id", array(':doctor_id' => $model->id ) );
                $otherAgs = isset($_POST['DoctorAgencies']);
                if( $otherAgs ){
                    $links = $_POST['DoctorAgencies'];
                    foreach ($links as $link_id){
                        $link                               = new DoctorAgencies();
                        $link->doctor_id                    = $model->id;
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
		$model=new Doctors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Doctors']))
			$model->attributes=$_GET['Doctors'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Doctors');
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
		$model=Doctors::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='doctors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=doctors.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Doctors::model()->findAll( 't.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"' );
        echo "id, title, name, first_name, ent, phoniatricians, specialty, speech_therapy_ff, specific_phone_number, specific_fax, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->title.",".$message->name.",".$message->first_name.",".$message->ent.",".$message->phoniatricians.",".$message->specialty.",".$message->speech_therapy_ff.",".$message->specific_phone_number.",".$message->specific_fax.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Doctors();
        if(isset($_POST['Doctors']))
        {
            $start = $_POST['Doctors']['fromdate'];
            $end   = $_POST['Doctors']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

}
