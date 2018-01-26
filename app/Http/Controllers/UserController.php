<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  /*  // property, fields, attrs, memeber vars
    private $id;
    private $user;
    private $email;
    private $password;
    // methods, behaviors, member function , action
    public function __construct($username , $email , $password , $id=""){
        $this->user = $username ;
        $this->email = $email ;
        $this->password = $password ;
        $this->id = $id ;
    }
    public function addUser(){
        //first connect with database
        global $dbh ;
        $sql = $dbh->prepare("INSERT INTO user_info(username ,email ,password) VALUES('$this->user','$this->email','$this->password')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function RetreiveDataForLogin($username,$password){
        //first connect with database
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM user_info WHERE username = '$username' AND password = '$password'");
        if($sql->execute()){
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        return $user ;
        }else{
            return false;
        }
    }  
    public static function DeletUserDataById($id){
        //first connect with database
        global $dbh;
        $sql = $dbh("DELETE FROM user_info WHERE id='$id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function UpdateUser(){
        //first connect with database
        global $dbh;
        $sql = $dbh->prepare("UPDATE user_info SET user='$this->user',email='$this->email',password='$this->password' WHERE id='$this->id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }*/
}
