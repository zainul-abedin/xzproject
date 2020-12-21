<div class="modal-header">
    <a href="{{ route('reunion.edit', $reunion->id) }}" target="_blank" type="button" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;;"><i class="far fa-edit"></i></a>
    <button type="button" id="trash" aria-hidden="true" style="font-size:22px; color: red; background-color: white; margin-right: 3px;"><i class="far fa-trash-alt"></i></button>
    <button type="button" id="envelope" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;"><i class="far fa-envelope"></i></button>
    <button type="button" id="camera" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;"><i class="fas fa-camera"></i></button>
    <button type="button" id="paperclip" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;"><i class="far fa-paperclip"></i></button>
    <button type="button" id="user-shield" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;"><i class="fas fa-user-shield"></i></button>
    <button type="button" id="users" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 3px;"><i class="fas fa-users"></i></button>   
    <button type="button" id="list" aria-hidden="true" style="font-size:22px; background-color: white"><i class="fas fa-list"></i></button>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>           
</div>
<div class="modal-body">
    <div class="media">
        <i class="fas fa-heading" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->title }}</span></h5>
        </div>
    </div>

    <div class="media">
        <i class="fas fa-map-marker-alt" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->chantier->location->chantier_adresse->adresse }}</span></h5>
        </div>
    </div>


    @if($reunion->allDay == 0)
    @if((date('d/m/yy', strtotime($reunion->start)))==(date('d/m/yy', strtotime($reunion->end))))
    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('H:i', strtotime($reunion->end)) }}</span></h5>
        </div>
    </div>
    @else
    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('d/m/yy H:i', strtotime($reunion->end)) }}</span></h5>
        </div>
    </div>
    @endif
    @endif    


    @if($reunion->allDay == 1)
    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">All day</span></h5>
        </div>
    </div>
    @endif



    @if($reunion->statut === 0)
    <div class="media">
        <i class="fas fa-info-circle" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">Réunion n'est pas terminée</span></h5>
        </div>
    </div>
    @elseif($reunion->statut === 1)
    <div class="media">
        <i class="fas fa-info-circle" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">Réunion terminée</span></h5>
        </div>
    </div>
    @endif


    <div class="media">
        <i class="fas fa-feather" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->description }}</span></h5>
        </div>
    </div>

    <div class="media" style="margin-bottom: 8px">
        <i class="fas fa-paperclip" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2"></span></h5>
        </div>
    </div>

    <div class="media">
        <i class="fas fa-user-cog" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->createur }}</span></h5>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        $("#trash").click(function(){
            alert("En développement");
        });
        
        $("#envelope").click(function(){
            alert("En développement");
        });
        
        $("#camera").click(function(){
            alert("En développement");
        });
        
        $("#paperclip").click(function(){
            alert("En développement");
        });
        
        $("#user-shield").click(function(){
            alert("En développement");
        });
        
        $("#users").click(function(){
            alert("En développement");
        });
        
        $("#list").click(function(){
            alert("En développement");
        });
        
    });
</script>
