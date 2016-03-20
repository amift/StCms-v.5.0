<?php

namespace Stcms\Controllers\Admin;

use Stcms\Models\Pages;
use Stcms\Helpers\LogicHelper;

class PagesController extends ControllerBase {
    
    public function indexAction() {
        $tree = LogicHelper::recursionMenu(Pages::find(),'getpage');
        $this->view->setVar('pages',Pages::find());
        $this->view->setVar('tree', $tree);
    }
    
}