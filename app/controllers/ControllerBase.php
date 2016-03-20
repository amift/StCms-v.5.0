<?php

namespace Stcms\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller {
    
    public $Url;
    public $Seo;
    public $News;
    public $Users;
    public $Content;
    public $Catalog;
    public $Product;
    public $Articles;
    
    public function initialize(){
        $this->Seo      = new \Stcms\Libraries\Seo();
        $this->Url      = new \Stcms\Libraries\Url();
        
        // -------------- Load content libs ------------------
        $this->News     = new \Stcms\Libraries\NewsLib();
        $this->Content  = new \Stcms\Libraries\ContentLib();
        $this->Catalog  = new \Stcms\Libraries\CatalogLib();
        $this->Product  = new \Stcms\Libraries\ProductLib();
        $this->Articles = new \Stcms\Libraries\ArticlesLib();
        $this->Users    = new \Stcms\Libraries\UsersLib();
        
        $this->view->setVar('Url',$this->Url);
        $this->view->setVar('Seo',$this->Seo);
        $this->view->setVar('Content',$this->Content);
        $this->view->setVar('Articles',$this->Articles);
        $this->view->setVar('News',$this->News);
        $this->view->setVar('Catalog',$this->Catalog);
        $this->view->setVar('Product',$this->Product);
        $this->view->setVar('Users',$this->Users);
        
        // -------------- Set views settings -----------------
        $this->view->setViewsDir('../app/views/front/');
        $this->view->setPartialsDir('tpl/');
    }
    
}
