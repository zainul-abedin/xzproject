<!-- Display error message's start ------->
<div style="margin-top: 10px">
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
    <div id="calendar"></div>
</div>