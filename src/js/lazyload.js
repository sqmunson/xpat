(function ($) { 
   "use strict";   
      
   $.ajaxloadmore = function (el) {
      
      //Set variables
      var alm = this;
      alm.AjaxLoadMore = {};
      alm.speed = 300;
      alm.proceed = false;
      alm.disable_ajax = false;
      alm.init = true;
      alm.loading = true;
      alm.finished = false;
      alm.window = $(window);
      alm.button_label = '';
      alm.data;
      alm.el = el;
      alm.content = $(alm.el);
      alm.container = $('.lazy-load-content');
      alm.type = alm.content.attr('data-type');
      alm.page = ['single'].indexOf(alm.type) > -1 ? 0 : 1;

      /* Append 'load More' button to .ajax-load-more-wrap */
      // alm.el.append('<div class="ll-btn-wrap"><button id="load-more" class="ll-load-more-btn"></button></div>');
      alm.button = $('.lazy-load-button');

      alm.AjaxLoadMore.loadPosts = function () {
         if(!alm.disable_ajax){ // Check for ajax blocker
            alm.button.addClass('loading');
            alm.loading = true;            
            
            alm.AjaxLoadMore.ajax();
         }
      };
      
      alm.AjaxLoadMore.ajax = function () {
         $.ajax({
            type: "GET",
            url: lazy_load_localize.ajaxurl,
            data: {
               action: 'lazy_load_query',
               type: alm.content.attr('data-type'),
               categories: alm.content.attr('data-categories'),
               tags: alm.content.attr('data-tags'),
               author: alm.content.attr('data-author'),
               exclude: alm.content.attr('data-post'),
               search: alm.content.attr('data-search'),
               page: alm.page
            },
            dataType: "html",
            // parse the data as html
            beforeSend: function () {
               if (alm.page != 1) {
                  alm.button.addClass('loading');
               }
            },
            success: function (data) {
               alm.AjaxLoadMore.success(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
               alm.AjaxLoadMore.error(jqXHR, textStatus, errorThrown);
            }
         });
      };
      
      alm.AjaxLoadMore.success = function (data) {
         alm.data = $(data); // Convert data to an object                  
         if (alm.init) {
            alm.init = false;
            
            // ALM Empty - triggers if zero results were returned 
            if(!alm.data.length > 0){
               if ($.isFunction($.fn.almEmpty)) {
                  $.fn.almEmpty(alm);
               }
            }
         }
         
         if (alm.data.length > 0) {
            alm.el = $('<div class="ll-reveal"/>');
            alm.el.append(alm.data).hide();
            alm.container.append(alm.el);

            alm.el.fadeIn(alm.speed, 'alm_easeInOutQuad', function () {
                alm.loading = false;
                alm.button.delay(alm.speed).removeClass('loading');
             });

            // load ads!
            window.loadAds();
                
            // ALM Complete 
            if ($.isFunction($.fn.almComplete)) {
               $.fn.almComplete(alm);
            }
            
         } else {
            alm.button.delay(alm.speed).removeClass('loading').addClass('done');
            alm.loading = false;
            alm.finished = true;
         }
      };
      
      alm.AjaxLoadMore.error = function (jqXHR, textStatus, errorThrown) {
         alm.loading = false;
         alm.button.removeClass('loading');
         console.log(errorThrown);
      };
      
      alm.AjaxLoadMore.isVisible = function () {
        alm.visible = false;
        if (alm.el.is(":visible")) {
          alm.visible = true;
        }
        return alm.visible;
      };
      

      /* Window scroll and touchmove events
       * 
       *  Load posts as user scrolls the page
       *  @since 1.0
       */
       alm.window.bind("scroll touchstart", function () {
          if (alm.AjaxLoadMore.isVisible()) {
             var content_offset = alm.button.offset();
             if (!alm.loading && !alm.finished && (alm.window.scrollTop() >= Math.round(content_offset.top - alm.window.height())) && alm.proceed) {                  
                alm.page++;
                alm.AjaxLoadMore.loadPosts();
             }
          }
       });
      

      /* Init Ajax load More
       * 
       *  Load posts as user scrolls the page
       *  @since 2.0
       */
      if(alm.disable_ajax){
         alm.finished = true;
         alm.button.addClass('done');
      }else{
         if (alm.pause === 'true') {
            alm.button.text(alm.button_label);
            alm.loading = false;
         } else {
            alm.AjaxLoadMore.loadPosts();
         }
      }


      //flag to prevent unnecessary loading of post on init. Hold for 1 second
      setTimeout(function () {
         alm.proceed = true;
      }, 1000);


      //Custom easing function
      $.easing.alm_easeInOutQuad = function (x, t, b, c, d) {
         if ((t /= d / 2) < 1) return c / 2 * t * t + b;
         return -c / 2 * ((--t) * (t - 2) - 1) + b;
      };
   };

   // End $.ajaxloadmore
   
   
   /* $.fn.ajaxloadmore()
    * 
    *  Initiate all instances of Ajax load More
    *  @since 2.1.2
    */
   $.fn.ajaxloadmore = function () {
      return this.each(function () {
         $(this).data('alm', new $.ajaxloadmore($(this)));
      });
   };

   /* 
    *  Initiate Ajax load More if div is present on screen
    *  @since 2.1.2
    */
   if ($(".lazy-load-more").length) 
      $(".lazy-load-more").ajaxloadmore();

})(jQuery);