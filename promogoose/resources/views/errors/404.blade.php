@extends('layouts.app')

@section('content')
<article class="error--container">
    <a class="ariane error--container-ariane" href="{{ route('index') }}">&#8249; Retour à l'accueil</a>
    <img class="error--container-img" src="{{ url('/img/404/404.png') }}" alt="un homme perdu">
</article>

    
@endsection