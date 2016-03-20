<?php

namespace Stcms\Forms;
use Stcms\Models\Users;    
use Phalcon\Forms\Form;    
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\Email;

class UserForm extends Form {
    
    public function initialize(){
        $this->add(new Hidden('id'));
        $this->add(new Text('firstname',['class'=>'form-control']));
        $this->add(new Text('lastname',['class'=>'form-control','required'=>'true']));
        $this->add(new Text('email',['class'=>'form-control']));
        $this->add(new Check('status',['value'=>1]));
        $this->add(new Select('role',Users::getRoles(),['using'=>['ident','name'],'class'=>'form-control']));
    }
    
}