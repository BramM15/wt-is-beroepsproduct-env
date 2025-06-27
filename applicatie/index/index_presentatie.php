<?php
if (!defined('IN_PAGINA')) {
    header('Location: /');
    exit;
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
    <?php require_once("shared/content/nav.php") ?>
    <header id="header">
        <div>
            <h1>Pizza Padrone</h1>
            <?php if (isset($gebruikersnaam)): ?>
                <?php if (!empty($gegevens_gebruiker['first_name'] || $gegevens_gebruiker['last_name'])): ?>
                    <h2 class="white_text">
                        <?= "Welkom: " . $gegevens_gebruiker['first_name'] . " " . $gegevens_gebruiker['last_name'] ?></h2>
                <?php else: ?>
                    <h2 class="white_text"><?= "Welkom: " . $gebruikersnaam ?></h2>
                <?php endif; ?>
            <?php endif; ?>
            <p>Van onze oven naar jouw tafel, puur genieten!</p>
            <img class="header_img" src="images/logo.png" alt="" />
        </div>
    </header>
    <main>
        <section class="menu_container">
            <img src="images/menu_btn.png" alt="" />
            <div class="menu_btn_container">
                <h2 class="white_text">Menu</h2>
                <a class="menu_link" href="menu.php">
                    <p>Bekijk hier ons menu</p>
                </a>
            </div>
        </section>
        <section class="aanbiedingen" id="aanbiedingen" style="scroll-margin-top: 90px">
            <h2>Aanbiedingen</h2>
            <div class="aanbiedingen_container">
                <a href=""><img src="images/pizza_aanbieding_1.png" alt="" /></a>
                <a href=""><img src="images/pizza_aanbieding_2.png" alt="" /></a>
                <a class="aanbiedingen_img_big" href=""><img src="images/pizza_aanbieding_3.png" alt="" /></a>
            </div>
        </section>
        <section class="about" id="about">
            <h2 class="white_text">Over ons</h2>
            <p>
                Welkom bij Pizza Padrone, de plek waar passie voor pizza en liefde
                voor kwaliteit samenkomen! Bij ons draait alles om jou, onze gast. Wij
                geloven dat een heerlijke pizza meer is dan alleen een gerecht; het is
                een ervaring. Daarom werken we elke dag met verse ingrediënten,
                traditionele Italiaanse recepten en een vleugje creativiteit om jou de
                beste smaakbeleving te bieden.Welkom bij Pizza Padrone, de plek waar
                passie voor pizza en liefde voor kwaliteit samenkomen!
            </p>
        </section>
    </main>
    <?php require_once("shared/content/footer.php"); ?>
</body>

</html>