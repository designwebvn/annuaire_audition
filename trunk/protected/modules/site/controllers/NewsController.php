<?php
/**
 * Blog controller Home page
 */
class NewsController extends SiteBaseController {
	
	const PAGE_SIZE = 5;
	
	/**
	 * Controller constructor
	 */
	public function init()
	{
		parent::init();

		// Add page  title
		$this->pageTitle[] = Yii::t('News', ' News');
	}

	/**
	 * Index action
	 */
	public function actionIndex() {
		
		
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
	
	public function actionviewcategory(){
		if( isset($_GET['alias']) )
		{
			$cat = NewsCategorys::model()->getCatNewsByAlias($_GET['alias']);
			$catid = $cat->id;

			$criteria=new CDbCriteria;
			$criteria->together = true;
			$criteria->with = array('category');
			$criteria->condition = "is_active=1 AND t.category_id=".$catid."";
			$criteria->order = 't.id DESC';
			$posts = new CActiveDataProvider('News' ,
						array(
								'criteria'=>$criteria ,
								'pagination'=>array('pageSize'=>self::PAGE_SIZE),
							)
					);
			$this->render('view_cat_news', array( 'posts' => $posts ));
		}
		else
		{
			throw new CHttpException(404, Yii::t('error', 'Sorry, We could not find that category.'));
		}
		
	}

	function actionviewpost(){
		if( isset($_GET['alias']) )
		{
			$post = News::model()->findByAttributes(array('alias' => $_GET['alias']));

			//add comment
			$comment=$this->newComment($post);
			$this->render('view_news', array( 'model' => $post , 'comment'=>$comment));
		}
		else
		{
			throw new CHttpException(404, Yii::t('error', 'Sorry, We could not find that post.'));
		}

	}

	protected function newComment($post)
	{
		//$comment=new NewsComments::model()->findAllByAttributes(array('is_active' => NewsComments::STATUS_APPROVED));
		$comment=new NewsComments;
        $comment->scenario = 'captchaRequired';

		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['NewsComments']))
		{
			$comment->attributes=$_POST['NewsComments'];
			if($post->addNewsComments($comment))
			{
				if($comment->is_active==NewsComments::STATUS_PENDING)
					Yii::app()->user->setFlash('commentNewsSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}

}