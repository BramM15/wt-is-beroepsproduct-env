<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once("shared/content/nav.php"); ?>
    <main class="winkelwagen_main">
        <h2><?= $gebruikersnaam ?></h2><br>
        <h3><?= $melding ?></h3>
        <?php if (empty($_SESSION['winkelwagen'])): ?>
            <p class=" has_tekst_black">de winkelwagen is leeg</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Aantal</th>
                    <th>verwijderen</th>
                </tr>
                <?php foreach ($_SESSION['winkelwagen'] as $product): ?>
                    <tr>
                        <td>
                            <?= $product['productnaam'] ?>
                        </td>
                        <td>
                            <form method="post" action="winkelwagen/winkelwagen_verwerk.php">
                                <input type="hidden" name="actie" value="update_aantal">
                                <input type="hidden" name="productnaam" value="<?= $product['productnaam'] ?>">
                                <input type="number" name="aantal" value="<?= $product['aantal'] ?>" min="1">
                                <input type="submit" value="Bijwerken">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="winkelwagen/winkelwagen_verwerk.php">
                                <input type="hidden" name="actie" value="verwijderen">
                                <input type="hidden" name="productnaam" value="<?= $product['productnaam'] ?>">
                                <input type="submit" value="verwijderen">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


            <form method="post">
                <label for="address"></label>
                <input type="text" name="address" value="address">
                <input type="submit" name="betalen" value="betalen">
            </form>
        <?php endif; ?>
        <?php if ($data_gebruiker['role'] === 'Personnel'): ?>
            <table class="winkelwagen">
                <tr>
                    <th>Order id</th>
                    <th>Product</th>
                    <th>aantal</th>
                    <th>status</th>
                </tr>
                <?php foreach ($data_orders as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['product_name'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                        <td>
                            <form method="post" action="winkelwagen/winkelwagen_verwerk.php">
                                <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                <input type="number" name="aantal" value="<?= $order['status'] ?>" min="1">
                                <input type="submit" name="status_aanpassen" value="status_aanpassen">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>
    <?php require_once("shared/content/footer.php"); ?>
</body>

</html>