@include('layouts.main');
<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($pfes as $pfe)
            <div class="card col m-b-2" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{$pfe->sujet_pfe}}</h5>
               
                <a href="{{route('pfe.show',[$pfe->id])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>
 
        @endforeach
    </div>
</div>
{{ $pfes->links() }}
 