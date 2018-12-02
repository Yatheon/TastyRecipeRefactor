<?php

namespace TastyRecipe\Integration;


class UserStore
{
    const FILE_NAME = 'accounts.txt';
    const FILE_DIR = 'loginData/';
    const PATH_TO_ROOT = '/../../../';

    private $filepath;

    /**
     * UserStore constructor.
     */
    public function __construct()
    {
        $this->filepath = __DIR__ . self::PATH_TO_ROOT . self::FILE_DIR . self::FILE_NAME;
    }

    /**
     * @param $username gets Hashed password from database of corresponding user
     * @return password if it exists, else NULL
     */
    public function getPassword($username)
    {
        $file = $this->filepath;
        $accounts = explode("\n", file_get_contents($file));
        foreach ($accounts as $user) {
            $userData = explode("_", $user);
            $userData[1] = preg_replace('/\s+/', '', $userData[1]);
            if ($userData[0] == $username) {
                return $userData[1];
            }
        }
        return NULL;
    }
}