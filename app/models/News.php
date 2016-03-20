<?php

namespace Stcms\Models;

use Stcms\Models\Imagesnews;
use Stcms\Helpers\UploadHelper;

class News extends \Phalcon\Mvc\Model {
    
    public function delete(){
        $images = Imagesnews::find('ident = "'.$this->id.'"');
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
        return Imagesnews::find('ident = "'.$this->id.'"');
    }
    
    
}