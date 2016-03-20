<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\Pages;

class ContentLib extends Component {
    
    public $contentPage;
    
    public function setContent($content){
        $this->contentPage = $content;
    }
    
    public function getName(){
        return ($this->contentPage->name)
            ? $this->contentPage->name 
            : $this->contentPage->title ;
    }
    
    public function getSlug(){
        return $this->contentPage->slug;
    }
    
    public function getSlugByType($name){
        $elem = Pages::findFirst('type = "'.$name.'"');
        if($elem){ return $elem->slug; }
        return '';
    }
    
    public function getSummary(){
        return $this->contentPage->summary;
    }
    
    public function getContent(){
        return $this->contentPage->content;
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->contentPage->created);
    }
    
    public function getUpdated($format = 'd.m.Y'){
        return date($format,$this->contentPage->updated);
    }
    
    public function getViews(){
        return $this->contentPage->views;
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/'.$this->contentPage->type,
            ['images'=>$this->contentPage->getImages()]
        );
    }
    
    public function getMainMenu(){
        return $this->view->getPartial(
            'blocks/mainmenu',
            ['elements'=>Pages::find('parent_id < 2')]
        );
    }
    
    public function getMenu($num = 0){
        return $this->view->getPartial(
            'blocks/menu',
            ['elements'=>Pages::find('parent_id ="'.$num.'"')]
        );
    }
    
    public function getChildMenu(){
        return $this->view->getPartial(
            'blocks/childmenu',
            ['elements'=>Pages::find('parent_id ="'.$this->contentPage->id.'"')]
        );
    }
    
    public function getParentMenu(){
        $page = Pages::findFirst('id ="'.$this->contentPage->parent_id.'"');
        if($page){ $elements = Pages::find('parent_id ="'.$page->parent_id.'"'); }
        else { $elements = []; }
        return $this->view->getPartial(
            'blocks/parentmenu',
            ['elements'=>$elements]
        );
    }
    
}