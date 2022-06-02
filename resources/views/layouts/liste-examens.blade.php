@include('layouts.main');
<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($examens as $examen)
            <div class="card col m-b-2" style="width: 18rem;">
            <img src="{{$examen->examen}}" class="card-img-top" width="200" height="200" alt="{{$examen->titre_examen}}">
                <div class="card-body">
                <h5 class="card-title">{{$examen->titre_examen}}</h5>
               
                <a href="{{route('examen.show',[$examen->id])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>
 
        @endforeach
    </div>
</div>
{{ $examens->links() }}
 
