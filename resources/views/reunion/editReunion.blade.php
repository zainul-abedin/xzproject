@extends('layouts.app')

@section('content')

<!-- Display error massage's start ------->
@section('message')
    @include('partials._message')
@endsection
<!-- Display error massage's end ------->
    

<div class="container">
    

    <div id="editEvent">
            
            <div id="dialog-body">
                <form action="{{ route('reunion.update',$reunion->id) }}" id="editReunion" method="POST" >
                    @csrf
                    @method('PUT')
                    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
                        <a onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></a>
                        <button type="submit" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-edit"></i></button>
                    </nav>
                    
                    <div class="form-group mb-3">
                        <label>Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $reunion->title }}" required="required">
                    </div>
                    
                    <div class="input-group mb-3">
                        <select id="allChantiersReplace" class="form-control" name="chantier_id" required="required">
                            <option value="{{$reunion->chantier->id}}" selected>
                                {{$reunion->chantier->location->chantier_adresse->adresse}}
                                / Eta:{{ $reunion->chantier->location->etage }}
                                @if($reunion->chantier->location->porte)
                                / Por:{{ $reunion->chantier->location->porte }}  
                                @endif
                            </option>
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
                        <div class="input-group-append">
                            <a href="{{ route('chantier.create') }}" target="_blank" class="btn btn-outline-secondary" type="button" style="font-size: 16px"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="allChantiers" type="button" style="font-size: 16px"><i class="fas fa-redo-alt"></i></button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Start:</label>
                        <input type="text" class="form-control" id="start" name="start" value="{{ date('Y/m/d        H:i', strtotime($reunion->start)) }}">
                    </div>
                    <div class="form-group">
                        <label>End:</label>
                        <input type="text" class="form-control date" id="end" name="end" value="{{ date('Y/m/d        H:i', strtotime($reunion->end)) }}">
                    </div>
                    
                    
                    @if($reunion->statut == 0)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio1" value="0" checked>
                            <label class="form-check-label" for="inlineRadio1">Réunion n'est pas terminée</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio2" value="1">
                            <label class="form-check-label" for="inlineRadio2">Réunion terminée</label>
                        </div>
                    @else
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio1" value="0" checked>
                            <label class="form-check-label" for="inlineRadio1">Réunion n'est pas terminée</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio2" value="1" checked>
                            <label class="form-check-label" for="inlineRadio2">Réunion terminée</label>
                        </div>
                    @endif
                    
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required="required">{{ $reunion->description }}</textarea>
                    </div>
                    
                    
                    <input type="hidden" name="colorOld" value="{{ $reunion->color }}">
                    
                    
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
                   
                </form>
            </div>

        </div>
</div>

<!---------- set url for get data by Ajax request --------------------------->
<div id='allChantirUrl' data-url ='{{route("chantier.data")}}'></div>
<!---------- set url for get data by Ajax request end ----------------------->  

<script>
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
    
    /**
  * Ajax function for store chantier and close window
  *     
  * on("submit", function(e){e.preventDefault();
  * when the submit butto click it stop the reload page
  */
$(document).ready(function (){
        $("#editReunion").on("submit", function(e){

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