@extends('layouts.app')

@section('content')
<article class="gestion--shop">
    <p class="gestion--shop-title">Mes commerces</p>

    @foreach($stores as $store)
    <div class="gestion--shop-box">
        <div class="gestion--shop-box-flex">
            <p class="gestion--shop-box-name">{{ $store->nomMag }}</p>
            <p class="gestion--shop-box-adresse">{{ $store->ad1Mag }} {{ $store->ad2Mag }}</p>
            <div class="gestion--shop-box-desc">
                <a href="{{ route('commerces' , $store->id )}}"> <button class="gestion--shop-box-desc-button see">
                    Voir 
                </button></a>
                <a href="{{ route('magasin_edit' , $store->id )}}"><button class="gestion--shop-box-desc-button edit">
                    Modifier 
                </button></a>
                <button onclick="deleteShop({{ $store->id }})" class="gestion--shop-box-desc-button delete">
                    Supprimer 
                </button>
            </div>
        </div>
        <div class="gestion--shop-box-promo">
            @if(count($store->promotions) > 0)
                @foreach($store->promotions as $promotion) 
                    @if($promotion->etatPromo)
                        <p class="gestion--shop-box-promo-title">
                            Promo active actuellement
                        </p>
                        <p class="gestion--shop-box-promo-txt">
                            {{ $promotion->libPromo }}
                            <br />
                            <br />
                            @break
                    @endif
                @endforeach
                </p>
                <a href="{{ route('promos' , $store->id )}}"><button class="gestion--shop-box-promo-button">
                    Gérer les promotions ({{ count($store->promotions) }})
                </button></a>
            @else
                <a href="{{ route('get_create_promotion', $store->id) }}"><button class="gestion--shop-box-promo-button">
                    Ajouter une promo 
                </button></a>
            @endif
        </div>
    </div>
    @endforeach

    <a href="{{ route('get_create_store' )}}"><button class="gestion--shop-button">
       Ajouter un commerce
    </button></a>
</article>

<script>
    function ok (ok) {
        console.log(`Modifiction ok : ${ok.status}`);
        location.reload(true);
    }   
    function fail (err) {
        console.log(`Erreur ! status : ${err.status}`);
    }
    // FUNCTION AXIOS GET TO DELETE A SHOP
    function deleteShop(id) {

        validation = prompt('Êtes vous sûr? Cette action est irréversible! \n Saisir CONFIRM');
        if(validation == "CONFIRM")
        {
            let url = document.location.href+"/delete";
                //console.log(url);
                axios.get(
                    url,{
                            params : {
                                id : id
                            }
                        }
                    )
                    .then(ok)
                    .catch(fail) 
        }
        else
        {
            alert("Supression annulée");
        }
    }
                
</script>
@endsection