@extends('layouts.main')

@section('papier')

@if(Auth::user()->id != NULL)
        <a type="button" href="{{route('event.create')}}" class="btn btn-primary">Ajouter</a>
    @endif
@include('layouts.liste-events');

@endsection