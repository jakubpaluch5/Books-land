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
    $uzytkownik = $_POST['sesja'];
$id_user = $conn->query("SELECT id FROM user WHERE login = '$uzytkownik'");
$id_user_fetch = mysqli_fetch_assoc($id_user);
$owned_books = $conn->query("SELECT id_rental FROM rentals WHERE id_users = $id_user_fetch[id]");
$owned_books_now = $conn->query("SELECT * FROM rentals WHERE id_users = $id_user_fetch[id] AND active = '1' ");
$count_every_owned_books = mysqli_num_rows($owned_books);
$count_now_owned_books = mysqli_num_rows($owned_books_now);
$informations = $conn->query("SELECT * FROM user WHERE id = $id_user_fetch[id]");
$informations_fetch = mysqli_fetch_assoc($informations);
echo '
<div id="how-many-books">
				
				<span>Aktualnie posiadanych książek: '.$count_now_owned_books.'</span>
				</div>
				<div id="chart">
				
				<p>Wypożyczaj i czytaj książki aby się rozwijać i stawać się coraz bardziej doświadczonym czytelnikiem naszej bibliotekii Wszystkich wypożyczonych książek:</p><br>
				<div id="owned">
				
				 <span>'.$count_every_owned_books.'</span>
				
				</div>
				';
				if($count_every_owned_books<10)
				{
					echo '<span>Początkujący czytelnik<i class="fas fa-award"></i></span>';
				}
				elseif($count_every_owned_books>=10)
				{
					echo '<span>Średnio-zaawansowany czytelnik<i class="fas fa-award"></i></span>';
				}
				else
				{
					echo '<span>Zaawansowany czytelnik<i class="fas fa-award"></i></span>';
				}
				echo '
				</div>
				
				<div id="information-window">
					<p>Login:   '.$informations_fetch['login'].'</p>
					<p>Imię: '.$informations_fetch['imie'].'</p>
					<p>Nazwisko: '.$informations_fetch['nazwisko'].'</p>
					
					<p>E-mail: '.$informations_fetch['email'].'</p>
					<p>Z nami od: '.$informations_fetch['reg_time'].'</p>
                </div>
                ';
?>