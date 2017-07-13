var bannerCircleDelayStart = 100;
var collectionCarousel;
var slidesPerViewPrev;

var itemOffsetOurPhil;
var itemOffsetCollection;

$('.new-products-right-side').on({
  'mouseenter': function(){ mainScroll && mainScroll.disable(); },
  'mouseleave': function(){ mainScroll && mainScroll.enable();  },
});

$('.new-products-right-side').on('mousewheel', function (event) {
  var razn = $(this).offset().left - $(this).find('.new-products-right-item:not(.hide)').offset().left;
  $(this).scrollLeft( razn-event.deltaY*100 );
});


$(window).on('resize', function () {
  initCollectionCarousel();

  itemOffsetCollection = $($('#shop-by-collection')[0]).offset().top - (window.innerHeight*0.1);
});


$(window).on('scroll', function(event){
  if(window.innerWidth <= 1024){
    var currScrolled = $(document).scrollTop();

    if(itemOffsetOurPhil !== true)  itemOffsetOurPhil = $($('.wrap-philosophy.a')[0]).offset().top - (window.innerHeight*0.7) - currScrolled;
    itemOffsetCollection = $($('#shop-by-collection')[0]).offset().top - (window.innerHeight*0.1) - currScrolled;


    if(0 < itemOffsetCollection){
      document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;  }
    else{   document.getElementById('wrapper-bg').style.opacity = 2.4-(80 - itemOffsetCollection) / 730;  }


    if(itemOffsetOurPhil < 0 && itemOffsetOurPhil !== true){
      itemOffsetOurPhil = true;

      // showPhilText();

      $('.wrap-philosophy.a').addClass('show');
    }
  }
});


function scrollFunc() {
  mainScroll.on('scroll', function () {

    // console.log(-this.y);

    if (itemOffsetOurPhil !== true) itemOffsetOurPhil = $($('.wrap-philosophy.a')[0]).offset().top - (window.innerHeight * 0.7);
    itemOffsetCollection = $($('#shop-by-collection')[0]).offset().top - (window.innerHeight * 0.1);

    if (0 < itemOffsetCollection) {
      document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;
    }
    else {
      document.getElementById('wrapper-bg').style.opacity = 2.4 - (80 - itemOffsetCollection) / 730;
    }



    if (itemOffsetOurPhil < 0 && itemOffsetOurPhil !== true) {
      itemOffsetOurPhil = true;

      showPhilText();

      $('.wrap-philosophy.a').addClass('show');
    }
  });
}


function showPhilText(){
  var philP1 = document.querySelector("#philP1 p.dark");
  var philP2 = document.querySelector("#philP2 p.dark");
  var philP3 = document.querySelector("#philP3 p.dark");

  var maxClipWidth = $('.phil-text-nosvg').width();
  var valStartP2 = (maxClipWidth*10)/100;
  var valStartP3 = (maxClipWidth*20)/100;


  $.Velocity(blurMe1, {
    tween: [maxClipWidth+valStartP3, 0]
  }, {
    duration: 900,
    easing: 'linear',
    progress: function (elements, c, r, s, t) {
      $(philP1).attr('style', 'clip: rect(0, '+ t              +'px, auto, 0);');
      if (t >= valStartP2) $(philP2).attr('style', 'clip: rect(0, '+(t - valStartP2)+'px, auto, 0);');
      if (t >= valStartP3) $(philP3).attr('style', 'clip: rect(0, '+(t - valStartP3)+'px, auto, 0);');
    },
    complete: function () {
      $([philP1, philP2, philP3]).attr('style', 'clip: rect(0, auto, auto, 0);');
    }
  });
}


function initCollectionCarousel() {
  var slidesPerView;
  var windWidth = window.innerWidth;

  if(850 < windWidth && windWidth <= 1024)  slidesPerView = 2.5;
  if(750 < windWidth && windWidth <= 850 )  slidesPerView = 2.0;
  if(640 < windWidth && windWidth <= 750 )  slidesPerView = 1.8;
  if(windWidth <= 640)                      slidesPerView = 1.5;

  if(slidesPerViewPrev != slidesPerView){
    if(!slidesPerViewPrev) slidesPerViewPrev = slidesPerView;
    collectionCarousel && collectionCarousel.destroy();
    collectionCarousel = new Swiper ('.collection-carousel', {
      slidesPerView: slidesPerView,
      centeredSlides: true,
      paginationClickable: true,
      spaceBetween: 20
    });
  }
}

