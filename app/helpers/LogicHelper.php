<?php

namespace Stcms\Helpers;

class LogicHelper {
    
    public static $elements = [];
    public static $three = [];
    
    public static function recursionMenu($elements,$method){
        foreach ($elements as $element){
            $element = $element->toArray();
            self::$elements[$element['id']] = $element;
        }
        self::$three[] = '<div class="tree">';
        self::$three[] = '<ul>';
        foreach(self::$elements as $element){ 
            if($element['parent_id'] == '0'){
                self::$three[] = '<li>';
                self::$three[] = '<span onclick="admin.transport(\''.$method.'\',{id:'.$element['id'].'}, admin.setContent)">'.$element['name'].'</span>';
                self::$three[] = self::recursion($element,$method);
                self::$three[] = '</li>';
            }
        }
        self::$three[] = '</ul>';
        self::$three[] = '</div>';
        return implode('',self::$three);
    }
    
    public static function recursion($elem,$method){
        $compl = [];
        $stat = FALSE;
        foreach(self::$elements as $element){if($elem['id'] == $element['parent_id']){ $stat = TRUE; }}
        if($stat){
            $compl[] = '<ul>';
            foreach(self::$elements as $element){
                if($elem['id'] == $element['parent_id']){
                    $compl[] = '<li>';
                    $compl[] = '<span onclick="admin.transport(\''.$method.'\',{id:'.$element['id'].'}, admin.setContent)">'.$element['name'].'</span>';
                    $compl[] = self::recursion($element,$method);
                    $compl[] = '</li>';
                }
            }
            $compl[] = '</ul>';
            return implode('',$compl);
        } else { return ''; }
    }
    
}