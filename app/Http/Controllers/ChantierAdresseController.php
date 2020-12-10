<?php

namespace App\Http\Controllers;

use App\Models\Chantier_adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ChantierAdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['chantier_adresses'] = Chantier_adresse::all();
        
        return view('chantierAdresse.allAdresses', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chantierAdresse.chantierAdresseCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation the form data
        $validator = Validator::make($request->all(),['adresse' => 'required']);
        
        // Take the input fields value from the $request object
        
        $data = [
            
            'adresse' => $request->input('adresse'),
            'adresse_supplementaire' => $request->input('adresse_supplementaire')
        ];
        
        if($validator->failed()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            
            try {
                Chantier_adresse::create($data);
                return response()->json("success");
                    
            } catch (\Throwable $th) {
                session()->flash('massege', $th->getMessage());
                session()->flash('type', 'danger');

                return redirect()->back()->withInput();
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chantier_adresse  $chantier_adresse
     * @return \Illuminate\Http\Response
     */
    public function show(Chantier_adresse $chantier_adresse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chantier_adresse  $chantier_adresse
     * @return \Illuminate\Http\Response
     */
    public function edit(Chantier_adresse $chantier_adresse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chantier_adresse  $chantier_adresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chantier_adresse $chantier_adresse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chantier_adresse  $chantier_adresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chantier_adresse $chantier_adresse)
    {
        //
    }
    
}
