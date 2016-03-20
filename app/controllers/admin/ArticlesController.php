<?php

namespace Stcms\Controllers\Admin;

use Stcms\Models\Articles;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class ArticlesController extends ControllerBase {

    public function indexAction() {
        $paginator = new PaginatorModel([
            'data'  => Articles::find(),
            'limit' => 15,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        $articles = $paginator->getPaginate();
        $this->view->setVar('articles',$articles);
    }
    
}