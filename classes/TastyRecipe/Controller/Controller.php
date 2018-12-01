<?php

namespace TastyRecipe\Controller;
use TastyRecipe\Integration\CommentStore;
use TastyRecipe\Model\Comment;
use \TastyRecipe\Model\UserHandler;
use \TastyRecipe\Util\Util;
class Controller
{

    private $commentHandler;
    private $userHandler;

    /**
     * Controller constructor.
     */
    public function __construct(){
        $this->userHandler = new UserHandler();
        $this->commentHandler = new CommentStore();
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function tryLogin(string $username, string $password){
        return $this->userHandler->tryLogin($username, $password);
    }

    /**
     * @return null
     */
    public function getUsername() {
        return $this->userHandler->getUsername();
    }

    /**
     * @param $fileDist
     * @return array
     */
    public function getComments($fileDist){
        return $this->commentHandler->getComments(Util::getFilePath($fileDist));
    }

    /**
     * @param $fileDist
     * @param Comment $comment
     */
    public function storeComment($fileDist, Comment $comment ){
        $this->commentHandler->storeComment(Util::getFilePath($fileDist), $comment);
    }

    /**
     * @param $fileDist
     * @param $timestamp
     */
    public function deleteComment($fileDist, $timestamp){
        $this->commentHandler->deleteComment(Util::getFilePath($fileDist), $timestamp);
    }
}