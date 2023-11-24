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
      $cod = $_GET['codice'];
      $sql = "select * from Quiz order by RAND() limit 20";
      $query1 = mysqli_query($conn,$sql);
      $sql = "select * from Malore where codice = {$cod}";
      $query2 = mysqli_query($conn,$sql);
      
    ?>
  </head>

  <body >

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


    <div class="container-fluid sfondoGrigioQuiz" id="spazioNavbarContainer">
        <div class="row">
            <div class="col-md-4 offset-md-4 mb-3 col-10 offset-1" id="title-quiz">

                <h2 class="pt-1 px-2">Quiz Generale</h2>
            </div>
            
            <?php foreach($query1 as $q) { ?>
                <div class="col-md-4 offset-md-4 mb-3 col-10 offset-1 quiz-container" id=<?php echo $q['codice']."_div"; ?> >
                    <p class="pt-4 px-2">
                        <?php echo utf8_encode($q['descrizione']) ?>
                    </p>

                    <div class="btn-group  col-md-8 offset-md-2 col-12  pb-3 " role="group">
                        <input type="radio" class="btn-check" name=<?php echo $q['codice']; ?> value="1" id=<?php echo $q['codice']."_1"; ?> >
                        <label class="btn btn-outline-danger" for=<?php echo $q['codice']."_1"; ?>>Vero</label>

                        <input type="radio" class="btn-check" name=<?php echo $q['codice']; ?> value="0" id=<?php echo $q['codice']."_0"; ?> >
                        <label class="btn btn-outline-danger" for=<?php echo $q['codice']."_0"; ?>>Falso</label>

                    </div>
                </div>
            <?php }?>

            <div class="col-md-4 offset-md-4 mb-3 col-10 offset-1 d-grid pb-4 " id="div_invia">
                <input type="button" class="btn btn-primary" id="risolvi_quiz" value="Invia" onclick="soluzioneQuiz()" >
            </div>
            <div class="col-md-4 offset-md-4 mb-3 col-10 offset-1 d-grid pb-4 text-center " >
                <p id="resultQuiz" style="display: none; font-size: 25px;"></p>
            </div>

        </div>
        <script>

            function soluzioneQuiz(){

                $(".btn-group input[type='radio']").prop("disabled", true);
                let nCorrect = 0;
                let nQuiz = 0
                <?php foreach($query1 as $q){?>
                    nQuiz++;
                    if($('input[name='+<?php echo $q['codice']?>+']:checked').val()==<?php echo $q['corretto'] ?>)
                    {
                        nCorrect++;
                        $('<?php echo "#".$q['codice']."_div"; ?>').css("background-color", "#b2ff59");
                    }
                    else{
                        $('<?php echo "#".$q['codice']."_div"; ?>').css("background-color", "#ff867f");
                    }
                <?php } ?>
                $("#div_invia").remove();
                $('#resultQuiz').text('Score: '+nCorrect+'/'+nQuiz);
                $('#resultQuiz').css("display","");

            }
        </script>
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
