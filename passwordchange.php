<?php


echo '
<div class="wrapper">
	<div class="container">
		<div id="login-row" class="row justify-content-center align-items-center">
			<div id="login-column" class="col-md-6">
				<div id="login-box" class="col-md-12">
					<form id="login-form" class="form" action="secret.php" method="post">
						<h3 class="text-center display-3 text-info">Zmień hasło</h3>
						<div class="form-group">
							<label for="username" class="text-info">Stare hasło:</label><br>
							<input type="password" name="old" id="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="text-info">Nowe hasło:</label><br>
							<input type="password" name="newone" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="text-info">Potwierdź nowe hasło:</label><br>
							<input type="password" name="newtwo" id="password" class="form-control">
					
						</div>
						<div class="form-group">
						
							<input type="submit" name="add" class="btn btn-info container-fluid btn-md" value="Zmień hasło">
						</div>
						
					</form>
				
				</div>
			</div>
		</div>
		</div>
		</div>
  ';



 
?>