<?php
$activePage = 'Blog';
$pagetitle = "Janssens BVBA blogs, nieuws en sfeerbeelden";
$keywords = "Janssens, blogs, sfeerbeelden, staalconstructies, industriebouw, dakbekleding, wandbekleding";
$description = "Janssens BVBA blogs, Blijf op de hoogte van de laatste ontwikkelingen in de bouwsector met ons informatieve blog. Ontvang waardevolle inzichten en tips over staalconstructies, montage en meer.";

include $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

// Query om blogs op te halen
$blog_query = "SELECT * FROM blogs";
$blog_result = $conn->query($blog_query);

$primary = "#0091C0";

echo "
   <main>
      <!-- Hero Start -->
      <div class='slider-area2 section-bg2 bg-dark'>
         <div class='slider-height2 d-flex align-items-center'>
            <div class='container'>
               <div class='row'>
                  <div class='col-xl-12'>
                        <div class='hero-cap hero-cap2 text-start'>
                           <h2>Blogs</h2>
                           <p class='text-white'>Janssens BVBA blogs, nieuws en sfeerbeelden</p>
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
               <div class='col-lg-8 posts-list'>";
if ($blog_result->num_rows > 0) {
    while ($row = $blog_result->fetch_assoc()) {
        echo "
        <div class='single-post'>
            <h3>{$row['titel']}</h3>
            <p><strong>Datum:</strong> {$row['datum']}</p>
            <p>{$row['ondertitel']}</p>
            <img class='w-50' src='{$row['afbeelding']}' alt='Afbeelding bij blogpost'>
            <p>{$row['tekst']}</p>
            <p><em>{$row['quote']}</em></p>
            
            <div class='comments-area'>
               <h4>Reacties</h4>";

        // Query om reacties op te halen voor deze specifieke blogpost
        $comments_query = "SELECT * FROM blog_comments WHERE blog_id = {$row['id']}";
        $comments_result = $conn->query($comments_query);

        if ($comments_result->num_rows > 0) {
            while ($comment_row = $comments_result->fetch_assoc()) {
                echo "
                     <div class='comment-list'>
                        <div class='single-comment justify-content-between d-flex'>
                           <div class='user justify-content-between d-flex'>
                              <div class='thumb'>
                                 <img src='/img/blog/comment_1.png' alt=''>
                              </div>
                              <div class='desc'>
                                 <p class='comment'>{$comment_row['comment']}</p>
                                 <div class='d-flex justify-content-between'>
                                    <div class='d-flex align-items-center'>
                                       <h5>{$comment_row['commented_by']}</h5>
                                       <p class='date'>{$comment_row['commented_on']}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>";
            }
        } else {
            echo "<p>Geen reacties gevonden.</p>";
        }

        echo "
            </div> <!-- .comments-area -->
            
        </div> <!-- .single-post -->";
    }
} else {
    echo "<p>Geen blogs gevonden.</p>";
}

echo "
               </div> <!-- .col-lg-8 -->
               <div class='col-lg-4'>
                  <div class='blog_right_sidebar'>
                     <aside class='single_sidebar_widget search_widget'>
                        <form action='#'>
                           <div class='form-group'>
                              <div class='input-group mb-3'>
                                 <input type='text' class='form-control' placeholder='Zoeken...'>
                                
                              </div>
                           </div>
                           <button class='button rounded-0 btn-primary text-white w-100 btn_1 boxed-btn' type='submit' style='background: $primary'>Zoeken</button>
                        </form>
                     </aside>
                     <aside class='single_sidebar_widget post_category_widget'>
                        <h4 class='widget_title' style='color: #2d2d2d;'>Categorieën</h4>
                        <ul class='list cat-list'>
                            ";
                            $getCategorieSql = "SELECT `id`, `naam` FROM `categorieen`";
                            $categorieResult = $conn->query($getCategorieSql);

                            if ($categorieResult->num_rows > 0) {
                                while ($cat_row = $categorieResult->fetch_assoc()) {
                                    // Query om het aantal berichten per categorie op te halen
                                    $countPostsSql = "SELECT COUNT(*) AS aantal_posts FROM `blog_categorieen` WHERE `categorie_id` = {$cat_row['id']}";
                                    $countPostsResult = $conn->query($countPostsSql);
                                    $countPostsRow = $countPostsResult->fetch_assoc();
                                    $aantal_posts = $countPostsRow['aantal_posts'];

                                    echo "
                                    <li>
                                        <a href='#' class='d-flex'>
                                            <p>{$cat_row['naam']}</p>
                                            <p>($aantal_posts)</p>
                                        </a>
                                    </li>";
                                }
                            } else {
                                echo "<li><p>Geen categorieën gevonden.</p></li>";
                            }
                            echo"
                        </ul>
                    </aside>

                     <aside class='single_sidebar_widget popular_post_widget'>
                        <h3 class='widget_title' style='color: #2d2d2d;'>Recente Berichten</h3>
                        ";
                        // Query om de 5 nieuwste berichten op te halen
                        $recenteBerichtenSql = "SELECT * FROM `blogs` ORDER BY `datum` DESC LIMIT 5";
                        $recenteBerichtenResult = $conn->query($recenteBerichtenSql);
                        
                        if ($recenteBerichtenResult->num_rows > 0) {
                            while ($row = $recenteBerichtenResult->fetch_assoc()) {
                                echo "
                                <div class='media post_item'>
                                    <img src='{$row['afbeelding']}' class='w-100' alt='post'>
                                    <div class='media-body'>
                                        <a href='/blog/blog_details.php?id={$row['id']}'>
                                            <h3 style='color: #2d2d2d;'>{$row['titel']}</h3>
                                        </a>
                                        <p>{$row['datum']}</p>
                                    </div>
                                </div>";
                            }
                        } else {
                            echo "<p>Geen recente berichten gevonden.</p>";
                        }
                        echo"
                    </aside>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Area End -->
   </main>

";

include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
