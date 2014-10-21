<?php
/**
 * Index controller Home page
 */
class IndexController extends SiteBaseController {
	
	const PAGE_SIZE         = 6;
    const PAGE_SIZE_NEW     = 12;
    const ARTICLES          = 1;
    const PRODUCTS          = 2;
    const HEARINGTV         = 3;

	/**
	 * Controller constructor
	 */
    public function init()
    {
        parent::init();
    }
	
	/**
	 * List of available actions
	 */
	public function actions()
	{
	   return array(
	      'captcha' => array(
	         'class' => 'CCaptchaAction',
	         'backColor' => 0xFFFFFF,
		     'minLength' => 3,
		     'maxLength' => 7,
			 'testLimit' => 3,
			 'padding' => array_rand( range( 2, 10 ) ),
	      ),
	   );
	}
	
	/**
	 * Index action
	 */
    public function actionindex() {
		$this->pageTitle[] = Yii::t('global', 'Home');
        $products = new CActiveDataProvider('Products',array(
            'pagination'=>false,
            'criteria'=>array(
                'limit' => self::PAGE_SIZE_NEW,
                'order' => 'id DESC ',
                'condition'=> "is_active = 1"
            )
        ));
		$this->render('index', compact('products'));
    }
    
    function actionCheckTimeout(){
        echo Yii::app()->session['lastest_visit'];
    }

    public function actionGuestbook(){
        $this->pageTitle[] =  Yii::t('global','GuestBook - Annuaire Audition');
        $this->layout ='guestbook';
        $this->render('guestbook');
    }

    public function actionSearch(){
        $search = $_POST['q'];
        if(!empty($search)){
            $news = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => "title LIKE '%".$search."%' OR description LIKE '%".$search."%'"
                )
            ));
            $news->pagination->pageSize= self::PAGE_SIZE_NEW;

            $this->render('search',compact('news', 'search'));
        }else {
            $this->redirect('/');
        }
    }

    public function actionSearchAdvanced(){
        $keyword    = $_POST['q'];
        $category   = $_POST['category'];
        if( $category == self::HEARINGTV ){
            $data = new CActiveDataProvider('Videos', array(
                'criteria' => array(
                    'condition' => "title LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'"
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE_NEW,
                )
            ));
        }
        else if( $category == self::PRODUCTS ){
            $data = new CActiveDataProvider('Products', array(
                'criteria' => array(
                    'condition' => "name LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'"
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE_NEW,
                )
            ));
        }
        else{
            $data = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => "title LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'"
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE_NEW,
                )
            ));
        }

        $this->render('search_advanced', compact('keyword','category','data'));
    }
    
    public function actionBestSeller(){
        $best_seller_data = new CActiveDataProvider('Products', array(
            'criteria' => array(
                'condition' => "best_seller =".Products::STATUS_BEST_SELLER_ACTIVE." AND is_active =".Products::STATUS_ACTIVE
            )
        ));
        $best_seller_data->pagination->pageSize = self::PAGE_SIZE_NEW;
        $this->render( 'best_seller', compact('best_seller_data') );
    }
    
    public function actionSupports(){
        $this->pageTitle[] = Yii::t('global', 'Support Page');
        $dataSupports = new CActiveDataProvider('Support' ,array(
            'criteria'=>array(
                'limit' => self::PAGE_SIZE,
                'order' => 'id DESC '
            )
        ));
        $dataSupports->pagination->pageSize= self::PAGE_SIZE_NEW;
        $this->render( 'supports', compact( 'dataSupports' ) );
    }
    
    public function actionFags(){
        $this->pageTitle[] = Yii::t('global', 'Fags Page');
        $this->render('fags',array( ));
    }
    
    public function actionSearchAlpha(){
        $search =  $_GET['q'];
        if(!empty($search)){
            $products = new CActiveDataProvider('Products', array(
                'criteria' => array(
                    'condition' => "NAME '".$search."%'"
                )
            ));
            $products->pagination->pageSize= self::PAGE_SIZE_NEW;
            $this->render('search',compact('products'));
        } else {
            $this->redirect('/');
        }
    }

    public function actionNewsletter(){
        $model = new Newsletter();
        if(isset($_POST['Newsletter'])){
            $model->attributes = $_POST['Newsletter'];
            if($model->save()){
                Yii::app()->user->setFlash('success', Yii::t('newsletter', 'Saved newsletter.'));
            $this->redirect('/index');
            }
        }
        $this->render('index',array(
            'model'=>$model,
        ));

    }

}