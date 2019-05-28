@extends('layouts.app')

@section('content')
<a href="{{ route('account') }}" class="ariane">&#8249; Retour mon espace</a>
<article class="promo--container">
    <p class="promo--container-title">
        Mes promotions sauvegardées
    </p>
    @if(count($adhesions) > 0)
        @foreach($adhesions as $adhesion)
            @if($adhesion->promotion->etatPromo)
                <div class="promo--container-box">
                    <div class="promo--container-box-desc">
                        <p class="promo--container-box-desc-nomMag">{{ $adhesion->promotion->magasin->nomMag }}</p>
                        <p class="promo--container-box-desc-promo">{{ $adhesion->promotion->libPromo }}</p>
                        <p class="promo--container-box-desc-validity">
                            <span>Validité</span>
                            : jusqu'au
                            {{ date('d/m/Y', strtotime($adhesion->promotion->dateFinPromo)) }}
                        </p>
                    </div>
                    <input type="text" class="promo--container-box-input" name="" id="" value="{{ $adhesion->promotion->codePourPromo }}" disabled>
                </div>
            @endif
        @endforeach
    @else
        <p>Aucune promotion sauvegardées</p>
    @endif
    <a href="{{ route('postAvis') }}">
        <button class="promo--container-buttonBox-advice">
            Poster un avis
        </button>
    </a>
    <div class="promo--container-buttonBox">
        <button class="promo--container-buttonBox-histo">
            Historique
        </button>
    </div>
</article>

@endsection