<?php


namespace Odc\Mvc\core;

class Validation{
    private $value;
    private $input;
    private $errors = [];
    public function input($name){
        $this->input = $name;
        $this->value =  $_REQUEST[$name];
        return $this;
    }

    public function min($n){
        if(strlen($this->value) < $n){
            $this->errors[] = $this->input." min lenth must be more than $n";
        }
        return $this;
    }


    public function max($n){
        if(strlen($this->value) > $n){
            $this->errors[] = $this->input." max lenth must be less than $n";
        }
        return $this;
    }

    public function requierd(){
        if(strlen($this->value) == 0 || empty($this->value) || $this->value == ""){
            $this->errors[] = $this->input."  must be required";
        }
        return $this;
    }

    public function message(){
        return $this->errors;
    }
}