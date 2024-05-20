<?php
// Controleer of het verzoek een POST-verzoek is
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de vereiste velden zijn ontvangen
    if (isset($_POST['comment']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['blog_id'])) {
        // Maak verbinding met de database
        include_once $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';

        // Ontvang en ontsnap de invoer
        $comment = $conn->real_escape_string($_POST['comment']);
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $blog_id = $conn->real_escape_string($_POST['blog_id']);

        // Voeg de reactie toe aan de database
        $addCommentQuery = "INSERT INTO blog_comments (blog_id, comment, commented_by, commented_on) VALUES ('$blog_id', '$comment', '$name', NOW())";
        if ($conn->query($addCommentQuery) === TRUE) {
            // Succesvol toegevoegd, stuur een succesvolle reactie terug
            $response = array("status" => "success", "message" => "Reactie succesvol toegevoegd.");
            echo json_encode($response);
        } else {
            // Als er een fout optreedt bij het toevoegen van de reactie, stuur een foutreactie terug
            $response = array("status" => "error", "message" => "Er is een fout opgetreden bij het toevoegen van de reactie.");
            echo json_encode($response);
        }
    } else {
        // Vereiste velden ontbreken, stuur een foutreactie terug
        $response = array("status" => "error", "message" => "Niet alle vereiste velden zijn ontvangen.");
        echo json_encode($response);
    }
} else {
    // Als het geen POST-verzoek is, stuur een foutreactie terug
    $response = array("status" => "error", "message" => "Alleen POST-verzoeken zijn toegestaan.");
    echo json_encode($response);
}

