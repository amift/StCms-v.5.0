<?php

namespace Stcms\Libraries;

class Seo {
    
    public $seoData;
    
    public function setSeo($content){
        $this->seoData = $content;
    }
    
    public function setSeoUser($user){
        $data = $user->firstname.' '.$user->lastname;
        $this->seoData->title = $data;
        $this->seoData->description = $data;
        $this->seoData->keywords = $data;
    }
    
    public function getTitle(){
        return ($this->seoData->title)
            ? $this->seoData->title
            : $this->seoData->name;
    }
    
    public function getDescription(){
        return $this->seoData->description;
    }
    
    public function getKeywords(){
        return $this->seoData->keywords;
    }
    
    
    
}