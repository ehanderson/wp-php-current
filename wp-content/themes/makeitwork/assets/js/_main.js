/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {
// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages

      if(!Modernizr.svg) {
        $('img[src*="svg"]').attr('src', function() {
            return $(this).attr('src').replace('.svg', '.png');
        });

        $('.img-responsive').each(function(){
          $(this).removeAttr('width');
          $(this).removeAttr('height');
        });

      }

      $('input, textarea').placeholder();

      if(!Modernizr.touch) {
        $('.dropdown-toggle')
          .dropdownHover()
          .on('click', function () {
              document.location.href = this.href;
          });
      }


      $('.video').fitVids();
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page

      var currentTallest = 0,
          currentRowStart = 0,
          rowDivs = [],
          $el,
          topPosition = 0,
          setHeights = function(block) {
            $(block).each(function() {

             $el = $(this);
             topPostion = $el.position().top;

             if (currentRowStart !== topPostion) {

               // we just came to a new row.  Set all the heights on the completed row
               for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                 rowDivs[currentDiv].height(currentTallest);
               }

               // set the variables for the new row
               rowDivs.length = 0; // empty the array
               currentRowStart = topPostion;
               currentTallest = $el.height();
               rowDivs.push($el);

             } else {

               // another div on the current row.  Add it to the list and check if it's taller
               rowDivs.push($el);
               currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

            }

            // do the last row
             for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
               rowDivs[currentDiv].height(currentTallest);
             }

            });

          };

        if($(window).width() > 990) { setHeights('.content-block'); }


        $(window).resize(function() {
          if($(window).width() > 990) { setHeights('.content-block'); }
          else { $('.content-block').height('auto');}
        });

    }
  },
  // About us page, note the change from about-us to about_us.
  about: {
    init: function() {
      // JavaScript to be fired on the about us page


    }
  }

};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
