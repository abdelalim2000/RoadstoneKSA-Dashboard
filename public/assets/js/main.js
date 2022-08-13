/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/***/ (() => {

var lastKnownScrollPosition = 0;
var ticking = false;
var section1 = document.getElementById("section-1");
var section2 = document.getElementById("section-2");
var section3 = document.getElementById("section-3");
var tire1LineSvg = document.getElementById("tire-1-line-svg");
var tireLineSvgTwo = document.getElementById("tire-2-line-svg");
var tireLineSvgThree = document.getElementById("tire-3-line-svg");

function typedOne() {
  var typed = new Typed("#typed-1", {
    stringsElement: "#typed-string-1",
    typeSpeed: 1,
    showCursor: false
  });
}

function typedTwo() {
  var typed = new Typed("#typed-2", {
    stringsElement: "#typed-string-2",
    typeSpeed: 1,
    showCursor: false
  });
}

function typedThree() {
  var typed = new Typed("#typed-3", {
    stringsElement: "#typed-string-3",
    typeSpeed: 1,
    showCursor: false
  });
}

ScrollTrigger.matchMedia({
  "(min-width:991px)": function minWidth991px() {
    // Gsap Animation
    gsap.registerPlugin(ScrollTrigger);
    var scenes = gsap.utils.toArray(".panel"); // Pinned scene

    scenes.forEach(function (scene, i) {
      ScrollTrigger.create({
        trigger: scene,
        // snap: {
        //   snapTo: 1,
        //   duration: { min: 0.2, max: 1 },
        //   delay: 0.1,
        // },
        scrub: true,
        pin: true,
        id: "scene-".concat(i) // onEnter: type,

      });

      function checkTyping(i) {
        if (i === 0) {
          typedOne();
        } else if (i === 1) {
          typedTwo();
        } else if (i === 2) {
          typedThree();
        }
      }

      var sceneBody = scene.querySelector(".scene-body");
      var sectionHeading = scene.querySelector(".section-heading");
      var sectionTireImage = scene.querySelector(".tire-image");
      var sectionSvg = scene.querySelector(".animate-one");
      sectionSvg.style.display = "none";
      var typedString = scene.querySelector(".typed-string");
      var sectionTyped = scene.querySelector(".section-typed");
      var tl = gsap.timeline();
      tl.from(sectionHeading, {
        left: "140%",
        scrollTrigger: {
          start: "top 20%",
          end: "bottom 0",
          trigger: sceneBody,
          scrub: 0.5,
          toggleActions: "restart none restart none",
          id: "sceneBody-".concat(i)
        },
        onComplete: function onComplete() {
          sectionSvg.style.display = "flex";
          checkTyping(i);
          tl.to(sectionTireImage, {
            left: "-100%",
            top: "-100%",
            rotation: -150,
            duration: 1,
            ease: 'none',
            scrollTrigger: {
              scrub: 0.5,
              start: "top 0",
              end: "bottom 0",
              trigger: sceneBody,
              toggleActions: "restart none restart none",
              id: "tire-image-".concat(i)
            }
          });
        }
      });
      tl.from(sectionTireImage, {
        left: "-100%",
        top: "100%",
        rotation: 90,
        duration: 3,
        ease: 'none',
        scrollTrigger: {
          scrub: 0.5,
          start: "top 0",
          end: "bottom 0",
          trigger: sceneBody,
          toggleActions: "restart none restart none",
          id: "tire-image-".concat(i)
        }
      });
    });
  },
  "(max-width: 991px)": function maxWidth991px() {
    sectionSvg.style.display = "block";
  }
});

/***/ }),

/***/ "./resources/assets/css/owl.carousel.min.css":
/*!***************************************************!*\
  !*** ./resources/assets/css/owl.carousel.min.css ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/owl.theme.default.min.css":
/*!********************************************************!*\
  !*** ./resources/assets/css/owl.theme.default.min.css ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/royal-preload.css":
/*!************************************************!*\
  !*** ./resources/assets/css/royal-preload.css ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/style.css":
/*!****************************************!*\
  !*** ./resources/assets/css/style.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/style-rtl.css":
/*!********************************************!*\
  !*** ./resources/assets/css/style-rtl.css ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/main": 0,
/******/ 			"assets/css/style-rtl": 0,
/******/ 			"assets/css/style": 0,
/******/ 			"assets/css/royal-preload": 0,
/******/ 			"assets/css/owl.theme.default.min": 0,
/******/ 			"assets/css/owl.carousel.min": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/css/owl.carousel.min.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/css/owl.theme.default.min.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/css/royal-preload.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/css/style.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/style-rtl","assets/css/style","assets/css/royal-preload","assets/css/owl.theme.default.min","assets/css/owl.carousel.min"], () => (__webpack_require__("./resources/assets/css/style-rtl.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;