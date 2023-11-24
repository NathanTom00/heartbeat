<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Jude Joy Kallarakal, Nathaniele Tomines" />
  <meta name="description" content="Heartbeat è un progetto nato con l'obiettivo di aiutare le persone
    in situazioni di emergenza sanitaria. Il sito contiene delle guide
    step-by-step per affrontare le problematiche mediche più comuni e
    fornisce consigli per uno stile di vita più sano ed equilibrato." />
  <title>Heartbeat</title>
  <link rel="icon" type="image/x-icon" href="./img/healthcare.png" />
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="./fontAwesome/css/all.css" />
  
  <script src="./js/jquery.js" ></script>
  <script src="./js/myJS.js" ></script>
  <script src="./bootstrap/js/bootstrap.bundle.js"></script>
  <script src="./fontAwesome/js/all.js"></script>
  <link rel="stylesheet" href="./css/style.css" />
  
</head>

<body id="inizio">
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top fadeInDownBig">
    <div class="container">
      <a class="navbar-brand" href="#inizio"><img src="./img/logo2.png" class="img-fluid" id="logoNavbar" /></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#emergenze"><i class="fa-solid fa-kit-medical fa-xl iconeNavbar"></i>
              Emergenza</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#numeri"><i class="fa-solid fa-phone fa-xl iconeNavbar"></i>
              Numeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./php/landing_quiz.php#inizio"><i class="fa-solid fa-graduation-cap fa-xl iconeNavbar"></i> Formazione</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container" id="spazioNavbarContainer">
    <div class="row">
      <div class="col-12 col-lg-6">
        <p class="display-4">
          Perchè stare a guardare? Impara
          <span class="coloreRossoIconeScritte">tecniche</span> di pronto soccorso e
          salva una <span class="coloreRossoIconeScritte">vita</span>!
        </p>
        <p>
          Heartbeat è un progetto nato con l'obiettivo di aiutare le persone
          in situazioni di emergenza sanitaria. Il sito contiene delle guide
          step-by-step per affrontare le problematiche mediche più comuni e
          fornisce consigli per uno stile di vita più sano ed equilibrato.
        </p>
      </div>
      <div class="col-12 col-lg-6">
        <center>
          <img src="./img/healthcare.png" class="img-fluid" id="logoHome" />
        </center>
      </div>
    </div>
  </div>
  <div class="container spazioTraSezioni">
    <p class="display-5 text-center spazioTitoloContenutoSezione" id="emergenze">Situazioni D'Emergenza</p>
    <div class="row">
    <?php
      include './php/connect.php';

      $sql = 'select * from Malore order by codice asc';
      $query = mysqli_query($conn,$sql);
      foreach($query as $q){
      $path = "./php/malore.php?codice={$q['codice']}"; ?>
      <div class="col-6 col-md-4 col-lg-3 spazioVerticaleCards">
        <a href=<?php echo $path;?> class="text-decoration-none text-black">
          <div class="card sfondoGrigioCards">
            <div class="card-body">
              <center>
                <i class="fa-solid fa-5x coloreRossoIconeScritte <?php echo $q['icona'];?>"></i>
              </center>
              <br />
              <h5 class="card-title text-center"><?php echo $q['nome']; ?></h5>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    </div>
  </div>

  <div class="container spazioTraSezioni">
    <p class="text-center display-5 spazioTitoloContenutoSezione" id="numeri">Numeri D'Emergenza</p>
    <table class="table table-borderless table-striped" style="padding-top: 20px">
      <thead class="text-white" id="coloreRossoTabellaHome">
        <tr>
          <th scope="col"></th>
          <th scope="col">Proprietario</th>
          <th scope="col">Numero</th>
        </tr>
      </thead>
      <tbody>
      <?php
      include './php/connect.php';

      $sql = 'select * from Numero where paese="Italia" order by codice asc';
      $query = mysqli_query($conn,$sql);
      foreach($query as $q){?>
        <tr>
          <th scope="row"><i class="fa-solid iconeNavbar <?php echo $q['icona'];?> fa-2xl fa-fw"></i></th>
          <td><?php echo $q['proprietario'];?></td>
          <td><?php echo $q['numero'];?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

  </div>

  <div class="container">
    <footer>
    <hr>
      <center><img src="./img/Logo1.png" class="img-fluid" id="iconaFooter"/></center>
      <ul class="nav justify-content-center">
        <li class="nav-item"><a href="https://www.salute.gov.it/portale/home.html"
            class="nav-link px-2 text-black">Ministero della Salute</a></li>
        <li class="nav-item"><a href="https://www.my-personaltrainer.it/" class="nav-link px-2 text-black">My Personal
            Trainer</a></li>
        <li class="nav-item"><a href="https://www.starbene.it/" class="nav-link px-2 text-black">StarBene</a></li>
        <li class="nav-item"><a href="https://www.medicitalia.it/" class="nav-link px-2 text-black">MedicItalia</a></li>
      </ul>
      <p class="text-center">&copy; 2022 HeartBeat, Inc</p>
    </footer>
  </div>
</body>

</html>