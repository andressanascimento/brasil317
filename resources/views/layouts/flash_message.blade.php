@if($flash = session('message'))

<div class="alert alert-success alert-dismissible fade show" roler="alert">
    {{$flash}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif

@if($flash_error = session('message_error'))

<div class="alert alert-danger alert-dismissible fade show" roler="alert">
    {{$flash_error}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif