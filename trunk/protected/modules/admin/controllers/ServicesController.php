<?php

class ServicesController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Services') ] = array('services/index');
		$this->pageTitle[] = Yii::t('global', 'Services');
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
		$model=new Services;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
            $model->attributes=$_POST['Services'];
            //$model->ranking   = isset($_POST['my_rating_service'])?$_POST['my_rating_service']:5;
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SERVICES;
                    $model1->save();
                }
                $otherLink = isset($_POST['ServiceNews']);
                if( $otherLink ){
                    $links = $_POST['ServiceNews'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceNews();
                        $link->service_id       = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }

                $otherSA = isset($_POST['ServiceArticles']);
                if( $otherSA ){
                    $links = $_POST['ServiceArticles'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceArticles();
                        $link->service_id       = $model->id;
                        $link->product_id       = $link_id;
                        $link->save();
                    }
                }

                $otherSHTv = isset($_POST['ServiceHearingTv']);
                if( $otherSHTv ){
                    $links = $_POST['ServiceHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceHearingTv();
                        $link->service_id       = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }

                $otherSE = isset($_POST['ServiceEvents']);
                if( $otherSE ){
                    $links = $_POST['ServiceEvents'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceEvents();
                        $link->service_id       = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }

                $otherSC = isset($_POST['ServiceCenters']);
                if( $otherSC ){
                    $links = $_POST['ServiceCenters'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceCenters();
                        $link->service_id       = $model->id;
                        $link->center_id         = $link_id;
                        $link->save();
                    }
                }

                $otherSST = isset($_POST['ServiceSpeechTherapists']);
                if( $otherSST ){
                    $links = $_POST['ServiceSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                       = new ServiceSpeechTherapists();
                        $link->service_id           = $model->id;
                        $link->speech_therapists_id = $link_id;
                        $link->save();
                    }
                }

                $otherSAg = isset($_POST['ServiceAgencies']);
                if( $otherSAg ){
                    $links = $_POST['ServiceAgencies'];
                    foreach ($links as $link_id){
                        $link                       = new ServiceAgencies();
                        $link->service_id           = $model->id;
                        $link->agencies_id          = $link_id;
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

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
            //$model->ranking   = isset($_POST['my_rating_service'])?$_POST['my_rating_service']:5;
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::SERVICES;
                    $model1->save();
                }
                ServiceNews::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherLink = isset($_POST['ServiceNews']);
                if( $otherLink ){
                    $links = $_POST['ServiceNews'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceNews();
                        $link->service_id       = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }
                ServiceArticles::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSA = isset($_POST['ServiceArticles']);
                if( $otherSA ){
                    $links = $_POST['ServiceArticles'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceArticles();
                        $link->service_id       = $model->id;
                        $link->product_id       = $link_id;
                        $link->save();
                    }
                }
                ServiceHearingTv::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSHTv = isset($_POST['ServiceHearingTv']);
                if( $otherSHTv ){
                    $links = $_POST['ServiceHearingTv'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceHearingTv();
                        $link->service_id       = $model->id;
                        $link->video_id         = $link_id;
                        $link->save();
                    }
                }
                ServiceEvents::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSE = isset($_POST['ServiceEvents']);
                if( $otherSE ){
                    $links = $_POST['ServiceEvents'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceEvents();
                        $link->service_id       = $model->id;
                        $link->event_id         = $link_id;
                        $link->save();
                    }
                }
                ServiceCenters::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSC = isset($_POST['ServiceCenters']);
                if( $otherSC ){
                    $links = $_POST['ServiceCenters'];
                    foreach ($links as $link_id){
                        $link                   = new ServiceCenters();
                        $link->service_id       = $model->id;
                        $link->center_id         = $link_id;
                        $link->save();
                    }
                }
                ServiceSpeechTherapists::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSST = isset($_POST['ServiceSpeechTherapists']);
                if( $otherSST ){
                    $links = $_POST['ServiceSpeechTherapists'];
                    foreach ($links as $link_id){
                        $link                       = new ServiceSpeechTherapists();
                        $link->service_id           = $model->id;
                        $link->speech_therapists_id = $link_id;
                        $link->save();
                    }
                }
                ServiceAgencies::model()->deleteAll("service_id = :service_id", array(':service_id' => $model->id ) );
                $otherSAg = isset($_POST['ServiceAgencies']);
                if( $otherSAg ){
                    $links = $_POST['ServiceAgencies'];
                    foreach ($links as $link_id){
                        $link                       = new ServiceAgencies();
                        $link->service_id           = $model->id;
                        $link->agencies_id          = $link_id;
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
		$model=new Services('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Services');
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
		$model=Services::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='services-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end){

        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=services.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Services::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, name, cochlear_implant, title_1, email_1, title_2, email_2, title_3, email_3, ranking, created, updated, department \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->name.",".$message->cochlear_implant.",".$message->title_1.",".$message->email_1.",".$message->title_2.",".$message->email_2.",".$message->title_3.",".$message->email_3.",".$message->ranking.",".$message->created.",".$message->updated.",".$message->department."\n";
        }
        exit;
    }

    public function actionExport(){
        $model=new Services();
        if(isset($_POST['Services']))
        {
            $start = $_POST['Services']['fromdate'];
            $end   = $_POST['Services']['todate'];
            $this->ExportCsv( $start, $end);
        }
        $this->render('export',array(
            'model'=>$model,
        ));
    }

    public function actionSetUp(){
        $id = $_GET['id'];
        $upRank = Services::model()->findByPk($id);
        $downRank = Services::model()->findByAttributes(array('ranking'=>$upRank->ranking -1));
        if($upRank->ranking !=1){
            $downRank->ranking = $upRank->ranking;
            $upRank->ranking = $upRank->ranking - 1;
            $upRank->save();
            $downRank->save();
        }
    }

    public function actionSetDown(){
        $id = $_GET['id'];
        $downRank = Services::model()->findByPk($id);
        $allRankBanner = count(Services::model()->findAll(''));
        if($downRank->ranking < $allRankBanner) {
            $upRank = Services::model()->findByAttributes(array('ranking'=>$downRank->ranking +1));
            $upRank->ranking   =  $downRank->ranking;
            $downRank->ranking =  $downRank->ranking + 1;
            $downRank->save();
            $upRank->save();
        }
    }

}
