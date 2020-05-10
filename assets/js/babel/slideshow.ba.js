function _createForOfIteratorHelper(o) { if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (o = _unsupportedIterableToArray(o))) { var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var it, normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

{
  var getMousePos = function getMousePos(e) {
    var posx = 0;
    var posy = 0;
    if (!e) e = window.event;

    if (e.pageX || e.pageY) {
      posx = e.pageX;
      posy = e.pageY;
    } else if (e.clientX || e.clientY) {
      posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
      posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return {
      x: posx,
      y: posy
    };
  };

  var getRandomInt = function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  };

  var lineEq = function lineEq(y2, y1, x2, x1, currentVal) {
    var m = (y2 - y1) / (x2 - x1);
    var b = y1 - m * x1;
    return m * currentVal + b;
  };

  var chars = ['$', '%', '#', '&', '=', '*', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '.', ':', ',', '^'];
  var charsTotal = chars.length;

  var randomizeLetters = function randomizeLetters(letters) {
    return new Promise(function (resolve, reject) {
      var lettersTotal = letters.length;
      var cnt = 0;
      letters.forEach(function (letter, pos) {
        var loopTimeout;

        var loop = function loop() {
          letter.innerHTML = chars[getRandomInt(0, charsTotal - 1)];
          loopTimeout = setTimeout(loop, getRandomInt(50, 500));
        };

        loop();
        var timeout = setTimeout(function () {
          clearTimeout(loopTimeout);
          letter.style.opacity = 1;
          letter.innerHTML = letter.dataset.initial;
          ++cnt;

          if (cnt === lettersTotal) {
            resolve();
          }
        }, pos * lineEq(40, 0, 8, 200, lettersTotal));
      });
    });
  };

  var disassembleLetters = function disassembleLetters(letters) {
    return new Promise(function (resolve, reject) {
      var lettersTotal = letters.length;
      var cnt = 0;
      letters.forEach(function (letter, pos) {
        setTimeout(function () {
          letter.style.opacity = 0;
          ++cnt;

          if (cnt === lettersTotal) {
            resolve();
          }
        }, pos * 30);
      });
    });
  };

  var Slide = /*#__PURE__*/function () {
    function Slide(el) {
      _classCallCheck(this, Slide);

      this.DOM = {
        el: el
      };
      this.DOM.imgWrap = this.DOM.el.querySelector('.slide__img-wrap');
      this.DOM.img = this.DOM.imgWrap.querySelector('.slide__img');
      this.DOM.texts = {
        wrap: this.DOM.el.querySelector('.slide__title-wrap'),
        title: this.DOM.el.querySelector('.slide__title'),
        number: this.DOM.el.querySelector('.slide__number'),
        side: this.DOM.el.querySelector('.slide__side')
      };
      charming(this.DOM.texts.title);
      charming(this.DOM.texts.side);
      this.DOM.titleLetters = Array.from(this.DOM.texts.title.querySelectorAll('span')).sort(function () {
        return 0.5 - Math.random();
      });
      this.DOM.sideLetters = Array.from(this.DOM.texts.side.querySelectorAll('span')).sort(function () {
        return 0.5 - Math.random();
      });
      this.DOM.titleLetters.forEach(function (letter) {
        return letter.dataset.initial = letter.innerHTML;
      });
      this.DOM.sideLetters.forEach(function (letter) {
        return letter.dataset.initial = letter.innerHTML;
      });
      this.calcSizes();
      this.calcTransforms();
      this.initEvents();
    }

    _createClass(Slide, [{
      key: "calcSizes",
      value: function calcSizes() {
        this.width = this.DOM.imgWrap.offsetWidth;
        this.height = this.DOM.imgWrap.offsetHeight;
      }
    }, {
      key: "calcTransforms",
      value: function calcTransforms() {
        this.transforms = [{
          x: -1 * (winsize.width / 2 + this.width),
          y: -1 * (winsize.height / 2 + this.height),
          rotation: -30
        }, {
          x: -1 * (winsize.width / 2 - this.width / 3),
          y: -1 * (winsize.height / 2 - this.height / 3),
          rotation: 0
        }, {
          x: 0,
          y: 0,
          rotation: 0
        }, {
          x: winsize.width / 2 - this.width / 3,
          y: winsize.height / 2 - this.height / 3,
          rotation: 0
        }, {
          x: winsize.width / 2 + this.width,
          y: winsize.height / 2 + this.height,
          rotation: 30
        }, {
          x: -1 * (winsize.width / 2 - this.width / 2 - winsize.width * 0.075),
          y: 0,
          rotation: 0
        }];
      }
    }, {
      key: "initEvents",
      value: function initEvents() {
        var _this = this;

        this.mouseenterFn = function () {
          if (!_this.isPositionedCenter() || !allowTilt) return;
          clearTimeout(_this.mousetime);
          _this.mousetime = setTimeout(function () {
            TweenMax.to(_this.DOM.img, 0.8, {
              ease: Power3.easeOut,
              scale: 1.1
            });
          }, 40);
        };

        this.mousemoveFn = function (ev) {
          return requestAnimationFrame(function () {
            if (!allowTilt || !_this.isPositionedCenter()) return;

            _this.tilt(ev);
          });
        };

        this.mouseleaveFn = function (ev) {
          return requestAnimationFrame(function () {
            if (!allowTilt || !_this.isPositionedCenter()) return;
            clearTimeout(_this.mousetime);
            TweenMax.to([_this.DOM.imgWrap, _this.DOM.texts.wrap], 1.8, {
              ease: 'Power4.easeOut',
              x: 0,
              y: 0,
              rotationX: 0,
              rotationY: 0
            });
            TweenMax.to(_this.DOM.img, 1.8, {
              ease: 'Power4.easeOut',
              scale: 1
            });
          });
        };

        this.resizeFn = function () {
          _this.calcSizes();

          _this.calcTransforms();
        };

        this.DOM.imgWrap.addEventListener('mouseenter', this.mouseenterFn);
        this.DOM.imgWrap.addEventListener('mousemove', this.mousemoveFn);
        this.DOM.imgWrap.addEventListener('mouseleave', this.mouseleaveFn);
        window.addEventListener('resize', this.resizeFn);
      }
    }, {
      key: "tilt",
      value: function tilt(ev) {
        var mousepos = getMousePos(ev);
        var docScrolls = {
          left: document.body.scrollLeft + document.documentElement.scrollLeft,
          top: document.body.scrollTop + document.documentElement.scrollTop
        };
        var bounds = this.DOM.imgWrap.getBoundingClientRect();
        var relmousepos = {
          x: mousepos.x - bounds.left - docScrolls.left,
          y: mousepos.y - bounds.top - docScrolls.top
        };
        var t = {
          x: [-20, 20],
          y: [-20, 20]
        },
            r = {
          x: [-15, 15],
          y: [-15, 15]
        };
        var transforms = {
          translation: {
            x: (t.x[1] - t.x[0]) / bounds.width * relmousepos.x + t.x[0],
            y: (t.y[1] - t.y[0]) / bounds.height * relmousepos.y + t.y[0]
          },
          rotation: {
            x: (r.x[1] - r.x[0]) / bounds.height * relmousepos.y + r.x[0],
            y: (r.y[1] - r.y[0]) / bounds.width * relmousepos.x + r.y[0]
          }
        };
        TweenMax.to(this.DOM.imgWrap, 1.5, {
          ease: 'Power1.easeOut',
          x: transforms.translation.x,
          y: transforms.translation.y,
          rotationX: transforms.rotation.x,
          rotationY: transforms.rotation.y
        });
        TweenMax.to(this.DOM.texts.wrap, 1.5, {
          ease: 'Power1.easeOut',
          x: -1 * transforms.translation.x,
          y: -1 * transforms.translation.y
        });
      }
    }, {
      key: "position",
      value: function position(pos) {
        TweenMax.set(this.DOM.imgWrap, {
          x: this.transforms[pos].x,
          y: this.transforms[pos].y,
          rotationX: 0,
          rotationY: 0,
          opacity: 1,
          rotationZ: this.transforms[pos].rotation
        });
      }
    }, {
      key: "setCurrent",
      value: function setCurrent(isContentOpen) {
        this.isCurrent = true;
        this.DOM.el.classList.add('slide--current', 'slide--visible');
        this.position(isContentOpen ? 5 : 2);
      }
    }, {
      key: "setLeft",
      value: function setLeft(isContentOpen) {
        this.isRight = this.isCurrent = false;
        this.isLeft = true;
        this.DOM.el.classList.add('slide--visible');
        this.position(isContentOpen ? 0 : 1);
      }
    }, {
      key: "setRight",
      value: function setRight(isContentOpen) {
        this.isLeft = this.isCurrent = false;
        this.isRight = true;
        this.DOM.el.classList.add('slide--visible');
        this.position(isContentOpen ? 4 : 3);
      }
    }, {
      key: "isPositionedRight",
      value: function isPositionedRight() {
        return this.isRight;
      }
    }, {
      key: "isPositionedLeft",
      value: function isPositionedLeft() {
        return this.isLeft;
      }
    }, {
      key: "isPositionedCenter",
      value: function isPositionedCenter() {
        return this.isCurrent;
      }
    }, {
      key: "reset",
      value: function reset() {
        this.isRight = this.isLeft = this.isCurrent = false;
        this.DOM.el.classList = 'slide';
      }
    }, {
      key: "hide",
      value: function hide() {
        TweenMax.set(this.DOM.imgWrap, {
          x: 0,
          y: 0,
          rotationX: 0,
          rotationY: 0,
          rotationZ: 0,
          opacity: 0
        });
      }
    }, {
      key: "moveToPosition",
      value: function moveToPosition(settings) {
        var _this2 = this;

        return new Promise(function (resolve, reject) {
          TweenMax.to(_this2.DOM.imgWrap, 0.8, {
            ease: Power4.easeInOut,
            delay: settings.delay || 0,
            startAt: settings.from !== undefined ? {
              x: _this2.transforms[settings.from + 2].x,
              y: _this2.transforms[settings.from + 2].y,
              rotationX: 0,
              rotationY: 0,
              rotationZ: _this2.transforms[settings.from + 2].rotation
            } : {},
            x: _this2.transforms[settings.position + 2].x,
            y: _this2.transforms[settings.position + 2].y,
            rotationX: 0,
            rotationY: 0,
            rotationZ: _this2.transforms[settings.position + 2].rotation,
            onStart: settings.from !== undefined ? function () {
              return TweenMax.set(_this2.DOM.imgWrap, {
                opacity: 1
              });
            } : null,
            onComplete: resolve
          });

          if (settings.resetImageScale) {
            TweenMax.to(_this2.DOM.img, 0.8, {
              ease: Power4.easeInOut,
              scale: 1
            });
          }
        });
      }
    }, {
      key: "hideTexts",
      value: function hideTexts() {
        var _this3 = this;

        var animation = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

        if (animation) {
          disassembleLetters(this.DOM.titleLetters).then(function () {
            return TweenMax.set(_this3.DOM.texts.wrap, {
              opacity: 0
            });
          });
          disassembleLetters(this.DOM.sideLetters).then(function () {
            return TweenMax.set(_this3.DOM.texts.side, {
              opacity: 0
            });
          });
        } else {
          TweenMax.set(this.DOM.texts.wrap, {
            opacity: 0
          });
          TweenMax.set(this.DOM.texts.side, {
            opacity: 0
          });
        }
      }
    }, {
      key: "showTexts",
      value: function showTexts() {
        var animation = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
        TweenMax.set(this.DOM.texts.wrap, {
          opacity: 1
        });
        TweenMax.set(this.DOM.texts.side, {
          opacity: 1
        });

        if (animation) {
          randomizeLetters(this.DOM.titleLetters);
          randomizeLetters(this.DOM.sideLetters);
          TweenMax.to(this.DOM.texts.number, 0.6, {
            ease: Elastic.easeOut.config(1, 0.5),
            startAt: {
              x: '-10%',
              opacity: 0
            },
            x: '0%',
            opacity: 1
          });
        }
      }
    }]);

    return Slide;
  }();

  var Content = /*#__PURE__*/function () {
    function Content(el) {
      _classCallCheck(this, Content);

      this.DOM = {
        el: el
      };
      this.DOM.number = this.DOM.el.querySelector('.content__number');
      this.DOM.link = this.DOM.el.querySelector('.content__link');
      this.DOM.date = this.DOM.el.querySelector('.content__date');
      this.DOM.title = this.DOM.el.querySelector('.content__title');
      this.DOM.subtitle = this.DOM.el.querySelector('.content__subtitle');
      this.DOM.text = this.DOM.el.querySelector('.content__text');
      this.DOM.backCtrl = this.DOM.el.parentNode.querySelector('.content__close');
      this.DOM.backCtrl.addEventListener('click', function () {
        return slideshow.hideContent();
      });
    }

    _createClass(Content, [{
      key: "show",
      value: function show() {
        this.DOM.el.classList.add('content__item--current');
        TweenMax.staggerTo([this.DOM.backCtrl, this.DOM.number, this.DOM.link, this.DOM.date, this.DOM.title, this.DOM.subtitle, this.DOM.text], 0.8, {
          ease: Power4.easeOut,
          delay: 0.4,
          opacity: 1,
          startAt: {
            y: 40
          },
          y: 0
        }, 0.05);
      }
    }, {
      key: "hide",
      value: function hide() {
        this.DOM.el.classList.remove('content__item--current');
        TweenMax.staggerTo([this.DOM.backCtrl, this.DOM.number, this.DOM.link, this.DOM.date, this.DOM.title, this.DOM.subtitle, this.DOM.text].reverse(), 0.3, {
          ease: Power3.easeIn,
          opacity: 0,
          y: 10
        }, 0.01);
      }
    }]);

    return Content;
  }();

  var Slideshow = /*#__PURE__*/function () {
    function Slideshow(el) {
      var _this4 = this;

      _classCallCheck(this, Slideshow);

      this.DOM = {
        el: el
      };
      this.slides = [];
      Array.from(this.DOM.el.querySelectorAll('.slide')).forEach(function (slideEl) {
        return _this4.slides.push(new Slide(slideEl));
      });
      this.slidesTotal = this.slides.length;

      if (this.slidesTotal < 4) {
        return false;
      }

      this.current = 0;
      this.DOM.deco = this.DOM.el.querySelector('.slideshow__deco');
      this.contents = [];
      Array.from(document.querySelectorAll('.content > .content__item')).forEach(function (contentEl) {
        return _this4.contents.push(new Content(contentEl));
      });
      this.render();
      this.currentSlide.showTexts(false);
      this.initEvents();
    }

    _createClass(Slideshow, [{
      key: "render",
      value: function render() {
        this.currentSlide = this.slides[this.current];
        this.nextSlide = this.slides[this.current + 1 <= this.slidesTotal - 1 ? this.current + 1 : 0];
        this.prevSlide = this.slides[this.current - 1 >= 0 ? this.current - 1 : this.slidesTotal - 1];
        this.currentSlide.setCurrent();
        this.nextSlide.setRight();
        this.prevSlide.setLeft();
      }
    }, {
      key: "initEvents",
      value: function initEvents() {
        var _this5 = this;

        this.clickFn = function (slide) {
          if (slide.isPositionedRight()) {
            _this5.navigate('next');
          } else if (slide.isPositionedLeft()) {
            _this5.navigate('prev');
          } else {
            _this5.showContent();
          }
        };

        var _iterator = _createForOfIteratorHelper(this.slides),
            _step;

        try {
          var _loop = function _loop() {
            var slide = _step.value;
            slide.DOM.imgWrap.addEventListener('click', function () {
              return _this5.clickFn(slide);
            });
          };

          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            _loop();
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }

        this.resizeFn = function () {
          _this5.nextSlide.setRight(_this5.isContentOpen);

          _this5.prevSlide.setLeft(_this5.isContentOpen);

          _this5.currentSlide.setCurrent(_this5.isContentOpen);

          if (_this5.isContentOpen) {
            TweenMax.set(_this5.DOM.deco, {
              scaleX: winsize.width / _this5.DOM.deco.offsetWidth,
              scaleY: winsize.height / _this5.DOM.deco.offsetHeight,
              x: -20,
              y: 20
            });
          }
        };

        window.addEventListener('resize', this.resizeFn);
      }
    }, {
      key: "showContent",
      value: function showContent() {
        if (this.isContentOpen || this.isAnimating) return;
        allowTilt = false;
        this.isContentOpen = true;
        this.DOM.el.classList.add('slideshow--previewopen');
        TweenMax.to(this.DOM.deco, 0.8, {
          ease: Power4.easeInOut,
          scaleX: winsize.width / this.DOM.deco.offsetWidth,
          scaleY: winsize.height / this.DOM.deco.offsetHeight,
          x: -20,
          y: 20
        });
        this.prevSlide.moveToPosition({
          position: -2
        });
        this.nextSlide.moveToPosition({
          position: 2
        });
        this.currentSlide.moveToPosition({
          position: 3,
          resetImageScale: true
        });
        this.contents[this.current].show();
        this.currentSlide.hideTexts(true);
      }
    }, {
      key: "hideContent",
      value: function hideContent() {
        var _this6 = this;

        if (!this.isContentOpen || this.isAnimating) return;
        this.DOM.el.classList.remove('slideshow--previewopen');
        this.contents[this.current].hide();
        TweenMax.to(this.DOM.deco, 0.8, {
          ease: Power4.easeInOut,
          scaleX: 1,
          scaleY: 1,
          x: 0,
          y: 0
        });
        this.prevSlide.moveToPosition({
          position: -1
        });
        this.nextSlide.moveToPosition({
          position: 1
        });
        this.currentSlide.moveToPosition({
          position: 0
        }).then(function () {
          allowTilt = true;
          _this6.isContentOpen = false;
        });
        this.currentSlide.showTexts();
      }
    }, {
      key: "bounceDeco",
      value: function bounceDeco(direction, delay) {
        var _this7 = this;

        TweenMax.to(this.DOM.deco, 0.4, {
          ease: 'Power2.easeIn',
          delay: delay + delay * 0.2,
          x: direction === 'next' ? -40 : 40,
          y: direction === 'next' ? -40 : 40,
          onComplete: function onComplete() {
            TweenMax.to(_this7.DOM.deco, 0.6, {
              ease: 'Power2.easeOut',
              x: 0,
              y: 0
            });
          }
        });
      }
    }, {
      key: "navigate",
      value: function navigate(direction) {
        var _this8 = this;

        if (this.isAnimating) return;
        this.isAnimating = true;
        allowTilt = false;
        var upcomingPos = direction === 'next' ? this.current < this.slidesTotal - 2 ? this.current + 2 : Math.abs(this.slidesTotal - 2 - this.current) : this.current >= 2 ? this.current - 2 : Math.abs(this.slidesTotal - 2 + this.current);
        this.upcomingSlide = this.slides[upcomingPos];
        this.current = direction === 'next' ? this.current < this.slidesTotal - 1 ? this.current + 1 : 0 : this.current > 0 ? this.current - 1 : this.slidesTotal - 1;
        this.prevSlide.moveToPosition({
          position: direction === 'next' ? -2 : 0,
          delay: direction === 'next' ? 0 : 0.14
        }).then(function () {
          if (direction === 'next') {
            _this8.prevSlide.hide();
          }
        });
        this.currentSlide.moveToPosition({
          position: direction === 'next' ? -1 : 1,
          delay: 0.07
        });
        this.currentSlide.hideTexts();
        this.bounceDeco(direction, 0.07);
        this.nextSlide.moveToPosition({
          position: direction === 'next' ? 0 : 2,
          delay: direction === 'next' ? 0.14 : 0
        }).then(function () {
          if (direction === 'prev') {
            _this8.nextSlide.hide();
          }
        });

        if (direction === 'next') {
          this.nextSlide.showTexts();
        } else {
          this.prevSlide.showTexts();
        }

        this.upcomingSlide.moveToPosition({
          position: direction === 'next' ? 1 : -1,
          from: direction === 'next' ? 2 : -2,
          delay: 0.21
        }).then(function () {
          [_this8.nextSlide, _this8.currentSlide, _this8.prevSlide].forEach(function (slide) {
            return slide.reset();
          });

          _this8.render();

          allowTilt = true;
          _this8.isAnimating = false;
        });
      }
    }]);

    return Slideshow;
  }();

  var winsize;

  var calcWinsize = function calcWinsize() {
    return winsize = {
      width: window.innerWidth,
      height: window.innerHeight
    };
  };

  calcWinsize();
  window.addEventListener('resize', calcWinsize);
  var allowTilt = true;
  var slideshow = new Slideshow(document.querySelector('.slideshow'));
  var loader = document.querySelector('.loader');
  imagesLoaded(document.querySelectorAll('.slide__img'), {
    background: true
  }, function () {
    return document.body.classList.remove('loading');
  });
}