<?php

namespace Odc\Mvc\core;

use Odc\Mvc\controllers\Home;

class app{
    private $controller,$method,$params;

    public function __construct()
    {
        $this->url();
        $this->run();
    }

    private function url(){
       $url = $_SERVER['QUERY_STRING'];
       $url =  explode("/",$url);
       $this->controller = (!empty($url[0])) ? $url[0] : "home";
       $this->method = (!empty($url[1])) ? $url[1] : "index";
        unset($url[0],$url[1]);
       $this->params = $url; 
    }

    private function run(){
        $controller = "Odc\\Mvc\\controllers\\".$this->controller;

        call_user_func_array([$this->check_class_exist($controller),$this->method],$this->params);
    }

    private function check_class_exist($controller){

        if(class_exists($controller)){
            return new $controller;
        }
        return new Error;
    }
    
}