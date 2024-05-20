<?php

$activePage = 'Error 401';
$pagetitle = "Error 401 Janssens BVBA";
$keywords = "error-401, Staalconstructies, staalbouw, staalconstructies, Staalbouw, dakbekleding, wandbekleding, monteur staalbouw, wat is staalbouw";
$description = "Errorpagina Janssens BVBA, staalbouw, dak-en-wandbekleding op maat";
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
echo "

<main class='d-flex flex-column justify-content-center align-center min-vh-50'>
    <h1 class='text-center'>$activePage</h1>
    <p class='text-center'>Ongeautoriseerd toegang.</p>
    <p class='text-center'>U moet zich aanmelden om deze pagina te bekijken.</p>
</main>
";
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
