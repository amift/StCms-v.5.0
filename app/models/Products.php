<?php

namespace Stcms\Models;

use Stcms\Models\Imagesproducts;
use Stcms\Helpers\UploadHelper;

class Products extends \Phalcon\Mvc\Model {
    
    public function delete(){
        $images = Imagesproducts::find('ident = "'.$this->id.'"');
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
        return Imagesproducts::find('ident = "'.$this->id.'"');
    }
    
    
}