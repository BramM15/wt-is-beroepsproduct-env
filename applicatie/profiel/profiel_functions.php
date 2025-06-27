<?php

if (!defined('IN_PAGINA')) {
    header('Location: /');
}

Function getBestellingGebruiker($db, $gebruikersaam) {
    $data = getBestellingGebruikerData($db, $gebruikersaam);

    return $data;
}

Function getBestellingGebruikerProducten($db, $gebruikersaam) {
    $data = getBestellingGebruikerProductenData($db, $gebruikersaam);

    return $data;
}