<?php

namespace Stcms\Controllers;

use \Phalcon\Mvc\View;
use \Stcms\Models\Users;
use \Phalcon\Validation;
use \Phalcon\Validation\Message;
use \Phalcon\Validation\Validator\Email;
use \Phalcon\Validation\Validator\StringLength;

class LoginController extends \Phalcon\Mvc\Controller {
    
    public function initialize(){
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }

    public function indexAction() {
        if($this->request->isPost()){
            $this->checkData();
        }
        if($this->session->has('logged_in') && $this->session->get('logged_in') == TRUE){
            $this->response->redirect('/admin');
        }
    }
    
    private function checkData(){
        $validation = new Validation();
        $validation->add('email',new Email(['message'=>'Поле Email некорректно заполнено',]));
        $validation->add('password',new StringLength(['min' => 3,'messageMinimum'=>'Поле Password некорректно заполнено']));
        $messages = $validation->validate($this->request->getPost());
        if(count($messages)){ $this->view->setVar('validate_errors',$messages); }
        else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = Users::query()
                ->where("email = '".$email."'")
                ->andWhere("password = '".md5($password)."'")
                ->andWhere("role = 'admin'")
                ->andWhere("status = 1")
                ->execute()->getFirst();
            if($user){
                $this->session->set('logged_in',TRUE);
                $this->session->set('userdata',$user);
                $this->response->redirect('admin');
            } else {
                $messages->appendMessage(new Message('Неправильный логин или пароль'));
                $this->view->setVar('validate_errors',$messages);
            }
        }
    }
    
    public function outAction(){
        $this->session->destroy();
        $this->response->redirect('/');
    }
    
}
