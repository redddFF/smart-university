@extends('layouts.app')
 
@section('content')
    <a type="button" class="btn btn-primary" href="{{route('pfe.index')}}">Back</a>
   
    <a type="button" class="btn btn-primary" href="{{route('pfe.edit',[$pfe])}}">Update</a>
        <form style="display: inline;" action="{{route('pfe.destroy',[$pfe])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
            Delete
            </button>
        </form>
    
    <div class="card m-3 " style="max-width: 80%; ">
        <div class="row g-0">
     
        
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{$pfe->sujet_pfe}}</h5>
            <p class="card-text">{{$pfe->departement_pfe}}</p>
            <p class="card-text">Uploaded at :  {{$pfe->created_at}}</p>
          
 
            </div>
        </div>
        </div>
    </div>
@endsection