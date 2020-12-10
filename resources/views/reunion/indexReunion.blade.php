@extends('layouts.app')

<style>

    html, body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #addEvent{
        display: none;
    }

    #eventEdit {
        display: none;
    }

    #eventDetails {
        display: none;
    }

</style>

@section('content')

<div class="container">                
    <nav class="navbar navbar-light shadow-sm"  style="background-color: #E9E9E9; margin-bottom: 10px">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 34px"><i class="fas fa-home"></i></a>
        <button class="btn btn-light ml-auto mr-1" data-toggle="modal" data-target="#allReunionList" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-list"></i></button>
    </nav>  

    <!-- Display error massage's start ------->    
    @if($errors->any())
    <div class="alert alert-danger">
        @if($errors->count()===1)
        {{ $errors->first() }}
        @else
        <lu>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </lu>
        @endif
    </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('message') }}
    </div>
    @endif
    <!-- Display error massage's end ------->  

    <div id="allReunionListReplace"> <!-- all reunion list view div, it's replace by ajax -->
        <div id="calendar"></div> <!-- calendar div -->
    </div>

</div>

<!------------------ Modal for reunions list start ---------------->
<div class="modal fade" id="allReunionList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Toutes les réunions</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="reunionsTable">
                    <thead>
                        <tr>
                            <th>H.Reunions</th>
                            <th>Adresses</th>
                            <th>Chantiers commencer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reunions as $reunion)
                    
                        <tr>
                            <td>
                                <a href="{{ route('reunion.details', $reunion->id) }}">
                                @if((date('d/m/yy', strtotime($reunion->start)))==(date('d/m/yy', strtotime($reunion->end))))
                                {{ date('d/m/yy | H:i', strtotime($reunion->start)).' ' }} - {{ date('H:i', strtotime($reunion->end)).' ' }} 
                                @else
                                {{ date('d/m/yy | H:i', strtotime($reunion->start)).' ' }} - {{ date('d/m/yy | H:i', strtotime($reunion->end)).' ' }}                
                                @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('reunion.details', $reunion->id) }}">
                                {{$reunion->chantier->location->chantier_adresse->adresse }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('reunion.details', $reunion->id) }}">
                                {{date('d/m/yy', strtotime($reunion->chantier->created_at)) }}
                                </a>
                            </td>
                        </tr>
                                                     
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!------------------ Modal for reunions list end   ---------------->


<!--------------- START add event dialog box -------->

<div id="addReunion">

    <div id="dialog-body">

        <!-- 
        Add reunion come by ajax
        from reunion createReunion page 
        -->

    </div>

</div>
<!----------------- Add event dialog box END -------------------------->

<!---------------- event details start--------------------------------->

<div id="eventDetails">
    <div id="dialog-body">

        <!-- 
        reunion details come by ajax
        from reunion details 
        -->

    </div>

</div>

<!---------------------- java script start ---------------------------->


<script>

    /*--------- script for fullcalendar v5 start ---------------------*/

    document.addEventListener('DOMContentLoaded', function () {

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            buttonText: {
                today: 'auj',
                month: 'mois',
                week: 'semaine',
                day: 'jour',
                list: 'liste'
            },

            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prevYear,prev,today,next,nextYear' // buttons for switching between views
            },

            footerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center:'',
                right: 'listMonth',
            },

            initialView: 'dayGridMonth',

            eventDidMount: function (info) {
                if (info.event.extendedProps.status === 'done') {

                    // Change background color of row
                    info.el.style.backgroundColor = '#61ABFF';

                    // Change color of dot marker
                    var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                    if (dotEl) {
                        dotEl.style.backgroundColor = '#61ABFF';
                    }
                }
            },

            eventSources: "{{ route('reunion.data') }}",
            locale: 'fr',
            timeZone: 'UTC',
            editable: true,
            selectable: true,
            allDaySlot: false,
            longPressDelay: 1000,
            eventLongPressDelay: 1000,
            selectLongPressDelay: 1000,
            height: 'auto',

            select: function (info) {

                var startTime = convert(info.startStr);
                var endTime = convert(info.endStr);

                var data = {"startTime": startTime, "endTime": endTime};


                $.ajax({
                    url: '{{ route("reunion.create") }}',
                    type: 'POST',
                    data: data,
                    datatype: "JSON",
                    success: function (response) {
                        $('#addReunion').dialog({
                            title: 'Créer une réunion',
                            width: 350,
                            height: 640,
                            modal: true
                        }).html(response);
                    }
                });

            },

            eventClick: function (info) {

                var reunion_id = info.event.id;
                var url = '{{ route("reunion.show", ":id") }}';
                url = url.replace(":id", reunion_id);

                $.ajax({

                    url: url,
                    type: 'GET',
                    success: function (response) {

                        $('#eventDetails').dialog({
                            title: 'Réunion details',
                            width: 350,
                            height: 640,
                            modal: true
                        }).html(response);
                    }
                });

            },

            eventDrop: function (info) {

                if (!confirm("Are you sure about this change?")) {
                    info.revert();
                } else {
                    // creat url for Ajax request
                    var reunion_id = info.event.id;
                    var url = '{{ route("reunion.update", ":id") }}';
                    url = url.replace(":id", reunion_id);

                    /* create JSON data for ajax
                     * 
                     * info.event.extendedProps for extra propertry
                     * info.event for regular propertry
                     */

                    var data = {
                        "start": convert(info.event.startStr),
                        "end": convert(info.event.endStr)
                    };

                    $.ajax({
                        url: url,
                        type: "PUT",
                        data: data,
                        success: function (response) {
                            console.log(response);
                        }
                    });

                }

            },

            eventResize: function (info) {

                if (!confirm("Are you sure about this change?")) {
                    info.revert();
                } else {
                    // creat url for Ajax request
                    var reunion_id = info.event.id;
                    var url = '{{ route("reunion.update", ":id") }}';
                    url = url.replace(":id", reunion_id);

                    /* create JSON data for ajax
                     * 
                     * info.event.extendedProps for extra propertry
                     * info.event for regular propertry
                     */

                    var data = {
                        "start": convert(info.event.startStr),
                        "end": convert(info.event.endStr)
                    };

                    $.ajax({
                        url: url,
                        type: "PUT",
                        data: data,
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }


            }

        });

        calendar.render();


    });

    /************** function for convert date and time start  ******* */
    function convert(str) {
        const d = new Date(str);
        let month = '' + (d.getMonth() + 1);
        let day = '' + d.getDate();
        let year = '' + d.getFullYear();
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        let hour = '' + d.getUTCHours();
        let minutes = '' + d.getUTCMinutes();
        let seconds = '' + d.getUTCSeconds();
        if (hour.length < 2)
            hour = '0' + hour;
        if (minutes.length < 2)
            minutes = '0' + minutes;
        if (seconds.length < 2)
            seconds = '0' + seconds;
        return[year, month, day].join('/') + ' ' + [hour, minutes, seconds].join(':');
    }
    ;
    /************** function for convert date and time end  ******* */

    /*--------- script for fullcalendar v5 end -----------------------*/
     
    /*-------- script for datatable start ----------------------------*/ 
    $(document).ready( function () {
        $('#reunionsTable').DataTable({
            "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Rien trouvé - désolé",
                "info": "Affichage de la page _PAGE_ de _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré de _MAX_ enregistrements totaux)",
                "search": "Chercher:"
            }
        });
    } );
    
    /*-------- script for datatable start ----------------------------*/
</script>        

<!---------------------- java script end ---------------------------->

@endsection

