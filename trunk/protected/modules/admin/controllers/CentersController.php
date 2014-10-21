<?php

class CentersController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Centers') ] = array('centers/index');
		$this->pageTitle[] = Yii::t('global', 'Centers');
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
		$model=new Centers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Centers']))
		{
			$model->attributes=$_POST['Centers'];
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
                    $model1->type       = Suppliers::CENTERS;
                    $model1->save();
                }
                $otherCat = isset($_POST['CenterCategories']);
                if( $otherCat ){
                    $links = $_POST['CenterCategories'];
                    foreach ($links as $link_id){
                        $link                   = new CenterCat();
                        $link->center_id        = $model->id;
                        $link->category_id          = $link_id;
                        $link->save();
                    }
                }
                $otherCat = isset($_POST['CenterNetwork']);
                if( $otherCat ){
                    $links = $_POST['CenterNetwork'];
                    foreach ($links as $link_id){
                        $link                   = new CenterNetworks();
                        $link->center_id        = $model->id;
                        $link->network_id      = $link_id;
                        $link->save();
                    }
                }
                $otherNews = isset($_POST['CenterNews']);
                if( $otherNews ){
                    $links = $_POST['CenterNews'];
                    foreach ($links as $link_id){
                        $link                   = new CenterNews();
                        $link->center_id        = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }
                $otherVideos = isset($_POST['CenterHearingTv']);
                if( $otherVideos ){
                    $links = $_POST['CenterHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new CenterHearingTv();
                        $link->center_id        = $model->id;
                        $link->video_id          = $link_id;
                        $link->save();
                    }
                }
                $otherAnnoucements = isset($_POST['CenterAnnouncements']);
                if( $otherAnnoucements ){
                    $links = $_POST['CenterAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new CenterAnnoucements();
                        $link->center_id        = $model->id;
                        $link->annoucements_id  = $link_id;
                        $link->save();
                    }
                }
                $otherO = isset($_POST['CenterHearingCareCenters']);
                if( $otherO ){
                    $links = $_POST['CenterHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new CenterOther();
                        $link->center_id        = $model->id;
                        $link->other_center_id  = $link_id;
                        $link->save();
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

		if(isset($_POST['Centers']))
		{
			$model->attributes=$_POST['Centers'];
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
                    $model1->type       = Suppliers::CENTERS;
                    $model1->save();
                }
                CenterCat::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherCat = isset($_POST['CenterCategories']);
                if( $otherCat ){
                    $links = $_POST['CenterCategories'];
                    foreach ($links as $link_id){
                        $link                   = new CenterCat();
                        $link->center_id        = $model->id;
                        $link->category_id          = $link_id;
                        $link->save();
                    }
                }

                CenterNetworks::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherCat = isset($_POST['CenterNetwork']);
                if( $otherCat ){
                    $links = $_POST['CenterNetwork'];
                    foreach ($links as $link_id){
                        $link                   = new CenterNetworks();
                        $link->center_id        = $model->id;
                        $link->network_id      = $link_id;
                        $link->save();
                    }
                }

                CenterNews::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherNews = isset($_POST['CenterNews']);
                if( $otherNews ){
                    $links = $_POST['CenterNews'];
                    foreach ($links as $link_id){
                        $link                   = new CenterNews();
                        $link->center_id        = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                CenterHearingTv::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherVideos = isset($_POST['CenterHearingTv']);
                if( $otherVideos ){
                    $links = $_POST['CenterHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new CenterHearingTv();
                        $link->center_id        = $model->id;
                        $link->video_id          = $link_id;
                        $link->save();
                    }
                }

                CenterAnnoucements::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherAnnoucements = isset($_POST['CenterAnnouncements']);
                if( $otherAnnoucements ){
                    $links = $_POST['CenterAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new CenterAnnoucements();
                        $link->center_id        = $model->id;
                        $link->annoucements_id  = $link_id;
                        $link->save();
                    }
                }

                CenterOther::model()->deleteAll("center_id = :center_id", array(':center_id' => $model->id ) );
                $otherO = isset($_POST['CenterHearingCareCenters']);
                if( $otherO ){
                    $links = $_POST['CenterHearingCareCenters'];
                    foreach ($links as $link_id){
                        $link                   = new CenterOther();
                        $link->center_id        = $model->id;
                        $link->other_center_id  = $link_id;
                        $link->save();
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
		$model=new Centers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Centers']))
			$model->attributes=$_GET['Centers'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Centers');
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
		$model=Centers::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='centers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=centers.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Centers::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"' );
        echo "id, corporate_name, status, corporate_name_2, advertiser, categories, networks, sign, purchase_center, address, additional_address, po_box, zip_cedex, city_cedex, city, zip, country, phone, phone_2, fax, fax_2, email, email_2, email_3, website, website_2, grip, description, opening_hours, note, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->corporate_name.",".$message->status.",".$message->corporate_name_2.",".$message->advertiser.",".$message->categories.",".$message->networks.",".$message->sign.",".$message->purchase_center.",".$message->address.",".$message->additional_address.",".$message->po_box.",".$message->zip_cedex.",".$message->city_cedex.",".$message->city.",".$message->zip.",".$message->country.",".$message->phone.",".$message->phone_2.",".$message->fax.",".$message->fax_2.",".$message->email.",".$message->email_2.",".$message->email_3.",".$message->website.",".$message->website_2.",".$message->grip.",".$message->description.",".$message->opening_hours.",".$message->note.",".$message->created.",".$message->updated."\n";
        }
        exit();
    }

    public function actionExport(){
        $model=new Centers;
        if(isset($_POST['Centers']))
        {
            $start = $_POST['Centers']['fromdate'];
            $end   = $_POST['Centers']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }


}
