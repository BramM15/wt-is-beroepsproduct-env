<?php
define('IN_PAGINA', true);

require_once("db_connectie.php");
require_once("shared/data/data.php");
require_once("profiel/profiel_data.php");
require_once("shared/functions/functions.php");
require_once("profiel/profiel_functions.php");

$db = maakVerbinding();

session_start();

if (!isset($_SESSION['gebruikersnaam'])) {
  header('Location: login.php');
  exit;
}

$gebruikersnaam = $_SESSION['gebruikersnaam'];
$voornaam = GetAlleDataGebruiker($db, $gebruikersnaam)['first_name']; 
$achternaam = GetAlleDataGebruiker($db, $gebruikersnaam)['last_name']; 
$bestellingen = (getBestellingGebruiker($db, $gebruikersnaam));
$bestellingen_producten = (getBestellingGebruikerProducten($db, $gebruikersnaam));
$statuspreset = [
  '1'=> 'word bereid',
  '2'=> 'in de oven',
  '3'=> 'onderweg',
];

// $html = '<table class="winkelwagen">';

// $html = $html . '<tr><th>Order datum</th><th>adres</th><th>totaal bedrag</th><th>status</th></tr>';

// foreach($data as $rij) {
//     $datum = date($rij['datetime']);
//     $address = $rij['address'];
//     $bedrag = $rij['bedrag'];
//     $status = $statuspreset[$rij["status"]];
//     $html = $html . "<tr><td>$datum</td><td>$address</td><td>$bedrag</td><td>$status</td></tr>";
// }

// $html = $html . "</table>";

require_once("profiel/profiel_presentatie.php");