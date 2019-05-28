@extends('layouts.app')

@section('content')
<a class="ariane" href="{{ route('account') }}">&#8249; Retour mon espace</a>
<article class="promos--gestion">
    
    <p class="promos--gestion-title">Les promos de {{$store->nomMag}}</p>
    
    @foreach($store->promotions as $promotion)
    <div class="promos--gestion-box">
        <div class="promos--gestion-box-txt">
            <p class="promos--gestion-box-txt-lib" >{{ $promotion->libPromo }}</p>
            <p class="promos--gestion-box-txt-date">du <span>{{ date('d/m/Y', strtotime($promotion->dateDebutPromo))}}</span> au <span>{{ date('d/m/Y', strtotime($promotion->dateFinPromo)) }}</span></p>
            <p class="promos--gestion-box-txt-stats">
                <span>{{ $promotion->clickPromo }} <i class="far fa-eye"></i></span>
                <span>@if($moyNote[$promotion->id]  > 0) {{ round($moyNote[$promotion->id],1) }} @else 0 @endif<i class="far fa-star"></i></span>
                <span>@if($nbAvis[$promotion->id] > 0) {{ $nbAvis[$promotion->id] }} @else 0 @endif<i class="fas fa-comment-alt"></i></span></p>
            <div class="promos--gestion-box-txt-codes">
                <p>Code Promo :  <span>{{ $promotion->codePourPromo }}</span></p>
                <p>Code Avis : <span>{{ $promotion->codePourAvis }}</span></p>
            </div>
        </div>
        <div class="promos--gestion-box-check">
            @if($promotion->etatPromo)
                <label class="promos--gestion-box-check-labelBox" for="on">
                    <input class="promos--gestion-box-check-labelBox-input" type="radio" name="etatPromo" value="on" onclick="desactivPromo({{ $promotion->id }})" checked />
                    <span class="promos--gestion-box-check-labelBox-span">
                        <span style="color:green" class="promos--gestion-box-check-labelBox-span-fake">Activée*</span>
                        
                    </span>
                </label>
                <!--<input type="radio" value="off" /><label for="on">Off</label>-->
            @endif
            @if(!$promotion->etatPromo)
                <label class="promos--gestion-box-check-labelBox" for="on">
                    <input class="promos--gestion-box-check-labelBox-input" type="radio" name="etatPromo" value="on" onclick="activPromo({{ $store->id }},{{ $promotion->id }})" />
                    <span class="promos--gestion-box-check-labelBox-span">
                        <span style="color:red" class="promos--gestion-box-check-labelBox-span-fake">Désactivée*</span>
                    </span>
                </label>
                <!--<input type="radio" value="off" checked/><label for="on">Off</label>-->
            @endif
        </div>
        <div class="promos--gestion-box-ButtonBox">
            <a href="#">
                <input class="promos--gestion-box-ButtonBox-button promos--gestion-box-ButtonBox-button-edit" type="button" value="Modifier" />
            </a>

            <input onclick="deletePromo({{ $promotion->id }})" class="promos--gestion-box-ButtonBox-button promos--gestion-box-ButtonBox-button-delete" type="button" value="Supprimer" />
        </div>
    </div>
    @endforeach
    <a href="{{ route('get_create_promotion' , $store->id )}}">
        <input class="promos--gestion-addButton" type="button" value="Créer une nouvelle promo" />
    </a>
    * une seule promotion à la fois peut être active. 
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
    function deletePromo(id) {

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

    // FUNCTION AXIOS GET TO Activ a promo
    function activPromo(idStore,idPromo) {
            
        let url = document.location.href+"/activPromo";
        //console.log(url);
        axios.get(
            url,{
                params : {
                    idStore : idStore,
                    idPromo : idPromo
                }
            }
        )
        .then(ok)
        .catch(fail) 
    }

     // FUNCTION AXIOS GET TO desctiv a promo
     function desactivPromo(idPromo) {
            
            let url = document.location.href+"/desactivPromo";
            //console.log(url);
            axios.get(
                url,{
                    params : {
                        idPromo : idPromo
                    }
                }
            )
            .then(ok)
            .catch(fail) 
        }

              
</script>

@endsection

