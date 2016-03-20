<?php

namespace Stcms\Controllers\Admin;

class IndexController extends ControllerBase {
    
    public function initialize(){
        $this->response->redirect('/admin/pages');
    }
    
    public function indexAction(){
        $this->response->redirect('/admin/pages');
    }
    
}
