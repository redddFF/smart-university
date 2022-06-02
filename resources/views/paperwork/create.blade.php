@extends('layouts.app')
@section('content')

<form action="{{route('paperwork.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titre_paperwork" class="form-label">Titre: </label>
            <input  class="form-control" id="titre_paperwork" name="titre_paperwork">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
            <label for="description">Description</label>
        </div>
       
        <div class="mb-3">
            <label for="paperwork" class="form-label">File</label>
            <input class="form-control" type="file" id="paperwork" name="paperwork">
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('paperwork.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>


@endsection