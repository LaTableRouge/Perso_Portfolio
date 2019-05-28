@extends('layouts.app')


@section('content')

<a class="ariane" href="{{ route('stores') }}">&#8249; Retour vers mes commerces</a>
<p class="create--promo-title">Création d'une promotion pour <br>  {{$magasin->nomMag}}</p>
<article class="create--promo">
    <form class="create--promo-form" method="post" action="{{route('post_create_promotion')  }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="magasin_id" value="{{$magasin->id}}">

        <div class="create--promo-form-container">
            <div class="create--promo-form-container-labelBox">
                <label class="create--promo-form-container-labelBox-label" for="libPromo">La promotion</label>
            </div>
            <div class="create--promo-form-container-descBox">
                <textarea type="text" class="form-control" name="libPromo" id="libPromo" placeholder="Libellé">{{old('libPromo')}}</textarea>
                @if($errors->has('libPromo'))
                    <span class="help-block">
                        {{$errors->first('libPromo')}}
                    </span>
                @endif
            </div>
        </div>

        <div class="create--promo-form-container">
            <div class="create--promo-form-container-labelBox">
                <label class="create--promo-form-container-labelBox-label" for="dateDebutPromo"><i class="fas fa-calendar-alt"></i> Date</label>
            </div>
            <div class="create--promo-form-container-descBox">
                <input type="date" class="form-control" id="dateDebutPromo" name="dateDebutPromo">
                @if($errors->has('dateDebutPromo'))
                    <span class="help-block">
                        {{$errors->first('dateDebutPromo')}}
                    </span>
                @endif
            </div>
        </div>

        <div class="create--promo-form-container">
            <div class="create--promo-form-container-labelBox">
                <label class="create--promo-form-container-labelBox-label" for="">Durée (en jours)</label>
            </div>
            <div class="create--promo-form-container-descBox">
                <input class="" type="number" id="dureePromo" name ="dureePromo" value="15" min="1" max="15">
            </div>
            <div>
                <span class="create--promo-form-container-spanDuree">
                    <i class="fas fa-plus-square" id="dureePlus"></i>
                </span>
                <span class="create--promo-form-container-spanDuree">
                    <i class="fas fa-minus-square" id="dureeMinus"></i>
                </span>
            </div>
        </div>

        <input type="hidden" name="dateFinPromo" id="dateFinPromo">

        <div class="create--promo-form-container">
            <div class="create--promo-form-container-labelBox">
                <label class="create--promo-form-container-labelBox-labelFile" for="photo1Promo">Enregistrer la photo</label>
                <input class="create--promo-form-container-labelBox-input" name="photo1Promo" id="photo1Promo" type="file"  accept=".jpg, .jepg, .png|images/*" value="Enregistrer la premiere photo" required>
            </div>
            <div class="create--promo-form-container-descBox">
                <div id="displayPictureContainer">
                    <!-- insertion ici de la balise img -->
                </div>
            </div>
        </div>

        <div class="create--promo-form-buttonBox">
            <input class="create--promo-form-buttonBox-input" type="submit" value="Enregistrer">
        </div>
    </form>



</article>
@endsection

<script>
    //recuperer à partir de l'adresse texte les position latitude et longitude via une requete axios
    // pour les renvoyer vers le controller afin de les stocker en db



    function fonctionAlancer(){


        function updateDateFinPromo(dateDebutPromo, dureePromo){
            let debut  = new Date(dateDebutPromo.value);
            let jour = debut.getDate();
            let dateFinPromo = debut.setDate((parseInt(dureePromo)+parseInt(jour)));

         return dateFinPromo
        }



        document.getElementById('dureePlus').addEventListener('click', function(){
            if(dateDebutPromo.value){

                 dureePromo.value  = (parseInt(dureePromo.value)+ 1)*1;

                //console.log(dureePromo.value)

                //console.log('date de fin: '+ new Date(updateDateFinPromo(dateDebutPromo, dureePromo.value)))
                document.getElementById('dateFinPromo').value=new Date(updateDateFinPromo(dateDebutPromo, dureePromo.value));


            }
        })

        document.getElementById('dureeMinus').addEventListener('click', function(){
            if(dateDebutPromo.value){

                dureePromo.value  = (parseInt(dureePromo.value)- 1)*1;

                //console.log(dureePromo.value)

                //console.log('date de fin: '+ new Date(updateDateFinPromo(dateDebutPromo, dureePromo.value)))
                document.getElementById('dateFinPromo').value=new Date(updateDateFinPromo(dateDebutPromo, dureePromo.value));

            }
        })


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

        $("#photo1Promo").change(function(){
            displayPhoto(this);
        });

    }
    onload = fonctionAlancer;
</script>



