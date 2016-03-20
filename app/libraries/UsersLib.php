<?php

namespace Stcms\Libraries;

use Phalcon\Mvc\User\Component;
use Stcms\Models\News;
use Stcms\Models\Pages;
use Stcms\Models\Users;
use Stcms\Models\Catalog;
use Stcms\Models\Products;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class UsersLib extends Component {
    
    public $userItem;
    
    public function setUser($user){
        $this->userItem = $user;
    }
    
    public function getId(){
        return $this->userItem->id;
    }
    
    public function getName(){
        return ($this->userItem->firstname)
            ? $this->userItem->firstname 
            : $this->userItem->email ;
    }
    
    public function getRole(){
        return $this->userItem->role;
    }
    
    public function getByRole($role = 'user',$count = 10){
        $paginator = new PaginatorModel([
            'data'  => Users::find('status = "1" AND role = "'.$role.'"'),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'users/usersbyrole',
            [
                'elfolder'=>'users',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
    public function getUsersList($count = 10){
        $paginator = new PaginatorModel([
            'data'  => Users::find([
                'status = "1"',
                'order' => 'created DESC',
            ]),
            'limit' => $count,
            'page'  => $this->request->getQuery('page','int'),
        ]);
        return $this->view->getPartial(
            'users/userslist',
            [
                'elfolder'=>'users',
                'elements'=>$paginator->getPaginate(),
            ]
        );
    }
    
    public function getCreated($format = 'd.m.Y'){
        return date($format,$this->userItem->created);
    }
    
    public function getViews(){
        return $this->userItem->views;
    }
    
    public function getImages(){
        return $this->view->getPartial(
            'images/users',
            ['images'=>$this->userItem->getImages()]
        );
    }
    
}