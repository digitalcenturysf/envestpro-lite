(function($){
  $(document).ready(function(){ 
    // masonry blog post - resource: http://www.wpbeginner.com/wp-themes/how-to-use-masonry-to-add-pinterest-style-post-grid-in-wordpress/
    if ( $( "#blogmasnory" ).length ) {
      var container = document.querySelector('#blogmasnory'); 
      var msnry;  
      imagesLoaded( container, function() {
        msnry = new Masonry( container, {
          itemSelector: '.blog-item'
        });
      });
    }
    if ( $( "#slider4" ).length ) { 
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks" 
      });
    }

  // footer widget
  $("footer .footer-widgets:nth-child(3)").addClass("footer_sec3");
  // pagination
  $(".pagination_area li .current").parent().addClass("pgcurrent");
  // top menu
  $("<li>|</li>").insertAfter("#envestpro-lite-top-nav li");
  $( "#envestpro-lite-top-nav li" ).last().remove();
  $(".ddd").on("click", function () {
    var $button = $(this);
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();
    if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);
  });

  $('.thumbnails .zoom').click(function(e){
    e.preventDefault();
    var photo_fullsize =  $(this).find('img').attr('src');
    $('.woocommerce-main-image img').attr('src', photo_fullsize);
  });

  //remove placeholder on focus js start here
  $("input").each(
    function(){
    $(this).data('holder',$(this).attr('placeholder'));
    $(this).focusin(function(){
      $(this).attr('placeholder','');
    });
    $(this).focusout(function(){
      $(this).attr('placeholder',$(this).data('holder'));
    });
  });
  $("textarea").each(
   function(){
    $(this).data('holder',$(this).attr('placeholder'));
    $(this).focusin(function(){
      $(this).attr('placeholder','');
    });
    $(this).focusout(function(){
      $(this).attr('placeholder',$(this).data('holder'));
    });
  });

  //multilever dropdown js start here 
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
})(jQuery);		