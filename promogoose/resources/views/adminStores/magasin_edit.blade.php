@extends('layouts.app')

@section('content')

<a class="ariane" href="{{ route('stores') }}">&#8249; Retour mes commerces</a>

<article class="edit--shop">
    <p class="edit--shop-title">Modification du commerce : {{$magasin->nomMag}}</p>
    <form class="edit--shop-formBox" method="post" action="{{route('magasin_post_edit')  }}">
        {{csrf_field()}}
        <input type="hidden" name="magasin_id" value="{{$magasin->id}}">

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="nomMag">Nom du magasin</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="text" class="form-control" id="nomMag" name="nomMag" value="{{old('nomMag', $magasin->nomMag)}}">
                        @if($errors->has('nomMag'))
                            <span class="help-block">
                                {{$errors->first('nomMag')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="ad1Mag">Adresse du commerce</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="text" class="form-control" id="ad1Mag" name="ad1Mag" value="{{old('ad1Mag', $magasin->ad1Mag)}}">
                        @if($errors->has('ad1Mag'))
                            <span class="help-block">
                                {{$errors->first('ad1Mag')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="ad2Mag">Ville du commerce</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="text" class="form-control" id="ad2Mag" name="ad2Mag" value="{{old('ad2Mag', $magasin->ad2Mag)}}" >
                        @if($errors->has('ad2Mag'))
                            <span class="help-block">
                                {{$errors->first('ad2Mag')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="telMag">Numéro de téléphone du commerce</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="tel"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" id="telMag" name="telMag" value="{{old('telMag', $magasin->telMag)}}">
                        @if($errors->has('telMag'))
                            <span class="help-block">
                                {{$errors->first('telMag')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="mailMag">Email du commerce</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="email"  class="form-control" id="mailMag" name="mailMag" value="{{old('mailMag', $magasin->mailMag)}}">
                        @if($errors->has('mailMag'))
                            <span class="help-block">
                                {{$errors->first('mailMag')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="siret">Numéro de SIRET du commerce</label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input type="number"  class="form-control" id="siret" name="siret" value="{{old('siret', $magasin->siret)}}">
                        @if($errors->has('siret'))
                            <span class="help-block">
                                {{$errors->first('siret')}} <br>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="latitude">Latitude: </label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input  name="latitude" id="latitude" value="{{$magasin->latMag}}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div class="edit--shop-formBox-container-labelBox">
                <label class="edit--shop-formBox-container-labelBox-label" for="longitude">Longitude: </label>
            </div>
            <div class="edit--shop-formBox-container-descBox">
                <div class="edit--shop-formBox-container-descBox-desc">
                    <div class="edit--shop-formBox-container-descBox-desc-input">
                        <input  name="longitude" id="longitude" value="{{$magasin->longMag}}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="edit--shop-formBox-container">
            <div>
                <label class="edit--shop-formBox-container-labelFile" for="photo1Mag">Enregistrer la premiere photo</label>
                <input class="edit--shop-formBox-container-file" name="photo1Mag" id="photo1Mag" type="file"  accept=".jpg, .jepg, .png|images/*" value="Enregistrer la premiere photo">
            </div>
            
        </div>


        <div class="edit--shop-formBox-buttonBox">
            <input class="edit--shop-formBox-buttonBox-input" type="submit" value="Enregistrer">
        </div>

    </form>
</article>
@endsection

<script>


//recuperer à partir de l'adresse texte les position latitude et longitude via une requete axios
// pour les renvoyer vers le controller afin de les stocker en db

function scriptPosition(){
let ad1Mag = document.getElementById('ad1Mag');
let ad2Mag = document.getElementById('ad2Mag');

ad1Mag.addEventListener('blur', getPosition)
ad2Mag.addEventListener('blur', getPosition)


    function getPosition(){

        let adresse = ad1Mag.value+' '+ad2Mag.value;
        let regex = /\s/gi;
        let params =adresse.replace(regex, '+');
        axios.get(`https://api-adresse.data.gouv.fr/search/?q=${params}`)
            .then(function (response) {
                // handle success
                console.log({{$magasin->id}}) ;
                let latitude = response.data.features[0].geometry.coordinates[1];
                let longitude = response.data.features[0].geometry.coordinates[0];
                console.log(`latitude ${latitude} et longitude ${longitude}`);
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;

            })
            .catch(function (error) {
                // handle error
                console.error(error);
            })
            .then(function () {
                // always executed
            });


    }
}

    onload = scriptPosition;


</script>

<!-- <form method="post" action="{{route('magasin_post_edit')  }}">
        {{csrf_field()}}
        <input type="hidden" name="magasin_id" value="{{$magasin->id}}">

        <label for="nomMag">Nom du magasin</label>
        <input type="text" class="form-control" id="nomMag" name="nomMag" value="{{old('nomMag', $magasin->nomMag)}}">

        @if($errors->has('nomMag'))
            <span class="help-block">
                {{$errors->first('nomMag')}} <br>
            </span>
        @endif
        <br>

        <label for="ad1Mag">Adresse du commerce</label>
        <textarea type="text" class="form-control" id="ad1Mag" name="ad1Mag" >{{old('ad1Mag', $magasin->ad1Mag)}}</textarea>

        @if($errors->has('ad1Mag'))
            <span class="help-block">
                {{$errors->first('ad1Mag')}} <br>
            </span>
        @endif
        <br>

        <label for="ad2Mag">Ville du commerce</label>
        <textarea type="text" class="form-control" id="ad2Mag" name="ad2Mag" >{{old('ad2Mag', $magasin->ad2Mag)}}</textarea>

        @if($errors->has('ad2Mag'))
            <span class="help-block">
                {{$errors->first('ad2Mag')}} <br>
            </span>
        @endif
        <br>


        <label for="telMag">Numéro de téléphone du commerce</label>
        <textarea type="tel"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" id="telMag" name="telMag" >{{old('telMag', $magasin->telMag)}}</textarea>

        @if($errors->has('telMag'))
            <span class="help-block">
                {{$errors->first('telMag')}} <br>
            </span>
        @endif
        <br>


        <label for="mailMag">Email du commerce</label>
        <textarea type="email"  class="form-control" id="mailMag" name="mailMag" >{{old('mailMag', $magasin->mailMag)}}</textarea>

        @if($errors->has('mailMag'))
            <span class="help-block">
                {{$errors->first('mailMag')}} <br>
            </span>
        @endif
        <br>

        <label for="siret">Numéro de SIRET du commerce</label>
        <textarea type="number"  class="form-control" id="siret" name="siret" >{{old('siret', $magasin->siret)}}</textarea>

        @if($errors->has('siret'))
            <span class="help-block">
                {{$errors->first('siret')}} <br>
            </span>
        @endif
        <br>
        <label for="latitude">Latitude: </label>
        <input  name="latitude" id="latitude" value="{{$magasin->latMag}}" disabled>
        <label for="longitude">Longitude: </label>
        <input  name="longitude" id="longitude" value="{{$magasin->longMag}}" disabled>

        <div>

        </div>




        <input type="submit" value="Enregistrer">

    </form> -->