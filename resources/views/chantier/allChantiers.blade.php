<select class="form-control" name="chantier_id" id="allChantiersReplace" required="required">
    <option value="" selected>sélectionnez un chantier</option>
    @foreach($chantiers as $chantier)
    <option value="{{ $chantier->id }}">
        {{ $chantier->location->chantier_adresse->adresse }}
        / Eta:{{ $chantier->location->etage }}
        @if($chantier->location->porte)
        / Por:{{ $chantier->location->porte }}  
        @endif
    </option>
    @endforeach                        
</select>