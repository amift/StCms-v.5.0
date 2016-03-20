<?php

namespace Stcms\Controllers\Admin;

use Phalcon\Mvc\View;
use Stcms\Models\Imagesnews;
use Stcms\Models\Imagespages;
use Stcms\Models\Imagesusers;
use Stcms\Models\Imagescatalog;
use Stcms\Models\Imagesproducts;
use Stcms\Models\imagesarticles;
use Stcms\Helpers\UploadHelper;

class UploadController extends ControllerBase {

    public $upload;
    
    public function initialize(){
        parent::initialize();
        $this->upload = new UploadHelper();
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
    
    public function pagesAction(){
        if($paths = $this->upload->checkFile('imagespages')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagespages();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/page/images',['images'=>Imagespages::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function usersAction(){
        if($paths = $this->upload->checkFile('imagesusers')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagesusers();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/users/images',['images'=>Imagesusers::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function catalogAction(){
        if($paths = $this->upload->checkFile('imagescatalog')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagescatalog();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/catalog/images',['images'=>Imagescatalog::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function productsAction(){
        if($paths = $this->upload->checkFile('imagesproducts')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagesproducts();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/products/images',['images'=>Imagesproducts::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function newsAction(){
        if($paths = $this->upload->checkFile('imagesnews')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagesnews();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/news/images',['images'=>Imagesnews::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function articlesAction(){
        if($paths = $this->upload->checkFile('imagesarticles')){
            $this->upload->saveMini($paths);
            foreach($paths as $path){
                $img = new Imagesarticles();
                $img->ident = $this->request->getPost('id');
                $img->image = $path;
                $img->title = '';
                $img->status = 1;
                $img->position = 0;
                $img->save();
                unset($img);
            }
            $this->view->partial('tpl/articles/images',['images'=>Imagesarticles::find("ident = '".$this->request->getPost('id')."'")]);
        } else { $this->response->redirect('/admin'); }
    }
    
    public function indexAction(){}
    
}