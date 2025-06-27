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

  <nav class="menu_nav">
    <ul>
      <li><a class="menu_list_content" href="#pizza">pizza</a></li>
      <li><a class="menu_list_content" href="#maaltijd">maaltijd</a></li>
      <li><a class="menu_list_content" href="#drinks">drinks</a></li>
      <li><a class="menu_list_content" href="#voorgerecht">voorgerecht</a></li>
    </ul>
  </nav>
  <main class="menu_main">
      <?= $melding?>
    <h2 id="pizza" style="scroll-margin-top: 165px">Pizza's</h2>
    <section class="menu_section">
      <article class="menu_article">
        <img src="images/pizza's/margherita.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Margherita</p>
            <p class="menu_article_omschrijving">
              kaas,tomaat
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 10.99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Margherita">
              <input type="submit" name="toevoegen" class="menu_article_btn" value="toevoegen">
            </form>
          </div>
        </div>
      </article>
      <article class="menu_article">
        <img src="images/pizza's/pepperoni.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Pepperoni</p>
            <p class="menu_article_omschrijving">
              kaas,pepperoni, tomaat
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 11,99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Pepperoni">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
      <article class="menu_article">
        <img src="images/pizza's/hawaii.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Hawaï</p>
            <p class="menu_article_omschrijving">
              kaas,pepperoni, saus, sla, spek, tomaat, ui
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 12.99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Hawaï">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
      <article class="menu_article">
        <img src="images/pizza's/meatLovers.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Veggie</p>
            <p class="menu_article_omschrijving">
              champignon, kaas, tomaat, ui
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 10.99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Veggie">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
    </section>
    <h2 id="maaltijd" style="scroll-margin-top: 165px">Maaltijd</h2>
    <section class="menu_section">
      <article class="menu_article">
        <img src="images/sides/snackbox.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Combinatiemaaltijd</p>
            <p class="menu_article_omschrijving">champignon, kaas, pepperoni, suas, sla, spek, tomaat, ui</p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 15.99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Combinatiemaaltijd">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
    </section>
    <h2 id="drinks" style="scroll-margin-top: 165px">Drinks</h2>
    <section class="menu_section">
      <article class="menu_article">
        <img src="images/dranken/Cola.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Cola</p>
            <p class="menu_article_omschrijving">
              Coca-Cola Zero Sugar heeft de originele smaak van Coca-Cola maar
              dan zonder suiker.
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 2.49</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Cola">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
      <article class="menu_article">
        <img src="images/dranken/Sprite.Png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Sprite</p>
            <p class="menu_article_omschrijving">
              Sprite bevat de vertrouwde natuurlijke citroen- en limoensmaken,
              maar dan zonder suiker en zonder calorieën.
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 2.49</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Sprite">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
    </section>
    <h2 id="voorgerecht" style="scroll-margin-top: 165px">Voorgerecht</h2>
    <section class="menu_section">
      <article class="menu_article">
        <img src="images/sides/Chrispy_Chicken_6.png" alt="" />
        <div class="menu_article_container">
          <div class="menu_article_text_container">
            <p class="menu_article_titel">Knoflookbrood</p>
            <p class="menu_article_omschrijving">
              knoflooookkkkk
            </p>
          </div>
          <div class="menu_article_btn_container">
            <span class="menu_article_prijs">&euro; 4.99</span>
            <form method="post" action="menu/menu_verwerk.php">
              <input type="hidden" name="productnaam" value="Knoflookbrood">
              <input type="submit" name="toevoegen" , class="menu_article_btn" , value="toevoegen">
            </form>
          </div>
        </div>
      </article>
    </section>
  </main>
  <?php require_once("shared/content/footer.php");?>
</body>

</html>