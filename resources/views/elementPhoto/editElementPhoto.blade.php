@extends('layouts.app')

@section('content')

<div class="container">

    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <button onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></button>
        <span>Modifier photo</span>
    </nav>
    <!-- Display error massage's start ------->    
        @include('partials._message')
    <!-- Display error massage's end -------> 
    <form action="{{ route('elementPhotos.update', $elementPhoto->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <input  type="hidden" name="element_id" value="{{ $elementPhoto->element_id }}">
        <div class="form-group">
            <label>Sélectionner type d'photos</label>
            <select class="form-control" name="photo_type" id="photo_type">
                <option value="{{ $elementPhoto->photo_type }}">{{ $elementPhoto->photo_type }}</option>
                <option value="Réception travail">Réception travail</option>
                <option value="Travail supplémentaire">Travail supplémentaire</option>
                <option value="Probleme">probleme</option>
                <option value="Travail refuge">Travail refuge</option>
                <option value="commentaire">commentaire</option>
            </select>
            <div class="form-group mb-3" style="margin-top: 10px">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="1">{{ $elementPhoto->description }}</textarea>
            </div>
        </div> 
        <button type="submit" class="btn btn-sm btn-success">Save</button>
    </form>
</div>


            @endsection