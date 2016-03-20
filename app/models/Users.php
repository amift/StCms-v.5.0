<?php

namespace Stcms\Models;

class Users extends \Phalcon\Mvc\Model {
    
    public static function getRoles(){
        return [
            'admin'     => 'Администратор',
            'user'      => 'Пользователь',
            'manager'   => 'Менеджер',
        ];
    }
    
    public function incViews(){
        $this->views += 1;
        $this->update();
    }
    
    public function getImages(){
        return Imagesusers::find('ident = "'.$this->id.'"');
    }
    
}
