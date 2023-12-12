let searchBtn = document.querySelector("#search-btn")
let searchForm =document.querySelector(".search-form")
let menuBar = document.querySelector("#menu-bar")
let amenu = document.querySelector(".navbar")
function showbar(){
    searchBtn.classList.toggle("fa-times")
    searchForm.classList.toggle("active")
}
function showmenu(){
    menuBar.classList.toggle("fa-times")
    amenu.classList.toggle("active")
}