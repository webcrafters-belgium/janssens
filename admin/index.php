<?php
$activePage = 'Home';
$pagetitle = "Janssens BVBA";
$keywords = "Staalconstructies, staalbouw, staalconstructies, Staalbouw, dakbekleding, wandbekleding, monteur staalbouw, wat is staalbouw";
$description = "Janssens BVBA, staalbouw, dak-en-wandbekleding op maat";

include $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<main class='main min-vh-50'>
    <div class='hero-area position-relative'>
        <div class='container mt-5'>
            <div class='hero__caption'>
                <h1 data-animation='fadeInLeft' data-delay='0.2s'>Janssens BVBA <span class='text-janssens'>Admin paneel</span> </h1>
                <p data-animation='fadeInLeft' data-delay='0.4s' class='my-5'>
                    Beheer hier de website van A tot (en met) Z, en alles daartussen
                </p>
            </div>
        </div>
    </div>
    <section class='about-low-area section-padding40'>
        <div class='container'>
            <div class='row justify-content-between'>
                <div class='col-xl-6 col-lg-6 col-md-10'>
                    <div class='about-caption mb-50'>
                        <div class='section-tittle mb-35'>
                            <span class='element'>Wat wil je doen?</span>
                            <h2>Projecten toevoegen</h2>
                            <p>Janssens BVBA is een expert in staalconstructies, montage, dak- en wandbekleding. Met een
                                rijke geschiedenis die teruggaat tot de jaren '50, bieden wij een breed scala aan
                                diensten, van engineering en productie tot conservering en montage. Onze toewijding aan
                                veiligheid en kwaliteit heeft ons een VCA*-certificaat opgeleverd, wat getuigt van onze
                                inzet voor uitmuntendheid in alle aspecten van ons werk.
                            </p>
                        </div>
                        <a href='/admin/projecten/add_project.php/' class='btn hero-btn' data-animation='fadeInLeft' data-delay='0.7s'>Project toevoegen
                            <i class='ti-arrow-right'></i>
                        </a>
                    </div>
                    <div class='about-caption mb-50'>
                        <div class='section-tittle mb-35'>
                            <h2>Personeel beheren</h2>
                            <p>Bekijk hier de status van de programmeur, de werkplaatsen van de werknemers, de ziekte-dagen en veel meer!
                            </p>
                        </div>
                        <a href='/admin/personeel/index.php/' class='btn hero-btn' data-animation='fadeInLeft' data-delay='0.7s'>Personeel beheren
                            <i class='ti-arrow-right'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
