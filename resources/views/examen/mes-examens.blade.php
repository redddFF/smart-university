@extends('layouts.main')

@section('papier')

@if(Auth::user()->id != NULL)
        <a type="button" href="{{route('examen.create')}}" class="btn btn-primary">Ajouter</a>
    @endif
@include('layouts.liste-examens');

@endsection