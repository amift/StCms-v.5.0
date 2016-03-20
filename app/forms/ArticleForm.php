<?php

namespace Stcms\Forms;
use Stcms\Models\Pages;
use Stcms\Models\Catalog;
use Stcms\Models\Products;
use Stcms\Models\Pagetypes;
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

class ArticleForm extends Form {
    
    public function initialize(){
        $this->add(new Hidden('id'));
        $this->add(new Text('slug',['class'=>'form-control']));
        $this->add(new Text('name',['class'=>'form-control','required'=>'true']));
        $this->add(new Text('title',['class'=>'form-control']));
        $this->add(new Text('description',['class'=>'form-control']));
        $this->add(new Text('keywords',['class'=>'form-control']));
        $this->add(new Textarea('summary',['class'=>'form-control']));
        $this->add(new Textarea('content',['class'=>'form-control','rows'=>15]));
        $this->add(new Check('is_published',['value'=>1]));
    }
    
}