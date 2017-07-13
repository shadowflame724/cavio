/**
 * Created by Dev on 08.05.2017.
 */

var newsItems = [];
var numbCol = 1;

if(window.innerWidth > 1400) numbCol = 4;
else if(window.innerWidth > 1024) numbCol = 3;
else if(window.innerWidth > 640)  numbCol = 2;



$(window).on('resize', function(){
  if(window.innerWidth > 1400) {
    if(numbCol != 4){ numbCol = 4; initNewsGrid();}
  }
  else if(window.innerWidth > 1024) {
    if(numbCol != 3){ numbCol = 3; initNewsGrid();}
  }
  else if(window.innerWidth > 640) {
    if(numbCol != 2){ numbCol = 2; initNewsGrid();}
  }
  else { numbCol = 1; initNewsGrid(); }
});

$(document).ready(function () {
  setTimeout(function(){  $($('.wrap-banner-cont')[0]).addClass('show');  },  500);
  setTimeout(function(){  $($('.wrap-news-types-list')[0]).addClass('show');   },  800);
  setTimeout(function(){  $($('.wrap-news-list')[0]).addClass('show');    }, 1150);


  // ============= REMAPING NEWS=================
  initNewsGrid();
  // END ============= REMAPINK NEWS=============


  var newsTypeList = $('#wrap-news-type');
  newsTypeList.find('.curr-news-type').text( newsTypeList.find('ul.news-types-list li.active a').text() );
});


function scrollFunc() {
  mainScroll.on('scroll', function(){
    var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1);
    document.getElementById('wrapper-bg-news').style.opacity = -(1200 - lenFooterPath) / 730;
  })
}




function initNewsGrid() {
  newsItems = document.querySelectorAll('#news-list .news-item');

  for(var i=0;i<numbCol;i++){
    $("#news-list").append("<div class='news-col'></div>");
  }

  newsItems.forEach(function(el, key) {
    $(".news-col").eq(key%numbCol).append(el);
  });

  $('.news-col').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
      $this.remove();
  });

  if(mainScroll)  mainScroll.refresh();
}
