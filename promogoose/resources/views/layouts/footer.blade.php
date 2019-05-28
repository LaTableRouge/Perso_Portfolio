<!-- Footer -->
<footer class="page-footer">

  <!-- Footer Elements -->
 @guest
    <div class="footer--subscribe">
        <p class="footer--subscribe-p">Pas encore membre ? Inscrivez-vous gratuitement dès maintenant</p>
        <a href="{{ route('register') }}"><button class="footer--subscribe-button">Go !</button></a>
    </div>
 @else
    @if(!Auth::user()->commercant)
        <div class="footer--subscribe">
            <p class="footer--subscribe-p">Vous êtes commerçant?</p>
            <a href="{{ route('account') }}"><button class="footer--subscribe-button">Mettez votre profil à jour !</button></a>
        </div>
    @else
        <div class="footer--subscribe">
            <p class="footer--subscribe-p">Retrouver en un clic vos promos sauvegardées</p>
            <a href="{{ route('mesPromos') }}"><button class="footer--subscribe-button">Aller voir !</button></a>
        </div>
    @endif
  @endguest
    <div class="footer--container">
        <div class="footer--container-help">
            <span class="footer--container-p">Besoin d'aide ?</span>
        @guest
        @else
            @if(Auth::user()->admin)
                <a class="footer--container-a" href="{{ route('admin') }}">Admin</a>
            @endif
        @endguest
            <a class="footer--container-a" href="{{ route('service') }}">Service client</a>
            <a class="footer--container-a" href="#">Contact</a>
        </div>
        <div class="footer--container-mentions">
                <span class="footer--container-p">A propos</span>
                <a class="footer--container-a" href="{{ route('mentions') }}">Mentions légales</a>
                <a class="footer--container-a" href="{{ route('politique') }}">Politique de confidentialité</a>
                <a class="footer--container-a" href="{{ route('conditions') }}">Conditions générales</a>
        </div>
        <!-- Social buttons -->
        <div class="footer--social">
            <span class="footer--social-p">SUIVEZ-NOUS</span>
            <div class="footer--social-box" >
                <li class="">
                    <a class="footer--social-box-a" href="https://fb.me/promogoose">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="">
                    <a class="footer--social-box-a" href="https://twitter.com/promogoose">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
            </div>
        </div>
      <!-- Social buttons -->
    </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer--copyright">Copyright 2019 |
      <a class="footer--copyright-a" href="#"> Promogoose</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->