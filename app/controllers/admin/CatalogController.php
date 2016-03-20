<?php

namespace Stcms\Controllers\Admin;

use Stcms\Models\Catalog;
use Stcms\Helpers\LogicHelper;

class CatalogController extends ControllerBase {

    public function indexAction() {
        $tree = LogicHelper::recursionMenu(Catalog::find(),'getcatalog');
        $this->view->setVar('tree', $tree);
    }
    
}