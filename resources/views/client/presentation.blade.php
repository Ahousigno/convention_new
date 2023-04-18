@extends('layouts.client_layout')
@section('contenu')
<!-- Banner start -->

@if (session('status'))
<div align='center' class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<?php $nav = "presentation" ?>
<!-- Destinations -->
<section class="destinations">
    <div class="container" style="box-shadow: inset
                0 0 0.5em blue;">
        <div class="row">
            <div class="col-lg-offset-2" style="margin-bottom: 70px" ;>

                <h2 align="center">Service Juridique, Communication et Partenariats</h2>
                <br>
                <h4 align="center" style="margin-bottom: 70px" ;>Le Service Juridique, Communication et Partenariats a
                    pour missions de
                    :</h4><br>

                <!-- <ul style="font-size:17px">
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Apporter une assistance juridique aux différents services de l’UVCI ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Assister et conseiller les responsables en matière d’élaboration ou d’interprétation ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Aider à la prise de décision ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Assurer la veille juridique ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Veiller à la régularité juridique des actions à entreprendre ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Protéger les intérêts de l’UVCI ;
          </li>
          <li>
            <i class="fa fa-check" style="color:green" aria-hidden="true"> </i>
            Participer à la rédaction des contrats.
          </li>
        </ul> -->


            </div>
        </div>


        <div class="container">
            <div class="row mb-0" style="margin-top:-80px; margin-bottom: 70px" ;>

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/network.png"
                                        width="70" height="70">
                                </div>
                                <h4> Apporter une assistance juridique aux différents services de l’UVCI ;<br>(CSSU)
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/bourse.png"
                                        width="70" height="70">
                                </div>
                                <h4> Assister et conseiller les responsables en matière d’élaboration ou
                                    d’interprétation
                                    ;<br></h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/tutor.png"
                                        width="70" height="70">
                                </div>
                                <h4>Aider à la prise de décision ;<br></h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/school.png"
                                        width="70" height="70">
                                </div>
                                <h4>Assurer la veille juridique<br></h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <br> <br> <br> <br>
            <div class="row mb-0" style="margin-top:-80px">

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/network.png"
                                        width="70" height="70">
                                </div>
                                <h4> Veiller à la régularité juridique des actions à entreprendre ;<br></h4>
                            </div>
                        </div>

                        <a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="#">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/bourse.png"
                                        width="70" height="70">
                                </div>
                                <h4> Protéger les intérêts del’UVCI et participer à la rédaction des contrats;
                                    ;<br></h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 perso-mb">

                    <a href="https://event.uvci.edu.ci/event/public/home">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/tutor.png"
                                        width="70" height="70">
                                </div>
                                <h4>Organiser les évènements ;<br></h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="https://assistance.uvci.edu.ci/">
                        <div class="box">
                            <div class="our-services privacy">
                                <div class="icon">
                                    <img src="https://assistance.uvci.edu.ci/communaute/public/assets/images/icons/school.png"
                                        width="70" height="70">
                                </div>
                                <h4>Porter assistance aux clients<br></h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <br>

    </div>
</section>


<style>

</style>
@endsection()