@extends("layouts.client_layout")

@section("contenu")
<?php $nav = "home" ?>
<div class="content bg-light">
    <div style="background-image: url({{asset('/client/assets/img/banner_partenariat.jpg')}});" class="banner">
        <div class="overlay container-fluid mt-2">
            <h2 class="text">
            </h2>
            <h3 class="text2"></h3>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<!-- andnonce des objectifs de la plateforme -->
<div class="container" style="margin-bottom: 70px">
    <div class="row mb-0" style="margin-top:-80px; margin-bottom: 70px" ;>

        <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

            <a href="{{route('client.partenariat')}}">
                <div class="box">
                    <div class="our-services privacy">
                        <div class="icon">
                            <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/network.png"
                                width="70" height="70">
                        </div>
                        <h4> Demander vos partenariats</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">
            <a href="{{route('client.convention')}}">
                <div class="box">
                    <div class="our-services privacy">
                        <div class="icon">
                            <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/bourse.png"
                                width="70" height="70">
                        </div>
                        <h4> Demander vos conventions
                            ;<br></h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

            <a href="{{route('client.partenariat')}}">
                <div class="box">
                    <div class="our-services privacy">
                        <div class="icon">
                            <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/tutor.png"
                                width="70" height="70">
                        </div>
                        <h4>Gerer les partenariats;<br></h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">

            <a href="{{route('client.convention')}}">
                <div class="box">
                    <div class="our-services privacy">
                        <div class="icon">
                            <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/school.png"
                                width="70" height="70">
                        </div>
                        <h4>Gerer les conventions<br></h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- fin d'annonce des objectifs de la plateforme -->



<!-- Testimonials -->
<section class="testimonials">
    <div class="section-title text-center">
        <h2>NOS PARTENAIRES</h2>
        <div class="section-icon section-icon-white">
            <i class="flaticon-diamond"></i>
        </div>
    </div>
    <!-- Paradise Slider -->
    <div id="testimonial_094" class="carousel slide testimonial_094_indicators thumb_scroll_x swipe_x ps_easeOutSine"
        data-ride="carousel" data-pause="hover" data-interval="3000" data-duration="1000">




        <!-- Wrapper For Slides -->
        <div class="carousel-inner" role="listbox">

            <!-- First Slide -->
            <div class="item active">
                <!-- Text Layer -->
                <!-- <div class="testimonial_094_slide">
                    <p>Système de Gestion des Conventions de l'Universtité Virtuelle de Côte d'Ivoire:</p>
                    <h5><a href="#">DRH - UVCI</a></h5>
                </div> /Text Layer -->
            </div> <!-- /item -->
            <!-- End of First Slide -->

            <div class="item">
                <div class="testimonial_094_slide">

                </div>
            </div>

        </div>
    </div>

</section>



@endsection()