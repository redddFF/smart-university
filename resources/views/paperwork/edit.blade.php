@extends('layouts.main')

@section('papier')

    <form action="{{route('paperwork.update',[$paperwork])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titre_paperwork"  class="form-label">Title PaperWork </label>
            <input  class="form-control" id="titre_paperwork" name="titre_paperwork" value="{{old('titre_paperwork',$paperwork->titre_paperwork)}}">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Description" id="description" name="description">{{old('description',$paperwork->description)}}
            </textarea>
            <label for="description">Description</label>
        </div>
 
        <div class="mb-3">
            <label for="paperwork" class="form-label">choisisser un autre poster</label>
            <input class="form-control" type="file" id="paperwork" name="paperwork" >
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('paperwork.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
