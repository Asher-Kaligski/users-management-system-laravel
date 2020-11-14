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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboard/home.js":
/*!****************************************!*\
  !*** ./resources/js/dashboard/home.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  "use strict";

  var search = document.getElementById("search");
  document.querySelector("#form").addEventListener("click", function (e) {
    e.preventDefault();
    var value = search.value.trim();
    if (value === "") return;
    $.ajax({
      url: "/customers/" + value + "/search",
      type: "GET",
      dataType: "JSON",
      success: function success(response) {
        $("#searched-customer").remove();
        $("#no-result").remove();

        if (response) {
          $(".search-box").after("\n                        <div class=\"ml-md-5 col-12 mt-2 d-flex justify-content-center align-items-center mb-2\" id=\"searched-customer\">\n                            <div class=\"row\">\n                                <li class=\"col-md-5 mb-2 list-group-item\">\n                                    <span>\n                                        Full Name: ".concat(response.full_name, "\n                                    </span>\n                                </li>\n                                <li class=\"col-md-5 mb-2 list-group-item\">\n                                    <span>Phone: ").concat(response.phone, "</span>\n                                </li>\n                                <li class=\"col-md-5 mb-2 list-group-item\">\n                                    <span>Email: ").concat(response.email, "</span>\n                                </li>\n                                <li class=\"col-md-5 mb-2 list-group-item\">\n                                    <span>ID: ").concat(response.identity_card, "</span>\n                                </li>\n                            </div>\n                        </div>\n                    "));
        } else {
          $(".search-box").after("<div class=\"col-md-10 mb-2 text-center\" id=\"no-result\">Customer has not been found\n                  </div>");
        }
      }
    });
  });
})(jQuery); // End of use strict

/***/ }),

/***/ 2:
/*!**********************************************!*\
  !*** multi ./resources/js/dashboard/home.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /opt/lampp/htdocs/crm/resources/js/dashboard/home.js */"./resources/js/dashboard/home.js");


/***/ })

/******/ });