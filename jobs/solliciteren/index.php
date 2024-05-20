<?php
$activePage = "Jobs";
$pagetitle = "Werken bij Janssens BVBA";
$keywords = "Werken, jobs, janssens bvba, monteur worden?, lasser worden, job als lasser, lasser gezocht, monteur gezocht";
$description = "Werken bij Janssens BVBA. Vind een job";
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

echo"
<main>
    <div class='container my-5'>
        <h1 class='section-title py-5'>Werken bij Janssens BVBA</h1>
    </div>
    <div class='my-5 py-5 container'>
        <div class='vacatures'>
            <div class='vacature d-flex flex-sm-column flex-md-row'>
                <div class='col-sm-12 col-md-6'>
                    <h2 class='bold'><strong>Monteur/ploegbaas M/V</strong></h2>
                    <p>Als monteur ben je verantwoordelijk voor het monteren en opbouwen van de staalconstructies.</p>
                    <h3><strong>Profiel</strong></h3>
                    <p>
                        Je weet van aanpakken<br>
                        Je hebt technisch inzicht en kan goed planlezen of bent bereid dit te leren<br>
                        Je bent in bezit van, of bent bereid dit te behalen: één of meerdere van volgende certificaten: Certificaat VCA (basisveiligheid), Certificaat veilig werken op hoogte, Certificaat hoogwerker<br>
                        Je bent een teamplayer en kan zelfstandig werken<br>
                        Je spreekt vlot Nederlands en eventueel Frans (ploegbaas)<br>
                        Indien je kennis hebt van lassen is dit een dikke plus <br>
                        Op termijn kan je doorgroeien naar ploegbaas als dit je ambitie is<br>
                        <br>
                        Solliciteer voor deze functie door een mailtje te sturen naar:<br>
                        info@janssensbvba.be of via het onderstaande formulier
                    </p>
                        
                    <form method='post' action='' enctype='multipart/form-data' id='sollicitatieFormulier'>                        
                        <div class='form-group'>
                            <label for='first-name'>Voornaam</label>
                            <input type='text' class='form-control' id='first-name' name='first-name' required>
                        </div>
                        <div class='form-group'>
                            <label for='last-name'>Achternaam</label>
                            <input type='text' class='form-control' id='last-name' name='last-name' required>
                        </div>
                        <div class='form-group'>
                            <label for='email'>E-mailadres</label>
                            <input type='email' class='form-control' id='email' name='email' required>
                        </div>
                        <div class='form-group'>
                            <label for='cv'>CV Uploaden</label>
                            <input type='file' class='form-control-file' id='cv' name='cv'>
                        </div>
                        <button name='' type='submit' class='btn btn-primary'>Solliciteren</button>
                    </form> 
                    <div id='sollicitant-response' class='bg-success'></div>
                </div>
                <div class='vacature-img col-sm-12 col-md-6'>
                    <img src='/img/jobs/monteur/hoogwerker2.jpg' alt='jobs / Monteurs' class='w-100'>
                </div>
            </div>
        </div>
    </div>
</main>
";
?>
<script>
    $(document).ready(function() {
        $('#sollicitatieFormulier').submit(function(e) {
            e.preventDefault(); // Voorkom standaardformulierinzending

            var formData = $(this).serialize();

            // Stuur AJAX-verzoek
            $.ajax({
                url: '/functions/jobs/process-sollicitant.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    // Verwerk de JSON-reactie
                    if (response.success) {
                        // Toon een succesbericht
                        $('#sollicitant-response').removeClass('bg-danger').addClass('bg-success').text(response.message);
                    } else {
                        // Toon foutmeldingen als er fouten zijn opgetreden
                        $('#sollicitant-response').removeClass('bg-success').addClass('bg-danger').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Toon een foutbericht als er een probleem is met het AJAX-verzoek
                    alert('Er is een fout opgetreden bij het verzenden van de sollicitatie: ' + error);
                }
            });
        });
    });

</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';