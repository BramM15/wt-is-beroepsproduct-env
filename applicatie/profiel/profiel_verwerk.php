<?php
define('IN_PAGINA', true);

session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: /login.php');
    exit;
}