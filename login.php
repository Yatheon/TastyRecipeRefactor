<?php
namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;
use \TastyRecipe\Controller\SessionManager;

if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $file = "loginData/accounts.txt";
    $accounts = explode("\n", file_get_contents($file));

    foreach ($accounts as $user) {
        $userData = explode("_", $user);
        $userData[1] = preg_replace('/\s+/', '', $userData[1]);
        if ($userData[0] == $_POST['username'] and $userData[1] == $_POST['password']) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedin'] = true;
            include "resources/views/" . $_POST['redirect'];
        }
    }

}
    $_SESSION['failedLogin'] = true;
    include "resources/views/" . $_POST['redirect'];