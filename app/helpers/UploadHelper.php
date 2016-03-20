<?php

namespace Stcms\Helpers;

use \Phalcon\Mvc\User\Component;

class UploadHelper extends Component {
    
    public $fields      = [];
    public $pathUpload  = '/uploads/';
    
    public $defaultWidth  = 200;
    public $defaultHeight = 200;
    
    public static $sizes = [
        '3' => '250x250',
        '2' => '150x150',
        '1' => '100x100',
    ];
    
    public function __construct() {
        $this->getFields();
    }
    
    private function getFields(){
        foreach($this->request->getUploadedFiles() as $item){
            $field = explode('.',$item->getKey());
            $this->fields[$field[0]][] = $item;
        }
    }
    
    public function checkFile($nameField){
        $arrfiles = [];
        if(isset($this->fields[$nameField]) && !empty($this->fields[$nameField])){
            foreach($this->fields[$nameField] as $k => $v){
                $name = \Phalcon\Text::lower(\Phalcon\Text::random(\Phalcon\Text::RANDOM_ALNUM, 12) . '.' . $this->fields[$nameField][$k]->getExtension());
                $path = $this->pathUpload.$nameField.'/'.mb_substr($name, 0, 2).'/'.mb_substr($name, 2, 2).'/'.mb_substr($name, 4, 2);
                mkdir('.' . $path, 0755, true);
                $this->fields[$nameField][$k]->moveTo('.' . $path . '/' . $name);
                $arrfiles[] = $path . '/' . $name;
            }
        }
        if($arrfiles){ return $arrfiles; }
        return false;
    }
    
    public function saveMini($paths = []){
        if($paths){
            foreach($paths as $item){
                $image = new \Phalcon\Image\Adapter\Gd('.'.$item);
                $image->resize($this->defaultWidth,$this->defaultWidth);
                $image->save('.'.str_replace('.','_thumb.',$item));
                foreach(self::$sizes as $itemImg){
                    $itemImg = explode('x',$itemImg);
                    $width  = $itemImg[0];
                    $height = $itemImg[1];
                    $image = new \Phalcon\Image\Adapter\Gd('.'.$item);
                    $image->resize($width,$height);
                    $image->save('.'.str_replace('.','_thumb'.$width.'x'.$height.'.',$item));
                }
                unset($image);
            }
            return true;
        }
        return false;
    }
    
}