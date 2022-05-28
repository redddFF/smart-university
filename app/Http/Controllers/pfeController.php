<?php

namespace App\Http\Controllers;

use App\Models\Pfe;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaperWorkRequest;
use App\Http\Requests\PfeRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

Auth::logout();
Auth::login(User::first()) ; 

class pfeController extends Controller
{
    public function __invoke(Request $request)
    {
      

       $pfes=Pfe::paginate();
       $data=[
           'title' => 'PFEs',
           'description' => 'Liste des pfes',
           'heading' => config('app.name'),
           'pfes' => $pfes
       ];
       return view('pfe.index',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $pfes=auth()->user()->pfe()->paginate();
     
          
        $data=[
            'title'=> $description ="Mes Pfes",
            'description'=>$description,
            'pfes'=>$pfes,
            'heading' => $description

        ];

        
        return view('pfe.mes-pfes',$data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title' => $description="ajouter nouveau pfe",
            'description' => $description,
            'heading' => $description
        ];
        return view('pfe.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PfeRequest $request)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();
         
       

            Auth::user()->pfe()->create([
                'departement_pfe'=> $validated['departement_pfe'],
                'sujet_pfe' => $validated['sujet_pfe'],
                
            
            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('pfe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function show(Pfe $pfe)
    {
        $data=[    
            'title'=>'Sujets Pfe:',
            'description' => 'Détails pfe: ',
            'heading'=>config('app.name'),
            'pfe'=>$pfe
        ] ; 
   
   return view('pfe.details-pfe',$data) ; 
   
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function edit(Pfe $pfe)
    {
        abort_if(auth()->user()->id !== $pfe->organisateur->id,403 );

        $data=[
            'title' => $description="Editer Sujet Pfe ",
            'description' => $description,
            'heading' => $description,
            'pfe' =>$pfe
        ];
        return view('pfe.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function update(PfeRequest $request, Pfe $pfe)
    {
        abort_if($pfe->organisateur->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            $validated = $request->validated();

        
        
            Auth::user()->pfe()->where('id',$pfe->id)->update([
                'departement_pfe'=> $validated['departement_pfe'],
                'sujet_pfe' => $validated['sujet_pfe'],
            ]);

        }catch(ValidationException $exception){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('pfe.show',[$pfe]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pfe $pfe)
    {
        abort_if($pfe->organisateur->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
           $pfe->delete();

        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('pfe.index');
    }
}
