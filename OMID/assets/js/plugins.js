/*================================================================================
  Item Name: OmidPortal Design Admin Template
  Version: 1.0
  Author: Milad Ranaei && Azam Feyznia
  Author URL: http://www.omid.com
================================================================================*/

/* PRELOADER */
function preloader(immune, background, color) {
    $("body").prepend('<div class="preloader"><span class="loading-bar"></span><i class="radial-loader"></i></div>');

    if (immune == true) {
        $("body > div.preloader").addClass('immune');
    }

    if (background == 'white') {
        $("body > div.preloader").addClass('white');
    }

    else if (background == 'black') {
        $("body > div.preloader").addClass('black');
    }

    if (color == 'red') {
        $("body > div.preloader span.loading-bar").addClass('red-colored');
        $("body > div.preloader i.radial-loader").addClass('red-colored');
    }
    $(window).load(function() {
        setTimeout(function() {
            $('.preloader').fadeOut(2000);
        }, 1000);
        setTimeout(function() {
            $('.preloader').remove();
        }, 2000);

    })
};
preloader(true, 'white', 'red');

/* #################### END PRELOADER ############################ */

$(function() {

  "use strict";

  var window_width = $(window).width();




  // Check first if any of the task is checked
  $('#task-card input:checkbox').each(function() {
    checkbox_check(this);
  });

  // Task check box
  $('#task-card input:checkbox').change(function() {
    checkbox_check(this);
  });

  // Check Uncheck function
  function checkbox_check(el){
      if (!$(el).is(':checked')) {
          $(el).next().css('text-decoration', 'none'); // or addClass            
      } else {
          $(el).next().css('text-decoration', 'line-through'); //or addClass
      }    
  }

  /*----------------------
  * Plugin initialization
  ------------------------*/

  // Materialize Slider
  $('.slider').slider({
    full_width: true
  });

  // Materialize Dropdown
  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 125,
    constrain_width: true, // Does not change width of dropdown to that of the activator
    hover: false, // Activate on click
    alignment: 'left', // Aligns dropdown to left or right edge (works with constrain_width)
    gutter: 0, // Spacing from edge
    belowOrigin: true // Displays dropdown below the button
  });

  // Materialize Tabs
  $('.tab-demo').show().tabs();
  $('.tab-demo-active').show().tabs();

  // Materialize Parallax
  $('.parallax').parallax();
  $('.modal-trigger').leanModal();

  // Materialize scrollSpy
  $('.scrollspy').scrollSpy();

  // Materialize tooltip
  $('.tooltipped').tooltip({
    delay: 50
  });

  // Materialize sideNav  

  //Main Left Sidebar Menu
  $('.sidebar-collapse').sideNav({
    edge: 'right', // Choose the horizontal origin      
  });
  
  //Main Left Sidebar Chat
  $('.chat-collapse').sideNav({
    menuWidth: 240,
    edge: 'left',
  });
  $('.chat-close-collapse').click(function() {
    $('.chat-collapse').sideNav('hide');
  });
  $('.chat-collapsible').collapsible({
    accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
  });

  // Pikadate datepicker
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  // Perfect Scrollbar
  $('select').not('.disabled').material_select();
    var leftnav = $(".page-topbar").height();  
    var leftnavHeight = window.innerHeight - leftnav;
  $('.leftside-navigation').height(leftnavHeight).perfectScrollbar({
    suppressScrollX: true
  });
    var righttnav = $("#chat-out").height();
  $('.rightside-navigation').height(righttnav).perfectScrollbar({
    suppressScrollX: true
  });

  // Fullscreen
  function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
      (!document.mozFullScreen && !document.webkitIsFullScreen)) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      }
      else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      }
      else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    }
    else {
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      }
      else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      }
      else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      }
    }
  }

  $('.toggle-fullscreen').click(function() {
    toggleFullScreen();
  });


  // Floating-Fixed table of contents (Materialize pushpin)
  if ($('nav').length) {
    $('.toc-wrapper').pushpin({
      top: $('nav').height()
    });
  }
  else if ($('#index-banner').length) {
    $('.toc-wrapper').pushpin({
      top: $('#index-banner').height()
    });
  }
  else {
    $('.toc-wrapper').pushpin({
      top: 0
    });
  }

  // Toggle Flow Text
  var toggleFlowTextButton = $('#flow-toggle')
  toggleFlowTextButton.click(function() {
    $('#flow-text-demo').children('p').each(function() {
      $(this).toggleClass('flow-text');
    })
  });
  
  
  //Toggle Containers on page
  var toggleContainersButton = $('#container-toggle-button');
  toggleContainersButton.click(function() {
    $('body .browser-window .container, .had-container').each(function() {
      $(this).toggleClass('had-container');
      $(this).toggleClass('container');
      if ($(this).hasClass('container')) {
        toggleContainersButton.text("Turn off Containers");
      }
      else {
        toggleContainersButton.text("Turn on Containers");
      }
    });
  });

  // Detect touch screen and enable scrollbar if necessary
  function is_touch_device() {
    try {
      document.createEvent("TouchEvent");
      return true;
    }
    catch (e) {
      return false;
    }
  }
  if (is_touch_device()) {
    $('#nav-mobile').css({
      overflow: 'auto'
    })
  }


}); // end of document ready