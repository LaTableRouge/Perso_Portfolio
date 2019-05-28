@extends('layouts.app')

@section('content')
<article class="login--container">
    <p class="login--container-title">
        Connexion
    </p>
    <form class="login--container-form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <!-- Email -->
    <div class="login--container-form-mail {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="login--container-form-mail-input" name="email" value="{{ old('email') }}" placeholder="E-Mail" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Password -->
    <div class="login--container-form-pwd {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="login--container-form-pwd-input" name="password" placeholder="Mot de passe" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- remember me -->
    <div class="login--container-form-checkBox">
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
        </label>
    </div>

    <!-- Btn connextion & forgot pwd -->
    <div class="login--container-form-connexionBox">
        <button type="submit" class="login--container-form-connexionBox-connexion">
            Connexion
        </button>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            <button class="login--container-form-connexionBox-reset">
                Mot de passe oublié?
            </button>
        </a>
    </div>
    </form>
</article>
@endsection
