<?php

namespace Odc\Mvc\models;

use Odc\Mvc\core\db;

class UserModel extends db{

    protected const TABLE = "user";

    public function createNewUser($data){
        return $this->insert(self::TABLE,$data)->excute();
    }

    public function getUserById($id){
       return  $this->select(self::TABLE,"*")->where("id","=",$id)->first();
    }

    public function deleteUser($id){
        return $this->delete(self::TABLE)->where("id","=",$id)->excute();
    }

    public function updateUser($data,$id){
        return $this->update(self::TABLE,$data)->where("id","=",$id)->excute();
    }

    public function getUsers(){
        return  $this->select(self::TABLE,"*")->all();
     }

}