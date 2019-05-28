<header>
    <nav class="nav--container">
        <!-- Branding image -->

        <a href="{{ route('index') }}">
            <img class="brand--img" src="{{ url('/img/logo_promogoose.png') }}" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <a class="map" href="{{ route('search') }}"><i class="fas fa-map-marked-alt"></i></a>
        <div class="auth--container">
            <span><img class="hamburger" src="{{ url('/img/ico/hamburger.png') }}" alt="hamburger menu"/></span>
            <!-- Right Side Of Navbar -->
            <ul id="menu" class="auth--container-links">
                <!-- Authentication Links -->
        
                    <li><a class="auth--container-links-a help" href="{{ route('help') }}">Aide</a></li>
                @guest
                    <li><a class="auth--container-links-a" href="{{ route('login') }}">Connexion</a></li>
                    <li><a class="auth--container-links-a register" href="{{ route('register') }}">Inscription</a></li>
                @else
                    @if(Auth::user()->commercant)
                        <li><a class="auth--container-links-a" href="{{ route('stores') }}">Mes commerces</a></li>
                    @else
                    <li><a class="auth--container-links-a" href="{{ route('mesPromos') }}">Mes promos</a></li>
                    @endif
                    <div class="account--dropdown">
                        <button id="dropdown" class="account--dropdown-button">
                            <a href="#" class="dropdown-toggle account--dropdown-button-a" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                        </button>
                        <nav class="account--dropdown-content">
                            @if(Auth::user()->commercant)
                                <a href="{{ route('mesPromos') }}" class="account--dropdown-content-a">
                                    Mes promos
                                </a>
                            @endif
                            <a href="{{ route('account') }}" class="account--dropdown-content-a">
                                Mes infos
                            </a>
                            <a href="{{ route('mesAvis') }}" class="account--dropdown-content-a">
                                Mes avis
                            </a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="account--dropdown-content-a">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </nav>
                    </div>
                @endguest
            </ul>
        </div>
    </nav>
    
</header>
<script>
	$("span").on('click',function(event){
		event.preventDefault();
		$("ul").toggle('auth--container-links');
	});
    // $("span").on('click',function(){
	// 	var x = document.getElementById("menu");
    //     if (x.style.display === "none") {
    //         x.style.display = "block";
    //     } else {
    //         x.style.display = "none";
    //     }
	// });
    
</script>