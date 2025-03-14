<?php

require_once 'db_connectie.php';

$melding = '';

if (isset($_POST['registreren'])) {
  $username = $_POST['username'];
  $wachtwoord = $_POST['wachtwoord'];
  $voornaam = $_POST['voornaam'];
  $achternaam = $_POST['achternaam'];

  if (isset($_POST['$address'])) {
    $address = $_POST['address'];
  } else {
    $address = 'NULL';
  }

  $passwordhash = password_hash($wachtwoord, PASSWORD_DEFAULT);

  $db = maakVerbinding();

  $sql = "INSERT INTO [User]([username], [password], [first_name], [last_name], [address], [role])
          values (:username, :passwordhash, :first_name, :last_name, :address, 'Client')";

  $query = $db->prepare($sql);

  $data_array = [
    ':username' => $username,
    ':passwordhash' => $passwordhash,
    ':first_name' => $voornaam,
    ':last_name' => $achternaam,
    ':address' => $address
  ];

  $succes = $query->execute($data_array);

  if ($succes) {
    header('Location: Login.php');
  }
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
  <main class="registreren_main">
    <?= $melding ?>
    <form method="post" action="">
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required />
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required />
      </div>
      <div>
        <label for="F_name">First name</label>
        <input type="text" name="voornaam" id="voornaam" required />
      </div>
      <div>
        <label for="L_name">Last name</label>
        <input type="text" name="achternaam" id="achternaam" required />
      </div>
      <div>
        <label for="address">address *</label>
        <input type="text" name="address" id="address" />
      </div>
      <input type="submit" name="registreren" value="registreren" />
    </form>
  </main>
  <footer>
    <a href="prificy.php">Privacy beleid</a>
  </footer>
</body>
</html>