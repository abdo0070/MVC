<?php


namespace Odc\Mvc\core;
class Auth{
    public static function checkAuth(){
        $url = "http://mvc.odc/home/login";
        if(empty(Session::get("web"))){
            header("location: $url");
        } 
    }
}