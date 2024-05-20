<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg de formuliergegevens
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['select'];
    $message = $_POST['message'];
    $captcha = $_POST['g-recaptcha-response']; // reCAPTCHA-response

    // Controleer of alle vereiste velden zijn ingevuld
    if (!empty($name) && !empty($email) && !empty($message) && !empty($captcha)) {
        // Controleer de reCAPTCHA-response
        $secretKey = "6LdaTtEpAAAAABFx-vIDvdS9cBBASV_iSuPxySoY"; // Vervang dit door je eigen geheime sleutel
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
        $responseKeys = json_decode($response, true);

        // Controleer of de reCAPTCHA-response geldig is
        if (intval($responseKeys["success"]) === 1) {
            // Stel de ontvanger van de e-mail in
            $to = 'matthi_gielen@hotmail.be';

            // Stel het onderwerp en de inhoud van de e-mail in
            $subject = 'Contactformulier ingediend door ' . $name;
            $email_body = "Naam: $name\n";
            $email_body .= "E-mail: $email\n";
            $email_body .= "Telefoonnummer: $phone\n";
            $email_body .= "Onderwerp: $subject\n";
            $email_body .= "Bericht:\n$message";

            // Stuur de e-mail
            if (mail($to, $subject, $email_body)) {
                // E-mail succesvol verzonden
                http_response_code(200);
                echo "Bericht succesvol verzonden!";
            } else {
                // Kon e-mail niet verzenden
                http_response_code(500);
                echo "Er is een fout opgetreden bij het verzenden van het bericht.";
            }
        } else {
            // De reCAPTCHA-response is ongeldig
            http_response_code(400);
            echo "reCAPTCHA-validatie mislukt. Probeer het opnieuw.";
        }
    } else {
        // Niet alle vereiste velden zijn ingevuld
        http_response_code(400);
        echo "Vul alstublieft alle vereiste velden in.";
    }
} else {
    // Het verzoek is geen POST-verzoek
    http_response_code(403);
    echo "Het formulier kan alleen via een POST-verzoek worden ingediend.";
}

