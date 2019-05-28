@extends('layouts.app')

@section('content')
<article class="help--container">
    <img src="{{ url('/img/halp.png') }}" alt="help img" class="help--container-img">
    <div class="help--container-box">
        <!-- register -->
        <div class="help--container-box-register">
            <p class="help--container-box-register-title">Comment s'inscrire ?</p>
            <p class="help--container-box-register-txt">
                Cliquez sur inscription en haut de la page
                et remplissez le formulaire d'inscription
                ou bien connectez-vous via Facebook ou Google
                <img src="#" alt="img connexion">
            </p>
        </div>
        <!-- search -->
        <div class="help--container-box-search">
            <p class="help--container-box-search-title">Comment rechercher sur la carte ?</p>
            <p class="help--container-box-register-txt">
                Rentrez une ville dans le champs prévu à cet effet
                et choisissez un filtre (optionnel).
                Les commerces trouvés s'affichent en dessous de la carte 
                qui se met au point automatiquement.
            </p>
            <img src="{{ url('/img/Help/search.gif') }}" alt="help search img" class="help--container-box-search-img">
        </div>
        <!-- mes promos -->
        <div class="help--container-box-promos">
            <p class="help--container-box-promos-title">Comment accéder à mes promos ?</p>
            <p class="help--container-box-promos-txt">
                En étant connecté, cliquez sur votre nom dans le menu 
                superieur et cliquez sur "mes promos" dans le menu déroulant.
            </p>
        </div>
        <!-- mes infos -->
        <div class="help--container-box-infos">
            <p class="help--container-box-infos-title">Comment accéder à mes infos ?</p>
            <p class="help--container-box-infos-txt">
                En étant connecté, cliquez sur votre nom dans le menu 
                superieur et cliquez sur "mes infos" dans le menu déroulant.
            </p>
        </div>
        <!-- mes avis -->
        <div class="help--container-box-avis">
            <p class="help--container-box-avis-title">Comment accéder à mes avis ?</p>
            <p class="help--container-box-avis-txt">
                En étant connecté, cliquez sur votre nom dans le menu 
                superieur et cliquez sur "mes avis" dans le menu déroulant.
            </p>
        </div>
    </div>

    <p class="help--container-box-title">Espace commerçant</p>
    <div class="help--container-box">
         <!-- commerces -->
        <div class="help--container-box-shop">
                <p class="help--container-box-shop-title">Comment voir mes commerces ?</p>
                <p class="help--container-box-shop-txt">
                    En étant connecté, cliquez sur "mes commerces" dans le menu 
                    superieur.
                </p>
        </div>
        <div class="help--container-box-shop">
                <p class="help--container-box-shop-title">Comment modifier un commerce ?</p>
                <p class="help--container-box-shop-txt">
                    Dans la rubrique "mes commerces", cliquez sur "modifier" 
                    sur le commerce que vous souhaitez modifier.
                </p>
        </div>
        <div class="help--container-box-shop">
                <p class="help--container-box-shop-title">Comment créer un commerce ?</p>
                <p class="help--container-box-shop-txt">
                    Dans la rubrique "mes commerces", en bas de la page
                    cliquez sur "créer un commerce" et remplissez le formulaire
                    de création.
                </p>
            </div>
            <div class="help--container-box-shop">
                <p class="help--container-box-shop-title">Comment supprimer un commerce ?</p>
                <p class="help--container-box-shop-txt">
                    Dans la rubrique "mes commerces", cliquez sur "supprimer"
                    sur le commerce que vous souhaitez supprimer.
                </p>
            </div>
            <div class="help--container-box-shop">
                <p class="help--container-box-shop-title">Comment gérer les promotions d'un commerce ?</p>
                <p class="help--container-box-shop-txt">
                    Dans la rubrique "mes commerces", cliquez sur 
                    "Gérer les promotions" afin d'arriver sur la 
                    page de gestion des promotions.
                </p>
            </div>
        </div> 
    </div>
</article>
@endsection('content')