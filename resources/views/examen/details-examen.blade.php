@extends('layouts.app')
 
@section('content')
    <a type="button" class="btn btn-primary" href="{{route('examen.index')}}">Back</a>
   
        <a type="button" class="btn btn-primary" href="{{route('examen.edit',[$examen])}}">Update</a>
        <form style="display: inline;" action="{{route('examen.destroy',[$examen])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
            Delete
            </button>
        </form>
    
    <div class="card m-3 " style="max-width: 80%; ">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$examen->examen}}" class="img-fluid rounded-start" alt="{{$examen->titre_examen}}">
        </div>
        
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{$examen->titre_examen}}</h5>
            <p class="card-text">{{$examen->niveau_examen}}</p>
            <p class="card-text">{{$examen->annee_examen}}</p>
            <p class="card-text">{{$examen->matiere_examen}}</p>
            <p class="card-text">Uploaded at :  {{$examen->created_at}}</p>
            
 
            </div>
        </div>
        </div>
    </div>
@endsection