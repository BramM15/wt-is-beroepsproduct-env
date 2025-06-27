<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php require_once("shared/content/nav.php"); ?>
    <header class="profiel_header">
        <h2 class="profiel_welkom_tekst"><?= "Welkeom terug: $voornaam $achternaam!" ?></h2>
    </header>
    <main class="profiel_main">
        <?php if (!empty($bestellingen)): ?>
            <p class="has_tekst_black">uw bestellingen</p>
            <table class="winkelwagen">
                <tr>
                    <th>order id</th>
                    <th>adres</th>
                    <th>status</th>
                    <th>totaal bedrag</th>
                    <th>Order datum</th>
                </tr>
                <?php foreach ($bestellingen as $bestelling): ?>
                    <tr>
                        <td><?= $bestelling['order_id'] ?></td>
                        <td><?= $bestelling['address'] ?></td>
                        <td><?= $bestelling['status'] ?></td>
                        <td><?= $bestelling['bedrag'] ?></td>
                        <td><?= $bestelling['datetime'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="winkelwagen">
                <tr>
                    <th>order id</th>
                    <th>quantiteit</th>
                    <th>product</th>
                </tr>
                <?php foreach ($bestellingen_producten as $producten): ?>
                    <tr>
                        <td><?= $producten['order_id'] ?></td>
                        <td><?= $producten['quantity'] ?></td>
                        <td><?= $producten['product_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p class="has_tekst_black">hier kunt uw bestellingen zien</p>
        <?php endif; ?>


        <form method="post" action="profiel/profiel_verwerk.php">
            <button type="submit" name="logout" id="logout_button">Uitloggen</button>
        </form>
    </main>
    <?php require_once("shared/content/footer.php"); ?>
</body>

</html>