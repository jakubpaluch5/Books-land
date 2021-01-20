<?php

include('db-conn.php');


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
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="minilogo.png" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="book_list_style.css">
  <link rel="stylesheet" href="laptop-style.css">
  <title>Książko-landia</title>

  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/c22f07ca69.js" crossorigin="anonymous"></script>






</head>
<style>
  .container {
    width: 10vw;
  }

  #cat-cont {
    display: flex;
    flex-flow: column;
  }

  #loading {
    text-align: center;
    background: url('loading.gif') no-repeat center;
    height: 150px;
  }

  .card:hover {
    cursor: pointer;
  }
</style>

<body>


  <!-- FIRST PAGE -->

  <div class="firstpage"  style="background-color:#a4c6c7;">
    <a href="secret.php">
      <div class="navigatorleft"><i class="fas fa-arrow-left"></i></i></div>
    </a>
    <div id="rent-window-blocker" style="
    position: absolute;
	width: 100%;
	height: 100%;
	top:0;
  left: 0;
  display:none;
	background-color: rgba(57, 52, 52, 0.823);
	z-index: 4;">
  </div>
      <div class="card mb-3" id="rental-window" style="max-width: 70vw;">
        <i class="fas fa-times" id="exit-cross" style="font-size: 3em;
	float: right;
	margin: 0.5vw;"></i>
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="" id="rental-photo" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h1 class="card-title text-bold text-center" id="rent-card-title">Card title</h1>
              <p class="card-text text-center h4" id="rent-card-description">This is a wider card with supporting text below as a
                natural lead-in to additional content. This content is a little bit longer.</p>
              <button class="btn btn-success container-fluid" onclick="accept()" style="height: 5vh;" id="btn-accept">Dodaj do kolekcji</button>
              <p id="card-id" style="display:none;"></p>
            </div>
          </div>
        </div>
      
    </div>
      <div id="panel-right">
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
        $user_avatar=mysqli_query($conn,"select avatar from user where login='$uzytkownik'");
        $fetched_avatar = mysqli_fetch_assoc($user_avatar);
        $avatar_patch = 'avatary/';
        echo '<img src="'.$avatar_patch.$fetched_avatar['avatar'].'" alt="avek3" id="select">';
        $user_login=mysqli_query($conn,"select login from user where login='$uzytkownik'");
        $fetched_user_login = mysqli_fetch_assoc($user_login);
        echo '<h1 class="display-3"><b>'.$fetched_user_login['login'].'</b></h1>';
        $user_id=mysqli_query($conn,"select id from user where login='$uzytkownik'");
        $fetched_user_id = mysqli_fetch_assoc($user_id);
        echo '<p id="user-id" style="display: none;">'.$fetched_user_id['id'].'</p>';
        ?>
        
      <div class="wrap">
   <div class="searching">
      <input type="text" id="searchbar" class="searchTerm" onkeyup="search()"  name="search" placeholder="Szukasz ulubionej książki?">
      <button type="submit"  class="searchButton">
        <i class="fa fa-search"></i>
     </button>
     </div>
</div>
<div id="panel-right-footer" class="container">
<h2 class="text-center text-light">W tym magicznym miejscu znajdziesz swoje ulubione książki i dodasz do swojego profilu jako wypożyczone, bedziesz mógł kontrolować date oddania i cieszyć się nowo wypożyczoną książką!</h2>
</div>      
</div>
      
      <div class="row filter_data">
      </div>

      <div id="categories" style="width: 20%;
		height: 100%;
		background-color: #2E2C2C;
		text-align: center;">

        <div id="book_logo">
          <img src="big_logo.png" alt="logo">
        </div>

        <div id="cat-cont">
          <h1>Wybierz kategorie:</h1>
          <?php

$query = "SELECT name, id_categories FROM categories";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
?>

          <!-- <label><input type="checkbox" class="common_selector category" value="<?php echo $row['id_categories']; ?>">
          <?php echo $row['name'] ?></label> -->
          <label class="container"><?php echo $row['name'] ?>
            <input type="checkbox" class="common_selector category" value="<?php echo $row['id_categories']; ?>">
            <span class="checkmark"></span>
          </label>



          <?php
}

?>
        </div>
      </div>


      <script>
        $(document).ready(function () {

          filter_data();

          function filter_data() {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var category = get_filter('category');


            $.ajax({
              url: "fetch_data.php",
              method: "POST",
              data: {
                action: action,
                category: category
              },
              success: function (data) {
                $('.filter_data').html(data);
              }
            });
          }

          function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
              filter.push($(this).val());
            });
            return filter;
          }

          $('.common_selector').click(function () {
            filter_data();
          });


        });
      </script>
      <script src="exit-cross.js"></script>
      <script src="rentals.js"></script>
      <script src="search-bar.js"></script>
      <script src="rent-accept.js"></script>

</body>





</html>