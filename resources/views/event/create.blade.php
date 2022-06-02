@extends('layouts.app')
@section('content')

<form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre: </label>
            <input  class="form-control" id="title" name="title">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
            <label for="description">Description</label>
        </div>
        <div class="mb-3">
            <label for="dateDebut" class="form-label">Date début: </label>
            <input  type="date" class="form-control" id="dateDebut" name="dateDebut">
        </div>
        <div class="mb-3">
            <label for="dateFin" class="form-label">Date fin: </label>
            <input  type="date" class="form-control" id="dateFin" name="dateFin">
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label"> Poster:</label>
            <input class="form-control" type="file" id="poster" name="poster">
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('event.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>


@endsection