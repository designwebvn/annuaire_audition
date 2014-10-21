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

           /* $uploadedFilePics=CUploadedFile::getInstance($model,'pics');
            if(!empty($uploadedFilePics)) {
                $rnd = rand(0,9999);
                $fileNamePics = "{$rnd}-{$uploadedFilePics}";  // random number + file name
                $model->pics = $fileNamePics;
            }
            else{
                $fileNamePics = '';
            }*/
			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SPECIAL_EDUCATION_SCHOOLS;
                    $model1->save();
                }

                $otherLink = isset($_POST['SpecialEducationSchoolStructures']);
                if( $otherLink ){
                    $links = $_POST['SpecialEducationSchoolStructures'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolStructures();
                        $link->special_education_school_id  = $model->id;
                        $link->structure_id                 = $link_id;
                        $link->save();
                    }
                }

                $otherNews = isset($_POST['SpecialEducationSchoolNews']);
                if( $otherNews ){
                    $links = $_POST['SpecialEducationSchoolNews'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolNews();
                        $link->special_education_school_id  = $model->id;
                        $link->news_id                      = $link_id;
                        $link->save();
                    }
                }

                $otherESA = isset($_POST['SpecialEducationSchoolArticles']);
                if( $otherESA ){
                    $links = $_POST['SpecialEducationSchoolArticles'];
                    foreach ($links as $link_id){
                        $link                   = new SpecialEducationSchoolArticles();
                        $link->special_education_school_id       = $model->id;
                        $link->product_id = $link_id;
                        $link->save();
                    }
                }

                $otherCenter = isset($_POST['SpecialEducationSchoolCenters']);
                if( $otherCenter ){
                    $links = $_POST['SpecialEducationSchoolCenters'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolCenters();
                        $link->special_education_school_id  = $model->id;
                        $link->center_id                    = $link_id;
                        $link->save();
                    }
                }

                $otherST = isset($_POST['SpecialEducationSchoolSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['SpecialEducationSchoolSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolSpeechTherapists();
                        $link->special_education_school_id  = $model->id;
                        $link->speech_therapist_id                    = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$fileName);
                }
               /* if(!empty($uploadedFilePics)) {
                    $uploadedFilePics->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$fileNamePics);
                }*/
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

      /*      $uploadedFilePics   = CUploadedFile::getInstance($model,'pics');

            if(!empty($uploadedFilePics)) {
                $rnd            = rand(0,9999);
                $fileNamePics   = "{$rnd}-{$uploadedFilePics}";  // random number + file name
                $model->pics    = $fileNamePics;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->pics   = $modelold->pics ;
            }*/

			if($model->save()){

                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SPECIAL_EDUCATION_SCHOOLS;
                    $model1->save();
                }

                SpecialEducationSchoolStructures::model()->deleteAll("special_education_school_id = :special_education_school_id", array(':special_education_school_id' => $model->id ) );
                $otherLink = isset($_POST['SpecialEducationSchoolStructures']);
                if( $otherLink ){
                    $links = $_POST['SpecialEducationSchoolStructures'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolStructures();
                        $link->special_education_school_id  = $model->id;
                        $link->structure_id                 = $link_id;
                        $link->save();
                    }
                }

                SpecialEducationSchoolNews::model()->deleteAll("special_education_school_id = :special_education_school_id", array(':special_education_school_id' => $model->id ) );
                $otherNews = isset($_POST['SpecialEducationSchoolNews']);
                if( $otherNews ){
                    $links = $_POST['SpecialEducationSchoolNews'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolNews();
                        $link->special_education_school_id  = $model->id;
                        $link->news_id                      = $link_id;
                        $link->save();
                    }
                }

                SpecialEducationSchoolArticles::model()->deleteAll("special_education_school_id = :special_education_school_id", array(':special_education_school_id' => $model->id ) );
                $otherESA = isset($_POST['SpecialEducationSchoolArticles']);
                if( $otherESA ){
                    $links = $_POST['SpecialEducationSchoolArticles'];
                    foreach ($links as $link_id){
                        $link                   = new SpecialEducationSchoolArticles();
                        $link->special_education_school_id       = $model->id;
                        $link->product_id = $link_id;
                        $link->save();
                    }
                }

                SpecialEducationSchoolCenters::model()->deleteAll("special_education_school_id = :special_education_school_id", array(':special_education_school_id' => $model->id ) );
                $otherCenter = isset($_POST['SpecialEducationSchoolCenters']);
                if( $otherCenter ){
                    $links = $_POST['SpecialEducationSchoolCenters'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolCenters();
                        $link->special_education_school_id  = $model->id;
                        $link->center_id                    = $link_id;
                        $link->save();
                    }
                }

                SpecialEducationSchoolSpeechTherapists::model()->deleteAll("special_education_school_id = :special_education_school_id", array(':special_education_school_id' => $model->id ) );
                $otherST = isset($_POST['SpecialEducationSchoolSpeechTherapists']);
                if( $otherST ){
                    $links = $_POST['SpecialEducationSchoolSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                               = new SpecialEducationSchoolSpeechTherapists();
                        $link->special_education_school_id  = $model->id;
                        $link->speech_therapist_id                    = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$model->logo);
                }
               /* if(!empty($uploadedFilePics)) {
                    $uploadedFilePics->saveAs(Yii::app()->basePath.'/../uploads/special_education_school/'.$model->pics);
                }*/
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
        if (isset($_GET['ajax']) && $_GET['ajax'] == 'product-galleries-grid'){
            SpecialEducationSchoolGalleries::model()->findByPk($id)->delete();
        }
        elseif(Yii::app()->request->isPostRequest)
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

    public function ExportCsv( $start , $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=specialEducationSchools.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = SpecialEducationSchools::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, corporate_name, corporate_name_2, advertiser, typology, status, overall_capacity, management, deafnesses, structures, language_communication, support, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->corporate_name.",".$message->corporate_name_2.",".$message->advertiser.",".$message->typology.",".$message->status.",".$message->overall_capacity.",".$message->management.",".$message->deafnesses.",".$message->structures.",".$message->language_communication.",".$message->support.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new SpecialEducationSchools();
        if(isset($_POST['SpecialEducationSchools']))
        {
            $start = $_POST['SpecialEducationSchools']['fromdate'];
            $end   = $_POST['SpecialEducationSchools']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

    function _saveGallery($model){
            $files = array();
            if (isset($_POST['uploader_count']) && $count = $_POST['uploader_count']){
                for ($i = 0 ; $i < $count; $i ++){
                    if ($_POST["uploader_{$i}_status"] == 'done')
                        $files[] = date('Ymd').'/'.$_POST["uploader_{$i}_tmpname"];
                }
            }
            if (count($files)){
                SpecialEducationSchoolGalleries::model()->updateAll(array('special_education_school_id' => $model->id), "filename IN ('".implode("','", $files)."')");
            }
        }

        function actionUpload(){
            $this->layout = '';
            if (isset($_POST['name']) && isset($_FILES['file'])){
                $folder = Yii::app()->basePath.'/../uploads/special_education_school_gallery/'.date('Ymd').'/';

                if (!is_dir($folder)){
                    mkdir($folder, 0777);
                }
                $filename = date('Ymd').'/'.$_POST['name'];
                if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                    $gallery = new SpecialEducationSchoolGalleries();
                    $gallery->filename = $filename;
                    $gallery->save();
                }
            }

    }

}
