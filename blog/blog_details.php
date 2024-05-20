<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
$activePage = "Blog";

if (isset($_GET['id'])) {
    $blogId = $_GET['id'];

    // Query om de specifieke blog op te halen
    $blog_query = "SELECT * FROM blogs WHERE id = $blogId";
    $blog_result = $conn->query($blog_query);

    if ($blog_result->num_rows > 0) {
        $row = $blog_result->fetch_assoc();

        $pagetitle = $row['titel'];
        $description = $row['ondertitel'];
        function generateKeywords($pagetitle, $description) {
            // Combineer de titel, ondertitel, tekst en quote tot één string
            $combinedText = $pagetitle . ' ' . $description;

            // Split de gecombineerde tekst op spaties en interpunctie
            $words = preg_split('/[\s.,;!?]+/', $combinedText, -1, PREG_SPLIT_NO_EMPTY);

            // Verwijder duplicaten en converteer naar kleine letters
            $uniqueWords = array_unique(array_map('strtolower', $words));

            // Return de unieke woorden als keywords
            return implode(', ', $uniqueWords);
        }

        $keywords = generateKeywords($pagetitle, $description);
        include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

        echo "
               <main>
                  <!-- Hero Start -->
                  <div class='slider-area2 section-bg2'>
                     <div class='slider-height2 d-flex align-items-center'>
                        <div class='container'>
                           <div class='row'>
                              <div class='col-xl-12'>
                                    <div class='text-start'>
                                       <h1 class='text-dark'>{$row['titel']}</h1>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Hero End -->
                  <!-- Blog Area Start -->
                  <section class='blog_area single-post-area section-padding'>
                     <div class='container'>
                        <div class='row'>
                           <div class='col-lg-8 posts-list'>
                              <div class='single-post'>
                                 <div class='feature-img'>
                                    <img class='img-fluid' src='{$row['afbeelding']}' alt=''>
                                 </div>
                                 <div class='blog_details'>
                                    <h2 style='color: #2d2d2d;'>{$row['titel']}</h2>
                                    <p class='excert'>{$row['ondertitel']}</p>
                                    <p>{$row['tekst']}</p>
                                    <div class='quote-wrapper'>
                                       <div class='quotes'>
                                          {$row['quote']}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              
                           <div class='col-lg-4'>
                              <!-- Sidebar -->
                              <div class='blog_right_sidebar'>
                                 <!-- Sidebar widgets -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-- Blog Area End -->
               </main>";
    } else {
        echo "<p>Geen blog gevonden met de opgegeven id.</p>";
    }
} else {
    echo "<p>Geen id opgegeven.</p>";
}

include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';

