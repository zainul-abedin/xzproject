@extends('layouts.app')

@section('navbar')
<!-- navbar will be hear -->
@endsection

<!-- Display error massage's start ------->
@section('message')
    @include('partials._message')
@endsection
<!-- Display error massage's end ------->

            
@section('content')
<div class="container">

    <form action="{{ route('chantier.store') }}" id="chantierStore" method="POST">
        @csrf
        
        <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
            <a onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></a>
            <button type="submit" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-save"></i></button>
        </nav>
        
        <div class="input-group mb-3" >
            <select class="custom-select basic-single" name="location_id" id="allLocationReplace" aria-label="Example select with button addon" required="required">
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
            <div class="btn-group d-flex" role="group" aria-label="...">
                <a href="{{ route('location.create') }}" target="_blank" type="button" class="btn btn-outline-secondary" style="width: 10px; padding-left: 4px; padding-right: 17px; font-size: 15px"><i class="fas fa-plus"></i></a>
                <button type="button" class="btn btn-outline-secondary" id="allLocation" style="width: 16px; padding-left: 4px; padding-right: 17px; font-size: 15px"><i class="fas fa-redo-alt"></i></button>
            </div>
        </div>
        
        <div class="input-group input-group mb-3">
            <select name='urgence' class="custom-select" required="1">                    
                <option value="">Sélectionner urgence</option>
                <option value="Très urgent">Très urgent</option>
                <option value="Urgent">Urgent</option>
                <option value="Normal">Normal</option>                                                 
            </select>
        </div>
        
        <div class="input-group input-group mb-3">
            <select name='travaux_type' class="custom-select" required="1">                    
                <option value="">Sélectionner travaux type</option>
                <option value="Chantier">Chantier</option>
                <option value="Intervention">Intervention</option>
                <option value="Dépannage">Dépannage</option>
                <option value="Reprise DDE">Reprise DDE</option>
                <option value="Recherche fuite">Recherche fuite</option>
            </select>
        </div>
        
        <div class="input-group input-group mb-3">
            <select name='categorie[]' class="form-control categorie" multiple="multiple" required="1">                    
                <option value="">Sélectionner corps d'état</option>
                <option value="Multi corps d'état">Multi corps d'état</option>
                <option value="Peinture">Peinture</option>
                <option value="Plomberie">Plomberie</option>
                <option value="Electricité">Electricité</option>
                <option value="Serrurerie">Serrurerie</option>
                <option value="DDE">DDE</option>
                <option value="Menuiserie">Menuiserie</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Objet de la demande</label>
            <textarea name="demande_objact" class="form-control" id="exampleFormControlTextarea1" rows="3" required="required">{{ old('demande_objact') }}</textarea>
        </div>

    </form>

</div>


<!---------- set url for get data by Ajax request --------------------------->
<div id='allLocationUrl' data-url ='{{route("location.index")}}'></div>
<!---------- set url for get data by Ajax request end ----------------------->  

<script>
    
    $(document).ready(function () {
        $('.basic-single').select2({
            placeholder: "Sélectionner Location",
            allowClear: true
        });
    });
    
    /**
     * script for ( Sélectionner Corps détat ) input field
     * type: multiple select, name = 'categorie'
     * class = 'categorie' 
     * replace by (select2 multiple) 
     * for this need this code in select field ( multiple="multiple" )
     */
    $(document).ready(function () {
        $('.categorie').select2({
            placeholder: "Sélectionner Corps d'état"
        });
    });
    
    /**
     * Ajax function for update 'chantier_adresse' select field
     */
    $(document).ready(function(){

        $("#allLocation").click(function(){
            
            var url = $("#allLocationUrl").data("url");

            $.ajax({
                url:url,
                type: 'GET',
                dataType: "HTML",
                success: function(response){

                  $("#allLocationReplace").html(response);

                }

            });
        });
    });
    
    
 /**
  * Ajax function for store chantier and close window
  *     
  * on("submit", function(e){e.preventDefault();
  * when the submit butto click it stop the reload page
  */
$(document).ready(function (){
        $("#chantierStore").on("submit", function(e){

            e.preventDefault();

            var form = $(this);
            var url = form.attr("action");
            var type = form.attr("method");
            var data = form.serialize();
            
            $.ajax({
                
                url: url,
                data: data,
                type: type,
                dataType:"JSON",

                success: function(data){
                    if(data === "success"){

                        // script for sweet alart
                        swal({
                            icon: 'success',
                            title: "Great!",
                            text: "chantier ajouté avec succès",                            
                            timer: 1000
                          });
                         
                         
                         // To clean form data
                         form[0].reset(); 
                         
                         //for close the window
                         setTimeout("window.close()", 1000);
                    }
                }
            });
        });
               
    });
</script>

@endsection