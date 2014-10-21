<?php

class AnnouncementsController extends SiteBaseController {
	
	const PAGE_SIZE = 10;
	
	/**
	 * Controller constructor
	 */
    public function init()
    {
        parent::init();
		$this->pageTitle[] = Yii::t('blog', 'Announcements');
		$this->breadcrumbs[ Yii::t('blog', 'Announcements') ] = array('announcements/index');
    }

    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }

	/**
	 * Index action
	 */
    public function actionIndex() {
        $categorys  = AnnouncementCategorys::model()->findAll('');
        $this->render('index', compact('categorys'));
    }

    public function actionDetail($id){
        $category           = AnnouncementCategorys::model()->findByPk( $id );
        $top_announcements  = Announcements::model()->findAll( 'is_highlight = '.Announcements::STATUS_YES.' AND category_id ='.$id.' ORDER BY t.id DESC LIMIT 1' );
        $top_id             = ($top_announcements[0]['id'])?$top_announcements[0]['id']:0;
        $announcements = new CActiveDataProvider('Announcements', array(
                            'criteria'=>array(
                            'condition'=>'category_id = '.$id.' AND t.id !='.$top_id,
                            'order'=>'t.id DESC',
                            ),
                            'pagination'=>array('pageSize'=>self::PAGE_SIZE),
        ));

        $this->render('category', compact('category', 'announcements', 'top_announcements') );
    }

    public function actionRegister(){
        $model = new Announcements();
        if(isset($_POST['Announcements']))
        {
            $model->attributes      = $_POST['Announcements'];
            if( $model->save() ){
               Yii::app()->user->setFlash('success',"Votre dépôt d'annonce a bien été pris en compte et elle sera visible sur notre site dès acceptation d'un de nos administrateurs.");
                $this->refresh();
            }
        }
        $this->render('_form',compact('model'));
    }

}