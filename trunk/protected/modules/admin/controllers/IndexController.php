<?php
/**
 * Index controller Home page
 */
class IndexController extends AdminBaseController {
	/**
	 * init
	 */
	public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('adminglobal', 'Dashboard') ] = array('index/index');
		$this->pageTitle[] = Yii::t('adminglobal', 'Dashboard'); 
	}
	/**
	 * Index action
	 */
    public function actionIndex() {
        
        $model = new Members('Search');
        $model->unsetAttributes();
        if(isset($_GET['Members'])){
            $model->id         = $_GET['Members']['id'];
            $model->joined     = $_GET['Members']['joined'];
            $model->attributes = $_GET['Members'];
        }
        $this->render('index', compact('model'));
    }
}