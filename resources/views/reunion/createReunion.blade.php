
<form action="{{ route('reunion.store') }}" method="POST" >
    @csrf

    <div class="input-group mb-3">
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Reunion title" required="required">
    </div>

    <div class="input-group mb-3">
        <select id="allChantiersReplace" class="form-control basic-single" name="chantier_id" required="required">
            <option value="" selected>sélectionnez un chantier</option>
            @foreach($chantiers as $chantier)
            <option value="{{ $chantier->id }}">
                {{ $chantier->location->chantier_adresse->adresse }}
                @if($chantier->location->batiment)
                {{'/ Bat : '.$chantier->location->batiment}}
                @endif
                @if($chantier->location->escalier)
                    {{'/ Esc : '.$chantier->location->escalier}}
                @endif
                @if($chantier->location->etage)
                    {{'/ Eta : '.$chantier->location->etage}}
                @endif
                @if($chantier->location->porte)
                    {{'/ Por : '.$chantier->location->porte}}
                @endif
            </option>
            @endforeach                        
        </select>
        <div class="input-group-append">
            <a href="{{ route('chantier.create') }}" target="_blank" class="btn btn-outline-secondary" type="button" style="font-size: 16px"><i class="fas fa-plus"></i></a>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" id="allChantiers" type="button" style="font-size: 16px"><i class="fas fa-redo-alt"></i></button>
        </div>
    </div>
    
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="start" name="start" value="{{ $startEndTime->startTime }}" >
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control date" id="end" name="end" value="{{ $startEndTime->endTime }}" >
    </div>

    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required="required">{{ old('description') }}</textarea>
    </div>

    <div class="radio-box">
        <label class="firebred">
            <input type="radio" name="color" id='color' value="#b22222">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="tomato">
            <input type="radio" name="color" value="#ff6347">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="darkorange">
            <input type="radio" name="color" value="#ff8c00">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="magenta">
            <input type="radio" name="color" value="#ff00ff">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="green">
            <input type="radio" name="color" value="#008000">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="blue">
            <input type="radio" name="color" value="#0000ff">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="gray">
            <input type="radio" name="color" value="#808080">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
        <label class="black">
            <input type="radio" name="color" value="#000000">
            <div class="layer"></div>
            <div class="button"><span></span></div>
        </label>
    </div>

    <div class="input-group mb-3">
        <button type="submit" class="btn btn-success btn-block">Add Reunion</button>
    </div>

</form>


<!---------- set url for get data by Ajax request --------------------------->
<div id='allChantirUrl' data-url ='{{route("chantier.data")}}'></div>
<!---------- set url for get data by Ajax request end ----------------------->  

<script>
    
    $(document).ready(function () {
        $('.basic-single').select2({
            placeholder: "sélectionnez un chantier",
            allowClear: true
        });
    });
    
    /**
     * Ajax function for update 'chantier' select field
     */
    $(document).ready(function(){

        $("#allChantiers").click(function(){
            
            var url = $("#allChantirUrl").data("url");

            $.ajax({
                url:url,
                type: 'GET',
                dataType: "HTML",
                success: function(response){
                    
                    $("#allChantiersReplace").html(response);

                }

            });
        });
    });
    
</script>