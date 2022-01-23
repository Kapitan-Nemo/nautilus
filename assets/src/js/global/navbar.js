var body = document.body;

function openSearch() {
    document.querySelector(".navbar__search").classList.add("navbar__search__active");
    body.classList.add("overflow-hidden");
  }
  
function closeSearch() {
    document.querySelector(".navbar__search").classList.remove("navbar__search__active");
    body.classList.remove("overflow-hidden");
}

document.onkeydown = function(evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
    } else {
        isEscape = (evt.keyCode === 27);
    }
    if (isEscape) {
        closeSearch();
    }
};

const menuToogle = document.querySelector('.toggle');
const menuMobile  = document.getElementById('mobile-menu');

menuToogle.addEventListener('click', () => {
	menuMobile.classList.toggle('active');
});

function closeMenu() {
  menuMobile.classList.toggle('active');
}
        
document.getElementById("mobile-menu").addEventListener("click", function(e) {
    closeMenu();
})

//Hide and show animation for - mobile menu
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("primary-menu").style.top = "0";
  } else {
    document.getElementById("primary-menu").style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
} 
   





