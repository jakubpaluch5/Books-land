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
$id = $_POST['id_card'];
$booksfol="books/";
$query=$conn->query("SELECT title
                        FROM books 
                        WHERE id_books = '".$id."'");
$row = mysqli_fetch_assoc($query);
echo $row['title'];

?>