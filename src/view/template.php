<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>naytto - <?=$this->e($title)?></title>
    <meta charset="UTF-8"> 
    <link href="styles/styles.css" rel="stylesheet">   
  </head>
  <body>
  <header>
      <h1><a href="<?=BASEURL?>">Teerivaaran koiraharrastajat</a></h1>
      <div class="profile">
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
          } else {
            echo "<div><a href='kirjaudu'>Kirjaudu</a></div>";
          }
        ?>
      </div>
    </header>
    <section>
      <h1>Aktiivista tekemistä koirasi kanssa!</h1>
      <div class="kuva kuva--oikea">       
      <img src="images/koira.jpg" alt="">  </div> 
      <p><br>Teerivaaran koiraharrastajat ry on vuonna 2023 kuvitteellisesti perustettu koiraharrastukseen ja -urheiluun keskittyvä yhdistys. <br>
      Tavoitteena on luoda todellista koirakerhon toimintaa vastaavat nettisivustot. <br>
      Sivustot on luotu Tiia Jauhiaisen BackEnd näyttötyönä ja kaikki sivuston tiedot ovat kuvitteellisia.<br><br><br><br><br><br><br><br><br><br></p>
   <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>Teerivaaran koiraharrastajat Ry<br>
      Teerivaarantie 91<br>
      83700 Polvijärvi<br><br>
    p: 0501234567<br>
  email: tvkoira@sahkoposti.fi</div>
    </footer>
  </body>
</html>