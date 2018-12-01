<?php

namespace TastyRecipe\Controller;
use TastyRecipe\Integration\CommentStore;
use \TastyRecipe\Model\UserHandler;
use \TastyRecipe\Util\Util;
class Controller
{

    private $commentHandler;
    private $userHandler;

    public function __construct(){
        $this->userHandler = new UserHandler();
        $this->commentHandler = new CommentStore();
    }
    public function tryLogin(string $username, string $password){
        return $this->userHandler->tryLogin($username, $password);
    }
    public function getUsername() {
        return $this->userHandler->getUsername();
    }
    public function getComments($fileDist){
        return $this->commentHandler->getComments(Util::getFilePath($fileDist));
    }
}