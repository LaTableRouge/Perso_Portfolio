@extends('layouts.app')

@section('content')
<article class="register--container">
    <div class="register--container-top">
        <p class="register--container-title">Inscrivez-vous pour profiter de promotions exclusives</p>
        <div class="register--container-social">
            <!-- Facebook Connect -->
            <div class="register--container-social-fbCo">
                <i class="fab fa-facebook-f register--container-social-fbCo-i"></i>
                <a href="auth/facebook" class="register--container-social-fbCo-a">
                    <button class="register--container-social-fbCo-button">
                            Sign Up With Facebook
                    </button>
                </a>
            </div>
            <!-- Google Connect -->
            <div class="register--container-social-goCo">
                <i class="fab fa-google register--container-social-goCo-i"></i>
                <a href="{{route('google')}}" class="register--container-social-goCo-a">
                    <button class="register--container-social-goCo-button">
                            Sign Up With Google
                    </button>
                </a>
            </div>
        </div>
        
        <div class="register--container-separator">
            <div class="register--container-separator-line"></div>
            Ou
            <div class="register--container-separator-line"></div>
        </div>
    </div>
    <form class="register--container-form" action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="register--container-form-NP">
            <div class="register--container-form-NP-name {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="register--container-form-label">Nom</label>
                <input class="register--container-form-input" type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="register--container-form-NP-prenom {{ $errors->has('prenom') ? ' has-error' : '' }}">
                <label class="register--container-form-label">Prénom</label>
                <input class="register--container-form-input" type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom') }}" required>
                @if ($errors->has('prenom'))
                    <span class="help-block">
                        <strong>{{ $errors->first('prenom') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="register--container-form-email {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="register--container-form-label">Email</label>
            <input class="register--container-form-email-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="register--container-form-telephone {{ $errors->has('telephone') ? ' has-error' : '' }}">
            <label class="register--container-form-label">Téléphone</label>
            <input class="register--container-form-telephone-input" type="telephone" name="telephone" placeholder="Téléphone portable" value="{{ old('telephone') }}" required>
            @if ($errors->has('telephone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </span>
            @endif
        </div>
        <div class="register--container-form-PWD">
            <div class="register--container-form-PWD-password {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="register--container-form-label">Mot de passe</label>
                <input class="register--container-form-input" type="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <br>
            <div class="register--container-form-PWD-passwordConfirm">
                <label class="register--container-form-label">Confirmer le mot de passe</label>
                <input class="register--container-form-input" type="password" class="form-control" name="password confirmation" placeholder="Confirmer" required>
            </div>
        </div>
        <div class="register--container-form-captcha">
            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style="display:block">
                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="register--container-form-submit">
            Valider
        </button>
    </form>
</article>
@endsection
