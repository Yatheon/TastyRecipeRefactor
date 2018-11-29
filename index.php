<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'resources/views/frontPage.php';