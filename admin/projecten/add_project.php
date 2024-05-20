<?php
$activePage = 'Home';
$pagetitle = "Janssens BVBA";
$keywords = "Staalconstructies, staalbouw, staalconstructies, Staalbouw, dakbekleding, wandbekleding, monteur staalbouw, wat is staalbouw";
$description = "Janssens BVBA, staalbouw, dak-en-wandbekleding op maat";

include $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<main class="container mt-5" id="add_new_project">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nieuw Project Toevoegen</h3>
                </div>
                <div class="card-body">
                    <form action="/functions/projecten/add_project.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="project_name">Project Naam</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" required>
                            <label for="project_city">Project Gemeente</label>
                            <input type="text" class="form-control" id="project_city" name="project_city" required>
                        </div>
                        <div class="form-group">
                            <label for="project_description">Project Beschrijving</label>
                            <textarea class="form-control" id="project_description" name="project_description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="project_image">Afbeelding</label>
                            <input type="file" class="form-control" id="project_image" name="project_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Toevoegen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>