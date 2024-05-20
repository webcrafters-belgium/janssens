<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once( "{$_SERVER["DOCUMENT_ROOT"]}/ini.inc" );

require( "{$_SERVER["DOCUMENT_ROOT"]}/classes/PHPMailer/PHPMailer.php" );
require( "{$_SERVER["DOCUMENT_ROOT"]}/classes/PHPMailer/Exception.php" );
require( "{$_SERVER["DOCUMENT_ROOT"]}/classes/PHPMailer/SMTP.php" );


use PHPMailer\classes\PHPMailer\PHPMailer;
use PHPMailer\classes\PHPMailer\Exception;
use PHPMailer\classes\PHPMailer\SMTP;

if ( isset( $_POST['name'], $_POST['email'], $_POST['message'] ) ) {
	$naam      = $_POST['name'];
	$email     = $_POST['email'];
	$onderwerp = $_POST['subject'];
	$bericht   = $_POST['message'];

	$mail = new PHPMailer( true );

	// Server settings
	$mail->isSMTP( true );
	$mail->Host     = "mail.webcrafters.be";
	$mail->SMTPAuth = true;
	$mail->Username = "info@webcrafters.be";
	$mail->Password = "DigiuSeppe2018___";

	// Recipients
	$mail->setFrom( "info@webcrafters.be", "webcrafters" );
	$mail->addAddress( $email );
	$mail->Subject = "Uw vraag is in behandeling";
	$mail->isHTML( true );

	$mail->Body    = "
                <div style='display: flex; flex-direction: column; align-items: center; text-align: center;'>
                    <h1 style='font-size: 24px; margin-bottom: 20px;'>Bedankt voor uw aanvraag!</h1>
                    <p style='font-size: 16px;'>We hebben uw aanvraag goed ontvangen.</p>
                    <p style='font-size: 16px;'>We proberen deze binnen 24 uur te behandelen.</p>
                </div>";
	$mail->AltBody = "Bedankt voor uw aanvraag! We hebben deze goed ontvangen en doen ons best om binnen 24 uur te reageren";
	// Send the mail
	$response = array();
    try {
        if ($mail->send()) {
            $response['success'] = true;
            $response['message'] = 'We hebben uw mail correct ontvangen.';

            $toevoegenAanDb = "INSERT INTO `contact_aanvragen` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($toevoegenAanDb);
            $stmt->bind_param('ssss', $naam, $email, $onderwerp, $bericht);

            if ($stmt->execute()) {
                $response            = array();
                $response['success'] = true;
                $response['message'] = 'Bedankt voor het contacteren! We nemen binnenkort contact met je op.';
            } else {
                $response            = array();
                $response['success'] = false;
                $response['message'] = 'input in database gefaald.';
            }
            $stmt->close();
        } else {
            $response['success'] = false;
            $response['message'] = 'De mail is niet verzonden';
        }
    } catch (Exception $e) {
        $response            = array();
        $response['success'] = false;
        $response['message'] = 'De mail kon niet verzonden worden';
    }

    //}
} else {
	$response            = array();
	$response['success'] = false;
	$response['message'] = 'Niet alle vereiste velden zijn ingevuld';
}

echo json_encode( $response );
