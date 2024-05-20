<?php
$activePage = "Contact";
$pagetitle = "Contacteer Janssens BVBA";
$description = "Contacteer Janssens bvba";
$keywords = "Janssens, contact";
include $_SERVER['DOCUMENT_ROOT'] . '/ini.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
echo"
<main>
    <div class='contact-form testimonial-area section-padding40 mb-40'>
        <div class='container'>
            <div class='row d-flex flex-sm-column flex-md-row justify-content-evenly align-items-center'>
                <div class='col-lg-6 col-md-12'>
                    <!-- slider -->
                    <div class='single-man-slider'>
                        <div class='man-slider-active' style='height: 470px'>
                            <div class='single-mam-img'>
                                <img src='/img/projecten/watertoren-GHLIN/chateau-eau-ghlin_03.jpg' alt='Watertoren GHLIN'>
                            </div>
                            <div class='single-mam-img'>
                                <img src='/img/projecten/kanaalsite-WIJNEGEM/coverImg.jpg' alt='kanaalsite wijnegem'>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 col-md-12'>
                    <!-- contact-form -->
                    <div class='form-wrapper'>
                        <div class='row '>
                            <div class='col-xl-12'>
                                <div class='section-tittle section-tittle2 mb-30'>
                                    <h2>Contacteer ons</h2>
                                </div>
                            </div>
                        </div>
                        <form id='contact-form' action='' method='POST'>
                            <div class='row'>
                                <div class='col-lg-12 col-md-6'>
                                    <div class='form-box user-icon mb-15'>
                                        <input type='text' name='name' placeholder='Je naam'>
                                    </div>
                                </div>
                                <div class='col-lg-12 col-md-6'>
                                    <div class='form-box email-icon mb-15'>
                                        <input type='text' name='email' placeholder='Email adres'>
                                    </div>
                                </div>
                                <div class='col-lg-12 col-md-6 mb-15'>
                                    <div class='select-itms'>
                                        <select name='select' id='select2'>
                                            <option value='engineering'>Engineering</option>
                                            <option value='production'>Productie</option>
                                            <option value='conservering'>Conservering</option>
                                            <option value='montage'>Montage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-box message-icon mb-15'>
                                        <textarea name='message' id='message' placeholder='Bericht'></textarea>
                                    </div>
                                    <div class='submit-info'>
                                        <button
                                                class='submit-btn2 g-recaptcha'
                                                data-sitekey='$recaptcha_site_key'
                                                data-callback='onSubmit'
                                                data-action='submit'
                                                type='submit'>
                                            Verzend bericht
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('#contact-form').submit(function(event) {
            event.preventDefault();

            // Verkrijg de formuliergegevens
            var formData = $(this).serialize();

            // Voer een AJAX-verzoek uit
            $.ajax({
                type: 'POST',
                url: '/functions/contact/process.php', 
                data: formData,
                success: function(response) {
                    alert('Bericht succesvol verzonden');
                },
                error: function(xhr, status, error) {
                    alert('Er is een fout opgetreden bij het verzenden van het bericht');
                }
            });
        });
    });
</script>
";
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
