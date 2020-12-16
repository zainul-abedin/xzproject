
@extends('layouts.app')

@section('navbar')
<!-- navbar will be here -->
@endsection

<!-- Display error massage's start ------->
@section('message')
    @include('partials._message')
@endsection
<!-- Display error massage's end ------->

@section('content')
<div class="container">
    <form action="{{ route('chantierAdresse.store') }}" id="chantierAdresseStore" method="POST">
        @csrf
        
        <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
            <a onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></a>
            <button type="submit" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-save"></i></button>
        </nav>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-map-marker-alt" style="font-size: 22px"></i></span>
            </div>
            <input type="text" name="adresse" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ex: 18 Rue Fessart, 75019 PARIS" required="required">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-map-marker-alt" style="font-size: 22px"></i></span>
            </div>
            <input type="text" name="adresse_supplementaire" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Adresse supplementaire"> 
        </div>
        
    </form>
</div>

<script>
/** on("submit", function(e){e.preventDefault();
  * when the submit butto click it stop the reload page
  */
$(document).ready(function (){
        $("#chantierAdresseStore").on("submit", function(e){

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
                            title: "Génial!",
                            text: "Adresse ajoutée avec succès",                            
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