function animBannerCircle( container ) {
  if(window.innerWidth <= 1024)  return;

  //  ==== HIDE ===
  $(container).find('.banner-circle').removeClass('showed');
  $(container).find('.banner-circle .svg-banner-circle path').finish().attr('d', '');
  $(container).find('.banner-circle .svg-banner-circle circle').finish().attr('cx', 30).attr('cy', 30).attr('r', 0).css('r', 0);
  // END  ==== HIDE ===


  $(container).find('.banner-circle').each(function (key, el) {

    var currSvg_circle = $(el).find('.svg-banner-circle circle')[0];
    var currSvg_path = $(el).find('.svg-banner-circle path')[0];
    var delay = bannerCircleDelayStart+key*300;

    $(currSvg_path).delay(delay).animate({
      stroke: "white",
      percent: 100,
    }, {
      duration: 900,
      easing: $.bez([.52,.02,.26,.87]),
      step: function(now, fx){
        if(fx.prop == 'percent'){
          var calcAngle  =  0+(now/100)*(-360);
          var calcRadius = 30+(now/100)*(  -4);

          drawCircle(this, calcAngle, calcRadius);
        }
      },
      complete: function() {
        this.percent = 0;
        $(this).animate({
          stroke: "#8a4511",
          percent: 100,
        }, {
          duration: 400,
          easing: $.bez([.13,.24,.73,.38]),
          step: function(now, fx){
            if(fx.prop == 'percent'){
              var calcRadius = 26+((now/100)*(-12));
              drawCircle(this, 360, calcRadius);
            }
          },
          complete: function () {
            var self = this;
            setTimeout(function(){   $(self).closest('.banner-circle').addClass('showed');   },100);

            this.percent = 0;
          }
        });
      }
    });


    $(currSvg_circle).delay(delay).animate({
      r: 11,
      fill: 'white',
    }, {
      duration: 900,
      easing: $.bez([.52,.02,.26,.87]),
      step: function (now, fx) {
        (fx.prop == 'r') && this.setAttribute('r', now);
      },
      complete: function() {
        this.r1 = 0;
        $(this).animate({
          r1: 3,
          fill: '#b56349',
        }, {
          duration: 400,
          easing: $.bez([.46,.12,.64,.51]),
          step: function (now, fx) {
            if(fx.prop == 'r1') $(this).attr('r', 11-now).css('r', 11-now);
          },
        });
      }
    });
  });
}

function drawCircle(pathCircle, angle, radius) {
  // center point
  var cX = 30,
    cY = 30,
    circle = pathCircle;

  var this_angle = angle;
  this_angle %= 360;

  var p1 = {x: cX+radius, y: cY};
  var p2 = {x: cX-radius, y: cY};

  var radians= (angle/180) * Math.PI;
  var x = cX + Math.cos(radians) * radius;
  var y = cY + Math.sin(radians) * radius;

  var d;

  if (Math.abs(this_angle) < 180 && this_angle != 0)
    d= 'M ' + p1.x + ',' + p1.y + ' A' + radius+ ',' + radius+ (Math.abs(this_angle)==180?' 0 1 0 ':' 0 0 0 ')+x+' '+y;
  else
    d= 'M ' + p1.x + ',' + p1.y + ' A' + radius+ ',' + radius+ ' 0 1 0 '+p2.x+' '+p2.y +
      ' M ' + p2.x + ',' + p2.y + ' A' + radius+ ',' + radius+ (Math.abs(this_angle)==0?' 0 1 0 ':' 0 0 0 ')+x+' '+y;

  circle.setAttribute("d", d);
}


$(document).ready(function () {
  initCollectionCarousel();

  animBannerCircle(document.querySelector('.banner-top-item'));

  setTimeout(function(){   $('.new-products-left-side').removeClass('hide');   },1);
  setTimeout(function(){   $('.new-products-right-side').removeClass('hide');   },250);

  $('.new-products-dots .new-prod-dot').on('click', function (event) {
    if($(this).hasClass('active'))  return;

    var indexNewProd = $(this).index();


    $('.new-prod-dot.active').removeClass('active');
    $(this).addClass('active');


    var hiddingSlideboxL = $('#wrap-left-slidexbox .slidebox').not('.hide');
    hiddingSlideboxL.addClass('hide');
    setTimeout(function(){   hiddingSlideboxL.addClass('disp-none');   },100);

    $('#wrap-left-slidexbox .slidebox')[indexNewProd].classList.remove('disp-none');
    setTimeout(function(){   $('#wrap-left-slidexbox .slidebox')[indexNewProd].classList.remove('hide');   },10);


    $('#wrap-banner-img-box .banner-top-item').not('.hide').addClass('hide');
    var currBannerTopItem = $('#wrap-banner-img-box .banner-top-item')[indexNewProd];
    currBannerTopItem.classList.remove('hide');
    animBannerCircle(currBannerTopItem);


    var hiddingSlideboxR = $('.new-products-right-side .wrap-right-slidebox').not('.hide');
    hiddingSlideboxR.addClass('hide').find('.new-products-right-item').addClass('hide');
    setTimeout(function(){   hiddingSlideboxR.addClass('disp-none');   },100);


    var wrapRightSlidexbox = $('.new-products-right-side .wrap-right-slidebox')[indexNewProd];
    wrapRightSlidexbox.classList.remove('hide');
    wrapRightSlidexbox.classList.remove('disp-none');


    $(wrapRightSlidexbox).find('.new-products-right-item').each(function (key, el) {
      setTimeout(function () {   el.classList.remove('hide');   },130*key);
    });
  });

  var wrapRSlidebox = {};
  $('.new-products-right-side').on('mousedown', function (event) {
    wrapRSlidebox.target = this;
    var posFirstEl = $(this).offset().left - $(this).find('.new-products-right-item').offset().left;
    wrapRSlidebox.x = event.clientX + posFirstEl;
    event.preventDefault();
  });


  $(document).on('mousemove', function (event) {
    if(wrapRSlidebox.target){
      var razn = event.clientX - wrapRSlidebox.x;
      $(wrapRSlidebox.target).scrollLeft( -razn );
    }
  });

  $(document).on('mouseup', function (event) {
    wrapRSlidebox.target = undefined;
  });


  // if(window.innerWidth > 1024)  scrollIndex();
});


