<?php

class NetworksController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Networks') ] = array('networks/index');
		$this->pageTitle[] = Yii::t('global', 'Networks');
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
		$model=new Networks;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Networks']))
		{
			$model->attributes=$_POST['Networks'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
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
                    $model1->type       = Suppliers::NETWORKS;
                    $model1->save();
                }

                $otherNews = isset($_POST['NetworksNews']);
                if( $otherNews ){
                    $links = $_POST['NetworksNews'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkNews();
                        $link->network_id       = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                $otherArticles = isset($_POST['NetworkArticles']);
                if( $otherArticles ){
                    $links = $_POST['NetworkArticles'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkArticles();
                        $link->network_id       = $model->id;
                        $link->product_id          = $link_id;
                        $link->save();
                    }
                }

                $otherVideos = isset($_POST['NetworkHearingTv']);
                if( $otherVideos ){
                    $links = $_POST['NetworkHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkVideos();
                        $link->network_id       = $model->id;
                        $link->video_id       = $link_id;
                        $link->save();
                    }
                }

                $otherEvents = isset($_POST['NetworkEvents']);
                if( $otherEvents ){
                    $links = $_POST['NetworkEvents'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkEvents();
                        $link->network_id       = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                $otherAnnouncements = isset($_POST['NetworkAnnouncements']);
                if( $otherAnnouncements ){
                    $links = $_POST['NetworkAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkAnnoucements();
                        $link->network_id       = $model->id;
                        $link->annoucements_id         = $link_id;
                        $link->save();
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

		if(isset($_POST['Networks']))
		{
			$model->attributes=$_POST['Networks'];
            $uploadedFile=CUploadedFile::getInstance($model,'logo');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->logo = $fileName;
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
                    $model1->type       = Suppliers::NETWORKS;
                    $model1->save();
                }

                NetworkNews::model()->deleteAll("network_id = :network_id", array(':network_id' => $model->id ) );
                $otherNews = isset($_POST['NetworksNews']);
                if( $otherNews ){
                    $links = $_POST['NetworksNews'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkNews();
                        $link->network_id       = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                NetworkArticles::model()->deleteAll("network_id = :network_id", array(':network_id' => $model->id ) );
                $otherArticles = isset($_POST['NetworkArticles']);
                if( $otherArticles ){
                    $links = $_POST['NetworkArticles'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkArticles();
                        $link->network_id       = $model->id;
                        $link->product_id          = $link_id;
                        $link->save();
                    }
                }

                NetworkVideos::model()->deleteAll("network_id = :network_id", array(':network_id' => $model->id ) );
                $otherVideos = isset($_POST['NetworkHearingTv']);
                if( $otherVideos ){
                    $links = $_POST['NetworkHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkVideos();
                        $link->network_id       = $model->id;
                        $link->video_id       = $link_id;
                        $link->save();
                    }
                }

                NetworkEvents::model()->deleteAll("network_id = :network_id", array(':network_id' => $model->id ) );
                $otherEvents = isset($_POST['NetworkEvents']);
                if( $otherEvents ){
                    $links = $_POST['NetworkEvents'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkEvents();
                        $link->network_id       = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                NetworkAnnoucements::model()->deleteAll("network_id = :network_id", array(':network_id' => $model->id ) );
                $otherAnnouncements = isset($_POST['NetworkAnnouncements']);
                if( $otherAnnouncements ){
                    $links = $_POST['NetworkAnnouncements'];
                    foreach ($links as $link_id){
                        $link                   = new NetworkAnnoucements();
                        $link->network_id       = $model->id;
                        $link->annoucements_id         = $link_id;
                        $link->save();
                    }
                }

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/audios/'.$model->logo);
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
		$model=new Networks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Networks']))
			$model->attributes=$_GET['Networks'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Networks');
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
		$model=Networks::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='networks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=networks.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Networks::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, corporate_name, advertiser, address_1, a_email_1a, email_1b, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->corporate_name.",".$message->advertiser.",".$message->address_1.",".$message->a_email_1a.",".$message->email_1b.",".$message->created.",".$message->updated."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Networks();
        if(isset($_POST['Networks']))
        {
            $start = $_POST['Networks']['fromdate'];
            $end   = $_POST['Networks']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

}
