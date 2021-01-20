<?php 
include 'secret.php';
$uzytkownik = $_SESSION['login'];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "t03_biblioteka";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn)
      {
          die("Nie udało się: " . mysqli_connect_error());
      }
    
 $query = "UPDATE `user` SET `avatar` = 'avatar1.png' WHERE login = '$uzytkownik'";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
      
    
?>