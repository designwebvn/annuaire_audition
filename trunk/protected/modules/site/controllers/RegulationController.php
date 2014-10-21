<?php

class RegulationController extends SiteBaseController {

    const PAGE_SIZE = 16;

    public function init() {
        parent::init();
    }

    public function actionEspacePro(  ){
        $this->render('espace_pro');
    }

    public function actionIndex(){
        $this->render('index');
    }

}
?>