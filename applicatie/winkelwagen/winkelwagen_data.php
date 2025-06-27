<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
}


function getAlleOrdersPersoneelData($db, $gebruikersnaam)
{
    $sql = "SELECT PO.order_id, product_name, quantity, PO.[status]
  FROM Pizza_Order PO
  INNER JOIN Pizza_Order_Product POP ON PO.order_id = POP.order_id
  WHERE personnel_username = :gebruikersnaam
  ORDER BY PO.order_id DESC
  ";

    $sql_variabelen = [
        ':gebruikersnaam' => $gebruikersnaam
    ];

    $query = $db->prepare($sql);
    $query->execute($sql_variabelen);
    return $query->fetchAll();
}

function setStatusOrderData($db, $waarde, $order_id)
{
    $sql = "UPDATE Pizza_Order
SET status = :waarde
WHERE order_id = :order_id";

    $sql_variabelen = [
        ':waarde' => $waarde,
        ':order_id' => $order_id
    ];

    $query = $db->prepare($sql);
    $query->execute($sql_variabelen);
}