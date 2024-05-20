<?php
$activePage = 'Projects';
$pagetitle = "Janssens BVBA projecten";
$keywords = "Alle projecten, bouw, watertoren, speciale structuren, alle vormen, alle maten, wandbekleding, dakbekleding";
$description = "Bij Janssens BVBA kan je terecht voor alle vormen en maten structuur.";
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

$sql = "SELECT * FROM projecten ORDER BY create_datetime DESC";

$result = mysqli_query($conn, $sql);

?>

<main>
    <div class='container py-5'>
        <div class='row'>
            <div class='col-md-12'>
                <h1 class='mb-4'>Onze Projecten</h1>
            </div>
        </div>

        <div class='row'>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $project_id = $row['id'];
                    ?>
                    <div class='col-lg-4 col-md-6'>
                        <div class='single-project mb-5'>
                            <div class='project-thumbnail'>
                                <img class='img-fluid' src='/img/projecten/<?php echo $project_id; ?>/coverImg.jpg' alt='project: <?php echo $row['titel']; ?>' onclick='openModal("/img/projecten/<?php echo $project_id; ?>/coverImg.jpg")'>
                            </div>

                            <div class='project-details'>
                                <h3><?php echo $row['titel']; ?></h3>
                                <p><?php echo $row['beschrijving']; ?></p>
                                <a href='/projects/project_details.php?id=<?php echo $project_id; ?>' class='btn btn-primary'>Meer details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class='col-md-12'>
                    <p>Geen projecten gevonden.</p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<script>
    function openModal(imageSrc) {
        // Maak een modaal venster
        var modal = document.createElement('div');
        modal.classList.add('modal');

        // Voeg de afbeelding toe aan het modaal venster
        var modalContent = document.createElement('img');
        modalContent.src = imageSrc;
        modal.appendChild(modalContent);

        // Voeg het modaal venster toe aan de pagina
        document.body.appendChild(modal);

        // Sluit het modaal venster wanneer er buiten wordt geklikt
        modal.onclick = function() {
            modal.remove();
        };
    }
</script>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>
