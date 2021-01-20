<?php
session_start();
if (isset($_SESSION['zalogowany']))
{
    echo '<script>';
    echo 'alert("Zostałeś wylogowany");';
    echo 'window.location = "main.php";';
    echo '</script>';
    session_destroy();
   $_SESSION['zalogowany'] = null;
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="minilogo.png" type="image/x-icon" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer-style.css">
  <link rel="stylesheet" href="laptop-style.css">
  <title>Książko-landia</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c22f07ca69.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

 //-------------------------------------FIRST PAGE-------------------------------------------------------------------------------------
<body>
<div id="big-container">
  <div class="firstpage" id="frstpage">
    <div class="baner">
      <div class="logo">
        <a href="main.php"><img class="zdj lazyloaded" src="logo2.jpg" alt="minilogo" scale="0"></a>
      </div>
      <h2 class="main_logo animate__animated animate__heartBeat"><a>Książko-landia</a></h2>
      <input type="checkbox" id="klik">
      <label for="klik" class="button">
        <div class="cont" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </label>
      <div class="menu">
        <ul>
          <li class="hid"><a href="#" data-text="li1">Zaloguj się!</a></li>
          <li><a href="register.php" data-text="li2">Rejestracja</a></li>
          <li><a href="register.php" data-text="li3">Lista książek</a></li>
          <li><a href="#stopka" data-text="li4">O nas</a></li>
        </ul>
      </div>
    </div>
    <div id="loguj">
      <h4 id="formhead">Zaloguj się!</h4>
      <form method="post" action="<?php $_PHP_SELF ?>">
        <a id="txt">Login: </a><input class="formularz" placeholder="Podaj login" name="login" type="text"></br>
        <a id="txt">Hasło: </a><input class="formularz" placeholder="Podaj haslo" name="haslo" class="pass"
          type="password"></br>
        <input name="add" class="zalog btn btn-lg" style="background-color: #03989e; color:white;" type="submit"
          id="add" value="Zaloguj">
      </form>
      <!-- Login script (PHP) -------------------------------------------------------------------------->
      <?php 
      
    
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "t03_biblioteka";
      $conn = mysqli_connect($servername, $username, $password, $dbname);
       if (!$conn)
       {
           die("Nie udało się: " . mysqli_connect_error());
       }
      if (isset($_POST['login'] ) and isset($_POST['haslo']))
       {
           $login = $_POST['login'];
           $haslo = $_POST['haslo'];
           $pepper = 'PBD';
           $sól = $conn->query("SELECT * FROM `user` WHERE login = '$login'");
           $row = mysqli_fetch_assoc($sól);
           @$mocnehaslo = $haslo.$row['salt'].$pepper;
           $hashuj = hash('sha512', $mocnehaslo);
           $query = "SELECT * FROM `user` WHERE login = '$login' AND password = '$hashuj'";
           $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
           
           $count = mysqli_num_rows($result);

           if($count == 1)
           {
               $_SESSION['login'] = $login;
               $_SESSION['zalogowany'] = true;
               header('Location: secret.php');
           }
           else
           {
               echo '<span class="text-danger">Nieprawidłowy login lub hasło.</span>';
           }
       }
  ?>


    </div>

    <header class="animate__animated animate__backInLeft">Witaj w naszej bibliotece!</header>
    <nav class="animate__animated animate__backInRight">
      <ul>
        <a href="register.php" style="text-decoration: none;">
          <li>Kliknij i dołącz!</li>
        </a>
      </ul>
    </nav>

    <div class="navigator animate__animated animate__bounceInUp"><i class="arrow fas fa-angle-double-down"></i></div>
    <img class="photo lazyloaded" src="slide.jpg" alt="minilogo2" scale="0"></a>
  </div>
  <div id="secondpage">
    <h1>Co otrzymujesz od naszej aplikacji?</h1>
    <div class="card-container">
      <div class="cards-reverse firstcard" id="firstcard">
        <img src="calendar.png" alt="kalendar">
        <div class="opisik">
          <h4>Oddawaj książki na czas!</h4>
          <p2>Nasza strona oferuje ci sprawdzenie posiadanych książek oraz pokaże Ci termin do oddania ich.</p2>

        </div>
      </div>
      <div class="cards">
        <img src="compuer.png" alt="kalendar">
        <div class="opisik">
          <h4>Bez wychodzenia z domu!</h4>
          <p2>Nie musisz ruszać się z domu jeśli zapomnisz jaką wypożyczoną książke masz w domu oraz kiedy masz ją
            oddać.</p2>

        </div>
      </div>
      <div class="cards-reverse secondcard" id="">
        <img src="keys.png" alt="kalendar">
        <div class="opisik">
          <h4>Własne, darmowe konto!</h4>
          <p2>W naszej bibliotece dysponujesz własnym kontem, które ułatwia Ci wiele rzeczy.</p2>
        </div>
      </div>
    </div>
    <div class="navigators">
      <div class="navigatorup"><i class="arrowup fas fa-arrow-up"></i></div>

    </div>



    <?php  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "t03_biblioteka";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn)
        {
            die("Nie udało się: " . mysqli_connect_error());
        }
        
      $ile = $conn->query("SELECT * FROM  `books`");
      $foto = [];
      $row = [];
      $rows = mysqli_num_rows($ile);
      $bookfol = "books/";
    
      
        $fantasydemo = $conn->query("SELECT * FROM `books` JOIN `categories` ON `categories`.`id_categories` = `books`.`id_categories`  WHERE `books`.`id_categories` = 3 limit 4");
        $scifidemo = $conn->query("SELECT * FROM `books` JOIN `categories` ON `categories`.`id_categories` = `books`.`id_categories`  WHERE `books`.`id_categories` = 7 limit 4");
        $horrordemo = $conn->query("SELECT * FROM `books` JOIN `categories` ON `categories`.`id_categories` = `books`.`id_categories`  WHERE `books`.`id_categories` = 1  limit 4");
        $lekturademo = $conn->query("SELECT * FROM `books` JOIN `categories` ON `categories`.`id_categories` = `books`.`id_categories`  WHERE `books`.`id_categories` = 8  limit 4");
        $familydemo = $conn->query("SELECT * FROM `books` JOIN `categories` ON `categories`.`id_categories` = `books`.`id_categories`  WHERE `books`.`id_categories` = 5  limit 4");
    ?>



    <div id="pagethree">
      <div class="tytul">
        <span class="nag2 display-2">Książki na czasie! </span></br>
        <a href="register.php"><button type="button" id="books_button" style=" height:60px;
       -webkit-box-shadow: 13px 13px 13px 0px rgba(0,0,0,0.75);
      -moz-box-shadow: 13px 13px 13px 0px rgba(0,0,0,0.75);
      box-shadow: 13px 13px 13px 0px rgba(0,0,0,0.75);" class="buttonik btn btn-info">Zarejestruj się i zobacz wszystkie!</button><a>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-info"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-info"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-info"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3" class="bg-info"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4" class="bg-info"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="opis bg-info text-center">
              <p>Fantastyka</p>
            </div>
            <div class="wiersze">
