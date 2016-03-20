<?php

namespace Stcms\Controllers\Admin;

use Phalcon\Mvc\View;
use Phalcon\Http\Request;
use Stcms\Models\Pages;
use Stcms\Models\Users;
use Stcms\Models\News;
use Stcms\Models\Catalog;
use Stcms\Models\Products;
use Stcms\Models\Articles;
use Stcms\Models\Pagetypes;
use Stcms\Models\Imagesnews;
use Stcms\Models\Imagespages;
use Stcms\Models\Imagesusers;
use Stcms\Models\Imagesarticles;
use Stcms\Models\Imagescatalog;
use Stcms\Models\Imagesproducts;
use Stcms\Forms\PageForm;
use Stcms\Forms\TypeForm;
use Stcms\Forms\UserForm;
use Stcms\Forms\CatForm;
use Stcms\Forms\NewsForm;
use Stcms\Forms\ArticleForm;
use Stcms\Forms\ProductForm;
use Stcms\Helpers\LogicHelper;
use Stcms\Helpers\UploadHelper;
use Phalcon\Mvc\Model\Manager as ModelsManager;

class AjaxController extends ControllerBase {

    public $response = [
        'status'  => true,
        'errors'  => [],
        'results' => [],
    ];
    
    public function initialize(){
        parent::initialize();
        if(!$this->request->isAjax()){
            $this->response->redirect('/admin');
        }
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
    
    public function savepageAction() {
        $post = $this->request->getPost();
        $form = new PageForm();
        if ($this->request->hasPost('id')) {
            $page = Pages::findFirst($post['id']);
            $post['updated'] = time();
        } else {
            $page = new Pages();
            $post['created'] = time();
            $post['updated'] = time();
        }
        if(!$post['slug']){ $post['slug'] = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALPHA,11)); } 
        $post['is_published'] = (isset($post['is_published'])) ? 1 : 0;
        $post['is_menu'] = (isset($post['is_menu'])) ? 1 : 0;
        $form->bind($post, $page);
        if (!$page->save($post)) { $this->checkErrorMessages($page); }
        else { $this->response['results'][] = 'success'; }
    }

    public function savecatalogAction() {
        $post = $this->request->getPost();
        $form = new CatForm();
        if ($this->request->hasPost('id')) {
            $cat = Catalog::findFirst($post['id']);
            $post['updated'] = time();
        } else {
            $cat = new Catalog();
            $post['created'] = time();
            $post['updated'] = time();
        }
        if(!$post['slug']){ $post['slug'] = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALPHA,11)); } 
        $post['is_published'] = (isset($post['is_published'])) ? 1 : 0;
        $form->bind($post, $cat);
        if (!$cat->save($post)) { $this->checkErrorMessages($cat); }
        else { $this->response['results'][] = 'success'; }
    }
    
    public function saveproductAction() {
        $post = $this->request->getPost();
        $form = new ProductForm();
        if ($this->request->hasPost('id')) {
            $prod = Products::findFirst($post['id']);
            $post['updated'] = time();
        } else {
            $prod = new Products();
            $post['created'] = time();
            $post['updated'] = time();
        }
        if(!$post['slug']){ $post['slug'] = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALPHA,11)); } 
        $post['is_published'] = (isset($post['is_published'])) ? 1 : 0;
        $form->bind($post, $prod);
        if (!$prod->save($post)) { $this->checkErrorMessages($prod); }
        else { 
            $this->response['results'][] = 'success';
            $this->response['redirect'] = 'admin.transport("getproducts",{id: '.$prod->cat_id.' },admin.setContent)';
        }
    }

    public function savenewsAction(){
        $post = $this->request->getPost();
        $form = new NewsForm();
        if ($this->request->hasPost('id')) {
            $news = News::findFirst($post['id']);
            $post['updated'] = time();
        } else {
            $news = new News();
            $post['created'] = time();
            $post['updated'] = time();
        }
        if(!$post['slug']){ $post['slug'] = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALPHA,11)); } 
        $post['is_published'] = (isset($post['is_published'])) ? 1 : 0;
        $form->bind($post, $news);
        if (!$news->save($post)) { $this->checkErrorMessages($news); }
        else { 
            $this->response['results'][] = 'success';
        }
    }
    
    public function savearticlesAction(){
        $post = $this->request->getPost();
        $form = new ArticleForm();
        if ($this->request->hasPost('id')) {
            $articles = Articles::findFirst($post['id']);
            $post['updated'] = time();
        } else {
            $articles = new Articles();
            $post['created'] = time();
            $post['updated'] = time();
        }
        if(!$post['slug']){ $post['slug'] = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALPHA,11)); } 
        $post['is_published'] = (isset($post['is_published'])) ? 1 : 0;
        $form->bind($post, $articles);
        if (!$articles->save($post)) { $this->checkErrorMessages($articles); }
        else { 
            $this->response['results'][] = 'success';
        }
    }
    
    public function savetypeAction(){
        $post = $this->request->getPost();
        $form = new TypeForm();
        if ($this->request->hasPost('id')) { $type = Pagetypes::findFirst($post['id']); }
        else { $type = new Pagetypes(); }
        $post['status'] = (isset($post['status'])) ? 1 : 0;
        $form->bind($post,$type);
        if (!$type->save($post)) { $this->checkErrorMessages($type); }
        else { $this->response['results'][] = 'success'; }
    }
    
    public function saveuserAction(){
        $post = $this->request->getPost();
        $form = new UserForm();
        if ($this->request->hasPost('id')) { $user = Users::findFirst($post['id']); }
        else { $user = new Users(); }
        $post['status'] = (isset($post['status'])) ? 1 : 0;
        $form->bind($post,$user);
        if (!$user->save($post)) { $this->checkErrorMessages($user); }
        else { $this->response['results'][] = 'success'; }
    }
    
    public function getproductsAction(){
        $catId = $this->request->getPost('id');
        $products = Products::find('cat_id = "'.$catId.'"');
        $this->response['results'][] = $this->view->getPartial('tpl/products/list',['products'=>$products,'id'=>$catId]);
    }
    
    public function getproductAction(){
        $id = $this->request->getPost('id');
        $product = new ProductForm(Products::findFirst($id));
        $images = $this->view->getPartial('tpl/products/images',['images'=>Imagesproducts::find("ident = '".$id."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/products/edit',['product'=>$product,'images'=>$images,'id'=>$id]);
    }
    
    public function addproductAction(){
        $catId = $this->request->getPost('cat_id');
        $this->response['results'][] = $this->view->getPartial('tpl/products/add',['product'=>new ProductForm,'id'=>$catId]);
    }
    
    public function getpageAction() {
        $page   = new PageForm(Pages::findFirst($this->request->getPost('id')));
        $images = $this->view->getPartial('tpl/page/images',['images'=>Imagespages::find("ident = '".$this->request->getPost('id')."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/page/edit',['page'=>$page,'id'=>$this->request->getPost('id'),'images'=>$images]);
    }
    
    public function getcatalogAction() {
        $cat   = new CatForm(Catalog::findFirst($this->request->getPost('id')));
        $images = $this->view->getPartial('tpl/catalog/images',['images'=>Imagescatalog::find("ident = '".$this->request->getPost('id')."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/catalog/edit',['cat'=>$cat,'id'=>$this->request->getPost('id'),'images'=>$images]);
    }
    
    public function getuserAction() {
        $user   = new UserForm(Users::findFirst($this->request->getPost('id')));
        $images = $this->view->getPartial('tpl/users/images',['images'=>Imagesusers::find("ident = '".$this->request->getPost('id')."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/users/edit',['user'=>$user,'id'=>$this->request->getPost('id'),'images'=>$images]);
    }
    
    public function getnewsAction(){
        $news = new NewsForm(News::findFirst($this->request->getPost('id')));
        $images = $this->view->getPartial('tpl/news/images',['images'=>Imagesnews::find("ident = '".$this->request->getPost('id')."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/news/edit',['news'=>$news,'id'=>$this->request->getPost('id'),'images'=>$images]);
    }
    
    public function getarticlesAction(){
        $articles = new NewsForm(Articles::findFirst($this->request->getPost('id')));
        $images = $this->view->getPartial('tpl/articles/images',['images'=>Imagesarticles::find("ident = '".$this->request->getPost('id')."'")]);
        $this->response['results'][] = $this->view->getPartial('tpl/articles/edit',['articles'=>$articles,'id'=>$this->request->getPost('id'),'images'=>$images]);
    }
    
    public function typeslistAction() {
        $this->response['results'][] = $this->view->getPartial('tpl/page/types',['list'=>Pagetypes::find()]);
    }
    
    public function delnewsAction() {
        News::findFirst($this->request->getPost('id'))->delete();
    }
    
    public function delpageAction() {
        Pages::findFirst($this->request->getPost('id'))->delete();
    }
    
    public function delarticlesAction() {
        Articles::findFirst($this->request->getPost('id'))->delete();
    }
    
    public function delproductsAction() {
        $product = Products::findFirst($this->request->getPost('id'));
        $catId = $product->cat_id;
        $product->delete();
        $this->response['results'][] = 'success';
        $this->response['redirect'] = 'admin.transport("getproducts",{id: '.$catId.' },admin.setContent)';
    }
    
    public function delcatalogAction() {
        Catalog::findFirst($this->request->getPost('id'))->delete();
    }
    
    public function delimageAction() {
        $img = $this->modelsManager->createBuilder()
            ->from('Stcms\Models\\'.$this->request->getPost('table'))
            ->columns('*')
            ->where('id = :id:',['id' => $this->request->getPost('id')])
            ->getQuery()
            ->getSingleResult();
        if($img){
            @unlink('.'.$img->image);
            @unlink('.'.str_replace('.','_thumb.',$img->image));
            foreach(UploadHelper::$sizes as $item){
                @unlink('.'.str_replace('.','_thumb'.$item.'.',$img->image));
            }
            $img->delete();
        }
    }
    
    public function addpageAction() {
        $page = new PageForm();
        $this->response['results'][] = $this->view->getPartial('tpl/page/add',['page'=>$page]);
    }
    
    public function addcatalogAction(){
        $cat = new CatForm();
        $this->response['results'][] = $this->view->getPartial('tpl/catalog/add',['catalog'=>$cat]);
    }
    
    public function edittypeAction() {
        $type = new TypeForm(Pagetypes::findFirst($this->request->getPost('id')));
        $this->response['results'][] = $this->view->getPartial('tpl/page/edittype',['type'=>$type]);
    }
    
    public function addtypeAction() {
        $type = new TypeForm();
        $this->response['results'][] = $this->view->getPartial('tpl/page/addtype',['type'=>$type]);
    }
    
    public function addnewsAction() {
        $news = new NewsForm();
        $this->response['results'][] = $this->view->getPartial('tpl/news/add',['news'=>$news]);
    }
    
    public function addarticlesAction() {
        $articles = new ArticleForm();
        $this->response['results'][] = $this->view->getPartial('tpl/articles/add',['articles'=>$articles]);
    }
    
    private function showResponse(){
        if($this->response['errors']){ $this->response['status'] = false; }
        echo json_encode($this->response);
    }
    
    private function checkErrorMessages(&$entity){
        foreach ($entity->getMessages() as $message) { $this->response['errors'][] = [$message->getField() => $message->getMessage()]; }
    }
    
    public function __destruct() {
        $this->showResponse();
        $this->view->disable();
    }
    
}