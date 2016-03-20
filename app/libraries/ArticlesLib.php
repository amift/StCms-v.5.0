<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\Pages;
use Stcms\Models\Articles;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class ArticlesLib extends Component {
    
    public $articleItem;
    
    public function setArticle($article){
        $this->articleItem = $article;
    }
    
    public function getName(){
        return ($this->articleItem->name)
            ? $this->articleItem->name 
            : $this->articleItem->title ;
    }
    
    public function getSlug(){
        return $this->articleItem->slug;
    }
    
    public function getSummary(){
        return $this->articleItem->summary;
    }
    
    public function getContent(){
        return $this->articleItem->content;
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->articleItem->created);
    }
    
    public function getUpdated($format = 'd.m.Y'){
        return date($format,$this->articleItem->updated);
    }
    
    public function getViews(){
        return $this->articleItem->views;
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/article',
            ['images'=>$this->articleItem->getImages()]
        );
    }
    
    public function getLastList($count = 10){
        return $this->view->getPartial(
            'articles/lastlist',
            ['elements'=>Articles::find([
                'is_published = "1"',
                'order' => 'created DESC',
                'limit' => $count
            ])]
        );
    }
    
    public function getListPagins($count = 10){
        $paginator = new PaginatorModel([
            'data'  => Articles::find('is_published = "1"'),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'articles/listelements',
            [
                'elfolder'=>'articles',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
}