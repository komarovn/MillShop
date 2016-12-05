﻿<?php
/**
    MILL SHOP COMPANY, 2016
    CREATED BY NIKITA GRECHUKHIN, NIKOLAY KOMAROV AND VAGIK SIMONYAN
 */

include_once ("SessionControl.php");
include_once ("DBConnection.php");
class SessionControlImpl extends DBConnection  implements SessionControl
{
    function __construct(){
        parent::__construct();
    }

    function __destruct(){
        parent::__destruct();
    }


    /*
     * TODO: mask for email
     */
    public function addNewUser($login, $password, $firstName, $lastName, $email)
    {
        $query = "INSERT INTO users (LOGIN, PASSWORD, FIRSTNAME, LASTNAME, EMAIL) VALUES ('$login', '$password', '$firstName', '$lastName', '$email')";
        parent::setQuery($query);
        parent::executeQuery("ADD NEW USER");
    }

    public function checkUser($login, $password)
    {
        $chech = false;
        $query = "SELECT login, password FROM users WHERE login = '$login' AND password = '$password'";
        parent::setQuery($query);
        parent::executeQuery("check user");
        while ($line = mysqli_fetch_array(parent::getResult(), MYSQLI_ASSOC)){
            $loginTest = $line['login'];
            $passwordTest = $line['password'];
            if ($loginTest == $login){
                if ($passwordTest == $password)
                    $chech = true;
                else {
                    $chech = false;
                    return $chech;
                }
            }
            else {
                $chech = false;
                return $chech;
            }
        }
        return $chech;
    }

    public function getUserInfo($login){
        $query = "select FIRSTNAME, LASTNAME, EMAIL
                  FROM users
                  where  login = '$login'";
        parent::setQuery($query);
        parent::executeQuery("get info about user by login");
        $line = mysqli_fetch_array(parent::getResult(), MYSQLI_ASSOC);
        $user = array();
        $user[0] = $line['FIRSTNAME'];
        $user[1] = $line['LASTNAME'];
        $user[2] = $line['EMAIL'];
        $line = mysqli_fetch_array(parent::getResult(), MYSQLI_ASSOC);
        if ($line['FIRSTNAME'] != null){
            for ($i=0; $i<count($user); $i++){
                $user[$i] = null;
            }
        }
        return $user;
    }



    //Это нужно бы проверить

    public function getItemInfo($id){
        $query = "select name , color, image
                  FROM items
                  where  ID = '$id'";
        parent::setQuery($query);
        parent::executeQuery("get info about item by ID");
        $line = mysqli_fetch_array(parent::getResult(), MYSQLI_ASSOC);
        $user = array();
	if ($line!=null){
        	$user[0] = $line['image'];
        	$user[1] = $line['name'];
        	$user[2] = $line['color'];
	}
	else{
		$user[0] = null;
		$user[1] = null;
		$user[2] = null;
	}
        return $user;
    }

    public function getColor($id){
        $query = "select name
                  FROM colors
                  where  ID = '$id'";
        parent::setQuery($query);
        parent::executeQuery("get info about color by ID");
        $line = mysqli_fetch_array(parent::getResult(), MYSQLI_ASSOC);
        $color = $line['name'];

        return $color;
    }
}