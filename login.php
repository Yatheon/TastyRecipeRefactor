<?php

namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

if (empty($_POST[KEY_USER]) or empty($_POST['password'])) {
    $_SESSION['failedLogin'] = true;
    include KEY_VIEWS . $_POST['redirect'];
    return;
}
$username = $_POST[KEY_USER];
$password = $_POST['password'];
$contr->tryLogin($username, $password );

$file = "loginData/accounts.txt";
$accounts = explode("\n", file_get_contents($file));

foreach ($accounts as $user) {
    $userData = explode("_", $user);
    $userData[1] = preg_replace('/\s+/', '', $userData[1]);
    if ($userData[0] == $_POST[KEY_USER] and $userData[1] == $_POST['password']) {
        $_SESSION[KEY_USER] = $_POST[KEY_USER];
        $_SESSION['loggedin'] = true;
        include KEY_VIEWS . $_POST['redirect'];
        return;
    }
}

$_SESSION['failedLogin'] = true;
include KEY_VIEWS . $_POST['redirect'];