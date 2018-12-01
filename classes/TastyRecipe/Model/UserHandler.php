<?php

namespace TastyRecipe\Model;
use \TastyRecipe\Integration\UserStore;

class UserHandler
{
    private $username;
    private $userDataBase;
    private $password;

    public function __construct(){
        $this->userDataBase = new UserStore();
        $this->username = NULL;
        $this->loggedIn = false;
    }
    public function tryLogin($username, $password){
        $this->password = $this->userDataBase->getPassword($username);

        if(($this->password == NULL) or ($this->password != $password)) {
            return false;
        }
        else return true;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
}