<?php
define('IN_PAGINA', true);

require_once($_SERVER['DOCUMENT_ROOT'] . "/db_connectie.php");
$db = maakVerbinding();
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/data/data.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/functions/functions.php");

session_start();

if (isset($_POST['inloggen'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord_input = $_POST['wachtwoord'];
    $wachtwoord_hash = GetAlleDataGebruiker($db, $gebruikersnaam)['password'];

    if (empty($wachtwoord_hash)) {
        $_SESSION['melding'] = 'onjuist gebruikersnaam';
        Header('Location: /login.php');
        exit;
    }

    if (password_verify($wachtwoord_input, $wachtwoord_hash)) {
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        header('Location: /profiel.php');
        exit;
    } else {
        $_SESSION['melding'] = 'onjuist wachtwoord of gebruikersnaam';
        Header('Location: /login.php');
        exit;
    }
} 
Header('Location: /');