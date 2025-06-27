<?php
define('IN_PAGINA', true);

require_once($_SERVER['DOCUMENT_ROOT'] . "/db_connectie.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/data/data.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/winkelwagen/winkelwagen_data.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/functions/functions.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/winkelwagen/winkelwagen_functions.php");

$db = maakVerbinding();

session_start();

if (isset($_POST['actie'])) {
    $actie = $_POST['actie'];
    $productnaam = $_POST['productnaam'];

    if ($actie == 'verwijderen') {
        foreach ($_SESSION['winkelwagen'] as $index => $item) {
            if ($item['productnaam'] === $productnaam) {
                unset($_SESSION['winkelwagen'][$index]);
                $_SESSION['winkelwagen'] = array_values($_SESSION['winkelwagen']);
                break;
            }
        }
    }

    if ($actie === 'update_aantal' && isset($_POST['aantal'])) {
        $nieuwAantal = (int) $_POST['aantal'];
        if ($nieuwAantal > 0) {
            foreach ($_SESSION['winkelwagen'] as &$item) {
                if ($item['productnaam'] === $productnaam) {
                    $item['aantal'] = $nieuwAantal;
                    break;
                }
            }
        }
    }

    if (isset($_POST['betalen'])) {
        unset($_SESSION['winkelwagen']);
    }

    header('Location: /winkelwagen.php');
    exit;
}

if (isset($_POST['status_aanpassen'])) {
    $waarde = $_POST['aantal'];
    $order_id = $_POST['order_id'];

    setStatusOrder($db, $waarde,  $order_id);
}

header('Location: /winkelwagen.php');
exit;