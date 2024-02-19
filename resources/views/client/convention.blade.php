@extends('layouts.client_layout')
@section('contenu')

<?php

use App\Models\Convention;

$nav = "conventions" ?>
<!-- Popular Packages --><br>
<!-- <?php $convention = Convention::all();  ?> -->
<section class="popular-packages">
    <div class="container">
        <form action="{{route('save_demande_convention')}}" method="post">
            @csrf
            <div class="panel" style="box-shadow: inset 0 0 0.7em blue; margin-top: 15px">
                <div class="panel-header" style="margin: 20px 0 45px 0">
                    <h4 class="text-center pt-5">Voulez vous faire une demande de convention? Renseignez le formulaire
                        ci-dessous
                    </h4>
                </div>
                <div class="panel-body p-4 mb-5">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Nom et prénoms du demandeur</label>
                                    <input type="text" name="nom" id="" class="form-control">
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
                                    <input type="text" name="emailuvci" id="" class="form-control">
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
                                    <input type="text" name="contact" id="" class="form-control">
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
                                    <!-- $conventions = Convention::all(); -->
                                    <select class="form-control custom-select" required name="convention">
                                        <option selected value="" name="convention">
                                            @foreach($conventions as $convention)
                                        <option value="{{$convention}}">{{$convention}}</option>
                                        @endforeach
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Objet de la demande de cette convention</label>
                                    <textarea name="objet" id="" cols="30" rows="5" class="form-control"></textarea>
                                    @if ($errors->has('objet'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('objet') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom:10px" ;>
                            <div class="checkbox-outer">
                                <input type="checkbox" name="check" value="OUI"> J'accepte <a
                                    href="{{route('client.confidentialite')}}"> les
                                    termes et
                                    conditions.</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" value="SOUMETTRE" class="btn-primary form-control">
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