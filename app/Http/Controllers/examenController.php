<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamenRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//Auth::logout();
//Auth::login(User::first()) ; 
class examenController extends Controller
{
    public function __invoke(Request $request)
    {
      

       $examens=Examen::paginate();
       $data=[
           'title' => 'Examens',
           'description' => 'Liste des Examens',
           'heading' => config('app.name'),
           'examens' => $examens
       ];
       return view('examen.index',$data);
    }
    public function index()
    {
        $examens=Examen::paginate();
     
      
        $data=[
            'title'=> $description ="EXAMS LIST",
            'description'=>$description,
            'examens'=>$examens,
            'heading' => $description

        ];

        
        return view('examen.mes-examens',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title' => $description="add new exam",
            'description' => $description,
            'heading' => $description
        ];
        return view('examen.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamenRequest $request)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();
            $examen=null;
            $url_examen=null;

            if(($request->file('examen')!==null)&&($request->file('examen')->isValid())){

                $ext=$request->file('examen')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $examen=$request->file('examen')->storeAs('public/files',$fileName);
                $url_examen=env('APP_URL').Storage::url($examen);
            }

            Examen::create([
                'titre_examen'=>$validated['titre_examen'],
                'niveau_examen'=> $validated['niveau_examen'],
                'matiere_examen' => $validated['matiere_examen'],
                'annee_examen' => $validated['annee_examen'],
                'examen' => $examen,
                'url_examen' => $url_examen
            
            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('examen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examan)
    {
        $data=[    
            'title'=>'exam' .$examan->titre_examen,
            'description' => 'Détails exam: '.$examan->titre_examen,
            'heading'=>config('app.name'),
            'examen'=>$examan
        ] ; 
   
   return view('examen.details-examen',$data) ; 
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examan)
    {
        $data=[
            'title' => $description="Edit ".$examan->title_examen,
            'description' => $description,
            'heading' => $description,
            'examen' =>$examan
        ];
        return view('examen.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(ExamenRequest $request, Examen $examan)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();

            $exam =$examan->examen;
            $url=$examan->url_examen;

            if(($request->file('exam')!==null)&&($request->file('exam')->isValid())){

                $ext=$request->file('exam')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $exam=$request->file('exam')->storeAs('public/files',$fileName);
                $url=env('APP_URL').Storage::url($exam);


              

            }
        
            Examen::where('id',$examan->id)->update([
                'titre_examen'=>$validated['titre_examen'],
                'niveau_examen'=> $validated['niveau_examen'],
                'matiere_examen' => $validated['matiere_examen'],
                'annee_examen' => $validated['annee_examen'],
                'examen' => $exam,
                'url_examen' => $url
            
            ]);

        }catch(ValidationException $exception){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('examen.show',[$examan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examan)
    {
        DB::beginTransaction();
        try{
            DB::afterCommit(function() use($examan){

                if($examan->examen!=null){
                    Storage::delete($examan->examen);
                }

            });

            $examan->delete();

        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('examen.index');
    }
    }

