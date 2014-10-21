<?php

class PressController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Presses') ] = array('press/index');
		$this->pageTitle[] = Yii::t('global', 'Presses');
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
		$model=new Press;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Press']))
		{
			$model->attributes=$_POST['Press'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $fileName = '';
            }
            if( !isset( $_POST['newspapersTitles'] ) ){
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Add Newspapers Title'));
                $this->redirect(array('press/create'));
            }
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::PRESS;
                    $model1->save();
                }
                if(isset($_POST['newspapersTitles'])){
                    NewspapersTitles::model()->saveNewspapers($_POST['newspapersTitles'],$model->id);
                }
                PressNews::model()->deleteAll("press_id = :press_id", array(':press_id' => $model->id ) );
                $otherLink = isset($_POST['PressNews']);
                if( $otherLink ){
                    $links = $_POST['PressNews'];
                    foreach ($links as $link_id){
                        $link                   = new PressNews();
                        $link->press_id         = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/press/'.$fileName);
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

		if(isset($_POST['Press']))
		{
			$model->attributes=$_POST['Press'];
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
            if( !isset( $_POST['newspapersTitles'] ) ){
                Yii::app()->user->setFlash('error', Yii::t('adminmembers', 'Add Newspapers Title'));
                $this->redirect(array('update','id'=>$model->id));
            }
			if($model->save()){
                if( isset($_POST['ContactBox']) ){
                    $model1 = new ContactBox();
                    $model1->attributes = $_POST['ContactBox'];
                    $model1->user_id    = Yii::app()->user->id;
                    $model1->common_id  = $model->id;
                    $model1->type       = Suppliers::PRESS;
                    $model1->save();
                }
                NewspapersTitles::model()->updateNewspaperTitles(isset($_POST['newspapersTitles'])?$_POST['newspapersTitles']:0,$model->id);
                PressNews::model()->deleteAll("press_id = :press_id", array(':press_id' => $model->id ) );
                $otherLink = isset($_POST['PressNews']);
                if( $otherLink ){
                    $links = $_POST['PressNews'];
                    foreach ($links as $link_id){
                        $link                   = new PressNews();
                        $link->press_id         = $model->id;
                        $link->news_id          = $link_id;
                        $link->save();
                    }
                }
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/press/'.$model->image);
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
		$model=new Press('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Press']))
			$model->attributes=$_GET['Press'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Press');
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
		$model=Press::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='press-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function ExportCsv( $start, $end ){
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=press.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF";
        $sourceMessage = Press::model()->findAll('t.created >= "'.date('Y-m-d ', strtotime($start)).'" AND t.created <= "'.date('Y-m-d ', strtotime($end)).'"');
        echo "id, name, corporate_name, newspaper_title, advertisers, image, address, additional_address, city, zip, po_box, email, website, created, updated \n";
        foreach($sourceMessage as $message){
            echo $message->id.",".$message->name.",".$message->corporate_name.",".$message->newspaper_title.",".$message->advertisers.",".$message->image.",".$message->address.",".$message->additional_address.",".$message->city.",".$message->zip.",".$message->po_box.",".$message->email.",".$message->website.",".$message->created.",".$message->updated."\n";
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
