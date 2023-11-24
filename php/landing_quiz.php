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
    <?php
        include './connect.php';
        $sql = "select * from Malore order by codice asc";
        $query = mysqli_query($conn,$sql);
    ?>
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
      <div class="row">
        <div class="col-12 col-lg-6">
          <p class="display-4">
            Benvenuto nella sezione di quiz di <span class="coloreRossoIconeScritte">Heartbeat</span>!<br>
            Cosa sai sul primo soccorso? 
          </p>
        </div>
        <div class="col-12 col-lg-6">
          <center>
            <img
              src="../img/HomeQuiz.png"
              class="img-fluid"
              style="max-width: 60%"
            />
          </center>
        </div>
      </div>
    </div>

    <div class="container spazioTraSezioni" >
      <p class="text-center display-5 " id="numeri" ">Quiz per Categoria</p>
      <div class="row row-cols-1 row-cols-md-4 g-4">

        
        <?php 
            foreach ($query as $q) {
            $path = "./quiz_view.php?codice={$q['codice']}";
        ?>
            <div class="col">
            <a href=<?php echo $path; ?> class="linkSenzaModifiche">
                <div class="card no-border-radius" >
                <div class="card-body">
                    
                    <div class="card-title row text-center">
                        <div class="col-2">
                            <i class="fa-solid fa-2x <?php echo $q['icona'];?> coloreRossoIconeScritte"></i>
                        </div>
                        <div class="col-10">
                            <span class="text-bold-20">
                            <?php echo $q['nome'] ?>
                            </span>
                        </div>
                        
                        
                    </div>
                    
                    
                </div>
                </div>
            </a>
            </div>
        <?php }?>

      </div>
    </div> 

    <div class="container spazioTraSezioni">
      <p class="text-center display-5 spazioTitoloContenutoSezione" id="numeri">Quiz su Tutto</p>
      <div class="col-md-6 offset-md-3">
        
        
        <a href="generic_quiz.php" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
          <div class="d-flex gap-2 w-100 justify-content-center" >
            <div>
              <h6 >Prova il nostro quiz generale</h6>
            </div>
          </div>
        </a>
        

      


      </div>
    </div> 


    <div class="container">
      <div class="col-12">
        <hr style="margin-top:40px;height:1px;border-width:0;color:#fbfbfb;background-color:gray">
      </div>
      <footer>
        <center><img src="../img/Logo1.png" class="img-fluid" width="80" /></center>
        <ul class="nav justify-content-center">
          <li class="nav-item"><a href="https://www.salute.gov.it/portale/home.html" class="nav-link px-2 text-black">Ministero della Salute</a></li>
          <li class="nav-item"><a href="https://www.my-personaltrainer.it/" class="nav-link px-2 text-black">My Personal Trainer</a></li>
          <li class="nav-item"><a href="https://www.starbene.it/" class="nav-link px-2 text-black">StarBene</a></li>
          <li class="nav-item"><a href="https://www.medicitalia.it/" class="nav-link px-2 text-black">MedicItalia</a></li>
        </ul>
        <p class="text-center">&copy; 2022 HeartBeat, Inc</p>
      </footer>
    </div>
  </body>
</html>
