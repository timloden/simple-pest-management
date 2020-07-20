<?php
/**
 * Template Name: Free Estimate
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="bg-light-blue py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center mb-4">Schedule your FREE ESTIMATE</h1>
                <p>Please enter your information below and one of our pest representatives will reach out to you within
                    24 business hours.</p>
                <p> For faster service, please call us at <strong>(619) 373-PEST (7378)</strong></p>
                <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative mb-5"
                    style="z-index: 999;">
                    <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                    <?php gravity_form( 1, false, false, false, '', true, 12 ); ?>
                </div>

                <p class="mb-0">We service all of San Diego County including but not limited to Santee, Lakeside, El
                    Cajon, Rancho
                    San Diego, La Mesa, Lemon Grove, Bonita, Otay Ranch, Chula Vista, National City, Downtown San Diego,
                    Mission Valley, San Carlos, Tierrasanta, Kearny Mesa, Coronado, Imperial Beach, Point Loma, Ocean
                    Beach, Pacific Beach, Mission Bay, La Jolla, Miramar, Scripps Ranch, Torrey Pines, Carmel Valley,
                    Rancho Penasquitos, Poway, Carmel Mountain, Del Mar, Solana Beach, 4s Ranch, Rancho Bernardo, Rancho
                    Santa Fe, Cardiff, and Encinitas.</p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();