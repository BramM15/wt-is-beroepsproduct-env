<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
}

function getBestellingGebruikerData($db, $gebruikersnaam)
{
    $sql = "SELECT PO.[order_id] ,[address], [status], SUM(quantity * P.price) AS bedrag, [datetime]
            FROM Pizza_Order PO
            INNER JOIN Pizza_Order_Product POP ON PO.order_id = POP.order_id
            INNER JOIN [Product] P ON POP.product_name = P.name
		    WHERE client_username = :gebruikersnaam
            GROUP BY PO.[order_id], [datetime], [address], [status]
            ORDER BY [datetime] DESC";

    $sql_variabelen = [
        ':gebruikersnaam' => $gebruikersnaam
    ];

    $query = $db->prepare($sql);
    $query->execute($sql_variabelen);
    return $query->fetchAll();

}

function getBestellingGebruikerProductenData($db, $gebruikersnaam)
{
    $sql = "SELECT order_id, [product_name], [quantity]
            FROM [Pizza_Order_Product]
            WHERE order_id IN (
            SELECT order_id
            FROM Pizza_Order
            WHERE client_username = :gebruikersnaam
            )";

    $sql_variabelen = [
        ':gebruikersnaam' => $gebruikersnaam
    ];

    $query = $db->prepare($sql);
    $query->execute($sql_variabelen);
    return $query->fetchAll();
}