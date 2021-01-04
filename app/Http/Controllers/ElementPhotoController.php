<?php

namespace App\Http\Controllers;

use App\Models\ElementPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElementPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($element_id = NULL)
    {
        if($element_id){
            $data['elementPhotos'] = ElementPhoto::where('element_id', $element_id)->get();
            //return response()->json($data);
            return view('elementPhoto.indexElementPhoto', $data);
        } else {
            $data['elementPhotos'] = ElementPhoto::all();
            return view('elementPhoto.indexElementPhoto', $data);
            //return response()->json($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($element_id = NULL)
    {
        if($element_id){
            $elements = \App\Models\Element::where('id',$element_id)->get();
            return view('elementPhoto.createElementPhoto')->with('elements',$elements);
        } else {
            return view('elementPhoto.createElementPhoto');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'element_id' => 'required',
            'file' => 'max:20480'
        ]);
        
        if($validator->fails()){
            //return redirect()->back()->withErrors($validator)->withInput();
            return response()->json($validator);
        }
        
        if($request->hasFile('file')){            
            // Get the file from the post request
            $file = $request->file('file');

            // set the file name
            $fileName = uniqid().$file->getClientOriginalName();

            // Define upload path
            $path = "/photos/elementPhotos/";
            $destinationPath = public_path($path);

            // Move the file to correct location
            $file->move($destinationPath, $fileName);
        }
        
        
        try {
            // Take input field data form $request object
            $data = [
                'element_id' => $request->input('element_id'),
                'photo_type' => $request->input('photo_type'),
                'description' => $request->input('description'),
                'file_path' => $destinationPath,
                'file_name' => $fileName,
                'file_mime' => $file->getClientMimeType(),
                'createur' => auth()->user()->name
            ];
            ElementPhoto::create($data);
            return response()->json(201);
        } 
        
        catch (\Throwable $th) {
            return response()->json(['erroe'=>$th],500);
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElementPhoto  $elementPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ElementPhoto $elementPhoto)
    {
        echo'This is element show page';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElementPhoto  $elementPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ElementPhoto $elementPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElementPhoto  $elementPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElementPhoto $elementPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElementPhoto  $elementPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElementPhoto $elementPhoto)
    {
        //
    }
}