<?php
    while($fantasy_demo_row = mysqli_fetch_assoc($fantasydemo)) 
    { 
       echo '<div class="card" style="width: 12vw;">';
       echo ' <img class="card-img-top" style="height: 20vw;" src="'.$bookfol.$fantasy_demo_row['photo'].'" alt="Card image cap">';
       echo '<div class="card-body" style="height: 9vw;">';
       echo ' <h5 class="card-title text-center font-weight-bold">'.$fantasy_demo_row['title'].'</h5>';
       echo '<p class="card-text">'.$fantasy_demo_row['description'].'</p>';
       echo '<a href="register.php" class="btn btn-info text-center">Wypożycz!</a>';
       echo  '</div>';
       echo '</div>'; 
    }  
?>
            </div>
          </div>

          <div class="carousel-item">
            <div class="opis bg-info text-center">
              <p>SCI-FI</p>
            </div>

            <div class="wiersze">
 <?php
    while($sci_fi_demo_row = mysqli_fetch_assoc($scifidemo)) 
    {
       echo '<div class="card" style="width: 12vw;">';
       echo ' <img class="card-img-top" style="height: 20vw;" src="'.$bookfol.$sci_fi_demo_row['photo'].'" alt="Card image cap">';
       echo '<div class="card-body" style="height: 9vw;">';
       echo ' <h5 class="card-title  text-center font-weight-bold">'.$sci_fi_demo_row['title'].'</h5>';
       echo '<p class="card-text">'.$sci_fi_demo_row['description'].'</p>';
       echo '<a href="register.php" class="btn btn-info">Wypożycz!</a>';
       echo  '</div>';
       echo '</div>';    
    }   
  ?>
            </div>
          </div>

          <div class="carousel-item">
            <div class="opis bg-info text-center">
              <p>Horror</p>
            </div>
            <div class="wiersze">
