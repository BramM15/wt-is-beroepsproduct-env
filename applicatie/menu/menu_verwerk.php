<?php
define('IN_PAGINA', true);

require_once($_SERVER['DOCUMENT_ROOT'] . "/db_connectie.php");
$db = maakVerbinding();
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/data/data.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/functions/functions.php");

session_start();

if (isset($_POST['toevoegen'])) {
    if (!isset($_SESSION['gebruikersnaam'])) {
      $_SESSION['melding'] = "u moet ingelogt zijn om producten toe te voegen aan het de winkelwagen";
      Header("Location: /login.php");
      exit;
    }
  
    $productnaam = $_POST['productnaam'];
  
    $product = [
      'productnaam' => $productnaam,
      'aantal' => 1,
    ];

    $gevonden = false;
    foreach ($_SESSION['winkelwagen'] as &$item) {
      if ($item['productnaam'] === $productnaam) {
          $item['aantal'] += 1;
          $_SESSION['melding'] = "Het product " . $item['productnaam'] . " staat nu " . $item['aantal'] . " keer in de winkelwagen"; 
          $gevonden = true;
        break;
      }
    }
  
    if (!$gevonden) {
      $_SESSION['winkelwagen'][] = $product;
      $_SESSION['melding'] = "het product is toegevoegt in de winkelwagen";
    }

    Header("Location: /menu.php");
  }