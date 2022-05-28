<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($events as $event)
            <div class="card col m-b-2" style="width: 18rem;">
            <img src="{{$event->urlPoster}}" class="card-img-top" width="200" height="200" alt="{{$event->title}}">
                <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
               
                <a href="{{route('event.show',[$event->id])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>
 
        @endforeach
    </div>
</div>
{{ $events->links() }}
 
