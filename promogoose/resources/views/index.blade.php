@extends('layouts.app')

@section('content')
<article class="container--search">
    <div class="container--search-bg" style="background-image: url('img/france_night_light.jpg');">
        <span class="container--search-text">
            Des promotions exclusives dans des milliers de commerces partout en France
        </span>
        
        <form class="container--search-inputbox">
            <a href="{{ route('search') }}" class="container--search-inputbox-button">Commencer la recherche</a>
        </form>
    </div>
</article>
<article class="ccm">
    <p class="ccm-title">
        Comment ça marche ?
    </p>
    <div class="ccm-explication">
        <div class="ccm-explication-search">
            <img class="ccm-explication-ico" src="{{ url('/img/ico/search.png') }}" alt="Search ico">
            <div class="ccm-explication-text">
                <p class="ccm-explication-p">Recherchez un commerce</p>
                <span class="ccm-explication-span">autour de vous</span>
            </div>
        </div>
        <i class="fas fa-angle-right ccm-explication-ico-arrow"></i>
        <div class="ccm-explication-coupon">
            <img class="ccm-explication-ico ccm-explication-ico-coupon" src="{{ url('/img/ico/coupon.png') }}" alt="Search ico">
            <div class="ccm-explication-text">
                <p class="ccm-explication-p">Recevez votre code promo</p>
                <span class="ccm-explication-span">une fois identifié</span>
            </div>
        </div>
        <i class="fas fa-angle-right ccm-explication-ico-arrow"></i>
        <div class="ccm-explication-shop">
            <img class="ccm-explication-ico" src="{{ url('/img/ico/store.png') }}" alt="Search ico">
            <div class="ccm-explication-text">
                <p class="ccm-explication-p">Rendez-vous en magasin</p>
                <span class="ccm-explication-span">pour profiter de l'offre</span>
            </div>
        </div>
    </div>
</article>
<article class="video">
        <div class="video-container">
        <iframe width="871" height="490" src="https://www.youtube.com/embed/7cD7bn0kLok" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
</article>
<article class="choice">
    <div class="choice--title">
        <p class="choice--title-text">
        Les choix de la communauté
        </p>
    </div>
    <br>
    <div class="choice--container">
        @foreach($promos as $promo)
            <div class="choice--container-box">
                <a class="choice--container-box-img" href="{{route('commerces', [ $promo->magasin->id ])}}">
                    <div class="choice--container-box-img" style="background-image:url(@if($promo->photo1Promo){{$promo->photo1Promo}}@else{{$promo->magasin->photo1Mag}}@endif)">
                    </div>
                </a>
                <div class="choice--container-box-title">
                    <a href="{{route('commerces', [ $promo->magasin->id ])}}">{{$promo->magasin->nomMag}}</a>
                </div>
                <div class="choice--container-box-text">
                  <a href="{{route('commerces', [ $promo->magasin->id ])}}">{{ $promo->libPromo }}</a>
                </div>
            </div>
        @endforeach
    </div>
</article>
<br>
<article class="also">
    <p class="also--title">
        Nouveautées
    </p>
    <br>
    <div class="also--container">
        @foreach($news as $new)
        <div class="also--container-box">
            <div class="also--container-box-titleb">
                <p>{{ $new->magasin->nomMag }}</p>
            </div>
            <div style="text-align:center"class="also--container-box-text">
                <p>{{ $new->libPromo }}</p>
            </div>
            <a style="text-decoration:none" class="also--container-box-button" href="{{route('commerces', [ $new->magasin->id ])}}">Voir</a>
        </div>
        @endforeach
    </div>
</article>
<br>
@endsection