<?php

  // Suoritetaan projektin alustusskripti.
  require_once '../src/init.php';

  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  // Siistimisen jälkeen osoite /~tjauhiai/naytto/tapahtuma?id=1 on 
  // lyhentynyt muotoon /tapahtuma.
  $request = str_replace('/~tjauhiai/naytto','',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');

// Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
$templates = new League\Plates\Engine(TEMPLATE_DIR);

  // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava
  // käsittelijä.
  if ($request === '/' || $request === '/tapahtumat') {
    require_once MODEL_DIR . 'tapahtuma.php';
    $tapahtumat = haeTapahtumat();
    echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
  } else if ($request === '/tapahtuma') {
    require_once MODEL_DIR . 'tapahtuma.php';
    $tapahtuma = haeTapahtuma($_GET['id']);
    if ($tapahtuma) {
      echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma]);
    } else {
      echo $templates->render('tapahtumanotfound');
    }
    //UUSI RIVI 24.2.2023 klo 8:30
  } else if ($request === '/lisaa_tili') {
    echo $templates->render('lisaa_tili');
    //UUSI RIVI LOPPUU
  } else {
    echo $templates->render('notfound');
  }
  
?>