<?php
    while($horror_demo_row = mysqli_fetch_assoc($horrordemo))
    {
       echo '<div class="card" style="width: 12vw;">';
       echo ' <img class="card-img-top" style="height: 20vw;" src="'.$bookfol.$horror_demo_row['photo'].'" alt="Card image cap">';
       echo '<div class="card-body" style="height: 9vw;">';
       echo ' <h5 class="card-title  text-center font-weight-bold">'.$horror_demo_row['title'].'</h5>';
       echo '<p class="card-text">'.$horror_demo_row['description'].'</p>';
       echo '<a href="register.php" class="btn btn-info">Wypożycz!</a>';
       echo  '</div>';
       echo '</div>';
  
    }
?>
            </div>
          </div>

          <div class="carousel-item">
            <div class="opis bg-info text-center">
              <p>Lektura</p>
            </div>
            <div class="wiersze">
              <?php
    while($lektura_demo_row = mysqli_fetch_assoc($lekturademo)) { //tworzymy tablice z rekordami po czym "przelatujemy" przez wszystkie po kolei
      
      
       
       echo '<div class="card" style="width: 12vw;">';
       echo ' <img class="card-img-top" style="height: 20vw;" src="'.$bookfol.$lektura_demo_row['photo'].'" alt="Card image cap">';
       echo '<div class="card-body" style="height: 9vw;">';
       echo ' <h5 class="card-title  text-center font-weight-bold">'.$lektura_demo_row['title'].'</h5>';
       echo '<p class="card-text h5">'.$lektura_demo_row['description'].'</p>';
       echo '<a href="register.php" class="btn btn-info">Wypożycz!</a>';
       echo  '</div>';
       echo '</div>';
         

      
    }
    

  
    
  ?>
            </div>
          </div>

          <div class="carousel-item">
            <div class="opis bg-info text-center">
              <p>Familijne</p>
            </div>
            <div class="wiersze">
              <?php
                while($family_demo_row = mysqli_fetch_assoc($familydemo))
                 { 
                  echo '<div class="card" style="width: 12vw;">';
                  echo ' <img class="card-img-top" style="height: 20vw;" src="'.$bookfol.$family_demo_row['photo'].'" alt="Card image cap">';
                  echo '<div class="card-body" style="height: 9vw;">';
                  echo ' <h5 class="card-title  text-center font-weight-bold">'.$family_demo_row['title'].'</h5>';
                  echo '<p class="card-text h5">'.$family_demo_row['description'].'</p>';
                  echo '<a href="register.php" class="btn btn-info">Czytaj więcej!</a>';
                  echo  '</div>';
                  echo '</div>';
                }
    

  
    
              ?>
            </div>
          </div>




          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="fas fa-angle-double-left text-info display-4"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="fas fa-angle-double-right text-info display-4" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>


      <div class="questions ">
        <h2 class="nag3 display-2">Najczęściej zadawane pytania(FAQ)<i class="far fa-question-circle"></i></h2>
        <p>

          <button class="faq btn btn-primary  w-75" type="button" data-toggle="collapse" data-target="#collapseExample1"
            aria-expanded="false" aria-controls="collapseExample">

            Czy konto w serwisie jest darmowe?
            <i class="fas fa-caret-down"></i>
          </button>
        </p>
        <div class="collapse margines" id="collapseExample1">
          <div class="card card-body  bg-light display-4">
            Tak, konto w serwisie jest całkowicie darmowe, jedyne co trzeba poświęcić to czas na założenie go.
          </div>
        </div>
        <button class=" faq btn btn-primary w-75" type="button" data-toggle="collapse" data-target="#collapseExample2"
          aria-expanded="false" aria-controls="collapseExample">

          Czy aby założyć i aktywować swoje konto trzeba być stacjonarnie w bibliotece?
          <i class="fas fa-caret-down"></i>
        </button>
        </p>
        <div class="collapse" id="collapseExample2">
          <div class="card display-4 card-body">
            Nie, konto możesz założyć online bez aktywowania go.
          </div>
        </div>

        <button class="faq btn btn-primary  w-75" type="button" data-toggle="collapse" data-target="#collapseExample3"
          aria-expanded="false" aria-controls="collapseExample">

          Ile czasu trzeba poświęcić na założenie konta?
          <i class="fas fa-caret-down"></i>
        </button>
        </p>
        <div class="collapse" id="collapseExample3">
          <div class="card display-4 card-body">
            To zależy jak szybko potrafisz pisać swoje dane, średnio trwa to minute.
          </div>
        </div>

        <button class="faq btn btn-primary  w-75 " type="button" data-toggle="collapse" data-target="#collapseExample4"
          aria-expanded="false" aria-controls="collapseExample">

          Co otrzymujemy od serwisu?
          <i class="fas fa-caret-down"></i>
        </button>
        </p>
        <div class="collapse" id="collapseExample4">
          <div class="card display-4 card-body">
            Od serwisu otrzymujesz informacje o swoich wypożyczeniach, jakie książki posiadasz i do kiedy musisz je
            zwrócić, oraz posiadasz ułatwiony kontakt z nami!
          </div>
        </div>

        <button class="faq btn  w-75 " type="button" data-toggle="collapse" data-target="#collapseExample5"
          aria-expanded="false" aria-controls="collapseExample">

          Jak zobaczyć jakie mamy obecnie wypożyczone książki?
          <i class="fas fa-caret-down"></i>
        </button>
        </p>
        <div class="collapse" id="collapseExample5">
          <div class="card display-4 card-body">
            Musisz sie zalogować na swoje konto, które posiada przejrzysty widok i zerknąć w miejsce "wypożyczenia".
          </div>
        </div>
      </div>

    </div>
    <div class="stopka container-fluid" id="stopka">
      <section id="contact">

        <h2 class="section-header">Skontaktuj się z nami!</h2>

        <div class="contact-wrapper">
          <form class="form-horizontal" role="form" method="post" action="main.php">

            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="name" placeholder="IMIĘ" name="name" value="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="E-MAIL" name="email" value="">
              </div>
            </div>

            <textarea class="form-control" rows="10" placeholder="WIADOMOŚĆ" name="message"></textarea>

            <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">

              WYŚLIJ </button>

          </form>
          <!-- <?php
