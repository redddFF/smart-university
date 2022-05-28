@extends('layouts.main')
@section('papier')

<form action="{{route('pfe.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="sujet_pfe" class="form-label">Sujet pfe :  </label>
            <input  class="form-control" id="sujet_pfe" name="sujet_pfe">
        </div>
        <div class="mb-3">
            <label for="departement_pfe" class="form-label">Departement pfe :  </label>
            <input  class="form-control" id="departement_pfe" name="departement_pfe">
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('pfe.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>


@endsection