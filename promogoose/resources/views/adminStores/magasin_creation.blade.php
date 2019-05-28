@extends('layouts.app')


@section('content')

<a class="ariane" href="{{ route('stores') }}">&#8249; Retour mes commerces</a>
<p class="create--shop-title">Création d'un commerce</p>
<article class="create--shop">
    <form class="create--shop-form" method="post" action="{{route('post_create_store')  }}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="nomMag">Nom du magasin</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="text" class="form-control" id="nomMag" name="nomMag" value="{{old('nomMag')}}">
                @if($errors->has('nomMag'))
                    <span class="help-block">
                        {{$errors->first('nomMag')}} 
                    </span>
                @endif
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="idAdresse">Saisir une adresse complète</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <textarea type="text" class="form-control" id="idAdresse" >{{old('idAdresse')}}</textarea>
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="ad1Mag">Adresse</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="text" class="form-control" id="ad1Mag" name="ad1Mag"  readonly>
                @if($errors->has('ad1Mag'))
                    <span class="help-block">
                        {{$errors->first('ad1Mag')}} 
                    </span>
                @endif
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="nomVille">Nom de la ville</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input class="" type="text" id="nomVille" name ="nomVille"  readonly >
            </div>
        </div>
        
        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="idCodePostal">code postal</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="text" class="form-control" id="idCodePostal"  readonly value="{{old('idCodePostal')}}">
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="latMag">Latitude</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="text" class="form-control" id="latMag" name="latMag"  readonly>
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="longMag">Longitude</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="text" class="form-control" id="longMag" name="longMag"  readonly>
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="telMag">Numéro de téléphone du commerce</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="tel"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" id="telMag" name="telMag" value={{old('telMag')}}>
                @if($errors->has('telMag'))
                    <span class="help-block">
                        {{$errors->first('telMag')}} 
                    </span>
                @endif
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="mailMag">Email du commerce</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="email"  class="form-control" id="mailMag" name="mailMag" value="{{old('mailMag')}}">
                @if($errors->has('mailMag'))
                    <span class="help-block">
                        {{$errors->first('mailMag')}} 
                    </span>
                @endif
            </div>
        </div>


        <!-- Filters -->
        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="type">Type de commerce</label>
                <div class="create--shop-form-container-descBox">
                    <select name="type" id="type" class="">
                        <option value="" class="">Tout types</option>
                        @foreach($types as $type)
                            <option name="type" id="type" value="{{ $type->id }}">{{ $type->libType }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="create--shop-form-container-labelBox-label" for="categorie"> Catégorie de commerce</label>
                <div class="create--shop-form-container-descBox">
                    <select name="categorie" id="categorie" class="" disabled>
                        <option value="" class="">Toute catégories</option>
                    </select>
                </div>
            </div>
        </div>







        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-label" for="siret">Numéro de SIRET du commerce</label>
            </div>
            <div class="create--shop-form-container-descBox">
                <input type="number"  class="form-control" id="siret" name="siret" value="{{old('siret')}}">
                    @if($errors->has('siret'))
                        <span class="help-block">
                            {{$errors->first('siret')}} 
                        </span>
                    @endif
            </div>
        </div>

        <div class="create--shop-form-container">
            <div class="create--shop-form-container-labelBox">
                <label class="create--shop-form-container-labelBox-labelFile" for="photo1Mag">Enregistrer la premiere photo</label>
                <input class="create--shop-form-container-labelBox-input" name="photo1Mag" id="photo1Mag" type="file"  accept=".jpg, .jepg, .png|images/*" value="Enregistrer la premiere photo">
            </div>
            <div class="create--shop-form-container-descBox">
                <div id="displayPictureContainer">
                    <!-- insertion ici de la balise img -->
                </div>
            </div>
        </div>

        <div class="create--shop-form-buttonBox">
            <input class="create--shop-form-buttonBox-input" type="submit" value="Enregistrer">
        </div>
    </form>

    <div id="mapid"></div>
</article>
@endsection

<script>
    //recuperer à partir de l'adresse texte les position latitude et longitude via une requete axios
    // pour les renvoyer vers le controller afin de les stocker en db

    function scriptPosition(){

        function displayPhoto(input) {
            //console.log(input.files[0])
            if (input.files && input.files[0]) {
                $( "#displayPictureContainer" ).wrap( "<img id=\"displayPicture\" src=\"#\" alt=\"Votre photo\" />" );
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#displayPicture').attr('src', e.target.result);
                    $('#displayPicture').width(200);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo1Mag").change(function(){
            displayPhoto(this);
        });


        $("#idAdresse").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "https://api-adresse.data.gouv.fr/search/?limit=5",
                    data: { q: request.term },
                    dataType: "json",
                    success: function (data) {
                        response($.map(data.features, function (item) {
                            //console.log({ label: item.properties.label, postcode: item.properties.postcode,city: item.properties.city, value: item.properties.label, street: item.properties.street, name: item.properties.name, latitude: item.geometry.coordinates[1],longitude: item.geometry.coordinates[0]});
                            return { label: item.properties.label, postcode: item.properties.postcode,city: item.properties.city, value: item.properties.label, street: item.properties.street, name: item.properties.name, latitude: item.geometry.coordinates[1],longitude: item.geometry.coordinates[0]};
                        }));
                    }
                });
            },
            select: function(event, ui) {
                $('#idCodePostal').val(ui.item.postcode);
                $('#ad1Mag').val(ui.item.name);
                $("#latMag").val(ui.item.latitude);
                $("#longMag").val(ui.item.longitude);
                $("#nomVille").val(ui.item.city);

            }
        });

        var map = L.map('mapid').setView([47.0, 3.0], 5)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        idAdresse.onchange = () => {
            //alert( "latitude." );
            let latitude = latMag.value;
            let longitud = longMag.value;

            console.log(latitude,longitud);
            var mapCenter = [latitude, longitud];
            map.setView(mapCenter, 17)
            var marker = L.marker(mapCenter).addTo(map);
        }


        let type = document.getElementById('type');
        let category= document.getElementById('category');


        type.onchange = function(event) {

            if(type.value == '')
            {
                categorie.disabled = true;
                categorie.style.backgroundColor = 'grey';
            }
            else
            {
                categorie.disabled = false;
                categorie.style.backgroundColor = null;

                axios.get(
                    "../../getCategories",{
                        params:{
                            type : type.value
                        }
                    })
                    .then(displayCategorie)
                    .catch(erreur)
            }

        }

        function displayCategorie (res) {
            //console.log(res.data);
            let obj =res.data;
            categorie.innerHTML = "";

            if(obj.length == 0)
            {
                // SI AUCUNE REPONSE
                let defaut = document.createElement('option');
                let txtDefaut = document.createTextNode('Aucune catégorie');
                defaut.value = 'false';
                defaut.appendChild(txtDefaut);
                categorie.appendChild(defaut);
                categorie.disabled = true;
                categorie.style.backgroundColor = 'grey';
            }
            // DEFAUT OPTION
            let defaut = document.createElement('option');
            let txtDefaut = document.createTextNode('Toute catégories');
            defaut.value = 'false';
            defaut.appendChild(txtDefaut);
            categorie.appendChild(defaut);

            for(let i = 0; i<obj.length; i++)
            {
                //console.log(obj[i]);
                let option = document.createElement('option');
                let libCat = document.createTextNode(obj[i].libCat);

                option.value = obj[i].id;
                option.appendChild(libCat);
                categorie.appendChild(option);
            }
        }
        function erreur (err) {
            console.log(`Erreur ! status : ${err.status}`);
        }








    }
    onload = scriptPosition;
</script>



