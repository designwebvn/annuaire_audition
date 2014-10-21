<?php

class EventsController extends SiteBaseController {

    const PAGE_SIZE = 16;

    public function init() {
        parent::init();
    }

    public function actionDetail( $id ){
       $event = Events::model()->findByPk( intval( $id ) );
       if( !$event )
           $this->redirect('/');
       $this->render('detail', compact('event') );
    }

    public function actionIndex(){
        $events = Events::model()->findAll();
        $this->render('index', compact('events'));
    }

}
?>