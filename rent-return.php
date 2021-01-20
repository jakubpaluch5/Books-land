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
      $uzytkownik = $_POST['session'];
      $id_book = $_POST['id_book'];
      $id_user = $conn->query("SELECT id FROM user WHERE login = '$uzytkownik'");
	  $id_user_fetch = mysqli_fetch_assoc($id_user);
      $query = "UPDATE `rentals` SET `active` = 0 WHERE id_books = $id_book AND id_users = $id_user_fetch[id]";
      $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
      
    
?>