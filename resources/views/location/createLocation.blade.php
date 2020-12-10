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

    <form action="{{ route('location.store') }}" id="locationStore" method="POST">
        @csrf
        
        <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
            <a onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></a>
            <button type="submit" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-save"></i></button>
        </nav>
        
        <div>
            <div class="input-group mb-3" >
                <select class="custom-select" name="chantier_adresse_id" id="allChantierAdressesReplace" aria-label="Example select with button addon" required="required">
                    <option value="{{ old('chantier_adresse_id') }}">
                        Sélectionner adress
                    </option>
                    @foreach($chantier_adresses as $chantier_adresse)
                        <option value="{{$chantier_adresse->id}}">{{$chantier_adresse->adresse}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <a href="{{ route('chantierAdresse.create') }}" target="_blank" class="btn btn-outline-secondary" type="button" style="font-size: 16px"><i class="fas fa-plus"></i></a>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" id="allChantierAdresses" type="button" style="font-size: 16px"><i class="fas fa-redo-alt"></i></button>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="far fa-building" style="font-size: 20px" ></i></span>
            </div>
            <input type="text" name="batiment" value="{{ old('batiment') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Bâtiment">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"></span>
            </div>
            <input type="text" name="escalier" value="{{ old('escalier') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Escalier">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"></span>
            </div>
            <input type="text" name="etage" value="{{ old('etage') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Etage">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-door-open" style="font-size: 20px"></i></span>
            </div>
            <input type="text" name="porte" value="{{ old('porte') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Porte">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-phone" style="font-size: 20px"></i></span>
            </div>
            <input type="text" name="interphone" value="{{ old('interphone') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Interphone">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-qrcode" style="font-size: 20px"></i></span>
            </div>
            <input type="text" name="digicode" value="{{ old('digicode') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Digicode">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-bolt" style="font-size: 20px"></i></span>
            </div>
            <input type="text" name="prm" value="{{ old('prm') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="prm">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="far fa-square" style="font-size: 20px"></i></span>
            </div>
            <input type="text" name="superficie" value="{{ old('superficie') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Superficie(m²)">
        </div>
        <div class="input-group input-group mb-3">
        <select name="appartement_type" class="custom-select" id="inputGroupSelect02">
            <option value="{{ old('appartement_type') }}" selected>
                @if( old('appartement_type'))
                    {{ old('appartement_type') }}
                @else
                    Sélectionner Type d'appartement
                @endif
                </option>
                <option value="Appartement">Appartement</option>
                <option value="Maison">Maison</option>
                <option value="Parties communes immeuble">Parties communes immeuble</option>
                <option value="Extérieur">Extérieur</option>
                <option value="Autre">Autre</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Commentaire</label>
            <textarea name="description" value="{{ old('description') }}" class="form-control" id="exampleFormControlTextarea1" rows="3" required="required"></textarea>
        </div>

    </form>

</div>


<!---------- set url for get data by Ajax request --------------------------->
<div id='allChantierAdressesUrl' data-url ='{{route("chantierAdresse.index")}}'></div>
<!---------- set url for get data by Ajax request end ----------------------->  

<script>
    /**
     * Ajax function for update 'chantier_adresse' select field
     */
    $(document).ready(function(){

        $("#allChantierAdresses").click(function(){
            
            var url = $("#allChantierAdressesUrl").data("url");

            $.ajax({
                url:url,
                type: 'GET',
                dataType: "HTML",
                success: function(response){

                  $("#allChantierAdressesReplace").html(response);

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
        $("#locationStore").on("submit", function(e){

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

                        /* script for sweet alart
                        swal({
                            icon: 'success',
                            title: "Great!",
                            text: "Responsable add successfully",                            
                            timer: 1000
                          });
                         */
                         
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

