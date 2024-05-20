<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pagina_urls = array(
    'https://janssens.webcrafters.be/about/index.php',
    'https://janssens.webcrafters.be/blog/index.php',
    'https://janssens.webcrafters.be/jobs/index.php',
    'https://janssens.webcrafters.be/projects/index.php',
    'https://janssens.webcrafters.be/index.php',
    'https://janssens.webcrafters.be/services/index.php'
);

$zoekterm = $_GET['zoekterm'] ?? '';

$gevonden_resultaten = array();
foreach ($pagina_urls as $pagina_url) {
    $pagina_inhoud = file_get_contents($pagina_url);

    if (stripos($pagina_inhoud, $zoekterm) !== false) {
        $gevonden_resultaten[] = $pagina_url;
    }
}

// Teruggeven van de resultaten in JSON-formaat
echo json_encode($gevonden_resultaten);
