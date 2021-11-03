@if (Session::has('failed'))
    <div class="alert alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true"> &times;</span>
        </button>
        {{ Session::get('failed') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true"> &times;</span>
        </button>
        {{ session('status') }}
    </div>
@endif

@if ($errors->has('status'))
    <div class="alert alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
          <span aria-hidden="true"> &times;</span>
        </button>
        {{ $errors->first('status') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true"> &times;</span>
        </button>
        Please click on the activation link that we sent. <a class="text-primary" href="{{ Session::get('warning') }}">Resend verification email</a>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true"> &times;</span>
        </button>
        {{ Session::get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $error)
            <li style="list-style-type: none;">{{ $error }}</li>
        @endforeach
    </div>
@endif