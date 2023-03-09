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
    <nav>
      <div><a href="<?=BASEURL?>">Etusivu</a></div>
      <div><a href="<?=BASEURL."/tapahtumat"?>">Tapahtumat</a></div>
      <div><a href="<?=BASEURL."/jasen"?>">Jäseneksi</a></div>
      <div><a href="<?=BASEURL."/tilat"?>">Tilat</a></div>
      <div><a href="<?=BASEURL."/yhteystiedot"?>">Yhteystiedot</a></div>
    </nav>
    <section>
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