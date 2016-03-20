<?php

namespace Stcms\Controllers;

use Phalcon\Mvc\View;

class ErrorsController extends \Phalcon\Mvc\Controller {

    public function initialize(){
        $this->view->setViewsDir('../app/views');
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        $this->response->setStatusCode(404,'Not_Found');
    }
    
    public function show404Action(){
        
    }

}
