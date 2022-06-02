@extends('layouts.app')

@section('content')

@if(Auth::user()->id != NULL)
        <a type="button" href="{{route('pfe.create')}}" class="btn btn-primary">Ajouter</a>
    @endif
@include('layouts.liste-pfes');

@endsection