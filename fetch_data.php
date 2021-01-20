




<?php

//fetch_data.php

include('db-conn.php');

if(isset($_POST["action"]))
{
    $query = "SELECT * FROM books JOIN categories ON `books`.`id_categories` = `categories`.`id_categories`";
    
    if(isset($_POST["category"]))
    {
     $category_filter = implode("','", $_POST["category"]);
     $query .= "WHERE `books`.`id_categories` IN('".$category_filter."')";
    }
 

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $bookfol = "books/";
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
    
  <div class="search card" id="karty"   style="width: 15vw; height:60vh; display:inline-block;">
  <img class="card-img-top" id="foto"   style="height: 25vw;" src="'.$bookfol.$row['photo'].'" alt="Card image cap">
  <div class="card-body" style="height: 6vw;">
  
  <h5 class="card-title text-center font-weight-bold">'.$row['title'].'</h5>
  
  <a href="#" class="btn btn-info" id="'.$row['id_books'].'" onClick="getId()">Czytaj więcej!</a>
  </div>
   </div>
     
   ';
  }
 }
 else
 {
  $output = '<h3>Tego jeszcze nie posiadamy!</h3>';
 }
 echo $output;
}

?>

