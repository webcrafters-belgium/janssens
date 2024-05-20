<?php
session_start(); // Start de PHP-sessie

require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de naam en het wachtwoord zijn ingediend via het formulier
    if (isset($_POST['name']) && isset($_POST['password'])) {
        // Verkrijg de ingediende naam en wachtwoord
        $name = $_POST['name'];
        $password = $_POST['password'];

        // Voer de controle uit op de gebruikersnaam en wachtwoord (dit is een voorbeeld, zorg ervoor dat je een veiligere authenticatiemethode gebruikt, zoals het controleren in een database)
        if ($name === 'matthias' && $password === 'devUser1') {
            // Gebruiker is succesvol ingelogd
            $_SESSION['ingelogd'] = true;
            $_SESSION['admin'] = true;
            header("Location: /devfunctions/admin/"); // Redirect naar de adminpagina na succesvol inloggen
            exit();
        } else {
            // Gebruikersnaam of wachtwoord is onjuist, toon een foutmelding
            echo "<p>Gebruikersnaam of wachtwoord is onjuist. Probeer opnieuw.</p>";
        }
    } else {
        // Toon een foutmelding als de naam of het wachtwoord niet zijn ingediend via het formulier
        echo "<p>Gebruikersnaam of wachtwoord is niet ingediend. Probeer opnieuw.</p>";
    }
}

