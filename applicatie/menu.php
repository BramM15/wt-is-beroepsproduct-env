<?php
define('IN_PAGINA', true);

require_once("db_connectie.php");
$db = maakVerbinding();
require_once("shared/data/data.php");
require_once("shared/functions/functions.php");

session_start();

if (!isset($_SESSION['winkelwagen'])) {
  $_SESSION['winkelwagen'] = [];
}

$melding = getMelding();

require_once("menu/menu_presentatie.php");

// <?php
// session_start();

// if (!isset($_SESSION['winkelwagen'])) {
//   $_SESSION['winkelwagen'] = [];
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productnaam'])) {
//   $productnaam = $_POST['productnaam'];

//   $product = [
//     'productnaam' => $productnaam,
//     'aantal' => 1,
//   ];

//   // Controleer of het product al in de winkelwagen zit
//   $gevonden = false;
//   foreach ($_SESSION['winkelwagen'] as &$item) {
//     if ($item['productnaam'] === $productnaam) {
//       $item['aantal'] += 1; // Verhoog aantal
//       $gevonden = true;
//       break;
//     }
//   }

//   // Voeg het product toe als het niet gevonden is
//   if (!$gevonden) {
//     $_SESSION['winkelwagen'][] = $product;
//   }
// }