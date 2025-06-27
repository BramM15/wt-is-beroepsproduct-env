<?php
define('IN_PAGINA', true);

require_once("db_connectie.php");
$db = maakVerbinding();
require_once("shared/data/data.php");
require_once("shared/functions/functions.php");

session_start();

if (isset($_SESSION['gebruikersnaam'])) {
  header('Location: Profiel.php');
  exit;
}

$melding = getMelding();

require_once("login/login_presentatie.php");