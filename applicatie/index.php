<?php
define('IN_PAGINA', true);

require_once("db_connectie.php");
require_once("shared/data/data.php");
require_once("shared/functions/functions.php");

$db = maakVerbinding();

session_start();

if (isset($_SESSION['gebruikersnaam'])) {
  $gebruikersnaam = $_SESSION['gebruikersnaam'];
  $gegevens_gebruiker = GetAlleDataGebruiker($db, $gebruikersnaam);
}

require_once("index/index_presentatie.php");