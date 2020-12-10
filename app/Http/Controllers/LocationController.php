<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Chantier_adresse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['locations'] = Location::all();
       return view('location.allLocations',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['chantier_adresses'] = Chantier_adresse::all();
        return view('location.createLocation', $data);
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
            'chantier_adresse_id' => 'required',
            'description' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'chantier_adresse_id' => $request->input('chantier_adresse_id'),
                'batiment' => $request->input('batiment'),
                'escalier' => $request->input('escalier'),
                'etage' => $request->input('etage'),
                'porte' => $request->input('porte'),
                'interphone' => $request->input('interphone'),
                'digicode' => $request->input('digicode'),
                'prm' => $request->input('prm'),
                'superficie' => $request->input('superficie'),
                'appartement_type' => $request->input('appartement_type'),
                'description' => $request->input('description'),
                'createur' => auth()->user()->name
            ];

           // dd($request->description);

            try {
                Location::create($data);
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
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
