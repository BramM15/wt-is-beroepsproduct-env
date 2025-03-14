<?php
require_once 'db_connectie.php';

session_start();

if (!isset($_SESSION['username'])) {
  // Gebruiker niet ingelogd, doorverwijzen naar inlogpagina
  header('Location: Login.php');
  exit;
}

if (isset($_POST['logout'])) {
  session_unset();
    session_destroy();
    header('Location: Login.php');
    exit;
}

$username = htmlspecialchars($_SESSION['username']);

$db = maakVerbinding();
$voornaam = HaalNaamOp($username); 
$statuspreset = [
  '1'=> 'word bereid',
  '2'=> 'in de oven',
  '3'=> 'onderweg',
];

//welkom bericht
$welkom = '<h2 class="profiel_welkom_tekst">Welkom Terug: ' . $voornaam . '</h2>';

$query = "SELECT [datetime] ,[address], SUM(quantity * P.price) AS bedrag, [status]
          FROM Pizza_Order PO
          INNER JOIN Pizza_Order_Product POP ON PO.order_id = POP.order_id
          INNER JOIN [Product] P ON POP.product_name = P.name
          WHERE client_username = '$username'
          GROUP BY [datetime], [address], [status]
          ORDER BY [datetime] DESC";

$data = $db->query($query);

$html = '<table class="winkelwagen">';

$html = $html . '<tr><th>Order datum</th><th>adres</th><th>totaal bedrag</th><th>status</th></tr>';

foreach($data as $rij) {
    $datum = date($rij['datetime']);
    $address = $rij['address'];
    $bedrag = $rij['bedrag'];
    $status = $statuspreset[$rij["status"]];
    $html = $html . "<tr><td>$datum</td><td>$address</td><td>$bedrag</td><td>$status</td></tr>";
}

$html = $html . "</table>";


//------------------------------------functions

function HaalNaamOp($username) {
  $db = maakVerbinding();

  $query = "SELECT first_name
            FROM [User]
            WHERE username = '$username'";
  
  $data = $db->query($query);
  
  $result = $data->fetch();
  
  return $result['first_name']; 
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
  <nav class="main_nav">
    <a href="index.php#header"><img src="images/logo.png" alt="" /></a>
    <div class="hamburger_menu">
      <img class="hamburger_img" src="icons/bars-solid.svg" alt="" />
      <ul class="nav_list_container">
        <li>
          <a class="nav_list_content" href="index.php#aanbiedingen">aanbiedingen<img src="icons/tag-solid.svg" alt="" />
          </a>
        </li>
        <li>
          <a class="nav_list_content" href="menu.php">menu
            <img src="icons/pizza-slice-solid.svg" alt="" />
          </a>
        </li>
        <li>
          <a class="nav_list_content" href="index.php#about">Over ons
            <img src="icons/circle-info-solid.svg" alt="" />
          </a>
        </li>
        <li>
          <a class="nav_list_content" href="winkelwagen.php">order now
            <img src="icons/cart-shopping-solid.svg" alt="" />
          </a>
        </li>
      </ul>
    </div>
    <a href="Login.php"><img src="images/Profiel.png" alt="" /></a>
  </nav>
  <header class="profiel_header">
    <?= $welkom ?>
  </header>
  <main class="profiel_main">
    <?=$html?>
    <form method="post" action="">
    <button type="submit" name="logout" id="logout_button">Uitloggen</button>
</form>
  </main>
  <footer>
    <a href="prificy.php">Privacy beleid</a>
  </footer>
</body>

</html>