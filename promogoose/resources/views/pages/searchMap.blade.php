@extends('layouts.app')

@section('content')
<article class="search--container">
    <!-- Search Input -->
    <div class="search--container-inputbox">
        <input class="search--container-inputbox-input" type="text" id="villeSelected" name ="villeSelected" list="listVilles" placeholder="Entrez une ville ou un code postal..." >
        <datalist id="listVilles">
        </datalist>
        <button id='selected' class="search--container-inputbox-button" type="submit">Rechercher</button>
    </div>
    <!-- Filters -->
    <div class="search--container-filter">
        <div class="search--container-filter-box">
            <p>Filtrer par</p>
        </div>
        <div class="search--container-filter-selectbox">
            <div class="search--container-filter-select">
                <select name="type" id="type" class="search--container-filter-type">
                    <option value="false" class="search--container-filter-type-title">Tout types</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->libType }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search--container-filter-select">
                <select name="category" id="category" class="search--container-filter-category" style="background-color:grey" disabled>
                    <option value="false" class="search--container-filter-category-title">Toute catégories</option>
                </select>
            </div>
        </div>
    </div>
</article>

<!-- Map -->
<article class="map--container">
    <div id="map">
        <!-- La map a besoin d'etre initialisee dans une div -->
    </div>
</article>

<!-- Search Result -->
<article class="result--container">
    <p class="result--container-title">Résultats</p>

    <div class="result--container-separator"></div>
    <div id='container' class="result--container-scroll">
        
    </div>
</article>


<script>


    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(maPosition);
    } else {
        alert(`Vous n'avez pas autorisé la géolocalisation`)
    }

    function maPosition(position) {
        map.setView([position.coords.latitude, position.coords.longitude], 15)


        var circle = L.circle([position.coords.latitude, position.coords.longitude], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 35
        }).addTo(map);
        circle.bindPopup("Vous êtes ici.");

    }




</script>

@endsection

@section('body_end')

    <!-- votrelienderecherche.click( ); -->

@endsection