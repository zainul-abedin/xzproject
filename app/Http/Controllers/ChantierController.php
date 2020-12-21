<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Location;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChantierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['chantiers'] = Chantier::all();
        return view('chantier.indexChantier', $data);
    }
    
     /**
      * Display all data for Ajax
      * 
      * @return type \Illuminate\Http\Response
      */
    public function data() {
        
        $data['chantiers'] = Chantier::all();
        return view('chantier.allChantiers', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['locations'] = Location::all();
        return view('chantier.ajouter_chantier', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'location_id' => 'required|numeric',
            'demande_objact' => 'required',
            'urgence'=> 'required|max:50',
            'travaux_type'=> 'required|max:50',
            'categorie'=> 'required|max:50',
            'createur'=>'createur|max:20',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'location_id' => $request->input('location_id'),
                'demande_objact'=>$request->input('demande_objact'),
                'urgence' => $request->input('urgence'),
                'travaux_type' => $request->input('travaux_type'),
                'categorie' => implode(',', $request->input('categorie')),
                'createur' => auth()->user()->name
            ];

           // dd($request->description);

            try {
                Chantier::create($data);
                return response()->json("success");

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
     * @param  \App\Models\Chantier  $chantier
     * @return \Illuminate\Http\Response
     */
    public function show(Chantier $chantier)
    {
        $data['chantier'] = $chantier;
        $data['responsables'] = Responsable::all();
        
        return view('chantier.showChantier',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chantier  $chantier
     * @return \Illuminate\Http\Response
     */
    public function edit(Chantier $chantier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chantier  $chantier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chantier $chantier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chantier  $chantier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chantier $chantier)
    {
        //
    }
}
