@extends('layouts.app')

@section('content')

<a href="{{ route('account') }}" class="ariane">&#8249; Retour mon espace</a>
<article class="histo--container">
    <p class="histo--container-title">
        Historique de mes avis
    </p>
    @if(count($adhesions) > 0)
        @foreach($adhesions as $adhesion)
            <div class="histo--container-box">
                <div class="histo--container-box-desc">
                    <p class="histo--container-box-desc-nomMag">{{ $adhesion->promotion->magasin->nomMag }}</p>
                    <p class="histo--container-box-desc-lib">{{ $adhesion->promotion->libPromo }}</p>
                </div>
                <div class="histo--container--box-comBox">
                    <p class="histo--container-box-comBox-title">Votre commentaire :</p>
                    @if($adhesion->avis_id)
                        @for($i=0; $i<$adhesion->avis->noteAvis; $i++)
                            <span class="fa fa-star checked histo--container-box-comBox-star"></span>
                        @endfor
                        <p class="histo--container-box-comBox-commentaire"> {{ $adhesion->avis->commentaireAvis }} </p>
                </div>
                <div class="histo--container-box-buttonBox">
                    <a class="histo--container-box-buttonBox-a" href="#">
                        <button class="histo--container-box-buttonBox-a-edit">
                            Modifier
                        </button>
                    </a>
                    <a class="histo--container-box-buttonBox-a" href="#">
                        <button class="histo--container-box-buttonBox-a-delete">
                            Supprimer
                        </button>
                    </a>  
                </div>
                <div class="histo--container-box-comBox">
                    @else 
                        <p class="histo--container-box-comBox-title-none"> Vous n'avez posté aucun avis </p>
                </div>
                <div class="histo--container-box-buttonBox">
                    <a class="histo--container-box-buttonBox-a" href="{{ route('postAvis') }}">
                            <button class="histo--container-box-buttonBox-a-post">
                                Poster un avis
                            </button>
                        </a>    
                    @endif
                </div>
            </div>  
        @endforeach
    @else
        <p>Vous n'avez profité d'encore aucune promotion</p>
    @endif
</article>

@endsection