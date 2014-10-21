<?php

class AgenciesController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'AGENCIES') ] = array('agencies/index');
		$this->pageTitle[] = Yii::t('global', 'AGENCIES');
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
		$model=new Agencies;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Agencies']))
		{
			$model->attributes=$_POST['Agencies'];
            /*$uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $fileName = '';
            }*/
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
                    $model1->type       = Suppliers::AGENCIES;
                    $model1->save();
                }
                $otherNews = isset($_POST['AgenciesNews']);
                if( $otherNews ){
                    $links = $_POST['AgenciesNews'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesNews();
                        $link->agencies_id      = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                $otherArticles = isset($_POST['AgenciesArticles']);
                if( $otherArticles ){
                    $links = $_POST['AgenciesArticles'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesArticles();
                        $link->agencies_id      = $model->id;
                        $link->product_id          = $link_id;
                        $link->save();
                    }
                }

                $otherHearingTv  = isset($_POST['AgenciesHearingTv']);
                if( $otherHearingTv ){
                    $links       = $_POST['AgenciesHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesHearingTv();
                        $link->agencies_id      = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }

                $otherEvents  = isset($_POST['AgenciesEvents']);
                if( $otherEvents ){
                    $links       = $_POST['AgenciesEvents'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesEvents();
                        $link->agencies_id      = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                $otherCenters       = isset($_POST['AgenciesHearingCareCenters']);
                if( $otherCenters ){
                    $links          = $_POST['AgenciesHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesCenters();
                        $link->agencies_id      = $model->id;
                        $link->center_id        = $link_id;
                        $link->save();
                    }
                }

                $otherCenters       = isset($_POST['AgenciesSpeechTherapists']);
                if( $otherCenters ){
                    $links          = $_POST['AgenciesSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                       = new AgenciesSpeechTherapists();
                        $link->agencies_id          = $model->id;
                        $link->speech_therapist_id  = $link_id;
                        $link->save();
                    }
                }

                $this->_saveGallery($model);
                if(!empty($uploadedFileLogo)) {
                    $uploadedFileLogo->saveAs(Yii::app()->basePath.'/../uploads/agencies/'.$fileNameLogo);
                }
               /* if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/agencies/'.$fileName);
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

		if(isset($_POST['Agencies']))
		{
			$model->attributes=$_POST['Agencies'];
           /* $uploadedFile=CUploadedFile::getInstance($model,'image');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->image   = $modelold->image ;
            }*/

            $uploadedFileLogo=CUploadedFile::getInstance($model,'logo');

            if(!empty($uploadedFileLogo)) {
                $rnd = rand(0,9999);
                $fileNameLogo = "{$rnd}-{$uploadedFileLogo}";  // random number + file name
                $model->logo = $fileNameLogo;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->logo   = $modelold->logo ;
            }


			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::AGENCIES;
                    $model1->save();
                }
                AgenciesNews::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherNews = isset($_POST['AgenciesNews']);
                if( $otherNews ){
                    $links = $_POST['AgenciesNews'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesNews();
                        $link->agencies_id      = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                AgenciesArticles::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherArticles = isset($_POST['AgenciesArticles']);
                if( $otherArticles ){
                    $links = $_POST['AgenciesArticles'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesArticles();
                        $link->agencies_id      = $model->id;
                        $link->product_id          = $link_id;
                        $link->save();
                    }
                }

                AgenciesHearingTv::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherHearingTv  = isset($_POST['AgenciesHearingTv']);
                if( $otherHearingTv ){
                    $links       = $_POST['AgenciesHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesHearingTv();
                        $link->agencies_id      = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }

                AgenciesEvents::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherEvents  = isset($_POST['AgenciesEvents']);
                if( $otherEvents ){
                    $links       = $_POST['AgenciesEvents'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesEvents();
                        $link->agencies_id      = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                AgenciesCenters::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherCenters       = isset($_POST['AgenciesHearingCareCenters']);
                if( $otherCenters ){
                    $links          = $_POST['AgenciesHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new AgenciesCenters();
                        $link->agencies_id      = $model->id;
                        $link->center_id        = $link_id;
                        $link->save();
                    }
                }

                AgenciesSpeechTherapists::model()->deleteAll("agencies_id = :agencies_id", array(':agencies_id' => $model->id ) );
                $otherCenters       = isset($_POST['AgenciesSpeechTherapists']);
                if( $otherCenters ){
                    $links          = $_POST['AgenciesSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                       = new AgenciesSpeechTherapists();
                        $link->agencies_id          = $model->id;
                        $link->speech_therapist_id  = $link_id;
                        $link->save();
                    }
                }
                /*if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/agencies/'.$model->image);
                }*/
                $this->_saveGallery($model);
                if(!empty($uploadedFileLogo)) {
                    $uploadedFileLogo->saveAs(Yii::app()->basePath.'/../uploads/agencies/'.$model->logo);
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
        if (isset($_GET['ajax']) && $_GET['ajax'] == 'image-agencies-galleries-grid'){
            AgenciesGallery::model()->findByPk($id)->delete();
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
		$model=new Agencies('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Agencies']))
			$model->attributes=$_GET['Agencies'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Agencies');
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
		$model=Agencies::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='agencies-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv(){

        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=agencies.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Agencies::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, corporate_name, corporate_name_2, legal_status, advertisers, logo, service, address_id, address, po_box_cedex_2, city_cedex_2, fax_2, image, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->corporate_name.",".$message->corporate_name_2.",".$message->legal_status.",".$message->advertisers.",".$message->logo.",".$message->service.",".$message->address_id.",".$message->address.",".$message->po_box_cedex_2.",".$message->city_cedex_2.",".$message->fax_2.",".$message->image.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Agencies();
        if(isset($_POST['Agencies']))
        {
            $start = $_POST['Agencies']['fromdate'];
            $end   = $_POST['Agencies']['todate'];
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
            AgenciesGallery::model()->updateAll(array('agencies_id' => $model->id), "list_file IN ('".implode("','", $files)."')");
        }
    }

    function actionUpload(){
        $this->layout = '';
        if (isset($_POST['name']) && isset($_FILES['file'])){
            $folder = Yii::app()->basePath.'/../uploads/agencies_gallery/'.date('Ymd').'/';

            if (!is_dir($folder)){
                mkdir($folder, 0777);
            }
            $filename = date('Ymd').'/'.$_POST['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder.$_POST['name'])){
                $gallery = new AgenciesGallery();
                $gallery->list_file = $filename;
                $gallery->save();
            }
        }

    }

}
