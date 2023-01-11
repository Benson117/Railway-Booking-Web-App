$(document).ready(() => {
    var navLinks = $(".nav");
    if(document.title !== "Trips") {
        document.body.style.backgroundImage = "url(../images/bg7.jpg);"
    }
    let navs = {
        0: "index.html",
        1: "book_ticket.php",
        2: "trips.php",
        3: "about.html"
    }
    for (let i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", (e) => {
            window.location.href = navs[i];
        })   
    }
})