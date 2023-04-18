@extends('layouts.client_layout')
@section('contenu')

<?php $nav = "conventions" ?>
<!-- Popular Packages --><br>
<section class="popular-packages">
    <div class="container">
        <form action="#" method="post">
            @csrf
            <div class="panel" style="box-shadow: inset 0 0 0.7em blue; margin-top: 15px">
                <div class="panel-header" style="margin: 20px 0 50px 0">
                    <h4 class="text-center">Voulez vous faire une demande de convention? Renseignez le formulaire
                        ci-dessous
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Nom</label>
                                    <input type="text" name="nom" id="">
                                    @if ($errors->has('nom'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('nom') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email UVCI</label>
                                    <input type="text" name="emailuvci" id="">
                                    @if ($errors->has('emailuvci'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('emailuvci') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Contact Téléphonique</label>
                                    <input type="text" name="contact" id="">
                                    @if ($errors->has('contact'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('contact') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Nom de la convention</label>
                                    <input type="text" name="convention" id="">
                                    @if ($errors->has('convention'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('convention') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Objet de la convention</label>
                                    <textarea name="objet" id="" cols="30" rows="10"></textarea>
                                    @if ($errors->has('objet'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('objet') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="btn-blue btn-red" type="submit" value="SOUMETTRE">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<style>
.btn-primary {
    color: #fff;
    background-color: rgb(18, 166, 80);
    border-color: rgb(18, 166, 80);
}

.btn-primary:hover {
    color: #fff;
    background-color: #92278f;
    border-color: #92278f;
}
</style>

@endsection()