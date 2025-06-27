<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
}

function getAlleOrdersPersoneel($db, $gebruikersnaam)
{
    $data = getAlleOrdersPersoneelData($db, $gebruikersnaam);
    return $data;
}

function setStatusOrder($db, $waarde, $order_id) {
    if (!is_numeric($waarde) || $waarde > 3) {
        $_SESSION['melding'] = "er is een onverwachtse waarde gegeven";
        return null;
    }

    setStatusOrderData($db, $waarde, $order_id);
}
