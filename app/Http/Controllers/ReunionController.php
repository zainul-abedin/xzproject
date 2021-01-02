<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use App\Models\Chantier;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data['reunions'] = Reunion::orderBy('start', 'desc')->get();  
        return view('reunion.indexReunion', $data);      
         
    }
    
    public function details(Reunion $reunion)
    {
        $data['reunion'] = $reunion;
        return view('reunion.detailsReunion',$data);
    }
    
    /**
     * Display a list of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $reunions1 = Reunion::all();
        
        $i = 0;       
        foreach ($reunions1 as $reunion1){            
            $reunions[$i] = array(
                'id'=> $reunion1->id,
                'chantier_id' => $reunion1->chantier_id,
                'title' => $reunion1->title,
                'adresse' => $reunion1->chantier->location->chantier_adresse->adresse,
                'start' => $reunion1->start,
                'end' => $reunion1->end,
                'allDay' => $reunion1->allDay,
                'statut' => $reunion1->statut,
                'description' => $reunion1->description,
                'photo' => $reunion1->photo,
                'color' => $reunion1->color,
                'textColor' => $reunion1->textColor,
                'createur' => $reunion1->createur,
                'created_at' => $reunion1->created_at,
                'updated_at' => $reunion1->updated_at 
                );
            $i++;
        }
        
        
        return response()->json($reunions);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['contacts'] = Contact::orderBy('nom', 'ASC')->orderBy('nom_de_societe', 'ASC')->get();
        $data['chantiers'] = Chantier::orderBy('created_at', 'DESC')->get();
        $data['startEndTime'] = $request;
        return view('reunion.createReunion',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validation of the data
        $validator = Validator::make($request->all(),[
            'chantier_id'=>'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        
        if($request->input('allDay')){
            $allDay = 1;
        } else {
            $allDay = 0;
        }
        
        
        
        if($validator->failed()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Take the input fields data from $request object
            $data = [
                'chantier_id' => $request->input('chantier_id'),
                'title' => $request->input('title'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'allDay' => $allDay,
                'description' => $request->input('description'),
                'color' => $request->input('color'),
                'textColor' => $request->input('textColor'),
                'createur' => auth()->user()->name
            ];
            try {
                    Reunion::create($data);
                    session()->flash('message', 'Réunion créé avec succès');
                    session()->flash('type', 'success');

                    return redirect()->back();

                } catch (\Throwable $th) {
                    session()->flash('message', $th->getMessage());
                    session()->flash('type', 'danger');

                    return redirect()->back()->withInput();

            }
        }
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function show(Reunion $reunion )
    {
        
        $data['reunion'] = $reunion;
        
       
        return view('reunion.showReunion', $data);
        
       // return response()->json($reunion);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reunion $reunion )
    {
        $data['chantiers'] = Chantier::all();
        $data['reunion'] = $reunion;
        
        return view('reunion.editReunion',$data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reunion $reunion )
    {
        
        // Validation of the data
        $validator = Validator::make($request->all(),[
            
            'start' => 'required',
            'end' => 'end'
        ]);
        
        if($validator->failed()){
            return redirect()->back()->withErrors($validator);
        } else {
            if($request->input('allDay')){
            $allDay = 1;
            } else {
                $allDay = 0;
            }

            if($request->input('color')===null) {
                $color = $request->input('colorOld');
            } else {
                $color = $request->input('color');
            }

            if($request->input('chantier_id')){
                // Take the input fields data from $request object
                $data = [
                    'chantier_id' => $request->input('chantier_id'),
                    'title' => $request->input('title'),
                    'start' => $request->input('start'),
                    'end' => $request->input('end'),
                    'allDay' => $allDay,
                    'statut' => $request->input('statut'),
                    'description' => $request->input('description'),
                    'color' => $color,
                    'textColor' => '#FFFFFF'
                ];
                
                try {
                Reunion::where('id',$reunion->id)->update($data);
                return response()->json("success");
                
                } catch (\Throwable $th) {
                    session()->flash('message', $th->getMessage());
                    session()->flash('type', 'danger');

                    return redirect()->back()->withInput();

                }
            } else {
                // Take the input fields data from $request object
                $data = [
                    'start' => $request->input('start'),
                    'end' => $request->input('end')
                ];
                
                try {
                Reunion::where('id',$reunion->id)->update($data);
                return response()->json("success");
                
                } catch (\Throwable $th) {
                    session()->flash('message', $th->getMessage());
                    session()->flash('type', 'danger');

                    return response()->json("error");

                }
            }
        
            
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reunion $reunion)
    {
        if($reunion->elements()->count()){
            session()->flash("message", "Impossible de supprimer! la réunion a un enregistrement d'élément. Supprimez d'abord les éléments puis essayez de supprimer la réunion");
            session()->flash('type', 'danger');

            return redirect()->back();
        } else {
        
            $reunion->delete();
            
            session()->flash("message", "Réunion supprimée avec succès");
            session()->flash("type", "success");
            
            return redirect()->back();
        }
    }
}
