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
  
<?php require_once("shared/content/nav.php");?>
  <main class="login_main">
    <div class="login_container">
      <?= $melding ?>
      <form method="post" action="login/login_verwerk.php">
        <div>
          <label for="gebruikersnaam">gebruikersnaam</label>
          <input type="text" name="gebruikersnaam" id="gebruikersnaam" required />
        </div>
        <div>
          <label for="wachtwoord">wachtwoord</label>
          <input type="wachtwoord" name="wachtwoord" id="wachtwoord" required />
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
  <?php require_once("shared/content/footer.php"); ?>
</body>

</html>