<?php

if(!defined("IN_PAGINA")) {
    Header('Location: /');
    exit;
}

function getMelding() {
    $melding = '';

    if (isset($_SESSION['melding'])) {
        $melding = $_SESSION['melding'];
        unset($_SESSION['melding']);
    }

    return $melding;
}

Function GetAlleDataGebruiker($db, $gebruikersaam) {
    $gegevens = GetAlleDataGebruikerData($db, $gebruikersaam);

    return $gegevens;
}