<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\News;
use Stcms\Models\Pages;
use Stcms\Models\Catalog;
use Stcms\Models\Products;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class ProductLib extends Component {
    
    public $productItem;
    
    public function setProduct($product){
        $this->productItem = $product;
    }
    
    public function getId(){
        return $this->productItem->id;
    }
    
    public function getName(){
        return ($this->productItem->name)
            ? $this->productItem->name 
            : $this->productItem->title ;
    }
    
    public function getSlug(){
        return $this->productItem->slug;
    }
    
    public function getSummary(){
        return $this->productItem->summary;
    }
    
    public function getContent(){
        return $this->productItem->content;
    }
    
    public function getPrice(){
        return $this->productItem->current_price;
    }
    
    public function getOldPrice(){
        return $this->productItem->old_price;
    }
    
    public function getSlugCat($id = 0){
        $cat = Catalog::findFirst('id = "'.$id.'"');
        if($cat){
            return $cat->slug;
        }
        return '';
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->productItem->created);
    }
    
    public function getUpdated($format = 'd.m.Y'){
        return date($format,$this->productItem->updated);
    }
    
    public function getViews(){
        return $this->productItem->views;
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/products',
            ['images'=>$this->productItem->getImages()]
        );
    }
    
    public function getLastList($count = 10){
        return $this->view->getPartial(
            'products/lastlist',
            ['elements'=>Products::find([
                'is_published = "1"',
                'order' => 'created DESC',
                'limit' => $count
            ])]
        );
    }
    
}