<div class="alert alert-danger">
    <strong>
        Please fix the error(s)
    </strong>
    <hr/>
    <ul class="post-errors">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>