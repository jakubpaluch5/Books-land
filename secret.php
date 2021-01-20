<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
    
    
    
   
    echo '<script>';
    echo 'alert("Zaloguj sie!");';
    echo 'window.location = "main.php";';

    echo '</script>';
    session_destroy();
    
   $_SESSION['zalogowany'] = null;
}


?>

<doctype html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="minilogo.jpg" type="image/x-icon" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="secstyle.css">
		<link rel="stylesheet" href="laptop-style.css">
		<title>Rejestracja</title>
	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/c22f07ca69.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	</head>

	<body>


		<div class="firstpage">
			<div class="baner">
				<div class="logo">
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
	
	
				
				$uzytkownik = $_SESSION['login'];
				
				$imie=mysqli_query($conn,"select imie from user where login='$uzytkownik'");
				$nazwisko=mysqli_query($conn,"select nazwisko from user where login='$uzytkownik'");
				
				$row = mysqli_fetch_assoc($imie);
				$rownaz = mysqli_fetch_assoc($nazwisko);
	
				echo '<h2>Witaj '.$row['imie'].' '.$rownaz['nazwisko'].'!'.'</h2>';
				
				?>

				</div>


			</div>
			<div class="panelek">
				<?php
				 $user_avatar=mysqli_query($conn,"select avatar from user where login='$uzytkownik'");
				 $fetched_avatar = mysqli_fetch_assoc($user_avatar);
				 $avatar_patch = 'avatary/';
				 echo '<img src="'.$avatar_patch.$fetched_avatar['avatar'].'" alt="avek3" id="select">';
				 echo '<p id="hiddensession" style="display: none;">'.$uzytkownik.'</p>';
				 $user_login=mysqli_query($conn,"select login from user where login='$uzytkownik'");
				 $fetched_user_login = mysqli_fetch_assoc($user_login);
				 echo '<h3>Zalogowano jako <b>'.$fetched_user_login['login'].'</b></h3>';
				?>
				<div id="zakladki_container">
					<div class="zakladki" id="informations" onclick="informations()"><i class="fas fa-user-alt"></i><a>Informacje<a></div>
					<div class="zakladki" id="messages"  onclick="contactus()"><i class="fas fa-envelope "></i><a>Wiadomości</a></div>
					<div class="zakladki" id="ownedbooks" onclick="showownedbooks()"  ><i class="fas  fa-book"></i><a>Posiadane książki</a></div>
					<div class="zakladki"  id="passchange" onclick="passwordchange()" ><i class="fas fa-users-cog "></i><a>Zmień hasło</a></div>
					<div onclick="window.location='logout.php'; alert('zostales wylogowany');" class="zakladki"><i class="fas fa-arrow-circle-left"></i><a>Wyloguj</a></div>

				</div>



			</div>
			
			<div class="content">
			
				<div id="user-profile-container">
					<div id="user-profile-body">
						<div id="user-profile-body-title">
							<h1>Drogi użytkowniku!</h1>
							
						</div>
						<p id="letter">Bardzo miło Cię witać w tym miejscu, aplikacja została stworzona w charakterze informacyjnym jej zadaniem jest ułatwić Ci zarządzanie Twoimi wypożyczonymi książkami. Z wyrazami szacunku mam zaszczyt prosić Cię abyś używał tej strony zgodnie z jej przeznaczeniem. Wszelkie nie zgodności i błędy zgłaszaj w zakładce wiadomości. Miłego czytania.</p>
						<p id="autograf">Pozdrawiam twórca strony.</p>
					</div>
			</div>
			<?php
			 if(isset($_POST['add']))
			 {
				 $servername = "localhost";
				 $username = "root";
				 $password = "";
				 $dbname = "t03_biblioteka";
				 $conn = mysqli_connect($servername, $username, $password, $dbname);
				 if (!$conn){die("Nie udało się: " . mysqli_connect_error());}
					 $login = $_SESSION['login'];
					 $old = $_POST['old'];
					 $newone = $_POST['newone'];
					 $newtwo = $_POST['newtwo'];
					 $pepper = 'PBD';
					 $haslozbazy = $conn->query("SELECT `password` FROM `user` WHERE login = '$login'");
					 $pass = mysqli_fetch_assoc($haslozbazy);
				 
					 $sol = $conn->query("SELECT * FROM `user` WHERE login = '$login'");
					 $row = mysqli_fetch_assoc($sol);
					 
					 @$staremocnehaslo = $old.$row['salt'].$pepper;
					 $hashuj = hash('sha512', $staremocnehaslo);
					 $starehaslo=mysqli_query($conn,"select password from user where login=$login");
					 $min = strlen($newone);
						 if(empty($old))
						 {
							echo '<script>';
							echo 'alert("Stare hasło nie może być puste!");';
							echo '</script>';
							
						 }
						 elseif(empty($newone))
						 {
							echo '<script>';
							echo 'alert("Nowe hasło nie może być puste!");';
							echo '</script>';
							
						 }
						 elseif(empty($newtwo))
						 {
							echo '<script>';
							echo 'alert("Pole Powtórz nowe hasło nie może być puste!");';
							echo '</script>';
							 
						 }
						 elseif($newone != $newtwo)
						 {
							echo '<script>';
							echo 'alert("Nowe hasła nie zgadzają się!");';
							echo '</script>';
							 
						 }
						 elseif($min < 8)
						 {
							echo '<script>';
							echo 'alert("Minimalna długość hasła to 8 znaków!");';
							echo '</script>';
							 
						 }
						 elseif($pass['password'] != $hashuj)
						 {
							echo '<script>';
							echo 'alert("Stare hasło nie zgadza się!");';
							echo '</script>';
							
						 }
						 else
						 {
							 @$nowehaslo = $newone.$row['salt'].$pepper;
							 $nowyhash = hash('sha512', $nowehaslo);
							 $zmiana = "UPDATE user 
										SET password = '$nowyhash' 
										WHERE login ='$login'";
							 if ($conn->query($zmiana) === true)
								 {                                                                                                                                       
									 $_SESSION['udanazmiana']=true;
									 echo '<script>';
									 echo 'alert("Pomyślnie zmieniono hasło do tego konta!");';
									 echo '</script>';
									                                   
								 }						
						 }
			 } 
			?>
				</div>

			<div id="avatar_selector">
				<i class="fas fa-times"></i>
				<h1 class="text-center">Wybierz swój avatar!</h1>
				<div id="avatary_rzad_jeden" class="text-center">
					<img src="avatary/avatar1.png" alt="avatar1" id="avatar1">




					<img src="avatary/avatar2.png" alt="avek1" id="avatar2">




					<img src="avatary/avatar3.png" alt="avek2" id="avatar3">
				</div>
				<div id="avatary_rzad_dwa" class="text-center">
					<img src="avatary/avatar4.png" alt="avek" id="avatar4">
					<img src="avatary/avatar5.png" alt="avek1" id="avatar5">
					<img src="avatary/avatar6.png" alt="avek2" id="avatar6">
				</div>
			</div>
		</div>

		<script src="jquery-3.5.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="avatarchange.js"></script>
		<script src="passwordchange.js"></script>
		<script src="showownedbooks.js"></script>
		<script src="contactus.js"></script>
		<script src="rentreturn.js"></script>
		<script src="informations.js"></script>
	
	</body>

	</html>