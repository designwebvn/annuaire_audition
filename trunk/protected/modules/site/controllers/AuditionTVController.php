<?php

class AuditionTVController extends SiteBaseController {
	
	const PAGE_SIZE = 20;
	
	/**
	 * Controller constructor
	 */
    public function init()
    {
        parent::init();

		// Add page breadcrumb and title
		$this->pageTitle[] = Yii::t('blog', 'Audition TV');
		$this->breadcrumbs[ Yii::t('blog', 'Audition TV') ] = array('auditionTV/index');
    }

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
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
        $videoTop   = Videos::model()->find( 'is_home ='.Videos::STATUS_PUBLIC.' ORDER BY id DESC');
        $videos     = new CActiveDataProvider('Videos',array(
            'criteria'=>array(
                'condition'=>'is_home='.Videos::STATUS_ACTIVE.' AND id !='.$videoTop->id,
                'order'=>'id DESC',
            ),
            'pagination'=>array('pageSize'=>self::PAGE_SIZE),
        ) );
        $type = 10;
        $this->render('index', compact('videos','type','videoTop'));
    }

    public function actionVideosPro() {
        $videoTop   = Videos::model()->find( 'is_home ='.Videos::STATUS_PUBLIC.' AND type !='.Videos::STATUS_PUBLIC.' ORDER BY id DESC');
        $videos = new CActiveDataProvider('Videos',array(
            'criteria'=>array(
                'condition'=>'is_home='.Videos::STATUS_ACTIVE.' AND type !='.Videos::STATUS_PUBLIC.' AND id !='.$videoTop->id,
                'order'=>'id DESC',
            ),
            'pagination'=>array('pageSize'=>self::PAGE_SIZE),
        ) );
        $type = 0;
        $this->render('index', compact('videos','type','videoTop'));
    }

    public function actionGrandPublic() {
        $videoTop   = Videos::model()->find( 'is_home ='.Videos::STATUS_PUBLIC.' AND type ='.Videos::STATUS_PUBLIC.' ORDER BY id DESC');
        $videos = new CActiveDataProvider('Videos',array(
            'criteria'=>array(
                'condition'=>'is_home='.Videos::STATUS_ACTIVE.' AND type ='.Videos::STATUS_PUBLIC.' AND id !='.$videoTop->id,
                'order'=>'id DESC',
            ),
            'pagination'=>array('pageSize'=>self::PAGE_SIZE),
        ) );
        $type = Videos::STATUS_PUBLIC;
        $this->render('index', compact('videos','type','videoTop'));
    }

    public function actionDetail(){
        $model   = Videos::model()->findByAttributes(array('alias' => $_GET['alias']));
        if( !$model )
            $this->redirect('/');
        $this->pageTitle[] = $model->title;
        $comment = $this->newComment($model);
        $this->render('detail', compact('model','comment'));
    }

    protected function newComment($post)
    {
        $comment=new VideoComments();
        $comment->scenario = 'captchaRequired';
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if(isset($_POST['VideoComments']))
        {
            $comment->attributes=$_POST['VideoComments'];
            if($comment->save())
            {
                Yii::app()->user->setFlash('success','Thank you for your comment. Your comment will be posted once it is approved.');
                $this->refresh();
            }
        }
        return $comment;
    }

}