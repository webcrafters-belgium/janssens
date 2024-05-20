<?php
require_once( "{$_SERVER["DOCUMENT_ROOT"]}/ini.inc" );
$secretkey = "6LdaTtEpAAAAABFx-vIDvdS9cBBASV_iSuPxySoY";

echo "
<link rel='stylesheet' href='/css/contactform.css'>
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
                                <div class='section-title section-title2 mb-30'>
                                    <h2>Contacteer ons</h2>
                                </div>
                            </div>
                        </div>
                        <form id='contact-form' action='' method='POST' class='contact-form'>
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
                                        <select name='subject' id='subject'>
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
                                            id='contactButton'
                                            name='contactForm'
                                            class='btn btn-primary rounded-pill bg-black text-center'
                                           
                                            type='submit'>
                                            Verzend bericht
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id='contactform-response' class='bg-success text-white'></div>
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
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#contactform-response').removeClass('bg-danger').addClass('bg-success').text(response.message).css('display', 'block');
                    } else {
                        $('#contactform-response').removeClass('bg-success').addClass('bg-danger').text(response.message).css('display', 'block');
                    }
                },
            });
        });
    });
</script>

 

    ";