//      $servername = "localhost";
//      $username = "root";
//      $password = "";
//      $dbname = "t03_biblioteka";
 
//      $conn = mysqli_connect($servername, $username, $password, $dbname);
//      if (!$conn)
//      {
//          die("Nie udało się: " . mysqli_connect_error());
//      }
//       $name = $_POST['name'];
// $email = $_POST['email'];
// $message = $_POST['message'];
// $formcontent="From: $name \n Message: $message";
// $recipient = "jakub.paluch5@gmail.com";
// $subject = "Contact Form";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
// echo "Thank You!";
              ?>  -->



          <div class="direct-contact-container">

            <ul class="contact-list">
              <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">Promienna 65,
                    Jaworzno</span></i></li>

              <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a
                      href="tel:515 277 100" title="Give me a call">515 277 100</a></span></i></li>

              <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a
                      href="mailto:jakub.paluch5@gmail.com"
                      title="Send me an email">jakub.paluch5@gmail.com</a></span></i></li>

            </ul>

            <hr>
            <ul class="social-media-list">
            <a href="https://www.facebook.com/jakub.paluch.353/"  class="contact-icon"><li>
                  <i class="fab fa-facebook-f"></i>
              </li></a>
              <li><a href="#" target="_blank" class="contact-icon">
                  <i class="fab fa-snapchat-ghost"></i></a>
              </li>
              <li><a href="https://www.instagram.com/kubex_593/" target="https://www.instagram.com/"
                  class="contact-icon">
                  <i class="fa fa-instagram" aria-hidden="true"></i></a>
              </li>
              <li><a href="#" target="_blank" class="contact-icon">
                  <i class="fab fa-google"></i></a>
              </li>
            </ul>
            <hr>

            <div class="copyright">&copy; WSZELKIE PRAWA ZASTRZEŻONE</div>

          </div>

        </div>

      </section>


    </div>
    

























    <script src="slidescript.js"></script>

</body>





</html>