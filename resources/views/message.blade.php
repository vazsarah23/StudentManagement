<div class="clear-both"></div>
@if(!empty(session('success')))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
</div>
@endif

<!-- @if(!empty(session('success')))
<div class="alert alert-success-dismissible fade show " role="alert">
    {{session('success')}}
</div>
@endif -->