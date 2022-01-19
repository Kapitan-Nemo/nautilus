document.addEventListener("DOMContentLoaded", () => {
    //console.log("Odpalam swup");
    const swup = new Swup( {
      plugins: [
       // new SwupBodyClassPlugin(),
       // new SwupScriptsPlugin(),
       new SwupScrollPlugin({
        doScrollingRightAway: false,
        animateScroll: false,
        scrollFriction: 0.3,
        scrollAcceleration: 0.04,
      })
      ],
    });


    function init() {
        if (document.querySelector('.slider__category')) {
            const mySiema = new Siema({ 
                loop: true,
                easing: 'ease-out',
                selector: '.slider__category',
                threshold: 20,
                perPage: {
                  768: 2,
                  1280: 3,
                },
              });
              const prev = document.querySelector('.prev');
              const next = document.querySelector('.next');
              
              prev.addEventListener('click', () => mySiema.prev());
              next.addEventListener('click', () => mySiema.next());
        }

        if (document.querySelector('.tiles')) {
          let anchorlinks = document.querySelectorAll("[data-href]");
          for (let item of anchorlinks) { // relitere 
                  item.addEventListener('click', (e)=> {
                  let hashVal = item.getAttribute('data-href');
                  let target = document.querySelector(hashVal);

                  let test = document.querySelectorAll(".tiles__modal");
                  [].forEach.call(test, function(elo) {
                      elo.classList.remove("tiles__modal");
                  });

                  target.classList.add("tiles__modal");
                  let elems = document.querySelectorAll(".background");
                  [].forEach.call(elems, function(el) {
                      el.classList.remove("background");
                  });
                  item.classList.add("background");
              })
          };

          document.querySelectorAll('.tiles__link a[href^="#"]')
          .forEach(trigger => {
              trigger.onclick = function(e) {
                  e.preventDefault();
                  let hash = this.getAttribute('href');
                  let target = document.querySelector(hash);
                  let headerOffset = 100;
                  let elementPosition = target.offsetTop;
                  let offsetPosition = elementPosition - headerOffset;
                  window.scrollTo({
                      top: offsetPosition, 
                      behavior: "smooth"
                  });
              };
          });
        }
    }

    // run once 
    init();

    // this event runs for every page view after initial load
    swup.on('contentReplaced', init);
});


