<!DOCTYPE html>
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
  <link rel="icon" type="image/x-icon" href="../img/healthcare.png" />
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontAwesome/css/all.css" />
  <script src="../js/jquery.js" > </script>
  <script src="../js/myJS.js" > </script>
  <script src="../bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../fontAwesome/js/all.js"></script>

  <link rel="stylesheet" href="../css/style.css" />

</head>

<body id="inizio">
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
        <a class="navbar-brand" href="../index.php#inizio"><img src="../img/logo2.png" class="img-fluid" id="logoNavbar" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php#emergenze"><i
                    class="fa-solid fa-kit-medical fa-xl iconeNavbar"></i>
                Emergenza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../index.php#numeri"><i class="fa-solid fa-phone fa-xl iconeNavbar"></i>
                Numeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./landing_quiz.php#inizio"><i class="fa-solid fa-graduation-cap fa-xl iconeNavbar"></i> Formazione</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
  
  <div class="container" id="spazioNavbarContainer">
  <?php
      include './connect.php';
      $cod = $_GET['codice'];
      $sql = "select * from Malore where codice={$cod}";
      $query = mysqli_query($conn,$sql);
      foreach($query as $q){ ?>
    <p class="display-4 text-center"><?php echo $q['nome']; ?></p>
    <div class="row spazioTraSezioni">
      <div class="col-12 col-lg-6">
        <center>
          <i class="fa-solid fa-10x coloreRossoIconeScritte <?php echo $q['icona'];?>"></i>
        </center>
        
      </div>
      <div class="col-12 col-lg-6">
        <p>
          <?php echo utf8_encode($q['descrizione']);?>
        </p>
        
      </div>
    </div>
  </div>

  <div class="container spazioTraSezioni">
    <table class="table table-borderless table-striped">
      <thead class="text-white" id="coloreRossoTabellaHome">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Sintomi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $arr_sintomi = json_decode(utf8_encode($q['sintomi']));
            $counter = 1;
            foreach ($arr_sintomi as $sintomo){
                echo '<tr>';
                echo '<th scope="row">'.$counter++.'</th>';
                echo '<td>'.$sintomo.'</td>';
                echo '</tr>';
                
            }
        ?>
      </tbody>
    </table>
  </div>

  <div class="container spazioTraSezioni">
    <p class="display-6 text-center">Che cosa posso fare?</p>
    <ol class="list-group list-group-numbered" id="bordoVerdeTabella">
        <?php 
        
            $arr_fare =  json_decode(utf8_encode($q['fare']));
            foreach ($arr_fare as $fare){
                echo '<li class="list-group-item d-flex">';
                echo '<div class="ms-2 me-auto">'.$fare.'</div></li>';
            }
        ?>
    </ol>
  </div>

  <div class="container spazioTraSezioni">
    <p class="display-6 text-center text">Che cosa non devo fare?</p>
    <ol class="list-group list-group-numbered" id="bordoRossoTabella">

        <?php 
        
            $arr_fare =  json_decode(utf8_encode($q['non_fare']));
            foreach ($arr_fare as $non_fare){
                echo '<li class="list-group-item d-flex">';
                echo '<div class="ms-2 me-auto">'.$non_fare.'</div></li>';
            }
        ?>
    </ol>
  </div>
  <?php } ?>
  
  <div class="container">
  <hr>
    <footer>
      <center><img src="../img/Logo1.png" class="img-fluid" id="iconaFooter"/></center>
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