/**
 * Created by Dev on 08.05.2017.
 */

$(document).ready(function () {
  setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
  setTimeout(function(){   $('.wrap-catal.hide').removeClass('hide')   }, 500);
  setTimeout(function(){   if(mainScroll) mainScroll.refresh();   }, 100);

  if(window.innerWidth > 1024){
    var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
    $('.zon-col-list-catal').hide();
    $('.zon-col-list-catal.'+activeZonColList).show()
  }
});


$('.catal-filter-head').on('click', function(){
  $(this).closest('.catal-side').toggleClass('show hide')
});


$('.disactive-item').on('click', function(){
  $(this).closest('.active').removeClass('active')
});


$('ul.zon-col-list-catal li a').on('click', function(e){
  e.preventDefault();
  $(this).closest('li').toggleClass('active');

  // UNDER ACTIVE ONLY ONE ELEMENT
  // var rootList = $(this).closest('ul.zon-col-list-catal');
  // $(rootList).find('li.active').removeClass('active');
  // $(this).closest('li').addClass('active');
});

//'.zon-col-side-toggle a:not(.active)'
$('.zon-col-side-toggle a').on('click', function(e){
  e.preventDefault();

  if(!$(this).hasClass('active')){
    $('.zon-col-side-toggle a').toggleClass('active');
    $('.zon-col-list-catal').toggle(700);
    if(mainScroll) setTimeout(function(){ mainScroll.refresh(); }, 1000);
  }
});

function scrollFunc() {

}
