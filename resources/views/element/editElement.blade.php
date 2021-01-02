@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('element.update', $element->id) }}" method="POST">
        @csrf
        @method('PUT')
        <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
            <a onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></a>
            <span>Modifier l'élément</span>
            <button type="submit" id="submit-all" style="font-size: 30px; background-color: #E9E9E9"><i class="far fa-save"></i></button>
        </nav>
        
        @include('partials._message')
        
        <div class="form-group"> 
            <label>Sélectionner type d'éléments</label>
            <select class="form-control" name="type_du_element" id="type_du_element" required="required">
                <option value="{{ $element->type_du_element }}">{{$element->type_du_element}}</option>
                <option value="Réception travail">Réception travail</option>
                <option value="Travail supplémentaire">Travail supplémentaire</option>
                <option value="Probleme">probleme</option>
                <option value="Travail refuge">Travail refuge</option>
                <option value="commentaire">commentaire</option>
            </select>
            
            <div class="form-group mb-3" style="margin-top: 10px">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="commentaire" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $element->commentaire }}</textarea>
            </div>
            
            <div style="margin-top: 10px">Finalisé?</div>
            @if($element->finalise == 0)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="finalise" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="finalise" id="inlineRadio2" value="0" checked>
                <label class="form-check-label" for="inlineRadio2">Non</label>
            </div>
            @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="finalise" id="inlineRadio1" value="1" checked>
                <label class="form-check-label" for="inlineRadio1">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="finalise" id="inlineRadio2" value="0" >
                <label class="form-check-label" for="inlineRadio2">Non</label>
            </div>
            @endif
            
            <div style="margin-top: 10px">A publie dans PV?</div>
            @if($element->a_publie_dans_pv == 1)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="a_publie_dans_pv" id="inlineRadio1" value="1"checked >
                <label class="form-check-label" for="inlineRadio1">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="a_publie_dans_pv" id="inlineRadio2" value="0">
                <label class="form-check-label" for="inlineRadio2">Non</label>
            </div>
            @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="a_publie_dans_pv" id="inlineRadio1" value="1"checked >
                <label class="form-check-label" for="inlineRadio1">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="a_publie_dans_pv" id="inlineRadio2" value="0" checked>
                <label class="form-check-label" for="inlineRadio2">Non</label>
            </div>
            @endif
        </div>      
         
    </form>
</div>

@endsection



