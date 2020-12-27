<div class="modal-header">
    <a href="{{ route('reunion.edit', $reunion->id) }}" target="_blank" type="button" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;;"><i class="far fa-edit"></i></a>
    <form action="{{ route('reunion.destroy', $reunion->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
          @csrf
          @method('DELETE')
          <button type="submit" id="trash" aria-hidden="true" style="font-size:22px; color: red; background-color: white; margin-right: 2px;"><i class="far fa-trash-alt"></i></button>
    </form>
    <button type="button" id="envelope" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="far fa-envelope"></i></button>
    <button type="button" id="camera" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-camera"></i></button>
    <button type="button" id="paperclip" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="far fa-paperclip"></i></button>
    <button type="button" id="user-shield" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-user-shield"></i></button>
    <button type="button" id="users" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-users"></i></button>   
    <button type="button" id="list" aria-hidden="true" style="font-size:22px; background-color: white"><i class="fas fa-list"></i></button>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>           
</div>
<div class="container">
    <div class="row" style="margin-bottom: 10px; margin-top: 10px">
        <div class="col-1">
            <i class="fas fa-heading" style="font-size: 18px"></i>
        </div>
        <div class="col-10">
            <span>{{ $reunion->title }}</span>
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-map-marker-alt" style="font-size: 18px"></i>
        </div>
        <div class="col-10">
            <span>{{ $reunion->chantier->location->chantier_adresse->adresse }}</span>
        </div>
    </div>

    @if($reunion->allDay == 0)
    @if((date('d/m/yy', strtotime($reunion->start)))==(date('d/m/yy', strtotime($reunion->end))))
    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-clock" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('H:i', strtotime($reunion->end)) }}</span>
        </div>

    </div>
    @else
    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-clock" style="font-size: 18px"></i>  
        </div>
        <div class="col-10">
            <span>{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('d/m/yy H:i', strtotime($reunion->end)) }}</span> 
        </div>
    </div>
    @endif
    @endif

    @if($reunion->allDay == 1)
    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-clock" style="font-size: 18px"></i>
        </div>
        <div class="col-10">
            <span>All day</span> 
        </div>
    </div>
    @endif

    @if($reunion->statut === 0)  
    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-info-circle" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>Réunion n'est pas terminée</span> 
        </div>
    </div>
    @elseif($reunion->statut === 1)
    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-info-circle" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>Réunion terminée</span>
        </div>
    </div>
    @endif

    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-feather" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>{{ $reunion->description }}</span>
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px"> 
        <div class="col-1">
            <i class="fas fa-paperclip" style="font-size: 18px"></i>
        </div>
        <div class="col-10">
            <span></span>
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-user-cog" style="font-size: 18px"></i>
        </div>
        <div class="col-10">
            <span>{{ $reunion->createur }}</span>
        </div>  
    </div>
    </br>
</div>

<script>
    $(document).ready(function () {

        $("#envelope").click(function () {
            alert("En développement");
        });

        $("#camera").click(function () {
            alert("En développement");
        });

        $("#paperclip").click(function () {
            alert("En développement");
        });

        $("#user-shield").click(function () {
            alert("En développement");
        });

        $("#users").click(function () {
            alert("En développement");
        });

        $("#list").click(function () {
            alert("En développement");
        });

    });
</script>
