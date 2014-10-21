<?php

/**
 * Shop controller Home page
 */
class SupportController extends SiteBaseController {

    const PAGE_SIZE = 16;

    public $membershop;
    public $categoryshop;
    public $productshop;
    public $productcategoryshop;
    public $Allsupport;
    /**
     * Controller constructor
     */
    public function init() {
        parent::init();
    }

    /**
     * List of available actions
     */
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'minLength' => 3,
                'maxLength' => 7,
                'testLimit' => 3,
                'padding' => array_rand(range(2, 10)),
            ),
        );
    }

    /**
     * Index action
     */
    public function actionindex() {
        $this->render('index');
    }
    
    public function actionDetail( $id ){
        $support  = Support::model()->findByPk( $id );
         if (!$support->id)
            $this->redirect('/');
        $this->pageTitle[]  = $support->title.' '.Yii::t('global','Support Page');
        
        $this->render('detail', compact('support'));
    }
    
    }
    ?>