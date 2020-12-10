<select class="custom-select" name="location_id" id="allLocationReplace" aria-label="Example select with button addon" required="required">
    <option value="{{ old('location_id') }}">
        Sélectionner Location
    </option>
    @foreach($locations as $location)
        <option value="{{$location->id}}">
            {{$location->chantier_adresse->adresse}}
            @if($location->batiment)
                {{'/ Bat : '.$location->batiment}}
            @endif
            @if($location->escalier)
                {{'/ Esc : '.$location->escalier}}
            @endif
            @if($location->etage)
                {{'/ Eta : '.$location->etage}}
            @endif
            @if($location->porte)
                {{'/ Por : '.$location->porte}}
            @endif
        </option>
    @endforeach
</select>
