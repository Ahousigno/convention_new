@extends('layouts.client_layout')
@section('contenu')

@if (session('status'))
<div align='center' class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<?php $nav = "partenariat" ?>
<!-- Popular Packages --><br>
<section class="popular-packages">
    <div class="container">
        <section class="login">
            <form action="{{route('partenariat.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="panel" style="box-shadow: inset
                0 0 0.7em blue;">
                    <div style="margin:20px" class="row login">


                        <div align="center" class="form-group col-xs-12" style="margin-top:30px" ;>
                            <h3>Voulez vous devenir partenaire de l'UVCI ?
                                Renseignez le formulaire ci-dessous</h3>
                        </div>
                        <div align="center" class="form-group col-sm-4" style="margin-top:30px" ;>
                            <label>Nom de la Structure</label>
                            <input type="text" name="libelle_structure" required class="form-control">
                        </div>

                        <div align="center" class="form-group col-sm-4" style="margin-top:30px" ;>
                            <label>Nom et Prénoms du responsable</label>
                            <input type="text" name="prenoms" required class="form-control">
                        </div>

                        <div align=" center" class="form-group col-sm-4" style="margin-top:30px" ;>
                            <label>Nom et Prénoms du point focal</label>
                            <input type=" text" name="nom" required class="form-control">
                        </div>

                        <div align="center" class="form-group col-sm-4" style="margin-top:30px" ;>
                            <label>Contact Téléphonique</label>
                            <input type="text" name="contact_tel" required class="form-control">
                        </div>

                        <div align="center" class="form-group col-sm-4" style="margin-top:30px" ;>

                            <label>E-mail</label>
                            <input type="email" name="email" required class="form-control">
                        </div>

                        <div align="center" class="form-group col-sm-4" style="margin-top:30px" ;>
                            <label>Situation Géographique</label>
                            <input type="text" name="situation_geo" required class="form-control">
                        </div>

                        <div class="form-group col-xs-12" style="margin-top:15px" ;>
                            <label for="exampleFormControlTextarea1"> Objet du Partenariat</label>
                            <textarea class="form-control" name="motif" id="exampleFormControlTextarea1"
                                rows="5"></textarea>
                        </div>

                        <div class="form-group col-sm-6" style="margin-top:15px" ;><br>
                            <label>Logo de la Structure (facultatif)</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group col-sm-6" style="margin-top:15px" ;><br>
                            <label>chargez votre convention (facultatif)</label>
                            <input type="file" name="exemple_convention" class="form-control">
                        </div>

                        <div class="col-xs-12" style="margin-bottom:10px" ;>
                            <div class="checkbox-outer">
                                <input type="checkbox" name="check" value="OUI"> J'accepte <a href="#"> les termes et
                                    conditions.</a>
                            </div>
                        </div>
                        <div class="col-xs-12" style="position: center;margin-bottom:15px">
                            <div class="btn-btn">
                                <input class="btn btn-success" type="submit" value="SOUMETTRE">
                            </div>
                        </div>
                        <br><br>
                    </div>


                </div>


            </form>
        </section>
    </div>
</section>

@endsection()