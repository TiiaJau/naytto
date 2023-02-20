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
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>Teerivaaran koiraharrastajat Ry<br>
      Teerivaarantie 91<br>
      83700 Polvijärvi<br<<br>
    p: 0501234567<br>
  email: tvkoira@sahkoposti.fi</div>
    </footer>
  </body>
</html>