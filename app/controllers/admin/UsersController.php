<?php

namespace Stcms\Controllers\Admin;

use Stcms\Models\Users;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class UsersController extends ControllerBase {

    public function indexAction() {
        $paginator = new PaginatorModel([
            'data'  => Users::find(),
            'limit' => 15,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        $users = $paginator->getPaginate();
        $this->view->setVar('users',$users);
    }
    
}