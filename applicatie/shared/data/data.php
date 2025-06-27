<?php

if (!defined("IN_PAGINA")) {
    Header('Location: /');
    exit;
}

function GetAlleDataGebruikerData($db, $gebruikersnaam)
{
    $sql = 'SELECT [username], [password], [first_name], [last_name], [address], [role]
            FROM [User]
            WHERE username = :gebruikersnaam;
            ';

    $sql_variabelen = [
        ':gebruikersnaam' => $gebruikersnaam
    ];

    $query = $db->prepare($sql);
    $query->execute($sql_variabelen);
    return $query->fetch();
}