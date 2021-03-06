$ = jQuery
jQuery(document).ready(function () {

   // Add smooth scrolling to all links
    $('.review-item .product-description a').on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
  
        // Store hash
        var hash = this.hash;
  
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
  
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });

  jQuery('.menu-top-menu-container').meanmenu({
    meanMenuContainer: '.main-navigation',
    meanScreenWidth: "1023",
    meanRevealPosition: "right",
  });

  // $("#is-search-input-3587").hide();
  // $('.is-search-icon').on('click',function(e){
  //     e.preventDefault();
  //     $("#is-search-input-3587").toggle();
  // });

  /* back-to-top button*/

  $('.back-to-top').hide();
  $('.back-to-top').on("click", function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
  });
  $(window).scroll(function () {
    var scrollheight = 1800;
    if ($(window).scrollTop() > scrollheight) {
      $('.back-to-top').fadeIn();

    } else {
      $('.back-to-top').fadeOut();
    }
  });

  $('.featured-slider').slick({
    dots: false,
    infinite: true,
    speed: 700,
    slidesToShow: 1,
    autoplay: true,
    fade: true,
    arrows: true,
  });


    jQuery('#submodal').on('shown.bs.modal', function () {
      jQuery('#myInput').trigger('focus')
    });

    var toc = $("#table-of-content-list").tocify({
      context: '.single-page-section',
      selectors: "h2,h3",
      showAndHide: false,
      highlightDefault: false,
    }).data("toc-tocify");

});