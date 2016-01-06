<?php 
	if (isset($_POST["submit"])) {
		 
		$an = "kontakt@handball-dachau.de";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$betreff = $_POST['betreff'];
		$nachricht = $_POST['nachricht'];
		 
		
		$mail_header = 'From:' . $email;
		$mail_header .= 'Content-type: Handball Dachau Kontakt; charset=UTF-8';
		
		$message = '
		Name:	'.$name.'
		Email:	'.$email.'
		Nachricht:	'.$nachricht;
		 
		mail($an, $betreff, $message, $mail_header );
	}
	header('Location: ../kontakt.php');
?>