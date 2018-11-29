<?php
session_start();
$_SESSION = array();
session_destroy();
include "resources/views/" . $_POST['redirect'];
