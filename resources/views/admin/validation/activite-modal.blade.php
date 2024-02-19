<?php

use Carbon\Carbon; ?>

<div class="modal fade" id="gridModal{{$partenariat->id}}" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Enregistrez une activité avec le partenaire</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('activite', $partenariat->id)}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="partenariat_id" value="{{$partenariat->id}}">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">Nom activite</label>
                            <input type="text" name="nom_activite" id="" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">date de début</label>
                            <input type="date" name="debut_activite" id="" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">date de fin</label>
                            <input type="date" name="fin_activite" id="" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
                <div class="card">
                    <div class="card-header">
                        Activités menées avec ce partenaire
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                            <div class="table-responsive">
                                <table id="config-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom de l'activité</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='content'>
                                        @if(is_object($partenariat->activites))
                                        @foreach($partenariat->activites as $activite)
                                        <tr style="font-size:13px">
                                            <th scope="row">{{$loop->index + 1}}</th>
                                            <td>{{$activite->nom_activite}}</td>
                                            <td style="width:140px">
                                                {{ Carbon::parse($activite->debut_activite)->format('d-m-Y')}}</a>

                                            </td>
                                            <td style="width:140px">
                                                {{ Carbon::parse($activite->fin_activite)->format('d-m-Y')}}</a>

                                            </td>
                                            <td>
                                                <div style=" display:flex; flex-flow:row nowrap">
                                                    <form action="{{route('activite-sup',$activite->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button onclick=" return confirm(' Voulez-vous vraiment Supprimer ?')" style="margin-left:10px; border:0px" name="submit">
                                                            <i style="color:red" class=" fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            </p>

                        </blockquote>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>