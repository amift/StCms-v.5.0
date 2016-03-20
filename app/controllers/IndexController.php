<?php

namespace Stcms\Controllers;

use Stcms\Models\News;
use Stcms\Models\Pages;
use Stcms\Models\Users;
use Stcms\Models\Catalog;
use Stcms\Models\Articles;
use Stcms\Models\Products;

class IndexController extends ControllerBase {

    public function initialize(){
        parent::initialize();
    }
    
    public function indexAction() {
        if($slug = $this->Url->segment(1)){
            if($page = Pages::findFirst('slug = "'.$slug.'" AND is_published = "1"')){
                $this->setContent($page);
                $page->incViews();
                if(method_exists(get_class($this),$page->type.'Template')){$this->{$page->type.'Template'}($page);}
                else { exit('method: '.$page->type.'Template not found in IndexController.'); }
            } else { $this->show404(); }
        } else {
            $page = Pages::findFirst('type = "main"');
            $this->setContent($page);
            $page->incViews();
            $this->mainTemplate($page);
        }
    }

    public function articlesTemplate($page){
        if($slug = $this->Url->segment(2)){
            $article = Articles::findFirst('slug = "'.$slug.'" AND is_published = "1"');
            if(!$article){ $this->show404(); }
            $article->incViews();
            $this->Articles->setArticle($article);
            $this->Seo->setSeo($article);
            $this->view->setLayout('article');
        } else { $this->view->setLayout($page->type); }
    }
    
    public function newsTemplate($page){
        if($slug = $this->Url->segment(2)){
            $news = News::findFirst('slug = "'.$slug.'" AND is_published = "1"');
            if(!$news){ $this->show404(); }
            $news->incViews();
            $this->News->setNews($news);
            $this->Seo->setSeo($news);
            $this->view->setLayout('new');
        } else { $this->view->setLayout($page->type); }
    }
    
    public function textTemplate($page){
        $this->view->setLayout($page->type);
    }
    
    public function catsTemplate($page){
        if($slug = $this->Url->segment(2)){
            $cat = Catalog::findFirst('slug = "'.$slug.'" AND is_published = "1"');
            if(!$cat){ $this->show404(); }
            else {
                $cat->incViews();
                $this->Catalog->setCatalog($cat);
                $this->Seo->setSeo($cat);
                if($slug1 = $this->Url->segment(3)){
                    $prod = Products::findFirst('slug = "'.$slug1.'" AND is_published = "1"');
                    if(!$prod){ $this->show404(); }
                    else {
                        $prod->incViews();
                        $this->Product->setProduct($prod);
                        $this->Seo->setSeo($prod);
                        $this->view->setLayout('product');
                    }
                } else { $this->view->setLayout('cat'); }
            }
        } else { $this->view->setLayout($page->type); }
    }
    
    public function usersTemplate($page){
        if($slug = $this->Url->segment(2)){
            $user = Users::findFirst('id = "'.$slug.'" AND status = "1"');
            if(!$user){ $this->show404(); }
            else {
                $user->incViews();
                $this->Users->setUser($user);
                $this->Seo->setSeoUser($user);
                $this->view->setLayout('user');
            }
        } else { $this->view->setLayout($page->type); }
    }
    
    public function mainTemplate($page){
        $this->view->setLayout($page->type);
    }
    
    private function setContent($content){
        $this->Seo->setSeo($content);
        $this->Content->setContent($content);
    }
    
    private function show404(){
        $this->dispatcher->forward([
            'controller'=>'errors',
            'action'    =>'show404'
        ]);
    }
    
}
