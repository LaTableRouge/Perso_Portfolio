@extends('layouts.app')

@section('content')
<article class="reset--container">
    <p class="reset--container-title">
        Mot de passe oublié ?
    </p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="reset--container-form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="reset--container-form-mailBox{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Votre E-mail" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="reset--container-form-buttonBox">
            <button type="submit" class="reset--container-form-buttonBox-button">
                Envoyer
            </button>
        </div>
    </form>

</article>
@endsection
