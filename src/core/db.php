<?php

namespace Odc\Mvc\core;

class db{
    private $connection,$sql;
     
    public function __construct(){
        $this->connection = mysqli_connect("localhost","root","","odc");
    }

    public function select($table,$columns){
        $this->sql = "SELECT $columns FROM `$table` ";
        return $this;
    }

    public function first(){
        // echo $this->sql;die;
        $query =  mysqli_query($this->connection,$this->sql);
        return mysqli_fetch_assoc($query);
    }
    
    public function all(){
        $query =  mysqli_query($this->connection,$this->sql);
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    public function where($column,$operator,$value){
        $this->sql .=  " WHERE `$column` $operator '$value'";
        return $this;
    }

    public function andWhere($column,$operator,$value){
        $this->sql .=  " AND `$column` $operator '$value'";
        return $this;
    }
    public function insert($table,$data){
        $columns = "";
        $values = "";
        foreach($data as $key => $value){
            $columns .= " `$key`,";
            $values  .= " '$value',"; 
        }
       $columns =  rtrim($columns,",");
       $values =  rtrim($values,",");

        $this->sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
        return $this;
    }

    public function update($table,$data){
        $row = "";
        foreach($data as $key => $value){
            $row .= "`$key` = '$value',";
        }
        $row = rtrim($row,",");
        $this->sql = "UPDATE `$table` SET $row";
        return $this;
    }
    public function excute(){
        mysqli_query($this->connection,$this->sql);
        return mysqli_affected_rows($this->connection);
    }

    public function delete($table){
        $this->sql = "DELETE FROM `$table` ";
        return $this;
    }
    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}