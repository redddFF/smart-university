@extends('layouts.main')

@section('papier')

    <form action="{{route('pfe.update',[$pfe])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="sujet_pfe"  class="form-label">Sujet_pfe</label>
            <input  class="form-control" id="sujet_pfe" name="sujet_pfe" value="{{old('sujet_pfe',$pfe->sujet_pfe)}}">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="departement_pfe" id="departement_pfe" name="departement_pfe">{{old('departement_pfe',$pfe->departement_pfe)}}
            </textarea>
            <label for="departement_pfe">Description</label>
        </div>
 
      

        <a type="button" class="btn btn-secondary" href="{{route('pfe.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
