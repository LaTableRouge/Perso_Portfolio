@extends('layouts.app')

@section('content')

    <article class="shop">
        <a class="ariane" href="{{ route('search') }}">&#8249; Retour aux résultats</a>
        <div class="shop--container">
            <p class="shop--container-title">
                {{ $shop->nomMag }}
            </p>
            <div class="shop--container-slider-container">
                <input type="radio" id="i1" name="images" checked/>
                @if($shop->photo2Mag)
                    <input type="radio" id="i2" name="images" />
                @endif   
                @if($shop->photo3Mag)
                    <input type="radio" id="i3" name="images" />
                @endif   
                <div class="shop--container-slider-container-imgbox" id="one">			
                    <img src="{{ asset($shop->photo1Mag) }}">
                    <label class="shop--container-slider-container-imgbox-prev" for="i3"><span></span></label>
                    <label class="shop--container-slider-container-imgbox-next" for="i2"><span></span></label>	 
                </div>
                @if($shop->photo2Mag)
                    <div class="shop--container-slider-container-imgbox" id="two">
                        <img src="{{ asset($shop->photo2Mag) }}" >
                        <label class="shop--container-slider-container-imgbox-prev" for="i1"><span></span></label>
                        <label class="shop--container-slider-container-imgbox-next" for="i3"><span></span></label>
                    </div>
                @endif     
                @if($shop->photo3Mag) 
                <div class="shop--container-slider-container-imgbox" id="three">
                <img src="{{ asset($shop->photo3Mag) }}" >
                    <label class="shop--container-slider-container-imgbox-prev" for="i2"><span></span></label>
                    <label class="shop--container-slider-container-imgbox-next" for="i1"><span></span></label>
                </div>
                @endif
                <div id="nav_slide">
                    <label for="i1" class="dots" id="dot1"></label>
                    @if($shop->photo2Mag)
                        <label for="i2" class="dots" id="dot2"></label>
                    @endif
                    @if($shop->photo3Mag)
                        <label for="i3" class="dots" id="dot3"></label>
                    @endif
                </div>
            </div>
            <div class="shop--container-desc">
                <div class="shop--container-desc-location">
                    <p class="shop--container-desc-location-title">Adresse</p>
                    <p class="shop--container-desc-location-txt">
                        {{ $shop->ad1Mag }}
                        @if($shop->telMag)
                        <br /><br />
                                <i class="fas fa-phone"></i> {{ $shop->telMag }}
                        @endif
                    </p>
                    <p class="shop--container-desc-location-txt">
                    {{ $shop->ville->ville_code_postal }}
                    </p>
                    <p class="shop--container-desc-location-txt">
                    {{ $shop->ville->ville_nom_reel }}
                    </p>
                </div>
                <div class="shop--container-desc-schedule">
                    <p class="shop--container-desc-schedule-title">Horaires</p>
                    <div class="shop--container-desc-schedule-txt">
                        <p class="shop--container-desc-schedule-txt-p">
                            Lundi
                            <span class="shop--container-desc-schedule-txt-span">
                                10h-19h
                            </span>
                        </p>
                        <p class="shop--container-desc-schedule-txt-p">
                            Mardi
                            <span class="shop--container-desc-schedule-txt-span">
                                10h-19h
                            </span>
                        </p>
                        <p class="shop--container-desc-schedule-txt-p">
                            Mercredi
                            <span class="shop--container-desc-schedule-txt-span">
                                10h-19h
                            </span>
                        </p>
                        <p class="shop--container-desc-schedule-txt-p">
                            Jeudi
                            <span class="shop--container-desc-schedule-txt-span">
                                10h-19h
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            @foreach($shop->promotions as $promotion)
                @if($promotion->etatPromo)
                    <input type="text" id="idPromo" value="{{ $promotion->id }}" hidden>
                    <div class="shop--container-promo">
                        <p class="shop--container-promo-title">
                            Promotions en cours
                        </p>
                        <div class="shop--container-promo-desc">
                            <div class="shop--container-promo-desc-schedule">
                                <p class="shop--container-promo-desc-schedule-title">
                                    {{ $promotion->libPromo }}
                                </p>
                                <p class="shop--container-promo-desc-schedule-begin">Date de début : {{ date('d/m/Y', strtotime($promotion->dateDebutPromo)) }}</p>
                                <p class="shop--container-promo-desc-schedule-end">Date de fin : {{ date('d/m/Y', strtotime($promotion->dateFinPromo)) }}</p>
                            </div>
                            <button id="getPromo" class="shop--container-promo-desc-button">
                                Obtenir le code
                            </button>
                        </div>
                    </div>
                    <p class="shop--container-comAvis-title"> Avis </p>
                    <div class="shop--container-comAvis">
                        @if(count($promotion->adhesions) > 0)
                            @foreach($promotion->adhesions as $adhesion)
                                    @if($adhesion->avis_id)
                                        <div class="shop--container-comAvis-box">
                                            <p class="shop--container-comAvis-box-user">De 
                                                @foreach($users as $user)
                                                    @if($user->id == $adhesion->user_id)
                                                        {{ $user->name }}
                                                        @break
                                                    @endif
                                                @endforeach
                                                <span>le</span>
                                                {{ date('d/m/Y', strtotime($adhesion->avis->created_at)) }}
                                            </p>
                                            <p class="shop--container-comAvis-box-avis">{{$adhesion->avis->commentaireAvis}}
                                            <div class="shop--container-comAvis-box-starBox">
                                                @for($i=0; $i<$adhesion->avis->noteAvis; $i++)
                                                    <span class="fa fa-star checked shop--container-comAvis-box-starBox-star"></span>
                                                @endfor
                                            </div> 
                                        </div>
                                    @endif
                            @endforeach
                        @else
                            <p class="shop--container-comAvis-box-avis"> Aucun commentaire pour cet promo.</p>
                            @break
                        @endif
                        @break
                    </div>
                @endif
            @endforeach
        </div>
    </article>

    <script>
        getPromo.onclick = function() {
            axios.get("getCodePromo", { params :  {idPromo : idPromo.value} })
            .then(function(succ) {
                window.location = succ.data.redirect;
            })
            .catch(function(err) {
                console.log(err);
            })
        }
    </script>


@endsection

