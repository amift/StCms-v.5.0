<?php

namespace Stcms\Libraries;

class Url {
    
    public $urlPath;
    public $urlSegments;
    
    public function __construct() {
        $this->urlPath = explode('?',$_SERVER['REQUEST_URI']);
        $this->urlSegments = explode('/',$this->urlPath[0]);
    }
    
    public function segment($n = false){
        if(!$n){ return $this->urlSegments; }
        return (isset($this->urlSegments[$n]) && is_numeric($n))? $this->urlSegments[$n] : false ;
    }
    
    public function getCurrentPath(){
        return implode('/',$this->urlSegments);
    }
    
}