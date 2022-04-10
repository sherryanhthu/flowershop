let searchForm = document.querySelector(".search-form");

document.querySelector("#search-btn").onclick = () => {
  searchForm.classList.toggle("active");
};

let account = document.querySelector("#inforAccount");

document.querySelector("#account-btn").onclick = () => {
  account.classList.toggle("active");
};

document.querySelector("#close-side-bar").onclick = () => {
  account.classList.toggle("active");
};

let lang = document.querySelector("#lang-menu");

document.querySelector("#lang-btn").onclick = () => {
    lang.classList.toggle("active");
};

$(document).ready(function(){
  var lang = getLang();
  changeLang(lang);
});

function setLang(langCode){
  window.localStorage.setItem("lang", langCode);
  // location.reload();
}

function getLang() {
  if(!window.localStorage.getItem('lang')){
      setLang("en-US");
  }
  return window.localStorage.getItem("lang");
}

function changeLang(lang){
  $(".multilang").each(function(i, e){
      $("#"+e.id).html(labels[e.id][lang]).attr("title",labels[e.id][lang]);
      //Cách 2
      // let id = $(e).prop('id');
      // let label = labels[id] [lang];
      // $(e).html(label);
   });
   $(".multilang2").each(function(i, e){
      $("#"+e.id).html(labels[e.id][lang]["name"]).attr("title",labels[e.id][lang]["name"]);
   });
   showCourseList(lang);
   setLang(lang);
}