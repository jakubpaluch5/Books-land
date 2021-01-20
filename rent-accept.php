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
 $data=date('y-m-d');
 $month=date('m');
 $day=date('d');
 $month=$month+2;
 if($month>12){
 

 $month=$month-12;
 $end = date('Y-'.$month.'-d', strtotime('+1 years'));
  
}
else{
    $end=date('y-'.$month.'-d');
}

 
 $datamonth=date('Y-'.$month.'-d');
 $user_id = $_POST['id_user'];
 $id = $_POST['id_card'];
 $check_rent_book = $conn->query("SELECT * FROM `rentals` WHERE id_users = $user_id AND id_books = $id AND active = '1'");
 $count = mysqli_num_rows($check_rent_book);
if($count <= 0)
        {
           if($result = $conn->query("INSERT INTO `rentals` (`id_rental`, `id_users`, `id_books`, `loan_date`, `delivery_date`) VALUES (NULL, '$user_id', '$id', '$data', '$end')"))
            {
        
            echo "Książka pomyślnie dodana do twojej kolekcji.";    
            }
       else{
        echo "Query failed".mysqli_error($conn);
    }
}
else
{
    echo "Książka jest już w twoim posiadaniu.";
}
?>