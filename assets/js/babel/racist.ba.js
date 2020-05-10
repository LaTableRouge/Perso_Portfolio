function racist() {
  var pageCover = document.getElementById('page-cover');
  pageCover.classList.toggle('is-racist');
  var nav = document.getElementById('fp-nav');
  nav.classList.toggle('is-racist-nav');
  var navMenu = document.getElementById('navMenuIcon');
  navMenu.classList.toggle('is-racist-menu');
  var menu = document.getElementById('navbarMenu');
  menu.classList.toggle('is-racist-menu');
  var social = document.getElementById('social');
  social.classList.toggle('is-racist-nav-social');
  var logob = document.getElementById('logo-black');
  logob.classList.toggle('is-racist-logo-black');
  var logow = document.getElementById('logo-white');
  logow.classList.toggle('is-racist-logo-white');
  var buttonb = document.getElementById('changeColor-Black');
  buttonb.classList.toggle('is-racist-button-black');
  var buttonw = document.getElementById('changeColor-White');
  buttonw.classList.toggle('is-racist-button-white');
  var p = document.getElementsByTagName('p');

  for (var i = 0; i < p.length; i++) {
    p[i].classList.toggle('is-racist-content');
  }

  var a = document.getElementsByTagName('a');

  for (var _i = 0; _i < a.length; _i++) {
    a[_i].classList.toggle('is-racist-content');
  }

  var h1 = document.getElementsByTagName('h1');

  for (var _i2 = 0; _i2 < h1.length; _i2++) {
    h1[_i2].classList.toggle('is-racist-content');
  }

  var h2 = document.getElementsByTagName('h2');

  for (var _i3 = 0; _i3 < h2.length; _i3++) {
    h2[_i3].classList.toggle('is-racist-content-h2');
  }

  var h3 = document.getElementsByTagName('h3');

  for (var _i4 = 0; _i4 < h3.length; _i4++) {
    h3[_i4].classList.toggle('is-racist-content');
  }

  var h4 = document.getElementsByTagName('h4');

  for (var _i5 = 0; _i5 < h4.length; _i5++) {
    h4[_i5].classList.toggle('is-racist-content');
  }

  var h5 = document.getElementsByTagName('h5');

  for (var _i6 = 0; _i6 < h5.length; _i6++) {
    h5[_i6].classList.toggle('is-racist-content');
  }

  var h6 = document.getElementsByTagName('h6');

  for (var _i7 = 0; _i7 < h6.length; _i7++) {
    h6[_i7].classList.toggle('is-racist-content');
  }

  var iframe = document.getElementById('iframe');
  var slideshow = iframe.contentWindow.document.getElementById('slideshow');
  slideshow.classList.toggle('is-racist-slideshow');
  var slideshowContent = iframe.contentWindow.document.getElementsByClassName('slide__title-wrap');

  for (var _i8 = 0; _i8 < slideshowContent.length; _i8++) {
    slideshowContent[_i8].classList.toggle('is-racist-slideshow-content');
  }

  var slidebutton = document.getElementsByClassName('swiper-pagination-bullet');

  for (var _i9 = 0; _i9 < slidebutton.length; _i9++) {
    slidebutton[_i9].classList.toggle('is-racist-slideshow-button');
  }

  var shine = document.getElementsByClassName('shine');

  for (var _i10 = 0; _i10 < shine.length; _i10++) {
    shine[_i10].classList.toggle('is-racist-shine');
  }
}