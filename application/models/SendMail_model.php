<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail_model extends CI_Model {

	function __construct() {
			parent::__construct();
	}

	public function get_code($email){

		function get_rand_num($quant=1,$min=1, $max=999999){
		    $numero = range($min,$max);
		    shuffle($numero);
		    return array_slice($numero, 0, $quant);
		}
		$code = get_rand_num()[0];
		
		$to = $email;
		$subject = 'Use o código abaixo para resetar sua senha:';
		$message = $code;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		if(mail($to, $subject, $message ,$headers)){
		    return 1;
		}
		else{
		    return "Falha!";
		}

	}

	public function sendMail($name, $email, $subject, $contact_message){

			// Replace this with your own email address
			$siteOwnersEmail = 'thoffman1698@gmail.com';


			if($_POST) {

				// Check Name
				if (strlen($name) < 2) {
					$error['name'] = "Please enter your name.";
				}
				// Check Email
				if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
					$error['email'] = "Please enter a valid email address.";
				}
				// Check Message
				if (strlen($contact_message) < 15) {
					$error['message'] = "Please enter your message. It should have at least 15 characters.";
				}
				// Subject
				if ($subject == '') { $subject = "Contact Form Submission"; }


				// Set Message
				$message = "Email from: " . $name . "<br />";
				$message .= "Email address: " . $email . "<br />";
				$message .= "Message: <br />";
				$message .= $contact_message;
				$message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

				// Set From: header
				$from =  $name . " <" . $email . ">";

				// Email Headers
				$headers = "From: " . $from . "\r\n";
				$headers .= "Reply-To: ". $email . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


				if (!$error) {

					ini_set("sendmail_from", $siteOwnersEmail); // for windows server
					$mail = mail($siteOwnersEmail, $subject, $message, $headers);

					if ($mail) { echo "OK"; }
					else { echo "Something went wrong. Please try again."; }

				} # end if - no validation error

				else {

					$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
					$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
					$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

					echo $response;

				} # end if - there was a validation error

			}

	}

	public function subscribe($email) {
		$query = $this->db->where('Email', $email)
						->get('tbl_newsletter');
		if ( $query->num_rows() == 0 ){
			$this->db->insert('tbl_newsletter', 'Email', $email);
			return 'Email cadastrado com sucesso';
		}
		else {
			return 'Este email já existe, tente outro email';
		}
	}
}
