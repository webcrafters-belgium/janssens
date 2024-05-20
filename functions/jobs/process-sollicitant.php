<?php
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( ! isset( $_POST['first-name'] ) ) {
		$response            = array();
		$response['success'] = false;
		$response['message'] = 'Voornaam niet ingevuld';
	} elseif ( ! isset( $_POST['last-name'] ) ) {
		$response            = array();
		$response['success'] = false;
		$response['message'] = 'Achternaam niet ingevuld';
	} elseif ( ! isset( $_POST['email'] ) ) {
		$response            = array();
		$response['success'] = false;
		$response['message'] = 'Email adres niet ingevuld';
	} elseif ( ! isset( $_FILES['cv'] ) || $_FILES['cv']['error'] == UPLOAD_ERR_NO_FILE ) {
		$first_name  = $_POST['first-name'];
		$last_name   = $_POST['last-name'];
		$email       = $_POST['email'];
		$_POST['cv'] = '';
		$sql         = "INSERT INTO `sollicitaties` (`first-name`, `last-name`, `email`) VALUES (?, ?, ?)";

		$stmt = $conn->prepare( $sql );

		$stmt->bind_param( "sss", $first_name, $last_name, $email );
		$stmt->execute();
		$response            = array();
		$response['success'] = true;
		$response['message'] = 'We hebben uw sollicitatie goed ontvangen, maar we hebben geen cv van u meegekregen. We houden hier uiteraard rekening mee.';
	} else {
		$response            = array();
		$response['success'] = true;
		$response['message'] = 'Bedankt voor het solliciteren! We nemen binnenkort contact met je op.';
	}
} else {
	$response            = array();
	$response['success'] = false;
	$response['message'] = 'Geen geldig verzoek ontvangen';
}


echo json_encode( $response );

