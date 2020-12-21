<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.createContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Take the input fields value from the $request object
        
        $data = [
            'title' => $request->input('title'),
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'nom_de_societe' => $request->input('nom_de_societe'),
            'telephone_portable' => $request->input('telephone_portable'),
            'telephone_domicile' => $request->input('telephone_domicile'),
            'telephone_bureau' => $request->input('telephone_bureau'),
            'autre_telephone' => $request->input('autre_telephone'),
            'mail_professionnel' => $request->input('mail_professionnel'),
            'mail_personnel' => $request->input('mail_personnel'),
            'observation' => $request->input('observation')
        ];
        
        try {
            Contact::create($data);
            session()->flash('message', 'Contact ajoutée avec succès');
            session()->flash('type', 'success');
            
            return redirect()->back();
            
        } catch (\Throwable $th) {
            session()->flash('message', $th->getMessage());
            session()->flash('type', 'danger');
            
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
