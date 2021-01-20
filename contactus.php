<?php


echo '

<div class="wrapper">
		<div class="contact__container">
				<div class="contact__title">
						<h2>Masz pytanie?<hr></h2>

				</div>
				<form class="contact__form" method="post" action="secret.php">
						<p>Imię</p>
						<input name="name" class="contact__form-input" type="text">

						<p>E-mail</p>
						<input name="email" class="contact__form-input" type="text">

						<p>Wiadomość</p>
						<textarea name="message" class="contact__form-textarea" type="text"></textarea>

						<input type="submit" value="Wyślij wiadomość">
				</form>
		</div>
</div>
  ';



 
?>