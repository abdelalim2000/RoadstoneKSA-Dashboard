$(function () {
    $('.retailersCity').owlCarousel({
       loop: true,
       lazyLoad: true,
       smartSpeed: 800,
       slideTransition: 'linear',
       dots: true,
       responsive: {
          0: {
             items: 2,
             stagePadding: 30,
             dots:true
          },
          375: {
             items: 3,
             stagePadding: 10,
          },
          425: {
             items: 3,
          },
          768: {
             items: 4,
          },
          1000: {
             items: 7
          },
          1200: {
             items: 9,
             dots: false,
            //  margin: 30
          }
       }
    })
 })

 $(function () {
    $('.tire-size').owlCarousel({
       loop: true,
       lazyLoad: true,
       smartSpeed: 800,
       slideTransition: 'linear',
       dots: false,
       responsive: {
          0: {
             items: 1,
          },
          600: {
             items: 2,
          },
          1000: {
             items: 2,
          },
          1200: {
             items: 3
          }
       }
    })
 })

$(function () {
   $('.marker-logo').owlCarousel({
      smartSpeed: 1000,
      dots: false,
      responsive: {
         0: {
            items: 1,
         },
         600: {
            items: 3,
         },
         1000: {
            items: 4,
         },
         1200: {
            items: 6,
            margin: 20
         }
      }
   })
})


