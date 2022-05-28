@extends('layouts.main')
 
@section('papier')
    <a type="button" class="btn btn-primary" href="{{route('paperwork.index')}}">Back</a>
   
        <a type="button" class="btn btn-primary" href="{{route('paperwork.edit',[$paperwork])}}">Update</a>
        <form style="display: inline;" action="{{route('paperwork.destroy',[$paperwork])}}" method="post">
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
            <h5 class="card-title">{{$paperwork->titre_paperwork}}</h5>
            <p class="card-text">{{$paperwork->description}}</p>
            <p class="card-text">Uploaded at :  {{$paperwork->created_at}}</p>
            <a  href="{{$paperwork->paperwork}}"   type="button" class="btn btn-primary"    download>Download</a>
 
            </div>
        </div>
        </div>
    </div>
@endsection