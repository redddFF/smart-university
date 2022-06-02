<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaperWorkRequest;
use App\Models\PaperWork;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str ;

      //  Auth::logout();
     //   Auth::login(User::first()) ; 

        
class paperworkController extends Controller
{
            public function __invoke(Request $request)
            {
            

            $paperWorks=PaperWork::paginate();
            $data=[
                'title' => 'paperworks',
                'description' => 'Liste des papiers',
                'heading' => config('app.name'),
                'paperWorks' => $paperWorks
            ];
            return view('paperwork.index',$data);
            }

  
   
    public function index()
    {
        

        $paperWorks=auth()->user()->paperworks()->paginate();
     
      
        $data=[
            'title'=> $description ="Mes papiers administratifs",
            'description'=>$description,
            'paperWorks'=>$paperWorks,
            'heading' => $description

        ];

        
        return view('paperwork.mes-paperworks',$data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title' => $description="add new paperwork",
            'description' => $description,
            'heading' => $description
        ];
        return view('paperwork.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaperWorkRequest $request)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();
            $paperwork=null;
            $url_paperwork=null;

            if(($request->file('paperwork')!==null)&&($request->file('paperwork')->isValid())){

                $ext=$request->file('paperwork')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $paperwork=$request->file('paperwork')->storeAs('public/files',$fileName);
                $url_paperwork=env('APP_URL').Storage::url($paperwork);
            }

            Auth::user()->paperworks()->create([
                'titre_paperwork'=> $validated['titre_paperwork'],
                'description' => $validated['description'],
                'paperwork' => $paperwork,
                'url_paperwork' => $url_paperwork,
            
            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('paperwork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperWork  $paperWork
     * @return \Illuminate\Http\Response
     */
    public function show(paperwork $paperwork)
    {
     
       
     $data=[    
         'title'=>'Papiers administratifs:' .$paperwork->titre_paperwork,
         'description' => 'Détails paperwork: '.$paperwork->titre_paperwork,
         'heading'=>config('app.name'),
         'paperwork'=>$paperwork
     ] ; 

return view('paperwork.details-paperwork',$data) ; 

 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperWork  $paperWork
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperWork $paperwork)
    {
        abort_if(auth()->user()->id !== $paperwork->owner->id,403 );

        $data=[
            'title' => $description="Edit: ".$paperwork->title_paperwork,
            'description' => $description,
            'heading' => $description,
            'paperwork' =>$paperwork
        ];
        return view('paperwork.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperWork  $paperWork
     * @return \Illuminate\Http\Response
     */
    public function update(PaperWorkRequest $request, PaperWork $paperwork)
    {
        abort_if($paperwork->owner->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            $validated = $request->validated();

            $paper  =$paperwork->paperwork;
            $url=$paperwork->url_paperwork;

            if(($request->file('paper')!==null)&&($request->file('paper')->isValid())){

                $ext=$request->file('paper')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $paper=$request->file('paper')->storeAs('public/files',$fileName);
                $url=env('APP_URL').Storage::url($paper);


              

            }
        
            Auth::user()->paperworks()->where('id',$paperwork->id)->update([
                'titre_paperwork'=> $validated['titre_paperwork'],
                'description' => $validated['description'],
                'paperwork' => $paper,
                'url_paperwork' => $url,
            ]);

        }catch(ValidationException $exception){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('paperwork.show',[$paperwork]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperWork  $paperWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperWork $paperwork)
    {
        abort_if($paperwork->owner->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            DB::afterCommit(function() use($paperwork){

                if($paperwork->paperwork!=null){
                    Storage::delete($paperwork->paperwork);
                }

            });

            $paperwork->delete();

        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('paperwork.index');
    }
    }

