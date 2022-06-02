<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str ; 

//Auth::logout();
//Auth::login(User::first()) ; 

class eventController extends Controller
{
    public function __invoke(Request $request)
    {
       $events=Event::paginate();
       $data=[
           'title' => 'Events',
           'description' => 'Liste des Evennements',
           'heading' => config('app.name'),
           'events' => $events
       ];
       return view('event.index',$data);
    }

    public function index()
    {
        $events=auth()->user()->event()->paginate();
     
       
      $data=[
          'title'=> $description ="MY EVENTS",
          'description'=>$description,
          'events'=>$events,
          'heading' => $description

      ];

      
      return view('event.mes-events',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title' => $description="add new event",
            'description' => $description,
            'heading' => $description
        ];
        return view('event.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();
            $poster=null;
            $urlPoster=null;

            if(($request->file('poster')!==null)&&($request->file('poster')->isValid())){

                $ext=$request->file('poster')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $poster=$request->file('poster')->storeAs('public/images',$fileName);
                $urlPoster=env('APP_URL').Storage::url($poster);
            }

            Auth::user()->event()->create([
                'title'=> $validated['title'],
                'description' => $validated['description'],
                'poster' => $poster,
                'urlPoster' => $urlPoster,
                'dateDebut'=> $validated['dateDebut'],
                'dateFin' => $validated['dateFin'],
            
            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data=[    
            'title'=>'Event' .$event->title,
            'description' => 'Détails event: '.$event->title,
            'heading'=>config('app.name'),
            'event'=>$event
        ] ; 
   
   return view('event.details-event',$data) ; 
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        abort_if(auth()->user()->id !== $event->owner->id,403 );

        $data=[
            'title' => $description="Editer Event ".$event->title,
            'description' => $description,
            'heading' => $description,
            'event' =>$event
        ];
        return view('event.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        abort_if($event->owner->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            $validated = $request->validated();

            $poster=$event->poster;
            $urlPoster=$event->url_Poster;

            if(($request->file('poster')!==null)&&($request->file('poster')->isValid())){

                $ext=$request->file('poster')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $poster=$request->file('poster')->storeAs('public/images',$fileName);
                $urlPoster=env('APP_URL').Storage::url($poster);


              

            }
        
            Auth::user()->event()->where('id',$event->id)->update([
                'title'=> $validated['title'],
                'description' => $validated['description'],
                'poster' => $poster,
                'urlPoster' => $urlPoster,
                'dateDebut'=> $validated['dateDebut'],
                'dateFin' => $validated['dateFin'],
            ]);

        }catch(ValidationException $exception){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('event.show',[$event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        abort_if($event->owner->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            DB::afterCommit(function() use($event){

                if($event->poster!=null){
                    Storage::delete($event->poster);
                }

            });

            $event->delete();

        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('event.index');
    }
        
    }

