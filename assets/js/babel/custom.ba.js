'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$(document).on('ready', function () {
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
  var imageSlides = [];
  var pageSections = [];
  var pageAnchors = [];
  var scrollOverflow = true;
  var css3 = true;
  windowVar.on('load', function () {
    $('#pageloader').addClass('p-hidden');
    $('.section').addClass('anim');
  });

  $.fn.initForm = function (options) {
    var settings = $.extend({
      type: 'post',
      serverUrl: '#',
      successClean: this.find('.form-success-clean'),
      successGone: this.find('.form-success-gone'),
      successInvisible: this.find('.form-success-invisible'),
      successVisible: this.find('.form-success-visible'),
      textFeedback: this.find('.form-text-feedback')
    }, options);
    var $ajax = {
      sendRequest: function sendRequest(p) {
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
          success: function success(data) {
            if (data && !data.error) {
              settings.successClean.val('');
              settings.successInvisible.addClass('invisible');
              settings.successGone.addClass('gone');
              settings.successVisible.removeClass('invisible');
              settings.successVisible.removeClass('gone');
              void 0;
            } else {
              settings.textFeedback.removeClass('gone');
              settings.textFeedback.removeClass('invisible');
              settings.textFeedback.html('Error when sending request.');
              void 0;
            }
          },
          error: function error(jqXHR, textStatus, errorThrown) {
            settings.textFeedback.removeClass('gone');
            settings.textFeedback.removeClass('invisible');
            settings.textFeedback.html('Error when sending request.');
            void 0;
          }
        });
      }
    };

    if (jQuery.validator) {
      jQuery.validator.setDefaults({
        success: 'valid'
      });
      this.validate({
        rules: {
          field: {
            required: true,
            email: true
          }
        }
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

  for (var i = 0; i < elImg.length; i++) {
    var src = elImg[i].getAttribute('data-image-src');
    elImg[i].style.backgroundImage = "url('" + src + "')";
    elImg[i].style.backgroundRepeat = 'no-repeat';
    elImg[i].style.backgroundPosition = 'center';
    elImg[i].style.backgroundSize = 'cover';
  }

  for (var i = 0; i < elColor.length; i++) {
    var src = elColor[i].getAttribute('data-bgcolor');
    elColor[i].style.backgroundColor = src;
  }

  menuIcon.on('click', function () {
    menuIcon.toggleClass('menu-visible');
    menuBlock.toggleClass('menu-visible');
    menuItems.toggleClass('menu-visible');
    reactToMenu.toggleClass('menu-visible');
    return false;
  });
  menuLinks.on('click', function () {
    menuIcon.removeClass('menu-visible');
    menuBlock.removeClass('menu-visible');
    menuItems.removeClass('menu-visible');
    reactToMenu.removeClass('menu-visible');
    return true;
  });
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
        slidesPerView: 3
      },
      800: {
        slidesPerView: 2,
        spaceBetween: 0
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0
      },
      440: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });
  new Swiper('.testimonials .swiper-container', {
    pagination: '.testimonials .items-pagination',
    paginationClickable: '.testimonials .items-pagination',
    loop: true,
    grabCursor: true,
    centeredSlides: false,
    autoplay: 5000,
    autoplayDisableOnInteraction: false,
    slidesPerView: 1,
    spaceBetween: 55,
    effect: 'slide'
  });

  for (var i = 0; i < imageListSlide.length; i++) {
    var src = imageListSlide[i].getAttribute('data-src');
    imageSlides.push({
      src: src
    });
  }

  $('.slide-show').vegas({
    delay: 5000,
    shuffle: true,
    slides: imageSlides,
    animation: ['kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight']
  });
  $('.section .content .anim.anim-wrapped').wrap("<span class='anim-wrapper'></span>");

  if (windowVar.width() < 601) {
    scrollOverflow = false;
    css3 = false;
  }

  if (windowVar.height() < 480) {
    scrollOverflow = false;
    css3 = false;
  }

  for (var i = 0; i < pageSectionDivs.length; i++) {
    pageSections.push(pageSectionDivs[i]);
  }

  window.asyncEach(pageSections, function (pageSection, cb) {
    var anchor = pageSection.getAttribute('data-section');
    pageAnchors.push(anchor + '');
    cb();
  }, function (err) {
    if (mainPage.width()) {
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
          submit: true
        },
        normalScrollElements: '.section .scrollable',
        afterRender: function afterRender() {
          videoBg.maximage('maxcover');
          var isIE = false || !!document.documentMode;

          if (isIE) {
            var contentColumns = $('.section .content .c-columns');
            contentColumns.height(windowVar.height());

            for (var i = 0; i < contentColumns.length; i++) {
              if (contentColumns[i].height <= windowVar.height()) {
                contentColumns[i].style.height = '100vh';
              }
            }
          }

          var newsletterServerUrl = './backend.php';
          var messageServerUrl = './backend.php';

          if (sendEmailForm.attr('action') && sendEmailForm.attr('action') != '') {
            newsletterServerUrl = sendEmailForm.attr('action');
          }

          if (sendMessageForm.attr('action') && sendMessageForm.attr('action') != '') {
            messageServerUrl = sendMessageForm.attr('action');
          }

          sendEmailForm.initForm({
            serverUrl: newsletterServerUrl
          });
          sendMessageForm.initForm({
            serverUrl: messageServerUrl
          });
        },
        afterResize: function afterResize() {
          var pluginContainer = $(this);
          $.fn.fullpage.reBuild();
        },
        onLeave: function onLeave(index, nextIndex, direction) {
          arrowElem.addClass('gone');
          pageElem.addClass('transition');
          slideElem.removeClass('transition');
          pageElem.removeClass('transition');
        },
        afterLoad: function afterLoad(anchorLink, index) {
          if ($('.section.active').hasClass('hide-clock')) {
            headerContainer.addClass('gone');
          } else {
            headerContainer.removeClass('gone');
          }
        }
      });
    }
  });
  $('.scrolldown a, .scroll.down').on('click', function () {
    try {
      $.fn.fullpage.moveSectionDown();
    } catch (error) {
      $main.animate({
        scrollTop: window.innerHeight
      }, 400, function () {});
    }
  });
  windowVar.on('scroll', function () {
    var scrollpos = $(this).scrollTop();
    var siteHeaderFooter = $('.page-footer, .page-header');

    if (scrollpos > 100) {
      siteHeaderFooter.addClass('scrolled');
    } else {
      siteHeaderFooter.removeClass('scrolled');
    }
  });

  var TextScramble = /*#__PURE__*/function () {
    function TextScramble(el) {
      _classCallCheck(this, TextScramble);

      this.el = el;
      this.chars = '!<>-_\\/[]{}—=+*^?#________';
      this.update = this.update.bind(this);
    }

    _createClass(TextScramble, [{
      key: "setText",
      value: function setText(newText) {
        var _this = this;

        var oldText = this.el.innerText;
        var length = Math.max(oldText.length, newText.length);
        var promise = new Promise(function (resolve) {
          return _this.resolve = resolve;
        });
        this.queue = [];

        for (var _i = 0; _i < length; _i++) {
          var from = oldText[_i] || '';
          var to = newText[_i] || '';
          var start = Math.floor(Math.random() * 40);
          var end = start + Math.floor(Math.random() * 40);
          this.queue.push({
            from: from,
            to: to,
            start: start,
            end: end
          });
        }

        cancelAnimationFrame(this.frameRequest);
        this.frame = 0;
        this.update();
        return promise;
      }
    }, {
      key: "update",
      value: function update() {
        var output = '';
        var complete = 0;

        for (var _i2 = 0, n = this.queue.length; _i2 < n; _i2++) {
          var _this$queue$_i = this.queue[_i2],
              from = _this$queue$_i.from,
              to = _this$queue$_i.to,
              start = _this$queue$_i.start,
              end = _this$queue$_i.end,
              _char = _this$queue$_i["char"];

          if (this.frame >= end) {
            complete++;
            output += to;
          } else if (this.frame >= start) {
            if (!_char || Math.random() < 0.28) {
              _char = this.randomChar();
              this.queue[_i2]["char"] = _char;
            }

            output += "<span class=\"dud\">".concat(_char, "</span>");
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
    }, {
      key: "randomChar",
      value: function randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)];
      }
    }]);

    return TextScramble;
  }();

  var phrases = ['I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'Hello there !', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'I love front-end ...', 'General Kenobi !'];
  var el = document.querySelector('.text');
  var fx = new TextScramble(el);
  var counter = 0;

  var next = function next() {
    fx.setText(phrases[counter]).then(function () {
      setTimeout(next, 2500);
    });
    counter = (counter + 1) % phrases.length;
  };

  next();
});

var loadFunction = function loadFunction() {
  setTimeout(function () {
    document.getElementById('loader').style.opacity = '0';
    setTimeout(function () {
      document.getElementById('loader').style.display = 'none';
    }, 500);
  }, 4000);
};