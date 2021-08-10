@if (session()->has('success'))

    <div class="alert alert-info alert-dismissible show fade">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session() -> has('error'))

    <div class="alert alert-danger alert-dismissible show fade">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

@if ($errors->any())

    <div class="alert alert-danger alert-dismissible show fade">
        <strong>  {!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  
@endif
