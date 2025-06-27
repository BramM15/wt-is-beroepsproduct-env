<?php
define('IN_PAGINA', true);

require_once("db_connectie.php");
require_once("shared/data/data.php");
require_once("winkelwagen/winkelwagen_data.php");
require_once("shared/functions/functions.php");
require_once("winkelwagen/winkelwagen_functions.php");

$db = maakVerbinding();

session_start();

if (!isset($_SESSION['gebruikersnaam'])) {
  $_SESSION['melding'] = "u moet ingelogt zijn om de winkelwagen te bekijken";
  Header('Location: login.php');
  exit;
}

$melding = getMelding();
$gebruikersnaam = $_SESSION['gebruikersnaam'];
$data_gebruiker = GetAlleDataGebruiker($db, $gebruikersnaam);
$statuspreset = [
  '1' => 'bereid',
  '2' => 'in oven',
  '3' => 'onderweg',
];

if ($data_gebruiker['role'] == 'Personnel') {
  $data_orders = getAlleOrdersPersoneel($db, $gebruikersnaam);
}

require_once("winkelwagen/winkelwagen_presentatie.php");