(()=>{document.querySelector(".btn-back-up").addEventListener("click",(function(){window.scrollTo({top:0,behavior:"smooth"})}));var e=".link-active";$(e).on("click",(function(){$(e).removeClass("active"),$(this).addClass("active")})),$(document).ready((function(){$("#marker").select2({dropdownParent:$("#myModal"),placeholder:"Marker"}),$("#model").select2({dropdownParent:$("#myModal"),placeholder:"Mode"}),$("#width-tire").select2({dropdownParent:$("#model-size"),placeholder:"Section Width"}),$("#tire-aspect").select2({dropdownParent:$("#model-size"),placeholder:"Aspect Ratio"}),$("#tire-rime").select2({dropdownParent:$("#model-size"),placeholder:"Rim Dimeter"})}))})();