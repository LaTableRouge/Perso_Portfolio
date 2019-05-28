/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(4);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
__webpack_require__(2);
__webpack_require__(3);

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('map-component', require('./components/MapComponent.vue').default);

// const appMap = new Vue({
//     el: '#appMap'
// });

/***/ }),
/* 2 */
/***/ (function(module, exports) {

$('dropdown').on('click', function (event) {
    event.preventDefault();
    $("nav").toggle('a_cacher');
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

$get = function $get(url, data, done, error) {
    // $get('<fichier.js>',null,affiche,erreur)
    // affiche = (r) => { r.responseText }     --> affiche le fichier json récupérée
    var getUrl = function getUrl(objet) {
        var result = new Array();
        for (var i in objet) {
            result.push(i + "=" + encodeURIComponent(objet[i]));
        }
        return result.join('&');
    };

    var Xhr = function Xhr() {
        var xhr = null;
        if (window.XDomainRequest) {
            xhr = new XDomainRequest();
        } else if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            alert("Votre navigateur ne gère pas l'AJAX cross-domain !");
        }
        return xhr;
    };

    xhttp = Xhr(); // xhttp objet de type XMLHttpRequest

    // ancienne méthode

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) done(xhttp);else error(xhttp);
        }
    };

    /*
    // Nouvelle méthode
    xhttp.onload=function(){
      if (this.status==200) done(this)
          else error(this)
    }  */

    url += "?" + getUrl(data) + "& cache=" + new Date().getTime();
    xhttp.open("get", url, true);
    xhttp.send();
};

$post = function $post(url, data, done, error) {

    var getUrl = function getUrl(objet) {
        var result = new Array();
        for (var i in objet) {
            result.push(i + "=" + encodeURIComponent(objet[i]));
        }
        return result.join('&');
    };

    var Xhr = function Xhr() {
        var xhr = null;
        if (window.XDomainRequest) {
            xhr = new XDomainRequest();
        } else if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            alert("Votre navigateur ne gère pas l'AJAX cross-domain !");
        }
        return xhr;
    };

    xhttp = Xhr(); // xhttp objet de type XMLHttpRequest

    /*
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 ){
        if (this.status == 200) done(xhttp)
        else error(xhttp)
            }
    }
          */
    // Nouvelle méthode
    xhttp.onload = function () {
        if (this.status == 200) done(this);else error(this);
    };

    data = getUrl(data) + "& cache=" + new Date().getTime();
    xhttp.open("post", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(data);
};

/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);