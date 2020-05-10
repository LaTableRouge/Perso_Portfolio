function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

{
  var body = document.body;
  var MathUtils = {
    lerp: function lerp(a, b, n) {
      return (1 - n) * a + n * b;
    },
    distance: function distance(x1, y1, x2, y2) {
      return Math.hypot(x2 - x1, y2 - y1);
    }
  };

  var getMousePos = function getMousePos(ev) {
    var posx = 0;
    var posy = 0;
    if (!ev) ev = window.event;

    if (ev.pageX || ev.pageY) {
      posx = ev.pageX;
      posy = ev.pageY;
    } else if (ev.clientX || ev.clientY) {
      posx = ev.clientX + body.scrollLeft + docEl.scrollLeft;
      posy = ev.clientY + body.scrollTop + docEl.scrollTop;
    }

    return {
      x: posx,
      y: posy
    };
  };

  var mousePos = lastMousePos = {
    x: 0,
    y: 0
  };
  window.addEventListener('mousemove', function (ev) {
    return mousePos = getMousePos(ev);
  });

  var getMouseDistance = function getMouseDistance() {
    return MathUtils.distance(mousePos.x, mousePos.y, lastMousePos.x, lastMousePos.y);
  };

  var Image = /*#__PURE__*/function () {
    function Image(el) {
      _classCallCheck(this, Image);

      this.DOM = {
        el: el
      };
      this.defaultStyle = {
        x: 0,
        y: 0,
        opacity: 1
      };
      this.getRect();
      this.initEvents();
    }

    _createClass(Image, [{
      key: "initEvents",
      value: function initEvents() {
        var _this = this;

        window.addEventListener('resize', function () {
          return _this.resize();
        });
      }
    }, {
      key: "resize",
      value: function resize() {
        TweenMax.set(this.DOM.el, this.defaultStyle);
        this.getRect();
      }
    }, {
      key: "getRect",
      value: function getRect() {
        this.rect = this.DOM.el.getBoundingClientRect();
      }
    }]);

    return Image;
  }();

  var ImageTrail = /*#__PURE__*/function () {
    function ImageTrail() {
      var _this2 = this;

      _classCallCheck(this, ImageTrail);

      this.DOM = {
        content: document.querySelector('.content')
      };
      this.images = [];

      _toConsumableArray(this.DOM.content.querySelectorAll('div.content__img')).forEach(function (img) {
        return _this2.images.push(new Image(img));
      });

      this.imagesTotal = this.images.length;
      this.imgPosition = 0;
      this.zIndexVal = 1;
      this.threshold = 100;
      this.showNextImage();
      requestAnimationFrame(function () {
        return _this2.render();
      });
    }

    _createClass(ImageTrail, [{
      key: "render",
      value: function render() {
        var _this3 = this;

        var distance = getMouseDistance();

        if (distance > this.threshold) {
          this.showNextImage();
        }

        requestAnimationFrame(function () {
          return _this3.render();
        });
      }
    }, {
      key: "showNextImage",
      value: function showNextImage() {
        var img = this.images[this.imgPosition];
        TweenMax.killTweensOf(img.DOM.el);
        new TimelineMax().set(img.DOM.el, {
          opacity: 1,
          x: mousePos.x > lastMousePos.x ? 100 : -100,
          zIndex: this.zIndexVal
        }, 0).to(img.DOM.el, 1.2, {
          ease: Expo.easeOut,
          x: 0
        }, 0);
        ++this.zIndexVal;
        this.imgPosition = this.imgPosition < this.imagesTotal - 1 ? this.imgPosition + 1 : 0;
        lastMousePos = mousePos;
      }
    }]);

    return ImageTrail;
  }();

  var preloadImages = function preloadImages() {
    return new Promise(function (resolve, reject) {
      imagesLoaded(document.querySelectorAll('.content__img'), {
        background: true
      }, resolve);
    });
  };

  preloadImages().then(function () {
    document.body.classList.remove('loading');
    new ImageTrail();
  });
}