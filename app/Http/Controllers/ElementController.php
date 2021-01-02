<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        echo 'Element Index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reunion_id)
    {

        return view('element.creatElement')->with('reunion_id', $reunion_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // Validation form data
        $validator = Validator::make($request->all(),[
            'reunion_id' => 'required',
            'type_du_element' => 'required',
            'commentaire' => 'required'
        ]);
        
        if($validator->failed()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
        
            //Take the input field data form $resuest object
            
            $data = [
                'reunion_id' => $request->input('reunion_id'),
                'type_du_element' => $request->input('type_du_element'),
                'commentaire'=> $request->input('commentaire'),
                'finalise' => $request->input('finalise'),
                'a_publie_dans_pv' => $request->input('a_publie_dans_pv'),
                'createur' => auth()->user()->name
            ];
            try {
                Element::create($data);
                session()->flash('message', "Élément créé avec succès! vous pouvez ajouter plus d'éléments pour cette réunion.");
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
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        echo 'Element Show';
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        return view('element.editElement')->with('element', $element);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Element $element)
    {
      $validator = Validator::make($request->all(),[
            'type_du_element' => 'required',
            'commentaire' => 'required'
        ]);
        
        if($validator->failed()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
        
            //Take the input field data form $resuest object
            
            $data = [
                'type_du_element' => $request->input('type_du_element'),
                'commentaire'=> $request->input('commentaire'),
                'finalise' => $request->input('finalise'),
                'a_publie_dans_pv' => $request->input('a_publie_dans_pv'),
                'createur' => auth()->user()->name
            ];
            try {
                Element::where('id','=',$element->id)->update($data);
                session()->flash('message', 'Élément mis à jour avec succès');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        $element->delete();
        session()->flash("message", "Élément supprimé avec succès");
        session()->flash("type", "success");
        return redirect()->back();
    }
}
