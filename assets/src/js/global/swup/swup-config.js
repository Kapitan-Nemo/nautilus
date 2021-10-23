document.addEventListener("DOMContentLoaded", () => {
    //console.log("Odpalam swup");
    const swup = new Swup( {
      plugins: [
       // new SwupBodyClassPlugin(),
       // new SwupScriptsPlugin(),
       new SwupScrollPlugin({
        doScrollingRightAway: false,
        animateScroll: true,
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
    }

    // run once 
    init();

    // this event runs for every page view after initial load
    swup.on('contentReplaced', init);
});


