<?php
session_start();

require_once 'db_connectie.php';
$db = maakVerbinding();

if (isset($_SESSION['username'])) {
  header('Location: Profiel.php');
  exit;
}

$melding = '';

if (isset($_POST['inloggen'])) {
  $username = $_POST['username'];
  $wachtwoord = $_POST['wachtwoord'];

  // haal wachtwoord op
  $sql = "SELECT [password]
          FROM [User]
          WHERE username = :username";

  $query = $db->prepare($sql);

  $query->execute([':username' => $username]);

  if ($rij = $query->fetch()) {
    //gebruiker gevonden
    $passwordhash = $rij['password'];

    //wachtwoord checken
    if (password_verify($wachtwoord, $passwordhash)) {
      //wachtwoord en gebruiker klopt
      session_start();
      $_SESSION['username'] = $username;
      header('Location: profiel.php');
      exit;
    } else {
      $melding = 'onjuist wachtwoord of gebruikersnaam!!';
    }
  } else {
    $melding = 'onjuist gebruikersnaam';
  }
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
    <a href="Profiel.php"><img src="images/Profiel.png" alt="" /></a>
  </nav>
  <main class="login_main">
    <div class="login_container">
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
        <input type="submit" name="inloggen" value="Inloggen" />
      </form>
    </div>
    <div class="registreren_btn_container">
      <p>Nog niet geregistreerd?</p>
      <a href="registreren.php">
        <p>Registreren</p>
      </a>
    </div>
  </main>
  <footer>
    <a href="prificy.php">Privacy beleid</a>
  </footer>
</body>

</html>