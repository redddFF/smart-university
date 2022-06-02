@extends('layouts.app')
@section('content')

<form action="{{route('examen.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titre_examen" class="form-label">Titre: </label>
            <input  class="form-control" id="titre_examen" name="titre_examen">
        </div>
        <div class="mb-3">
            <label for="niveau_examen" class="form-label">Level: </label>
            <input  class="form-control" id="niveau_examen" name="niveau_examen">
        </div>
        <div class="mb-3">
            <label for="matiere_examen" class="form-label">Matiere: </label>
            <input  class="form-control" id="matiere_examen" name="matiere_examen">
        </div>
        <div class="mb-3">
            <label for="annee_examen" class="form-label"> Annee: </label>
            <input  class="form-control" id="annee_examen" name="annee_examen">
        </div>
        <div class="mb-3">
            <label for="examen" class="form-label"> File:</label>
            <input class="form-control" type="file" id="examen" name="examen">
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('examen.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>


@endsection