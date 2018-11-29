<?php
namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();



if (!empty($_POST[KEY_USER]) and !empty($_POST['password'])) {
    $file = "loginData/accounts.txt";
    $accounts = explode("\n", file_get_contents($file));

    foreach ($accounts as $user) {
        $userData = explode("_", $user);
        $userData[1] = preg_replace('/\s+/', '', $userData[1]);
        if ($userData[0] == $_POST[KEY_USER] and $userData[1] == $_POST['password']) {
            $_SESSION[KEY_USER] = $_POST[KEY_USER];
            $_SESSION['loggedin'] = true;
            include KEY_VIEWS . $_POST['redirect'];
        }
    }

}
if ($_SESSION['loggedin'] == false) {
    $_SESSION['failedLogin'] = true;
    include KEY_VIEWS . $_POST['redirect'];
}