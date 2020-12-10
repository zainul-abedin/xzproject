<select class="custom-select" name="chantier_adresse_id" id="allChantiersReplace" aria-label="Example select with button addon" required="required">
    <option value="{{ old('chantier_adresse_id') }}">
        Sélectionner adress
    </option>
    @foreach($chantier_adresses as $chantier_adresse)
    <option value="{{$chantier_adresse->id}}">{{$chantier_adresse->adresse}}</option>
    @endforeach
</select>