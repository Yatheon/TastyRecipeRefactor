<?php

namespace TastyRecipe\Integration;


use TastyRecipe\Model\Comment;

class CommentStore
{
    const FILE_DIR = 'commentData/';
    const PATH_TO_APP_ROOT = '/../../../';

    private $folder_path;

    public function __construct(){
        $this->folder_path = __DIR__ . self::PATH_TO_APP_ROOT . self::FILE_DIR;
    }
    public function getComments($fileDist){
        $comments = array();
        $commentsInFile = explode(KEY_ENTRY_DELIMITER , file_get_contents($this->folder_path . $fileDist));
        foreach($commentsInFile as $commentInFile){
            $comment = unserialize($commentInFile);
            if($comment instanceof Comment and !$comment->isDeleted()){
                array_push($comments, $comment);
            }
        }
        return $comments;
    }
}