const hamburger = document.querySelector(".hamburger");
const navItems = document.querySelector(".nav-items");

// Eventlistener
hamburger.addEventListener("click", showNavItems);
function showNavItems() {
    var navItems = document.querySelector(".nav-items");
    var nav = document.querySelector("nav");
    if (navItems.style.display === "block") {
        navItems.style.display = "none";
        nav.style.height = "50px";
    } else {
        navItems.style.display = "block";
        nav.style.height = "200px";
    }
}

window.addEventListener("resize", changeNavWidth);
function changeNavWidth() {
    var x = document.querySelector(".nav-items");
    var nav = document.querySelector("nav");
    if (window.innerWidth >= 1040) {
        x.style.display = "none";
        nav.style.height = "50px";
    }
}
