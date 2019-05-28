@extends('layouts.app')

@section('content')
<article class="avis--container">
    <a class="ariane" href="{{ route('account') }}">&#8249; Retour mon espace</a>
    <p class="avis--container-title">
        Poster un avis
    </p>
    <form action="{{ route('post_avis') }}" method="POST" class="avis--container-form">
    {{ csrf_field() }}
        <div class="avis--container-form-codeBox">
            <p class="avis--container-form-codeBox-desc">
                Entrez le code avis reçu par le commerçant : 
            </p>
            <input name="codeAvis" id="codeAvis" type="text" class="avis--container-form-codeBox-input" placeholder="code avis" value="{{old('codeAvis')}}">
        </div>




        <div class="avis--container-form-starBox">

            <span onmouseover="starmark(this)" onclick="validateRate(this)" id="1one" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked" alt="qdsd"></span>
            <span onmouseover="starmark(this)" onclick="validateRate(this)" id="2one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
            <span onmouseover="starmark(this)" onclick="validateRate(this)" id="3one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
            <span onmouseover="starmark(this)" onclick="validateRate(this)" id="4one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
            <span onmouseover="starmark(this)" onclick="validateRate(this)" id="5one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
        </div>
        <input hidden name="noteAvis" id="noteAvis" type="noteAvis" type="text">
        <textarea name="commentaireAvis" id="commentaireAvis" cols="30" rows="10" class="avis--container-form-textArea" placeholder="Rédigez votre avis">{{old('commentaireAvis')}}</textarea>
        <button type="submit" class="avis--container-form-button">
            Poster
        </button>
    </form>
</article>




<script>
    let count;
    function validateRate(item){
        starmark(item);
        console.log("Rating : "+count);
        document.getElementById('noteAvis').value= count;
    }
    function starmark(item)
    {
        count=item.id[0];
        sessionStorage.starRating = count;
        var subid= item.id.substring(1);
        for(var i=0;i<5;i++)
        {
            if(i<count)
            {
                document.getElementById((i+1)+subid).style.color="orange";
            }
            else
            {
                document.getElementById((i+1)+subid).style.color="#110047";
            }
        }
    }





</script>

@endsection