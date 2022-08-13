/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/assets/js/script.js ***!
  \***************************************/
/*
   *Variable definition navbar select
   let navMenu = document.querySelector("ul.navbar-nav");
   Function that Hides top navigation on scroll down To Second Section.
   const hiddenNav = () => {
      window.scrollY > 799 ?
         navMenu.classList.add("hide") :
         navMenu.classList.remove("hide")
   }
   window.addEventListener('scroll', hiddenNav);
   Add active class to the current item (highlight it)
   *Variables definition scrolling top and down
   Variable definition change class
   let items = document.querySelector(".my-item");
   let links = items.getElementsByClassName("link-active");
   let markerModel = document.querySelector(".marker-logo");
   let checkItemActive = items.getElementsByClassName(".");
   for (let i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function() {
         let current = document.getElementsByClassName("active");
         if (current.length > 0) {
            current[0].className = current[0].className.replace("active", "");
            }
            this.className += " active";
            });
         }
         document.addEventListener("click", function(e) {
            for (let x = 0;x < navbarLink.length;x++) {
               navbarLink[x].classList.remove("active")
            }
            e.target.closest(".link-active").classList.add("active")
            }
         })
   let navbarLink = document.querySelectorAll(".link-active")
   const addActivceClass = (e) => {
      for (let x = 0;x < navbarLink.length;x++) {
         navbarLink[x].classList.remove("active")
      }
      e.target.closest("li").classList.add("active")
   }
   document.addEventListener("click", addActivceClass)
*/
//*Variables definition
var scrollTop = document.querySelector(".btn-back-up"); //Function that scroll Top

var btnScrollTop = function btnScrollTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
};

scrollTop.addEventListener("click", btnScrollTop); //*active item

var itemIsActive = ".link-active";
$(itemIsActive).on("click", function () {
  $(itemIsActive).removeClass("active");
  $(this).addClass("active");
}); //*select2 drowpdown function

$(document).ready(function () {
  $("#marker").select2({
    dropdownParent: $("#myModal"),
    placeholder: "Marker"
  });
  $("#model").select2({
    dropdownParent: $("#myModal"),
    placeholder: "Mode"
  });
  $("#width-tire").select2({
    dropdownParent: $("#model-size"),
    placeholder: "Section Width"
  });
  $("#tire-aspect").select2({
    dropdownParent: $("#model-size"),
    placeholder: "Aspect Ratio"
  });
  $("#tire-rime").select2({
    dropdownParent: $("#model-size"),
    placeholder: "Rim Dimeter"
  });
});
/******/ })()
;