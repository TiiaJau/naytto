<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>naytto - <?=$this->e($title)?></title>
    <meta charset="UTF-8">    
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
      <div>Tiian näyttö</div>
    </footer>
  </body>
</html>