<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($paperWorks as $paperWork)
            <div class="card col m-b-2" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{$paperWork->titre_paperwork}}</h5>
               
                <a href="{{route('paperwork.show',[$paperWork->id])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>
 
        @endforeach
    </div>
</div>
{{ $paperWorks->links() }}
 
