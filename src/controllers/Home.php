<?php
namespace Odc\Mvc\controllers;
use Odc\Mvc\core\BaseController;
use Odc\Mvc\core\db;
use Odc\Mvc\core\Session;
use Odc\Mvc\core\Validation;

class Home{
    use BaseController;

    public function index(){
        echo "home";
    }

    public function login(){
        return $this->view("users/login");
    }

    public function loginrequest(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $validation = new Validation;
        $validation->input("email")->requierd()->min(2);
        $validation->input("password")->min(3);

        print_r($validation->message());die;
        // $validation->input("email")->required();
        // $validation->input("password")->min(2)->max(10);

        $db = new db;
        $user =  $db->select("user","*")->where("email","=",$email)->andWhere("password","=",$password)->first();
        if(!empty($user)){
            Session::set("web",$user);
            return $this->redirect("user/index");
        }
        return $this->redirect("home/login");
    }

    public function logout(){
        Session::destroy("web");
        return $this->redirect("home/login");

    }
}