<?php

namespace Stcms\Models;

use Stcms\Models\Imagespages;
use Stcms\Helpers\UploadHelper;

class Pages extends \Phalcon\Mvc\Model {
    
    public function delete(){
        $images = Imagespages::find('ident = "'.$this->id.'"');
        foreach($images as $img){
            @unlink('.'.$img->image);
            @unlink('.'.str_replace('.','_thumb.',$img->image));
            foreach(UploadHelper::$sizes as $item){
                @unlink('.'.str_replace('.','_thumb'.$item.'.',$img->image));
            }
            $img->delete();
        }
        parent::delete();
    }
    
    public function incViews(){
        $this->views += 1;
        $this->update();
    }
    
    public function getImages(){
        return Imagespages::find('ident = "'.$this->id.'"');
    }
    
}