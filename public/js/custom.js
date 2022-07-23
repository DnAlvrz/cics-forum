let sideNavToggle = document.getElementById("side-nav-button");
let asideNav = document.getElementById('aside-nav');
let sideNav = document.getElementById("mySidenav");
let main = document.getElementById("main");

function openNav() {
    sideNav.style.width = "250px";
    main.style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    sideNavToggle.className = "fas fa-window-close";
    sideNavToggle.setAttribute("onClick", "closeNav()");
    if (asideNav) {
        asideNav.style.position = 'relative'
    }
}

function closeNav() {
    sideNav.style.width = "0";
    main.style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
    sideNavToggle.setAttribute("onClick", "openNav()");
    sideNavToggle.className = "fas fa-bars";
    if (asideNav) {
        asideNav.style.position = 'fixed'
    }
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        dropdownContent.style.transition = "all 2s";
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

let loginLink = document.getElementById('login-link');
let timesClicked = 0;
loginLink.addEventListener('click', (event) => {
    console.log('login button clicked');
    timesClicked++;
    if(timesClicked>1){
        window.location.replace("/login");
    }
    setTimeout(()=>{timesClicked=0;}, 5000);
});

