jQuery(document).ready(function(e){function l(){e("#slider ul").animate({left:+t},300,function(){e("#slider ul li:last-child").prependTo("#slider ul"),e("#slider ul").css("left","")})}function n(){e("#slider ul").animate({left:-t},300,function(){e("#slider ul li:first-child").appendTo("#slider ul"),e("#slider ul").css("left","")})}e(".js-menu-toggle").on("click",function(){e("body").toggleClass("is-menu-on")}),e(".popup-btn").on("click",function(){e("#ctaPopup").removeClass("hide-popup"),e("body").addClass("is-popup-on")}),e(".standard-popup-btn").on("click",function(){e("#secondaryPopup").removeClass("hide-popup"),e("body").addClass("is-popup-on")}),e(".popupOverlay").on("click",function(l){e(l.target).hasClass("popupOverlay")&&(e("#secondaryPopup").addClass("hide-popup"),e("#ctaPopup").addClass("hide-popup"),e("body").removeClass("is-popup-on"))});var s=0,o=e(".transparent-nav");o.offset();e(document).scroll(function(){s=e(this).scrollTop(),s>50?e(".transparent-nav").addClass("header-bg"):e(".transparent-nav").removeClass("header-bg")}),e(function(){e('a[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var l=e(this.hash);if(l=l.length?l:e("[name="+this.hash.slice(1)+"]"),l.length)return e("html, body").animate({scrollTop:l.offset().top-80},700),!1}})});var i=e("#slider ul li").length,t=e("#slider ul li").width(),a=e("#slider ul li").height(),p=i*t;e("#slider").css({width:t,height:a}),e("#slider ul").css({width:p,marginLeft:-t}),e("#slider ul li:last-child").prependTo("#slider ul"),e("a.control_prev").click(function(e){return l(),!1}),e("a.control_next").click(function(e){return n(),!1})});