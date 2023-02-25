<?php

  // Aloitetaan istunnot.
  session_start();

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
  //if ($request === '/' || $request === '/tapahtumat') {
   // require_once MODEL_DIR . 'tapahtuma.php';
   // $tapahtumat = haeTapahtumat();
   // echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
  //} else if ($request === '/tapahtuma') {
  //  require_once MODEL_DIR . 'tapahtuma.php';
  //  $tapahtuma = haeTapahtuma($_GET['id']);
  //  if ($tapahtuma) {
  //    echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma]);
  //  } else {
  //    echo $templates->render('tapahtumanotfound');
  //  }
    //UUSI RIVI 24.2.2023 klo 8:30
 // } else if ($request === '/lisaa_tili') {
 //   echo $templates->render('lisaa_tili');
    //UUSI RIVI LOPPUU
 // } else {
  //  echo $templates->render('notfound');
  //}

  switch ($request) {
    case '/':
    case '/tapahtumat':
      require_once MODEL_DIR . 'tapahtuma.php';
      $tapahtumat = haeTapahtumat();
      echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
      break;
    case '/tapahtuma':
      require_once MODEL_DIR . 'tapahtuma.php';
      $tapahtuma = haeTapahtuma($_GET['id']);
      if ($tapahtuma) {
        echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma]);
      } else {
        echo $templates->render('tapahtumanotfound');
      }
      break;
      case '/lisaa_tili':
        if (isset($_POST['laheta'])) {
          $formdata = cleanArrayData($_POST);
          require_once CONTROLLER_DIR . 'tili.php';
          $tulos = lisaaTili($formdata);
          if ($tulos['status'] == "200") {
            echo $templates->render('tili_luotu', ['formdata' => $formdata]);
            break;
          }
          echo $templates->render('lisaa_tili', ['formdata' => $formdata, 'error' => $tulos['error']]);
          break;
        } else {
          echo $templates->render('lisaa_tili', ['formdata' => [], 'error' => []]);
          break;
        }
        case "/kirjaudu":
          if (isset($_POST['laheta'])) {
            require_once CONTROLLER_DIR . 'kirjaudu.php';
            if (tarkistaKirjautuminen($_POST['email'],$_POST['salasana'])) {
         // echo "Kirjautuminen Ok."; 
         $_SESSION['user'] = $_POST['email'];
          header("Location: " . $config['urls']['baseUrl']);
            } else {
              echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Väärä käyttäjätunnus tai salasana!']]);
            }
          } else {
            echo $templates->render('kirjaudu', [ 'error' => []]);
          }
          break;
    default:
      echo $templates->render('notfound');
  }    
  
?>