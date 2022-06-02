@extends('layouts.app')
 
@section('content')
    <a type="button" class="btn btn-primary" href="{{route('event.index')}}">Back</a>
   
        <a type="button" class="btn btn-primary" href="{{route('event.edit',[$event])}}">Update</a>
        <form style="display: inline;" action="{{route('event.destroy',[$event])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
            Delete
            </button>
        </form>
    
    <div class="card m-3 " style="max-width: 80%; ">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$event->urlPoster}}" class="img-fluid rounded-start" alt="{{$event->title}}">
        </div>
        
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-text">{{$event->description}}</p>
            <p class="card-text">Date de début: {{$event->dateDebut}}</p>
            <p class="card-text">Date de fin: {{$event->dateFin}}</p>
            <p class="card-text">Uploaded at :  {{$event->created_at}}</p>
            
 
            </div>
        </div>
        </div>
    </div>
@endsection