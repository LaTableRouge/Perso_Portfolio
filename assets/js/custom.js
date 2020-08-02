'use strict';

document.addEventListener('DOMContentLoaded', (event) => {
  // Cached Variables
  var windowVar = $(window);
  var $main = $('html, body');
  var elImg = $('.bg-img');
  var elColor = $('.bg-color');
  var menuItems = $('.all-menu-wrapper .nav-link');
  var menuIcon = $('.menu-icon, #navMenuIcon');
  var menuBlock = $('.all-menu-wrapper');
  var reactToMenu = $('.page-main, .navbar-sidebar, .page-cover');
  var menuLinks = $('.navbar-mainmenu a, .navbar-sidebar a');
  var imageListSlide = $('.slide-show .img');
  var videoBg = $('.video-container video, .video-container object');
  var pageSectionDivs = $('.page-fullpage .section');
  var headerContainer = $('.hh-header');
  var slideElem = $('.slide');
  var arrowElem = $('.p-footer .arrow-d');
  var pageElem = $('.section');
  var mainPage = $('#mainpage');
  var sendEmailForm = $('.send_email_form');
  var sendMessageForm = $('.send_message_form');

  // Variables
  var imageSlides = [];
  var pageSections = [];
  var pageAnchors = [];
  var scrollOverflow = true;
  var css3 = true;

  //Page Loader
  windowVar.on('load', function () {
    $('#pageloader').addClass('p-hidden');
    $('.section').addClass('anim');
  });

  // var screen = $(window)
  // if (screen.width() < 992) {
  //     let instaLInk = document.getElementById("instagram-link");
  //         instaLInk.setAttribute("href", "instagram.html")
  // }

  // Subscribe and contact forms sender
  $.fn.initForm = function (options) {
    var settings = $.extend(
      {
        type: 'post',
        serverUrl: '#',
        successClean: this.find('.form-success-clean'),
        successGone: this.find('.form-success-gone'),
        successInvisible: this.find('.form-success-invisible'),
        successVisible: this.find('.form-success-visible'),
        textFeedback: this.find('.form-text-feedback'),
      },
      options
    );
    var $ajax = {
      sendRequest: function (p) {
        var form_fill = $(p);
        var form_inputs = form_fill.find(':input');
        var form_data = {};
        form_inputs.each(function () {
          form_data[this.name] = $(this).val();
        });
        $.ajax({
          url: settings.serverUrl,
          type: settings.type,
          data: form_data,
          dataType: 'json',

          success: function (data) {
            //Ajax connexion was a success, now handle response
            if (data && !data.error) {
              settings.successClean.val('');
              settings.successInvisible.addClass('invisible');
              settings.successGone.addClass('gone');
              settings.successVisible.removeClass('invisible');
              settings.successVisible.removeClass('gone');
              console.log('Request sent successfully');
            }
            // Else the login credentials were invalid.
            else {
              settings.textFeedback.removeClass('gone');
              settings.textFeedback.removeClass('invisible');
              settings.textFeedback.html('Error when sending request.');
              console.log('Could not process AJAX request to server');
            }
          },
          /* show error message */
          error: function (jqXHR, textStatus, errorThrown) {
            settings.textFeedback.removeClass('gone');
            settings.textFeedback.removeClass('invisible');
            settings.textFeedback.html('Error when sending request.');
            console.log('ajax error');
          },
        });
      },
    };

    //if jquery validator plugin is enable, use it
    if (jQuery.validator) {
      jQuery.validator.setDefaults({
        success: 'valid',
      });
      this.validate({
        rules: {
          field: {
            required: true,
            email: true,
          },
        },
      });
    }

    this.submit(function (event) {
      event.preventDefault();
      if (jQuery.validator) {
        if ($(this).valid()) {
          $ajax.sendRequest(this);
        }
      } else {
        $ajax.sendRequest(this);
      }
    });
  };

  // Background image as data attribut
  for (var i = 0; i < elImg.length; i++) {
    var src = elImg[i].getAttribute('data-image-src');
    elImg[i].style.backgroundImage = "url('" + src + "')";
    elImg[i].style.backgroundRepeat = 'no-repeat';
    elImg[i].style.backgroundPosition = 'center';
    elImg[i].style.backgroundSize = 'cover';
  }
  // Background color as data attribut
  for (var i = 0; i < elColor.length; i++) {
    var src = elColor[i].getAttribute('data-bgcolor');
    elColor[i].style.backgroundColor = src;
  }

  // Menu icon clicked
  menuIcon.on('click', function () {
    menuIcon.toggleClass('menu-visible');
    menuBlock.toggleClass('menu-visible');
    menuItems.toggleClass('menu-visible');
    reactToMenu.toggleClass('menu-visible');
    return false;
  });

  // Hide menu after a menu item clicked
  menuLinks.on('click', function () {
    menuIcon.removeClass('menu-visible');
    menuBlock.removeClass('menu-visible');
    menuItems.removeClass('menu-visible');
    reactToMenu.removeClass('menu-visible');
    return true;
  });

  // Projects carousel init
  new Swiper('.carousel-swiper-beta-demo .swiper-container', {
    pagination: '.carousel-swiper-beta-demo .items-pagination',
    paginationClickable: '.carousel-beta-alpha-demo .items-pagination',
    nextButton: '.carousel-swiper-beta-demo .items-button-next',
    prevButton: '.carousel-swiper-beta-demo .items-button-prev',
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    autoplay: 5000,
    autoplayDisableOnInteraction: false,
    slidesPerView: 3,
    spaceBetween: 20,
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      800: {
        slidesPerView: 2,
        spaceBetween: 0,
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0,
      },
      440: {
        slidesPerView: 1,
        spaceBetween: 0,
      },
    },
  });

  // Testimonials carousel init
  new Swiper('.testimonials .swiper-container', {
    pagination: '.testimonials .items-pagination',
    paginationClickable: '.testimonials .items-pagination',
    loop: true,
    grabCursor: true,
    centeredSlides: false,
    autoplay: 5000,
    // autoplay: 0,
    autoplayDisableOnInteraction: false,
    slidesPerView: 1,
    spaceBetween: 55,
    effect: 'slide',
  });

  // Slideshow init
  for (var i = 0; i < imageListSlide.length; i++) {
    var src = imageListSlide[i].getAttribute('data-src');
    imageSlides.push({
      src: src,
    });
  }
  $('.slide-show').vegas({
    delay: 5000,
    shuffle: true,
    slides: imageSlides,
    animation: ['kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight'],
  });

  //Prepare content for animation
  $('.section .content .anim.anim-wrapped').wrap(
    "<span class='anim-wrapper'></span>"
  );

  // disable scroll overflow on small device
  if (windowVar.width() < 601) {
    scrollOverflow = false;
    css3 = false;
  }
  if (windowVar.height() < 480) {
    scrollOverflow = false;
    css3 = false;
  }

  // Get sections name
  for (var i = 0; i < pageSectionDivs.length; i++) {
    pageSections.push(pageSectionDivs[i]);
  }

  window.asyncEach(
    pageSections,
    function (pageSection, cb) {
      var anchor = pageSection.getAttribute('data-section');
      pageAnchors.push(anchor + '');
      cb();
    },
    function (err) {
      if (mainPage.width()) {
        // config fullpage.js
        mainPage.fullpage({
          menu: '#qmenu',
          anchors: pageAnchors,
          verticalCentered: false,
          css3: css3,
          navigation: true,
          responsiveWidth: 601,
          responsiveHeight: 480,
          scrollOverflow: scrollOverflow,
          scrollOverflowOptions: {
            click: true,
            submit: true,
          },
          normalScrollElements: '.section .scrollable',
          afterRender: function () {
            videoBg.maximage('maxcover');

            // Fix for internet explorer
            // Detect IE 6-11
            var isIE = /*@cc_on!@*/ false || !!document.documentMode;
            if (isIE) {
              var contentColumns = $('.section .content .c-columns');
              contentColumns.height(windowVar.height());
              for (var i = 0; i < contentColumns.length; i++) {
                if (contentColumns[i].height <= windowVar.height()) {
                  contentColumns[i].style.height = '100vh';
                }
              }
            }

            // Init contact form (change backend.php file to your php file which will send email)
            var newsletterServerUrl = './backend.php';
            var messageServerUrl = './backend.php';

            if (
              sendEmailForm.attr('action') &&
              sendEmailForm.attr('action') != ''
            ) {
              newsletterServerUrl = sendEmailForm.attr('action');
            }
            if (
              sendMessageForm.attr('action') &&
              sendMessageForm.attr('action') != ''
            ) {
              messageServerUrl = sendMessageForm.attr('action');
            }

            sendEmailForm.initForm({
              serverUrl: newsletterServerUrl,
            });
            sendMessageForm.initForm({
              serverUrl: messageServerUrl,
            });
          },
          afterResize: function () {
            var pluginContainer = $(this);
            $.fn.fullpage.reBuild();
          },
          onLeave: function (index, nextIndex, direction) {
            // Behavior when a full page is leaved
            arrowElem.addClass('gone');
            pageElem.addClass('transition');
            slideElem.removeClass('transition');
            pageElem.removeClass('transition');
          },
          afterLoad: function (anchorLink, index) {
            // Behavior after a full page is loaded
            // hide or show clock
            if ($('.section.active').hasClass('hide-clock')) {
              headerContainer.addClass('gone');
            } else {
              headerContainer.removeClass('gone');
            }
          },
        });
      }
    }
  );
  // Scroll to fullPage.js next/previous section
  $('.scrolldown a, .scroll.down').on('click', function () {
    try {
      // fullpage scroll
      $.fn.fullpage.moveSectionDown();
    } catch (error) {
      // normal scroll
      $main.animate(
        {
          scrollTop: window.innerHeight,
        },
        400,
        function () {}
      );
    }
  });

  //Hide some ui on scroll
  windowVar.on('scroll', function () {
    var scrollpos = $(this).scrollTop();
    var siteHeaderFooter = $('.page-footer, .page-header');

    if (scrollpos > 100) {
      siteHeaderFooter.addClass('scrolled');
    } else {
      siteHeaderFooter.removeClass('scrolled');
    }
  });

  /*********[TEXT SCRAMBLE]*********/
  const el = document.querySelector('.text');
  if (el !== null) {
    class TextScramble {
      constructor(el) {
        this.el = el;
        this.chars = '!<>-_\\/[]{}—=+*^?#________';
        this.update = this.update.bind(this);
      }
      setText(newText) {
        const oldText = this.el.innerText;
        const length = Math.max(oldText.length, newText.length);
        const promise = new Promise((resolve) => (this.resolve = resolve));
        this.queue = [];
        for (let i = 0; i < length; i++) {
          const from = oldText[i] || '';
          const to = newText[i] || '';
          const start = Math.floor(Math.random() * 40);
          const end = start + Math.floor(Math.random() * 40);
          this.queue.push({
            from,
            to,
            start,
            end,
          });
        }
        cancelAnimationFrame(this.frameRequest);
        this.frame = 0;
        this.update();
        return promise;
      }
      update() {
        let output = '';
        let complete = 0;
        for (let i = 0, n = this.queue.length; i < n; i++) {
          let { from, to, start, end, char } = this.queue[i];
          if (this.frame >= end) {
            complete++;
            output += to;
          } else if (this.frame >= start) {
            if (!char || Math.random() < 0.28) {
              char = this.randomChar();
              this.queue[i].char = char;
            }
            output += `<span class="dud">${char}</span>`;
          } else {
            output += from;
          }
        }
        this.el.innerHTML = output;
        if (complete === this.queue.length) {
          this.resolve();
        } else {
          this.frameRequest = requestAnimationFrame(this.update);
          this.frame++;
        }
      }
      randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)];
      }
    }
    // Text
    const phrases = [
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'Hello there !',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'I love front-end ...',
      'General Kenobi !',
    ];

    const fx = new TextScramble(el);

    let counter = 0;
    const next = () => {
      fx.setText(phrases[counter]).then(() => {
        setTimeout(next, 2500);
      });
      counter = (counter + 1) % phrases.length;
    };
    next();
  }

  /*********[LOADER]*********/
  let loadFunction = () => {
    let loader = document.getElementById('loader');
    let body = document.getElementById('menu');
    if (loader !== null) {
      setTimeout(() => {
        loader.style.opacity = '0';
        setTimeout(() => {
          loader.style.display = 'none';
          body.classList.remove('is-loading');
        }, 500);
      }, 4000);
    }
  };
  loadFunction();

  /*********[PERLIN ANIMATION]*********/
  setTimeout(() => {
    // Ported from Stefan Gustavson's java implementation
    // http://staffwww.itn.liu.se/~stegu/simplexnoise/simplexnoise.pdf
    // Read Stefan's excellent paper for details on how this code works.
    //
    // Sean McCullough banksean@gmail.com

    /**
     * You can pass in a random number generator object if you like.
     * It is assumed to have a random() method.
     */
    var ClassicalNoise = function (r) {
      // Classic Perlin noise in 3D, for comparison
      if (r == undefined) r = Math;
      this.grad3 = [
        [1, 1, 0],
        [-1, 1, 0],
        [1, -1, 0],
        [-1, -1, 0],
        [1, 0, 1],
        [-1, 0, 1],
        [1, 0, -1],
        [-1, 0, -1],
        [0, 1, 1],
        [0, -1, 1],
        [0, 1, -1],
        [0, -1, -1],
      ];
      this.p = [];
      for (var i = 0; i < 256; i++) {
        this.p[i] = Math.floor(r.random() * 256);
      }
      // To remove the need for index wrapping, double the permutation table length
      this.perm = [];
      for (var i = 0; i < 512; i++) {
        this.perm[i] = this.p[i & 255];
      }
    };

    ClassicalNoise.prototype.dot = function (g, x, y, z) {
      return g[0] * x + g[1] * y + g[2] * z;
    };

    ClassicalNoise.prototype.mix = function (a, b, t) {
      return (1.0 - t) * a + t * b;
    };

    ClassicalNoise.prototype.fade = function (t) {
      return t * t * t * (t * (t * 6.0 - 15.0) + 10.0);
    };

    // Classic Perlin noise, 3D version
    ClassicalNoise.prototype.noise = function (x, y, z) {
      // Find unit grid cell containing point
      var X = Math.floor(x);
      var Y = Math.floor(y);
      var Z = Math.floor(z);

      // Get relative xyz coordinates of point within that cell
      x = x - X;
      y = y - Y;
      z = z - Z;

      // Wrap the integer cells at 255 (smaller integer period can be introduced here)
      X = X & 255;
      Y = Y & 255;
      Z = Z & 255;

      // Calculate a set of eight hashed gradient indices
      var gi000 = this.perm[X + this.perm[Y + this.perm[Z]]] % 12;
      var gi001 = this.perm[X + this.perm[Y + this.perm[Z + 1]]] % 12;
      var gi010 = this.perm[X + this.perm[Y + 1 + this.perm[Z]]] % 12;
      var gi011 = this.perm[X + this.perm[Y + 1 + this.perm[Z + 1]]] % 12;
      var gi100 = this.perm[X + 1 + this.perm[Y + this.perm[Z]]] % 12;
      var gi101 = this.perm[X + 1 + this.perm[Y + this.perm[Z + 1]]] % 12;
      var gi110 = this.perm[X + 1 + this.perm[Y + 1 + this.perm[Z]]] % 12;
      var gi111 = this.perm[X + 1 + this.perm[Y + 1 + this.perm[Z + 1]]] % 12;
      // Calculate noise contributions from each of the eight corners
      var n000 = this.dot(this.grad3[gi000], x, y, z);
      var n100 = this.dot(this.grad3[gi100], x - 1, y, z);
      var n010 = this.dot(this.grad3[gi010], x, y - 1, z);
      var n110 = this.dot(this.grad3[gi110], x - 1, y - 1, z);
      var n001 = this.dot(this.grad3[gi001], x, y, z - 1);
      var n101 = this.dot(this.grad3[gi101], x - 1, y, z - 1);
      var n011 = this.dot(this.grad3[gi011], x, y - 1, z - 1);
      var n111 = this.dot(this.grad3[gi111], x - 1, y - 1, z - 1);
      // Compute the fade curve value for each of x, y, z
      var u = this.fade(x);
      var v = this.fade(y);
      var w = this.fade(z);
      // Interpolate along x the contributions from each of the corners
      var nx00 = this.mix(n000, n100, u);
      var nx01 = this.mix(n001, n101, u);
      var nx10 = this.mix(n010, n110, u);
      var nx11 = this.mix(n011, n111, u);
      // Interpolate the four results along y
      var nxy0 = this.mix(nx00, nx10, v);
      var nxy1 = this.mix(nx01, nx11, v);
      // Interpolate the two last results along z
      var nxyz = this.mix(nxy0, nxy1, w);

      return nxyz;
    };
    // Your code to run since DOM is loaded and ready

    /*********[BACKGROUND ANIMATION]*********/
    let Utils = {
      setCanvasSize: function () {
        (canvas.width = document.documentElement.clientWidth),
          (canvas.height = document.documentElement.clientHeight);

        canvas.setAttribute('width', canvas.width);
        canvas.setAttribute('height', canvas.height);
      },

      addEvents: function () {
        window.addEventListener('resize', function () {
          Utils.setCanvasSize();
          // refresh()
        });
      },

      degToRad: function (deg) {
        return (deg * Math.PI) / 180;
      },

      randInt: function (min, max) {
        return Math.floor(Math.random() * max) + min;
      },

      reload: function () {
        window.location.reload();
      },
    };

    function Generator(params) {
      this.x = params.x;
      this.y = params.y;
      this.particleCount = 1500;
      this.initialDistance = 100;
      this.distanceThreshold = 10;
      this.thresholdVariation = 100;

      this.seed_1 = 1;
      this.seed_2 = 0;
      this.particleSize = 1;
      this.particleRotationSpeed = 0.05;
      this.particleDistanceSpeed = 3;
      this.perlinAmp = this.newPerlinAmp = 1;
      this.perlinAmpIncrease = true;
      this.perlinIncreaseSpeed = 0.2;

      this.particles = [];
      this.populate();
    }

    var G = Generator.prototype;

    G.populate = function () {
      for (var i = 0; i < this.particleCount; i++) {
        this.particles.push(
          new Particle({
            x: this.x,
            y: this.y,
            angle: Utils.randInt(1, 360),
            distance: this.initialDistance,
            distanceThreshold: this.distanceThreshold,
            thresholdVariation: this.thresholdVariation,
            color:
              Math.random() < 0.5
                ? 'rgba(51, 204, 255,.02)'
                : 'rgba(255, 50, 50,.02)',
            size: this.particleSize,
          })
        );
      }
    };

    G.draw = function () {
      if (this.perlinAmpIncrease) this.newPerlinAmp -= this.perlinIncreaseSpeed;
      this.particles.forEach(function (particle) {
        particle.move();
      });
    };

    function Particle(params) {
      this.initX = this.x = params.x || canvas.width / 2;
      this.initY = this.y = params.y || canvas.height / 2;
      this.angle = Utils.degToRad(params.angle || Utils.randInt(1, 360));
      this.distance = params.distance;
      this.x = this.initX + Math.cos(this.angle) * this.distance;
      this.y = this.initY + Math.sin(this.angle) * this.distance;
      this.distanceThreshold =
        params.distanceThreshold + Utils.randInt(0, params.thresholdVariation);
      this.color = params.color;
      this.size = params.size || 1;
    }

    var P = Particle.prototype;

    P.move = function () {
      if (this.distance < this.distanceThreshold) {
        this.distance +=
          generator.particleDistanceSpeed +
          generator.newPerlinAmp *
            perlin.noise(
              this.x * generator.seed_1,
              this.y * generator.seed_2,
              1
            );
      } else {
        this.distance +=
          generator.newPerlinAmp *
          perlin.noise(this.x * generator.seed_1, this.y * generator.seed_2, 1);
      }
      this.angle += Utils.degToRad(generator.particleRotationSpeed);
      this.x = this.initX + Math.cos(this.angle) * this.distance;
      this.y = this.initY + Math.sin(this.angle) * this.distance;
      this.draw();
    };

    P.draw = function () {
      ctx.fillStyle = this.color;

      ctx.fillRect(this.x, this.y, this.size, this.size);
    };

    let canvas = document.getElementById('animation__canvas');
    if (canvas !== null) {
      var perlin = new ClassicalNoise(),
        ctx = canvas.getContext('2d'),
        generator,
        gui,
        globalParams = {
          compositeOperation: true,
        };

      (function init() {
        Utils.setCanvasSize();
        Utils.addEvents();

        generator = new Generator({
          x: canvas.width / 2,
          y: canvas.height / 2,
        });

        gui = new dat.GUI();
        var folder_0 = gui.addFolder('Global');
        folder_0.open();
        folder_0
          .add(globalParams, 'compositeOperation')
          .onFinishChange(refresh);

        var folder_1 = gui.addFolder('Generator');
        folder_1.open();
        folder_1
          .add(generator, 'particleCount', 1, 5000)
          .step(10)
          .onFinishChange(refresh);
        folder_1
          .add(generator, 'initialDistance', -100, 100)
          .step(10)
          .onFinishChange(refresh);
        folder_1
          .add(generator, 'distanceThreshold', 0, 1000)
          .step(10)
          .onFinishChange(refresh);
        folder_1.add(generator, 'seed_1', 0, 5).onFinishChange(refresh);
        folder_1.add(generator, 'seed_2', 0, 5).onFinishChange(refresh);
        folder_1
          .add(generator, 'perlinAmp', 0, 100)
          .step(1)
          .onFinishChange(refresh);
        folder_1.add(generator, 'perlinAmpIncrease').onFinishChange(refresh);
        folder_1
          .add(generator, 'perlinIncreaseSpeed', 0, 10)
          .onFinishChange(refresh);

        var folder_2 = gui.addFolder('Particles');
        folder_2.open();
        folder_2
          .add(generator, 'thresholdVariation', 0, 500)
          .step(1)
          .onFinishChange(refresh);
        folder_2
          .add(generator, 'particleSize', 1, 3)
          .step(1)
          .onFinishChange(refresh);
        folder_2
          .add(generator, 'particleRotationSpeed', 0, 3)
          .onFinishChange(refresh);
        folder_2
          .add(generator, 'particleDistanceSpeed', 0, 3)
          .onFinishChange(refresh);

        generator.populate();

        animate();
      })();

      function refresh() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        generator.particles = [];
        generator.newPerlinAmp = generator.perlinAmp;
        generator.populate();
      }

      function animate() {
        ctx.fillStyle = 'rgba(#1d1d1d,1)';
        generator.draw();
        requestAnimationFrame(animate);
      }
    }
  }, 4000);
});
