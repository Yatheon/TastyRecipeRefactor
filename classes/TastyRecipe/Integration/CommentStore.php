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
        $commentsInFile = explode(KEY_COMMENT_DELIMITER, file_get_contents($this->folder_path . $fileDist));
        foreach($commentsInFile as $commentInFile){
            $comment = unserialize($commentInFile);
            if($comment instanceof Comment and !$comment->isDeleted()){
                array_push($comments, $comment);
            }
        }
        return $comments;
    }

    public function deleteComment($fileDist, int $timestamp){
        $commentsInFile = explode(KEY_COMMENT_DELIMITER, file_get_contents($this->folder_path . $fileDist));

        for ($i = count($commentsInFile) - 1; $i >= 0; $i--) {
            $comment = unserialize($commentsInFile[$i]);
            if ($comment instanceof Comment and ($comment->getTimestamp() === $timestamp)) {
                $comment->setDeleted(true);
                $commentsInFile[$i] = serialize($comment);
                break;
            }
        }
        file_put_contents($this->folder_path . $fileDist, implode(KEY_COMMENT_DELIMITER, $commentsInFile));
    }

    public function storeComment($fileDist, Comment $comment){
        file_put_contents($this->folder_path . $fileDist,serialize($comment) . KEY_COMMENT_DELIMITER, FILE_APPEND);
    }
}