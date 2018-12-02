<?php

namespace TastyRecipe\Model;
use \TastyRecipe\Integration\UserStore;

class UserHandler
{
    private $username;
    private $userDataBase;
    private $password;

    /**
     * UserHandler constructor.
     */
    public function __construct(){
        $this->userDataBase = new UserStore();
        $this->username = NULL;
        $this->loggedIn = false;
    }

    /**
     * Checks if Username and password matches
     * @param $username
     * @param $password
     * @return bool true if match
     */
    public function tryLogin($username, $password){
        $this->password = $this->userDataBase->getPassword($username);
        if(($this->password == NULL) or !password_verify($password, $this->password )) {
            return false;
        }
        else{
            self::setUsername($username);
            return true;
        }
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }
}