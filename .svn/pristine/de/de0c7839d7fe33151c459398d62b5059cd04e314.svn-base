<?php

class ProductsController extends SiteBaseController
{
		const PAGE_SIZE = 5;
	
	/**
	 * Controller constructor
	 */
	public function init()
	{
		parent::init();

		// Add page  title
		$this->pageTitle[] = Yii::t('Products', ' Products');
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
        $criteria            = new CDbCriteria();
        $criteria->condition = "t.is_home = ".Products::STATUS_ACTIVE;
        $criteria->order     = "t.id DESC";
        $products = new CActiveDataProvider('Products' ,
            array(
                'criteria'=>$criteria ,
                'pagination'=>array('pageSize'=>self::PAGE_SIZE),
            )
        );
        $this->render('view_all_products', compact('products') );
		
	}
	
	public function actionviewcategory(){    
		if( isset($_GET['alias']) ){
			$cat = Categories::model()->getCatByAlias($_GET['alias']);
			$catid = $cat->id;

			$criteria=new CDbCriteria;
			$criteria->together = true;
			$criteria->with = array('productCategories.category');
			$criteria->condition = "productCategories.category_id=".$catid."";
			$criteria->order = 't.id DESC';

			$posts = new CActiveDataProvider('Products' ,
						array(
								'criteria'=>$criteria ,
								'pagination'=>array('pageSize'=>self::PAGE_SIZE),
							)
					);
			$this->render('view_cat_products', array( 'posts' => $posts ,'cat'=>$cat));
		}
		else
		{
			throw new CHttpException(404, Yii::t('error', 'Sorry, We could not find that category.'));
		}
	}

	function actionDetail(){
        $model   = Products::model()->findByAttributes(array('alias' => $_GET['alias']));
        if( !$model )
            $this->redirect('/');
        $this->pageTitle[] = $model->name;
        $comment = $this->newComment($model);
        $other_products  = Products::model()->getProductOthersFE( $model->id );

        $this->render('detail', compact('model', 'comment', 'other_products'));
	}

    protected function newComment($post)
    {
        $comment=new ProductComments();
        $comment->scenario = 'captchaRequired';
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if(isset($_POST['ProductComments']))
        {
            $comment->attributes=$_POST['ProductComments'];
            if($comment->save())
            {
                Yii::app()->user->setFlash('success','Thank you for your comment. Your comment will be posted once it is approved.');
                $this->refresh();
            }
        }
        return $comment;
    }

}