/**
 * Created by Dev on 08.05.2017.
 */

$(document).ready(function () {
  setTimeout(function(){  $($('.wrap-banner-cont')[0]).addClass('show');  },500);

  setQaBgWavePos();

  document.querySelectorAll('.ac-item.hide').forEach(function(el, key){
    var timeOStart = 300;
    var timeODelay = 300;
    var acElPos = $(el).offset().top - (window.innerHeight*1.5);
    console.log('acElPos', acElPos)
    if(0 > acElPos) {
      el.classList.remove('hide');
      setTimeout(function(){   $(el).removeClass('hide');   }, timeOStart + timeODelay);
      timeOStart*=2;
    }
  });
});


$('.ac-item input[type=checkbox]').on('change', function(){
  if(mainScroll)  setTimeout(function(){ mainScroll.refresh(); }, 500);
});


$(window).on('scroll', function(event){
  if(!mainScroll){
    var currScrolled = $(document).scrollTop();

    var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1) - currScrolled;
    document.getElementById('wrapper-bg-faq').style.opacity = -(1200 - lenFooterPath) / 730;
  }
});


function setQaBgWavePos() {
  document.querySelectorAll('.qa-item-wave-bg').forEach(function(el) {
    var posY = Math.random() * 100;
    var rotDeg = 270 * Math.random();
    $(el).css('background-position', '50% '+ posY+'%');
  })
}



function scrollFunc() {
  mainScroll.on('scroll', function(){
    document.querySelectorAll('.ac-item.hide').forEach(function(el, key){
      var acElPos = $(el).offset().top - (window.innerHeight*1.3);
      if(0 > acElPos) {
        el.classList.remove('hide');
    //     setTimeout(function(){   $('.ac-item.hide').removeClass('hide');   },150);
    //     setTimeout(function(){   $('.ac-item.hide').removeClass('hide');   },300);
    //     setTimeout(function(){   $('.ac-item.hide').removeClass('hide');   },450);
      }
    });


    var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1);
    document.getElementById('wrapper-bg-faq').style.opacity = -(1200 - lenFooterPath) / 730;
  })
}
