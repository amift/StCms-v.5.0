<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\News;
use Stcms\Models\Pages;
use Stcms\Models\Catalog;
use Stcms\Models\Products;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class CatalogLib extends Component {
    
    public $catalogItem;
    
    public function setCatalog($cat){
        $this->catalogItem = $cat;
    }
    
    public function getId(){
        return $this->catalogItem->id;
    }
    
    public function getName(){
        return ($this->catalogItem->name)
            ? $this->catalogItem->name 
            : $this->catalogItem->title ;
    }
    
    public function getSlug(){
        return $this->catalogItem->slug;
    }
    
    public function getSummary(){
        return $this->catalogItem->summary;
    }
    
    public function getContent(){
        return $this->catalogItem->content;
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->catalogItem->created);
    }
    
    public function getUpdated($format = 'd.m.Y'){
        return date($format,$this->catalogItem->updated);
    }
    
    public function getViews(){
        return $this->catalogItem->views;
    }
    
    public function getChildCats(){
        return $this->view->getPartial(
            'cats/childcats',
            ['elements'=>Catalog::find(
                'is_published = "1" AND parent_id = "'.$this->catalogItem->id.'"'
            )]
        );
    }
    
    public function getProductsByCurrentCat($count = 10){
        $paginator = new PaginatorModel([
            'data'  => Products::find('is_published = "1" AND cat_id = "'.$this->catalogItem->id.'"'),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'products/listelements',
            [
                'elfolder'=>'products',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
    public function getCatsByParent($item = 0){
        return $this->view->getPartial(
            'cats/childcats',
            ['elements'=>Catalog::find(
                'is_published = "1" AND parent_id = "'.$item.'"'
            )]
        );
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/cats',
            ['images'=>$this->catalogItem->getImages()]
        );
    }
    
    public function getLastList($count = 10){
        return $this->view->getPartial(
            'cats/lastlist',
            ['elements'=>Catalog::find([
                'is_published = "1"',
                'order' => 'created DESC',
                'limit' => $count
            ])]
        );
    }
    
    public function getListPagins($count = 10){
        $paginator = new PaginatorModel([
            'data'  => Catalog::find('is_published = "1"'),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'cats/listelements',
            [
                'elfolder'=>'news',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
}