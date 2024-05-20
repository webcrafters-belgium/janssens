<?php
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';

$sql = "SELECT * FROM `projecten`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newId = $row["id"] + 1;
} else {
    $newId = 1;
}

// Ontvang de gegevens van het formulier
$project_name = $_POST['project_name'];
$project_description = $_POST['project_description'];
$project_image = $_FILES['project_image'];
$city = $_POST['project_city'];

// Afbeeldingsmap aanmaken binnen /img/projecten/$newId
$project_image_folder = "/img/projecten/$newId";
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $project_image_folder)) {
    mkdir($_SERVER['DOCUMENT_ROOT'] . $project_image_folder, 0777, true);
}

// Afbeelding uploaden naar de aangemaakte map
if ($_FILES['project_image']['error'] === UPLOAD_ERR_OK) {
    $tempFile = $_FILES['project_image']['tmp_name'];
    $targetFile = $_SERVER['DOCUMENT_ROOT'] . $project_image_folder . "/" . $_FILES['project_image']['name'];
    if (move_uploaded_file($tempFile, $targetFile)) {
        // Afbeelding succesvol geüpload, voeg project toe aan de database
        $sql = "INSERT INTO projecten (titel, beschrijving, afbeeldingsmap, gemeente)
                VALUES ('$project_name', '$project_description', '$project_image_folder', '$city')";

        if ($conn->query($sql) === TRUE) {
            echo "Project succesvol toegevoegd!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Er is een fout opgetreden bij het uploaden van de afbeelding.";
    }
} else {
    echo "Er is een fout opgetreden bij het uploaden van de afbeelding.";
}

mysqli_close($conn);
