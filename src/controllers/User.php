<?php

namespace Odc\Mvc\controllers;
use Odc\Mvc\core\BaseController;
use Odc\Mvc\core\db;
use Odc\Mvc\models\UserModel;
use Odc\Mvc\core\Auth;
class User{
    use BaseController;
    private $model;
    public function __construct()
    {
        Auth::checkauth();
        $this->model  = new UserModel;
    }
    public function index(){

        $users =  $this->model->getUsers();
        return $this->view("users/list",["users"=>$users]);
    }

    public function create(){
        return $this->view("users/create");
    }

    public function store(){
      
        $this->model->createNewUser($_POST);
        $this->redirect("user/index"); 
    }

    public function delete($id){
        $this->model->deleteUser($id);
        $this->redirect("user/index"); 
    }

    public function edit($id){
        $user = $this->model->getUserById($id);
        return $this->view("users/update",['user'=>$user]);
    }

    public function update(){
        $this->model->updateUser($_POST,$_POST['id']);
        $this->redirect("user/index"); 
    }

   
}