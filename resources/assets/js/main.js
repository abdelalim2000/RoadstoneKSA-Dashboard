let lastKnownScrollPosition = 0;

let ticking = false;
let section1 = document.getElementById("section-1");
let section2 = document.getElementById("section-2");
let section3 = document.getElementById("section-3");
let tire1LineSvg = document.getElementById("tire-1-line-svg");
let tireLineSvgTwo = document.getElementById("tire-2-line-svg");
let tireLineSvgThree = document.getElementById("tire-3-line-svg");

function typedOne() {
  var typed = new Typed(`#typed`, {
    stringsElement: `#typed-string`,
    typeSpeed: 1,
    showCursor: false,
  });
}

function typedTwo() {
  var typed = new Typed("#typed-two", {
    stringsElement: "#typed-string-two",
    typeSpeed: 1,
    showCursor: false,
  });
}
function typedThree() {
  var typed = new Typed("#typed-three", {
    stringsElement: "#typed-string-three",
    typeSpeed: 1,
    showCursor: false,
  });
}

ScrollTrigger.matchMedia({
  "(min-width:1300px)": function () {
    // Gsap Animation
    gsap.registerPlugin(ScrollTrigger);
    const scenes = gsap.utils.toArray(".panel");
    // Pinned scene
    scenes.forEach((scene, i) => {
      ScrollTrigger.create({
        trigger: scene,
        // snap: {
        //   snapTo: 1,
        //   duration: { min: 0.2, max: 1 },
        //   delay: 0.1,
        // },
        scrub: true,
        pin: true,
        id: `scene-${i}`,
        // onEnter: type,
      });

      function checkTyping(i) {
        if (i === 0) {
          typedOne();
        } else if (i === 1) {
          typedTwo();
        } else if (i === 2) {
          typedThree();
        }
      }
      const sceneBody = scene.querySelector(".scene-body");
      const sectionHeading = scene.querySelector(".section-heading");
      const sectionTireImage = scene.querySelector(".tire-image");
      const sectionSvg = scene.querySelector(".passenger-svg-content");
      sectionSvg.style.display = "none";
      const typedString = scene.querySelector(".typed-string");
      const sectionTyped = scene.querySelector(".section-typed");
      const tl = gsap.timeline();

      tl.from(sectionHeading, {
        left: "100%",
        scrollTrigger: {
          start: "top 20%",
          end: "bottom 0",
          trigger: sceneBody,
          scrub: true,
          toggleActions: "restart none restart none",
          id: `sceneBody-${i}`,
        },
        onComplete: () => {
          sectionSvg.style.display = "flex";
          checkTyping(i);
          tl.to(sectionTireImage, {
            left: "-100%",
            top: "-100%",
            scrollTrigger: {
              scrub: true,
              start: "top 0",
              end: "bottom 0",
              trigger: sceneBody,
              toggleActions: "restart none restart none",
              id: `tire-image-${i}`,
            },
          });
        },
      });
      tl.from(sectionTireImage, {
        left: "-100%",
        top: "100%",
        scrollTrigger: {
          scrub: true,
          start: "top 0",
          end: "bottom 0",
          trigger: sceneBody,
          toggleActions: "restart none restart none",
          id: `tire-image-${i}`,
        },
      });
    });
  },
  "(max-width: 1200px)": function () {
    sectionSvg.style.display = "block";
  },
});
