const hamburger = document.querySelector(".hamburger");
const navItems = document.querySelector(".nav-items");
const goBack = document.querySelector(".go-back");

// Eventlistener
hamburger.addEventListener("click", showNavItems);
goBack.addEventListener("click", showNavItems);
function showNavItems() {
    var navItems = document.querySelector(".nav-items");
    var nav = document.querySelector("nav");

    if (navItems.style.display === "block") {
        navItems.style.display = "none";
        nav.style.height = "70px";
        goBack.style.display = "none";
        hamburger.style.display = "block";
    } else {
        navItems.style.display = "block";
        nav.style.height = "250px";
        goBack.style.display = "block";
        hamburger.style.display = "none";
    }
}

window.addEventListener("resize", changeNavWidth);
function changeNavWidth() {
    var x = document.querySelector(".nav-items");
    var nav = document.querySelector("nav");
    if (window.innerWidth >= 1040) {
        x.style.display = "none";
        nav.style.height = "70px";
        goBack.style.display = "none";
        hamburger.style.display = "block";
    }
}
