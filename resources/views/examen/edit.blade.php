@extends('layouts.main')

@section('papier')

    <form action="{{route('examen.update',[$examen])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titre_examen"  class="form-label">Title : </label>
            <input  class="form-control" id="titre_examen" name="titre_examen" value="{{old('titre_examen',$examen->titre_examen)}}">
        </div>
        
        <div class="mb-3">
            <label for="niveau_examen"  class="form-label">Level : </label>
            <input  class="form-control" id="niveau_examen" name="niveau_examen" value="{{old('niveau_examen',$examen->niveau_examen)}}">
        </div>

        <div class="mb-3">
            <label for="annee_examen"  class="form-label">Year : </label>
            <input  class="form-control" id="annee_examen" name="annee_examen" value="{{old('annee_examen',$examen->annee_examen)}}">
        </div>
        
        <div class="mb-3">
            <label for="matiere_examen"  class="form-label">Matiere : </label>
            <input  class="form-control" id="matiere_examen" name="matiere_examen" value="{{old('matiere_examen',$examen->matiere_examen)}}">
        </div>
         <div class="mb-3">
            <label for="examen" class="form-label">choisisser un autre fichier</label>
            <input class="form-control" type="file" id="examen" name="examen" >
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('examen.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
