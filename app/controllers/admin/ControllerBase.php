<?php

namespace Stcms\Controllers\Admin;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller {

    public function initialize(){
        if (!$this->session->has('logged_in') && $this->session->get('logged_in') !== true) {
            $this->response->redirect('/login');
        }
        $this->view->setViewsDir($this->view->getViewsDir().'admin/');
    }

}
