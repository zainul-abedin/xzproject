@extends('layouts.app')

@section('content')

<!-- Dropzone CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

<!-- Dropzone js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>


<div class="container">
    
    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <button onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></button>
        <span>Ajouter photos</span>
        <button type="submit" id="submit-all" style="font-size: 30px; background-color: #E9E9E9"><i class="far fa-save"></i></button>
    </nav>
    <form action="{{ route('elementPhotos.store') }}" class="dropzone" id='dropzoneForm' method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            
            @foreach($elements as $element)
            
            <input name="element_id" type="hidden" value="{{ $element->id }}">
            
            <label>Sélectionner type d'photos</label>
            <select class="form-control" name="photo_type" id="photo_type">
                <option value="{{ $element->type_du_element }}">{{ $element->type_du_element }}</option>
                <option value="Réception travail">Réception travail</option>
                <option value="Travail supplémentaire">Travail supplémentaire</option>
                <option value="Probleme">probleme</option>
                <option value="Travail refuge">Travail refuge</option>
                <option value="commentaire">commentaire</option>
            </select>

            @endforeach
            
            <div class="form-group mb-3" style="margin-top: 10px">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            
        <div>
    </form>
</div>

<script>
    
    Dropzone.options.dropzoneForm = {
        autoProcessQueue : false,
        addRemoveLinks : true,
        maxFiles : 50,
        maxFilesize: 20,

        parallelUploads: 50,  // Number of files process at a time (default 2)

        init : function(){

             var myDropzone = this;

             $("#submit-all").click(function(e){
                 e.preventDefault();
                 myDropzone.processQueue();                 
             });
        },
        success : function(response){
            console.log(response);
        }
    };
    
</script>

@endsection
