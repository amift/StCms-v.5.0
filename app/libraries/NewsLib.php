<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\Pages;
use Stcms\Models\News;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class NewsLib extends Component {
    
    public $newsItem;
    
    public function setNews($news){
        $this->newsItem = $news;
    }
    
    public function getName(){
        return ($this->newsItem->name)
            ? $this->newsItem->name 
            : $this->newsItem->title ;
    }
    
    public function getSlug(){
        return $this->newsItem->slug;
    }
    
    public function getSummary(){
        return $this->newsItem->summary;
    }
    
    public function getContent(){
        return $this->newsItem->content;
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->newsItem->created);
    }
    
    public function getUpdated($format = 'd.m.Y'){
        return date($format,$this->newsItem->updated);
    }
    
    public function getViews(){
        return $this->newsItem->views;
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/news',
            ['images'=>$this->newsItem->getImages()]
        );
    }
    
    public function getLastList($count = 10){
        return $this->view->getPartial(
            'news/lastlist',
            ['elements'=>News::find([
                'is_published = "1"',
                'order' => 'created DESC',
                'limit' => $count
            ])]
        );
    }
    
    public function getListPagins($count = 10){
        $paginator = new PaginatorModel([
            'data'  => News::find('is_published = "1"'),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'news/listelements',
            [
                'elfolder'=>'news',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
}