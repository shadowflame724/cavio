/**
 * Created by Dev on 08.05.2017.
 */

var zcScroll;
var zcModalSwip;
var lenFooterPath;

$(document).ready(function () {
  setTimeout(function(){  $($('.wrap-banner-cont')[0]).addClass('show');  },500);
  setTimeout(function(){  $($('.zon-col-list')[0]).addClass('show');      },1300);

  lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight);

  zcModalSwip = new Swiper ('.zc-modal-carousel', {
    slidesPerView: 1,
    speed: 1000,
    autoplay: 4000,
    loop: true,
    effect: 'fade', //"coverflow"
    prevButton: '.zc-modal-swip-arrow.prev',
    nextButton: '.zc-modal-swip-arrow.next',
    pagination: '.swiper-pagination',
    paginationType: 'progress'
  });


  if(mainScroll) {
    zcScroll = new IScroll('.wrapper-zone-col-modal', {
      probeType: 3,
      scrollbars: true,
      mouseWheel: true,
      scrollX: false,
      interactiveScrollbars: true,
      shrinkScrollbars: 'scale',
      disablePointer: true, // important to disable the pointer events that causes the issues
      disableTouch: false, // false if you want the slider to be usable with touch devices
      disableMouse: true // false if you want the slider to be usable with a mouse (desktop)
    });
  }

  setBgSvgPos();
});


function setBgSvgPos() {
  document.querySelectorAll('.img-back svg').forEach(function(el) {
    var posX = Math.random() * (70 - 20) + 20;
    var posY = Math.random() * (70 - 20) + 20;
    var rotDeg = 270 * Math.random();
    $(el).css('transform', 'scale(0.7) translate(-'+posX+'%,-'+posY+'%) rotate('+rotDeg+'deg)');
  })
}



$(window).on('resize', function(){
  lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight);
  var mainOffset = $($('main')[0]).offset().top;

  document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
});



function scrollFunc() {
  mainScroll.on('scroll', function(){
    var mainOffset = $($('main')[0]).offset().top;

    document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
  })
}



$('.drop-down').on('click', function(){
  $(this).toggleClass('open');
});



$('.item-coll a').on('click', function(event){
  event.preventDefault();

  $('.zone-col-modal').removeClass('hide').addClass('show');
  $('body').toggleClass('overfl-h');

  // if(window.innerWidth > 1024)  mainScroll.disable();
});


// CLOSE MODAL
$(document).on('click', '.zone-col-modal', function (event) {
  if(!$(event.target).closest('.inner-zone-col-modal').length){
    $('.zone-col-modal').toggleClass('hide show');
    $('body').toggleClass('overfl-h');
    $('.inner-zone-col-modal').removeClass('op_5');

    // if(window.innerWidth > 1024)  mainScroll.enable();
  }
});

$(document).on('mouseleave', '.zone-col-modal.show .inner-zone-col-modal', function(){
  this.classList.add('op_5');
});

$(document).on('mouseenter', '.zone-col-modal.show .inner-zone-col-modal', function(){
  this.classList.remove('op_5');
});
