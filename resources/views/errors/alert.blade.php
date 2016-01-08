<div class="alert dark alert-alt alert-icon alert-{{ Session::get('message.0')  }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @if(Session::get('message.0') == "success")
        <i class="icon md-check" aria-hidden="true"></i>
    @elseif(Session::get('message.0') == "warning")
        <i class="icon md-alert-circle-o" aria-hidden="true"></i>
    @elseif(Session::get('message.0') == "danger")
        <i class="icon md-close" aria-hidden="true"></i>
    @endif
    {!! Session::get('message.1')  !!}
</div>