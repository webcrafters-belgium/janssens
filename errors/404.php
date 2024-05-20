<?php

$activePage = 'Error 404';
$pagetitle = "Error 404 Janssens BVBA";
$keywords = "error-404, Staalconstructies, staalbouw, staalconstructies, Staalbouw, dakbekleding, wandbekleding, monteur staalbouw, wat is staalbouw";
$description = "Errorpagina Janssens BVBA, staalbouw, dak-en-wandbekleding op maat";
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
echo"

<main class='d-flex flex-column justify-content-center align-center min-vh-50'>
    <h1 class='text-center'>$activePage</h1>
    <p class='text-center'>Deze pagina werd niet gevonden.</p>
    <p class='text-center'>Gelieve contact met ons op te nemen als dit probleem aanhoudt.</p>
</main>
";
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>