const hamburger = document.querySelector(".hamburger");
const navItems = document.querySelector(".nav-items");

// Eventlistener
hamburger.addEventListener("click", showNavItems);
function showNavItems() {
    var x = document.querySelector(".nav-items");
    var nav = document.querySelector("nav");
    if (x.style.display === "block") {
        x.style.display = "none";
        nav.style.height = "50px";
    } else {
        x.style.display = "block";
        nav.style.height = "150px";
    }
}
