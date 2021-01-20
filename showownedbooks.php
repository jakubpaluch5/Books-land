
                    <?php
                        echo '
                        
                        <h2 class="text-center">Posiadane książki:</h2>
				<div id="owned-books-container">
					<a href="book_list.php" style="text-decoration: none;">
						<div id="books-add" style="margin-bottom: 5vh;"><i class="fas fa-plus"></i>Dodaj książkę do kolekcji</div>
					</a>
                        
                        
                        ';
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
						$bookfol = "books/";
						
						$id_user = $conn->query("SELECT id FROM user WHERE login = '$uzytkownik'");
						
						$id_user_fetch = mysqli_fetch_assoc($id_user);
						$owned_books = $conn->query("SELECT DISTINCT `books`.`photo`, `books`.`title`, `rentals`.`delivery_date`, `rentals`.`loan_date`, `rentals`.`active`, `rentals`.`id_books`  FROM `books` JOIN `rentals` ON `books`.`id_books` = `rentals`.`id_books`  WHERE `rentals`.`id_users` = $id_user_fetch[id] AND `rentals`.`active` = '1'");
						$count = mysqli_num_rows($owned_books);
						
						if($count > 0)
						{
						$curr_date = new DateTime("now");
						$time = mysqli_fetch_assoc($owned_books);
						$deadline = new DateTime($time['delivery_date']);
						
						// $delivery_date = mysqli_fetch_assoc($owned_books);
						$diff = $deadline->diff($curr_date)->format("%a");
						$days = intval($diff);  
						
						while($owned_books_row = mysqli_fetch_assoc($owned_books))
						{
							echo '
								
								
											<div class="card mb-5"  id="owned_book" style="max-width: 70vw;">
											  <div class="row no-gutters">
											  <div class="col-md-4">
											  <img src="'.$bookfol.$owned_books_row['photo'].'"  class="card-img" id="owned_book_photo" alt="...">
											  </div>
											  <div class="col-md-8">
												<div class="card-body">
												  <h1 class="card-title text-bold text-center" id="rent-card-title">'.$owned_books_row['title'].'</h1>
												  <p class="text-dark">Data wypozyczenia: '.$owned_books_row['loan_date'].'</p>
												  <p class="text-dark">Data Oddania: '.$owned_books_row['delivery_date'].'</p>
												  <p class="text-dark">Pozostało dni do oddania: '.$days.'</p>
												  
												  
												  <button class="btn btn-danger container-fluid" onclick="RentReturn()"  id="'.$owned_books_row['id_books'].'">Oddane<i style="float:right;" class="fas fa-handshake"></i></button>
												  
												</div>
											  </div>
											</div>
											</div>
										  
										

								  
							';
							
							  
					 
						   
						 }
                        echo '
                        
				</div>
                </div>
						';
						}
						else
						{
							echo '<p class="display-4 text-center" style="color: #03989e;">Twoja kolekcja jest pusta, Najwyższa pora coś wypożyczyć!</p>';
						}
					?>
