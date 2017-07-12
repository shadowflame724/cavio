/**
 * Created by Dev on 02.05.2017.
 */

var indicArrow = document.getElementById('indicator-arrow');
var aboutPageLen = $($('#about-mood')[0]).offset().top;

$(document).ready(function () {
  if(window.innerWidth > 1024){
    checkIndicators();

    setTimeout(function(){  $('#wrap-page-indicators.hide').removeClass('hide');  },700);
    setTimeout(function(){  $($('#about-history .wrap-banner-cont')[0]).addClass('show');  },500);
  }

  // scrollFunc();
});



$('.indicator a').on('click', function(event){
  event.preventDefault();
  var durationScroll = Math.abs($($(this.getAttribute('href'))[0]).offset().top) * 0.2;
  mainScroll.scrollTo(0, mainScroll.y-$($(this.getAttribute('href'))[0]).offset().top, durationScroll);
});


$('.banner-cont-read a').on('click', function(event){
  event.preventDefault();
  var durationScroll = Math.abs($($(this.getAttribute('href'))[0]).offset().top) * 0.7;
  mainScroll.scrollTo(0, mainScroll.y-$($(this.getAttribute('href'))[0]).offset().top+100, durationScroll);
});



function scrollFunc() {
  console.log(mainScroll)
  mainScroll.on('scroll', function(){

    var wrapImgUnderHistoryLeft = $($('.wrap-img-under-history-left')[0]).offset().top - (window.innerHeight*0.7);
    var wrapTextUnderHistoryRight = $($('.wrap-text-under-history-right')[0]).offset().top - (window.innerHeight*0.7);
    var wrapImgUnderHistoryRight = $($('.wrap-img-under-history-right')[0]).offset().top - (window.innerHeight*0.7);
    var wrapTextUnderHistoryLeft = $($('.wrap-text-under-history-left')[0]).offset().top - (window.innerHeight*0.7);


    var aboutPhilCont = $($('#about-philosofhy .wrap-banner-cont')[0]).offset().top - (window.innerHeight*0.7);
    var aboutMoodCont = $($('#about-mood .wrap-banner-cont')[0]).offset().top - (window.innerHeight*0.7);


    var itemOffsetAboutPhil = $($('#about-philosofhy')[0]).offset().top - (window.innerHeight*0.1);
    var itemOffsetAboutMood = $($('#about-mood')[0]).offset().top - (window.innerHeight*0.1);


    var wrap2ColUnderPhil = $($('#wrap-2-col-under-phil')[0]).offset().top - (window.innerHeight*0.6);
    var itemOffsetAboutRomb = $($('#about-romb')[0]).offset().top - (window.innerHeight*0.7);
    var itemOffsetMoodBig = $($('#inner-mood-big')[0]).offset().top - (window.innerHeight*0.7);

    var colUnderMoodText = $($('.col-under-mood-text')[0]).offset().top - (window.innerHeight*0.7);


    if(0 < itemOffsetAboutPhil){
      document.getElementById('wrapper-bg-philosofhy').style.opacity = (1200 - itemOffsetAboutPhil) / 730;
    }
    else {
      document.getElementById('wrapper-bg-mood').style.opacity = (1200 - itemOffsetAboutMood) / 730;
    }


    if(0 > wrapImgUnderHistoryLeft) $($('.wrap-img-under-history-left')[0]).addClass('show');
    if(0 > wrapTextUnderHistoryRight) $($('.wrap-text-under-history-right')[0]).addClass('show');

    if(0 > aboutPhilCont) $($('#about-philosofhy .wrap-banner-cont')[0]).addClass('show');
    if(0 > aboutMoodCont) $($('#about-mood .wrap-banner-cont')[0]).addClass('show');

    if(0 > wrapImgUnderHistoryRight) $($('.wrap-img-under-history-right')[0]).addClass('show');
    if(0 > wrapTextUnderHistoryLeft) $($('.wrap-text-under-history-left')[0]).addClass('show');
    if(0 > wrap2ColUnderPhil)    $('#wrap-2-col-under-phil').addClass('show');
    if(0 > itemOffsetAboutRomb)  $('#about-romb').addClass('show');
    if(0 > itemOffsetMoodBig)    $('.mood-big').addClass('show');
    if(0 > colUnderMoodText)     $('.col-under-mood-text').addClass('show');

    checkIndicators();
  });
}



function checkIndicators(){
  if($($('#about-philosofhy')[0]).offset().top - (window.innerHeight * 0.2) > 0) {
    if(!$('#indicator-1').hasClass('active')){
      $('.indicator.active').removeClass('active');
      $('#indicator-1').addClass('active');
    }
  }

  else if($($('#about-mood')[0]).offset().top - (window.innerHeight * 0.2) > 0) {
    if(!$('#indicator-2').hasClass('active')){
      $('.indicator.active').removeClass('active');
      $('#indicator-2').addClass('active');
    }
  }

  else if(!$('#indicator-3').hasClass('active')){
    $('.indicator.active').removeClass('active');
    $('#indicator-3').addClass('active');
  }

  if(inStartFooter)  $('#wrap-page-indicators').addClass('hide');
  console.log(!inStartFooter, !scrolledBottom, mainScroll.directionY)
  if(!inStartFooter && !scrolledBottom && mainScroll.directionY==-1) $('#wrap-page-indicators').removeClass('hide');
}

