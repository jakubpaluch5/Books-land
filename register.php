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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="minilogo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="regstyle.css">
    <link rel="stylesheet" href="laptop-style.css">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c22f07ca69.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

    <div class="firstpage">
    <a href="main.php"><div class="navigatorleft"><i class="fas fa-arrow-left"></i></i></div></a>

        <div class="rejestruj">
            <div class="leftside">
                
            </div>
            <div class="rightside">
                <div class="formularz">
         
         
       


<form method="post" action="<?php $_PHP_SELF ?>">
<h1 id="FormHeader">Zarejestruj Się!</h1>

<label class="RegFormLabel" for="name">Imię:</label>
  <input class="RegFormInput" type="text" id="name"  name="imie">

  <label class="RegFormLabel" for="name">Nazwisko:</label>
  <input class="RegFormInput" type="text" id="name"  name="nazwisko">

  <label class="RegFormLabel" for="name">Login:</label>
  <input class="RegFormInput" type="text" id="name"  name="login">

  <label class="RegFormLabel" for="mail">E-mail:</label>
  <input class="RegFormInput" type="email" id="mail"  name="email">

  <label class="RegFormLabel" for="password">Hasło:</label>
  <input class="RegFormInput" type="password"  id="password" name="haslo">

  <label class="RegFormLabel" for="password">Powtórz hasło:</label>
  <input class="RegFormInput" type="password"  id="password" name="haslodwa">

 







<button name="add" id="RegFormButton" type="submit">Rejestruj!</button>
</form>
<?php 
        if(isset($_POST['add'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "t03_biblioteka";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn)
            {
                die("Nie udało się: " . mysqli_connect_error());
            }



            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslodwa = $_POST['haslodwa'];
            $duplicatelogin=mysqli_query($conn,"select * from user where login='$login'");
            $duplicatemail=mysqli_query($conn,"select * from user where email='$email'");
            $min = strlen($haslo);

            
            if(empty($login)) 
            {
                echo '<p class="text-danger">Login nie może być pusty!</p>';
            }
            elseif($haslo != $haslodwa)
            {
            
            
                echo '<p class="text-danger">Hasła muszą się zgadzać!</p>';
            
            }
            elseif($min < 8)
            {
                echo '<p class="text-danger">Hasło musi mieć co najmniej 8 liter!</p>';
            }
            elseif(mysqli_num_rows($duplicatemail)>0)
            {
               
                
                
                
            echo '<p class="text-danger">Na ten e-mail jest już założone konto!</p>';
            }
            
            elseif(mysqli_num_rows($duplicatelogin)>0)
            {
               
                
                
                
            echo '<p class="text-danger">Login już istnieje!</p>';
            }
                    
            
            else
            {

                $curr = time();
                $pepper = 'PBD';
                $mocnehaslo = $haslo.$curr.$pepper;
                $hash = hash('sha512', $mocnehaslo);
                $sql = "INSERT INTO user (imie, nazwisko, email, login, password, reg_time, salt) VALUES ('$imie', '$nazwisko','$email', '$login', '$hash', NOW(), $curr)";
                if (mysqli_query($conn, $sql))
                {
                    echo '<script>';
                    
                     echo 'window.location = "main.php";';
                     echo 'alert("Zostałeś Zarejestrowany");';
                     echo '</script>';
                    
                    
                    

                }
                else
                {
                    echo "Nie udało się zalogować: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }

            
        }
        ?> 

        </div>
        </div>
        </div>
        </div>
      

</body>

</html>