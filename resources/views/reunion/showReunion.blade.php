<div class="modal-header">
    <a href="{{ route('reunion.edit', $reunion->id) }}" target="_blank" type="button" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;;"><i class="far fa-edit"></i></a>
    
    <form action="{{ route('reunion.destroy', $reunion->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
          @csrf
          @method('DELETE')
          <button type="submit" id="trash" aria-hidden="true" style="font-size:22px; color: red; background-color: white; margin-right: 2px;"><i class="far fa-trash-alt"></i></button>
    </form>
   
    <button type="button" id="envelope" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="far fa-envelope"></i></button>
    <!--
    <button type="button" id="camera" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-camera"></i></button>
    <button type="button" id="paperclip" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="far fa-paperclip"></i></button>
    -->
    <button type="button" id="user-shield" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-user-shield"></i></button>
    <button type="button" id="users" aria-hidden="true" style="font-size:22px; background-color: white; margin-right: 2px;"><i class="fas fa-users"></i></button>   
    <a href="{{ route('element.create', $reunion->id) }}" target="_blank" type="button" id="element_create" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ajouter elements" style="font-size:24px; background-color: white"><i class="fas fa-plus-square"></i></a>
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

    <div class="row" style="margin-bottom: 10px">
        <div class="col-1">
            <i class="fas fa-feather" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>{{ $reunion->description }}</span>
        </div>
    </div>
        
    @if($reunion->elements)
        @foreach($reunion->elements as $element)
            <div class="row" style="margin-bottom: 10px"> 
                <div class="col-1">
                    <i class="fab fa-elementor" style="font-size: 20px"></i>
                </div>
                <div class="col-7">
                    <span>{{ $element->type_du_element }}</span>
                </div>
                <div class="col-1">
                    <form action="{{ route('element.destroy', $element->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="trash" aria-hidden="true" style="font-size:22px; margin-bottom: -16px; color: red; background-color: white;"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
                <div class="col-1">
                    <a href="{{ route('element.edit', $element->id) }}" target="_blank" type="button" aria-hidden="true" style="font-size:22px; background-color: white;">
                        <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-feather" style="font-size: 20px"></i>
                </div>
                <div class="col-9">
                    <span>{{ $element->commentaire }}</span>
                </div>
            </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-info-circle" style="font-size: 20px"></i>
                </div>
                <div class="col-9">
                    @if($element->finalise == 0)
                    <span>Ne pas finaliser</span>
                    @else
                    <span>Finaliser</span>
                    @endif
                </div>
            </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-info-circle" style="font-size: 20px"></i>
                </div>
                @if($element->a_publie_dans_pv == 0)
                <div class="col-9">
                    <span>Élément non signalé dans PV</span>
                </div>
                @else
                <div class="col-9">
                    <span>Élément signalé dans PV</span>
                </div>
                @endif
            </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-image" style="font-size: 20px"></i>
                </div>
                <div class="col-9">
                    <a href="{{ route('elementPhotos.index', $element->id) }}" target="_blank" type="button" id="show_photos" aria-hidden="true" style="font-size:22px; margin-right: 10px; background-color: white; "><i class="far fa-eye"></i></a>
                    <a href="{{ route('elementPhotos.create', $element->id) }}" target="_blank" type="button" id="add_photos" aria-hidden="true" style="font-size:22px;margin-right: 10px; background-color: white; "><i class="far fa-plus-square"></i></a>
                </div>
            </div>
            <!--
            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-paperclip" style="font-size: 20px"></i>
                </div>
                <div class="col-9">
                    <button type="button" id="show_documents" aria-hidden="true" style="font-size:22px; background-color: white; "><i class="far fa-eye"></i></button>
                    <button type="button" id="add_documents" aria-hidden="true" style="font-size:22px; background-color: white; "><i class="far fa-plus-square"></i></button>
                    <button type="button" id="edit_documents" aria-hidden="true" style="font-size:22px; background-color: white; "><i class="far fa-edit"></i></button>
                </div>
            </div>
            -->
            <div class="row" style="margin-bottom: 10px">
                <div class="col-1 offset-1">
                    <i class="fas fa-user-cog" style="font-size: 18px"></i>
                </div>
                <div class="col-9">
                    <span>{{ $element->createur }}</span>
                </div>  
            </div>
        @endforeach
    @endif
       
    @if($reunion->statut === 0)  
    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-1">
            <i class="fas fa-info-circle" style="font-size: 18px"></i> 
        </div>
        <div class="col-10">
            <span>Réunion n'est pas terminée</span> 
        </div>
    </div>
    @elseif($reunion->statut === 1)
    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
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

        $("#user-shield").click(function () {
            alert("En développement");
        });

        $("#users").click(function () {
            alert("En développement");
        });

    });
</script>
