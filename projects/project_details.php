<?php
if (isset($_GET['id'])) {
    $project_id = $_GET['id'];
}
$activePage = 'Projects';
$pagetitle = 'Projecten';
$keywords = 'Janssens BVBA projecten, projecten, wandbekleding, staalbouw';
$description = 'Bekijk alle projecten van janssens BVBA, Experten in staalconstructies op maat';
require $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER["DOCUMENT_ROOT"] . "/header.php";
$sql = "SELECT * FROM projecten WHERE id = '$project_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $project_id = $row['id'];
        $project_name = $row['titel'];
        $project_description = $row['beschrijving'];
        $image_folder = $row['afbeeldingsmap'];
    }
    $image_files = glob($_SERVER['DOCUMENT_ROOT'] . "/img/projecten/$image_folder/*");
    echo"
    <main>
        <!--? Hero Start -->
        <div class='slider-area2 section-bg2' data-background='assets/img/hero/hero6.png'>
            <div class='slider-height2 d-flex align-items-center'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='hero-cap hero-cap2'>
                                <h2 class=''>$project_name</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- Product-detals-header Start -->
        <div class='product-detals-header section-padding40'>
            <div class='container'>
                <div class='row'>
                    <div class='col-xl-8 col-lg-9 col-md-12'>
                        <div class='about-caption mb-50'>
                            <p>$project_description</p>
                        </div>
                    </div>
                </div>";
               
                foreach ($image_files as $image_file) {
        echo "
        <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class='singel-details-img mb-30'>
                    <img src='/img/projecten/$image_folder/" . basename($image_file) . "' alt='' class='w-50'>
                </div>
            </div>";
    } echo"
            </div>
        </div>
        <!-- Product-detals-header End -->";
} echo"

        <!--?  Map Area start  -->
        <section class='Map-area'>
            <div class='d-none d-sm-block'>
                <div id='map' style='height: 480px; width: 100%; position: relative; overflow: hidden;'>
                    <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2501.002815288073!2d5.583622376954707!3d51.18217103440986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0d482d6c0de9d%3A0x59e3bd1688ddba07!2sJanssens%20bvba!5e0!3m2!1snl!2sbe!4v1714898067652!5m2!1snl!2sbe'
                            width='100%' height='450' style='border:0;' allowfullscreen='' loading='lazy'
                            referrerpolicy='no-referrer-when-downgrade'>
                    </iframe>
                </div>
            </div>
        </section>
        <!-- Map Area End -->
        <!-- Want To work 2-->
        <section class='wantToWork-area'>
            <div class='container'>
                <h2 class='text-center'>Werken bij Janssens</h2>
                <div class='wants-wrapper w-padding3'>
                    <div class='row align-items-center justify-content-between'>
                        <div class='col-xl-3 col-lg-3 col-md-3'>
                            <div class='wantToWork-caption wantToWork-caption2'>
                                <div class='logo'>
                                    <img src='/assets/img/logo/logo.png' alt='logo Janssens BVBA'>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-8 col-lg-8 col-md-8'>
                            <div class='double-btn f-right '>
                                <a href='/jobs/' class='btn w-btn wantToWork-btn mr-20'>Alle jobs <i
                                            class='ti-arrow-right'></i></a>
                                <a href='/jobs/montage/' class='btn2 w-btn wantToWork-btn'>Ik wil buiten werken <i
                                            class='ti-arrow-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End 2-->
    </main>";

include $_SERVER["DOCUMENT_ROOT"] . "/footer.php";
