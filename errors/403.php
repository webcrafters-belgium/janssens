<?php

$activePage = 'Error 403';
$pagetitle = "Error 403 Janssens BVBA";
$keywords = "error-403, Staalconstructies, staalbouw, staalconstructies, Staalbouw, dakbekleding, wandbekleding, monteur staalbouw, wat is staalbouw";
$description = "Errorpagina Janssens BVBA, staalbouw, dak-en-wandbekleding op maat";
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
echo "

<main class='d-flex flex-column justify-content-center align-center min-vh-50'>
    <h1 class='text-center'>$activePage</h1>
    <p class='text-center'>Toegang verboden.</p>
    <p class='text-center'>U heeft geen toestemming om deze pagina te bekijken.</p>
</main>
";
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
