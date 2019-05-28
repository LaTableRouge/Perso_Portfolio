@extends('layouts.app')

@section('content')

<article class="client--container">
        <p class="client--container-title">Mon espace client</p>
        <div class="client--container-info">
            <p class="client--container-info-title">Informations personnelles</p>
            <form class="client--container-info-formBox" method="POST" action="{{ route('user_edit_post') }}">
            {{ csrf_field() }}
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"/>
                <div class="client--container-info-form">

                    <div class="client--container-info-form-box">
                        <div class="client--container-info-form-box-labelBox">
                            <label for="name" class="client--container-info-form-box-labelBox-label">Nom</label>
                        </div>
                        <div class="client--container-info-form-box-descBox">
                            <div class="client--container-info-form-box-descBox-desc{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="client--container-info-form-box-descBox-desc-input">
                                    <input id="name" type="text" class="" name="name" value="{{ $user->name }}">
                                        @if ($errors->has('name'))
                                            <span class="">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>  
                    </div>

                    <div class="client--container-info-form-box">
                        <div class="client--container-info-form-box-labelBox">
                            <label for="prenom" class="client--container-info-form-box-labelBox-label">Prénom</label>
                        </div>
                        <div class="client--container-info-form-box-descBox">
                            <div class="client--container-info-form-box-descBox-desc{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                <div class="client--container-info-form-box-descBox-desc-input">
                                    <input id="prenom" type="text" class="" name="prenom" value="{{ $user->prenom }}">
                                        @if ($errors->has('prenom'))
                                            <span class="">
                                                <strong>{{ $errors->first('prenom') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="client--container-info-form-box">
                        <div class="client--container-info-form-box-labelBox">
                            <label for="telephone" class="client--container-info-form-box-labelBox-label">Téléphone </label>
                        </div>
                        <div class="client--container-info-form-box-descBox">
                            <div class="client--container-info-form-box-descBox-desc{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <div class="client--container-info-form-box-descBox-desc-input">
                                    <input id="telephone" type="text" class="" name="telephone" value="0{{ $user->telUser }}">
                                    @if ($errors->has('telephone'))
                                        <span class="">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="client--container-info-form-box">
                        <div class="client--container-info-form-box-labelBox">
                            <label for="email" class="client--container-info-form-box-labelBox-label">Adresse E-Mail</label>
                        </div>
                        <div class="client--container-info-form-box-descBox">
                            <div class="client--container-info-form-box-descBox-desc{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="client--container-info-form-box-descBox-desc-input">
                                    <input id="email" type="email" class="" name="email" value="{{ $user->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="client--container-info-form-box">
                        <div class="client--container-info-form-box-labelBox">
                            <label for="password" class="client--container-info-form-box-labelBox-label">Mot de passe</label>
                        </div>
                        <div class="client--container-info-form-box-descBox">
                            <div class="client--container-info-form-box-descBox-desc">
                                <div class="client--container-info-form-box-descBox-desc-input">
                                    <a href="#">Modifier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="client--container-info-formBox-buttonBox">
                    <button type="submit" name="modifier" class="client--container-info-formBox-buttonBox-button">
                        Enregistrer les modification
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="client--container-activity">
        <p class="client--container-activity-title">Activité</p>
        <div class="client--container-activity-box">
            <p class="client--container-activity-box-txt">
                Vous avez enregistré <span>{{ $nbPromo }}</span> codes promotions !
            </p>
            <div class="client--container-activity-box-buttonBox">
                <a href="{{ route('mesPromos') }}"><button class="client--container-activity-box-buttonBox-button">
                    Les voir
                </button></a>
            </div>
        </div>

        <div class="client--container-activity-box">
            <p class="client--container-activity-box-txt">
                Vous avez posté <span>{{ $nbAvis }}</span> avis !
            </p>
            <div class="client--container-activity-box-buttonBox">
            <a href="{{ route('mesAvis') }}"><button class="client--container-activity-box-buttonBox-button">
                    Consulter
                </button></a>
            </div>
        </div>
        @if(Auth::user()->commercant)
            <div class="client--container-activity-box">
                <p class="client--container-activity-box-txt">
                    Vous avez <span>{{ $nbCommerce}}</span> commerces !
                </p>
                <div class="client--container-activity-box-buttonBox">
                    <a href="{{ route('stores') }}"><button class="client--container-activity-box-buttonBox-button">
                        Accéder
                    </button></a>
                </div>
            </div>
        @else 
        <div class="client--container-activity-box">
                <p class="client--container-activity-box-txt">
                    Vous êtes un commerçant?
                </p>
                <div class="client--container-activity-box-buttonBox">
                    <button id="devenirCommercant" class="client--container-activity-box-buttonBox-button">
                        Devenir commercant
                    </button>
                </div>
            </div>
        @endif
    </div>
</article>

<script>

  devenirCommercant.onclick = function commercant() {
        axios.get("devenirCommercant", { params :  {id : user_id.value} })
            .then(function(succ) {
                window.location = succ.data.redirect;
            })
            .catch(function(err) {
                console.log(err);
            })
        }

</script>

@endsection