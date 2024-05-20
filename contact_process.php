<?php
// Laad de ini.inc voor configuratie
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';

// Laad de PHPMailer-klasse
require $_SERVER['DOCUMENT_ROOT'] . '/classes/PHPMailer.php';

use PHPMailer\classes\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ( isset( $_POST['email'] ) ) {
	$to       = $_POST['email']; // Het e-mailadres waar de berichten naartoe moeten
	$name     = $_POST['name'];
	$subject  = $_POST['subject'];
	$phone    = $_POST['phone'];
	$cmessage = $_POST['message'];

	$mail = new PHPMailer( true );

	try {
		// Server settings
		$mail->isSMTP();                                            // Verstuur via SMTP
		$mail->Host     = 'mail.webcrafters.be';                     // Stel de SMTP-server in om e-mails te verzenden via
		$mail->SMTPAuth = true;                                   // Schakel SMTP-authenticatie in
		$mail->Username = 'info@webcrafters.be';                   // SMTP-gebruikersnaam
		$mail->Password = 'DigiuSeppe2018_';                   // SMTP-wachtwoord

		// Ontvangers
		$mail->setFrom( 'janssens@webcrafters.be', 'Janssens' );
		$mail->addAddress( $to );                                     // Voeg een ontvanger toe

		// Content
		$mail->isHTML( true );                                        // Stel e-mail op in HTML-formaat
		$mail->Subject = "You have a message from your Bitmap Photography.";

		$logo = 'img/logo.png';
		$link = '#';
		$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
		$body .= "<table style='width: 100%;'>";
		$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
		$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
		$body .= "</td></tr></thead><tbody><tr>";
		$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
		$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
		$body .= "</tr>";
		$body .= "<tr><td style='border:none;'><strong>Phone:</strong> {$phone}</td></tr>";
		$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
		$body .= "<tr><td></td></tr>";
		$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
		$body .= "</tbody></table>";
		$body .= "</body></html>";

		$mail->Body = $body;

		if ( $mail->send() ) {
			// SQL query om de tabel aan te maken als deze niet bestaat
			$createTableQuery = "CREATE TABLE IF NOT EXISTS `aanvragen` (
                `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `naam` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `onderwerp` VARCHAR(255) NOT NULL,
                `bericht` TEXT NOT NULL,
                `datum` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

			// Voer de query uit
			if ( $conn->query( $createTableQuery ) === true ) {
				// Voeg de gegevens toe aan de database
				$toevoegenAanDb = "INSERT INTO `aanvragen` (`naam`, `email`, `onderwerp`, `bericht`) VALUES (?, ?, ?, ?)";
				$stmt           = $conn->prepare( $toevoegenAanDb );
				$stmt->bind_param( 'ssss', $name, $from, $subject, $cmessage );

				if ( $stmt->execute() ) {
					echo json_encode( array(
						'status'  => 'success',
						'message' => 'Bedankt voor uw bericht. We proberen dit binnen 24 uur te behandelen.'
					) );
				} else {
					echo json_encode( array(
						'status'  => 'error',
						'message' => 'Fout bij het verzenden van de aanvraag.'
					) );
				}
				$stmt->close();
			} else {
				echo json_encode( array(
					'status'  => 'error',
					'message' => 'Fout bij het aanmaken van de tabel.'
				) );
			}
		} else {
			echo json_encode( array(
				'status'  => 'error',
				'message' => 'Bericht kon niet worden verzonden. Mailer Error: ' . $mail->ErrorInfo
			) );
		}
	} catch ( Exception $e ) {
		echo json_encode( array(
			'status'  => 'error',
			'message' => 'Bericht kon niet worden verzonden. Mailer Error: ' . $mail->ErrorInfo
		) );
	} catch ( \PHPMailer\classes\PHPMailer\Exception $e ) {

	}
} else {
	echo json_encode( array(
		'status'  => 'error',
		'message' => 'Geen mail ingesteld.'
	) );
}
?>
