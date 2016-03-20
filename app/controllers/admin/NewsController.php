<?php

namespace Stcms\Controllers\Admin;

use Stcms\Models\News;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class NewsController extends ControllerBase {

    public function indexAction() {
        $paginator = new PaginatorModel([
            'data'  => News::find(),
            'limit' => 15,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        $news = $paginator->getPaginate();
        $this->view->setVar('news',$news);
    }
    
}