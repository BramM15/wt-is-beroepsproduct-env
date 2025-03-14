<?php
session_start();

require_once 'db_connectie.php';
$db = maakVerbinding();
$html = '';
$melding = '';
$username = '';

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  if (isPersonnel($db, $username)) {
    $html = renderOrders($db, $username);
  }
} else {
  if (empty($_SESSION['winkelwagen'])) {
    $melding = 'de winkelwagen is leeg';
  } else {
    $html = renderwinkelwagen();
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actie'])) {
  $actie = $_POST['actie'];
  $productnaam = $_POST['productnaam'];

  if ($actie === 'verwijderen') {
    foreach ($_SESSION['winkelwagen'] as $index => $item) {
      if ($item['productnaam'] === $productnaam) {
        unset($_SESSION['winkelwagen'][$index]); // Verwijder het item
        $_SESSION['winkelwagen'] = array_values($_SESSION['winkelwagen']); // Herschik array-indexen
        break;
      }
    }
  }

  if ($actie === 'update_aantal' && isset($_POST['aantal'])) {
    $nieuwAantal = (int) $_POST['aantal'];
    if ($nieuwAantal > 0) {
      foreach ($_SESSION['winkelwagen'] as &$item) {
        if ($item['productnaam'] === $productnaam) {
          $item['aantal'] = $nieuwAantal;
          break;
        }
      }
    }
  }

  if (isset($_POST['betalen'])) {
    unset($_SESSION['winkelwagen']);
  }

  // Refresh de pagina om dubbele POST-verzoeken te vermijden
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}


//---------------functions
function isPersonnel($db, $username)
{
  $sql = "SELECT [role]
          FROM [User]
          WHERE username = :username";

  $query = $db->prepare($sql);

  $query->execute([':username' => $username]);

  if ($rij = $query->fetch()) {
    //gebruiker gevonden
    $role = $rij['role'];

    if ($role == 'Client') {
      return false;
    }
    if ($role == 'Personnel') {
      return true;
    }
  }
  return false;
}

function renderOrders($db, $username)
{
  $statuspreset = [
    '1' => 'bereid',
    '2' => 'in oven',
    '3' => 'onderweg',
  ];

  $sql = "SELECT PO.order_id, product_name, quantity, [status]
  FROM Pizza_Order PO
  INNER JOIN Pizza_Order_Product POP ON PO.order_id = POP.order_id
  WHERE personnel_username = :username";

  $query = $db->prepare($sql);

  $query->execute([':username' => $username]);

  $html = '<table class="winkelwagen">';
  $html = $html . '<tr><th>Order id</th><th>Product</th><th>aantal</th><th>status</th></tr>';


  foreach ($query as $rij) {
    $order_id = $rij['order_id'];
    $product_name = $rij['product_name'];
    $quantity = $rij['quantity'];
    $status = $statuspreset[$rij['status']];
    $html = $html . "<tr><td>$order_id</td><td>$product_name</td><td>$quantity</td><td>$status</td></tr>";
  }

  $html = $html . "</table>";

  return $html;
}

function renderwinkelwagen()
{
  $html = '<table border="1">
  <tr>
      <th>Product</th>
      <th>Aantal</th>
      <th>verwijderen</th>
  </tr>';
  foreach ($_SESSION['winkelwagen'] as $item) {
    $html .= '<tr>
<td>' . $item['productnaam'] . '</td>
<td> 
  <form method="post">
  <input type="hidden" name="actie" value="update_aantal">
    <input type="hidden" name="productnaam" value="' . $item['productnaam'] . '">
    <input type="number" name="aantal" value="' . $item['aantal'] . '" min="1">
    <input type="submit" value="Bijwerken">
  </form>
</td>
<td>
  <form method="post">
  <input type="hidden" name="actie" value="verwijderen">
    <input type="hidden" name="productnaam" value="' . $item['productnaam'] . '">
    <input type="submit" value="verwijderen">
  </form>
</td>
</tr>';
  }
  $html .= '</table>';

  return $html;
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
  <main class="winkelwagen_main">
    <h2><?= $username ?></h2><br>
    <h3><?= $melding ?></h3>
    <?= $html ?>
    <form method="post">
      <label for="address"></label>
      <input type="text" name="address" value="address">
      <input type="submit" name="betalen" value="betalen">
    </form>
  </main>
  <footer>
    <a href="prificy.php">Privacy beleid</a>
  </footer>
</body>

</html>