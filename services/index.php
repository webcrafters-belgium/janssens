<?php
$activePage = 'Services';
$pagetitle = 'Services';
$keywords = 'Onze diensten';
$description = 'Onze diensten';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

echo"
<main>
    <div class='container my-5 py-5 '>
        <h1 class='text-start underline'>Wat wij doen</h1>
        <div class='services d-flex'>
                <div class='single-service'>
                    <h2>Engineering</h2>
                    <div class='card-body'>
                        <p></p>
                    </div>
                </div>
                <div class='single-service'>
                    <h2>Production</h2>
                </div>
                <div class='single-service border-1'>
                    <h2>Conservering</h2>
                </div>
                <div class='single-service border-1 w-100 text-center'>
                    <h2>Montage</h2>
                </div>
        </div>
    </div>
</main>
";

include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
