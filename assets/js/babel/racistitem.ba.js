function racist() {
  var pageCover = document.getElementById('page-cover');
  pageCover.classList.toggle('is-racist');
  var social = document.getElementById('social');
  social.classList.toggle('is-racist-nav-social');
  var buttonb = document.getElementById('changeColor-Black');
  buttonb.classList.toggle('is-racist-button-black');
  var buttonw = document.getElementById('changeColor-White');
  buttonw.classList.toggle('is-racist-button-white');
  var prev = document.getElementById('nav-prev');
  prev.classList.toggle('is-racist-nav-prev');
  var next = document.getElementById('nav-next');
  next.classList.toggle('is-racist-nav-next');
  var menu = document.getElementById('navbarMenu');
  menu.classList.toggle('is-racist-menuitem');
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

  var li = document.getElementsByTagName('li');

  for (var _i8 = 0; _i8 < li.length; _i8++) {
    li[_i8].classList.toggle('is-racist-content');
  }

  var shine = document.getElementsByClassName('shine');

  for (var _i9 = 0; _i9 < shine.length; _i9++) {
    shine[_i9].classList.toggle('is-racist-shine');
  }
}