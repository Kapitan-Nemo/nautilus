function openSearch() {
    document.querySelector(".navbar__search").classList.add("navbar__search__active");
  }
  
function closeSearch() {
    document.querySelector(".navbar__search").classList.remove("navbar__search__active");
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
        
    
   





