<?php

namespace TastyRecipe\Controller;
use \TastyRecipe\Model\UserHandler;

class Controller
{
    private $userHandler;

    public function __construct(){
        $this->userHandler = new UserHandler();
    }
    public function tryLogin(string $username, string $password){
        return $this->userHandler->tryLogin($username, $password);
    }
    public function getUsername() {
        return $this->userHandler->getUsername();
    }

}