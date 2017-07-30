
var mainScroll;

var inStartFooter = false;
var scrolledBottom = false;

var beCollScrolled = false;

var scrollbars;
var topMenuScroll;

var scrollFunc;

var wavesBg_1;

platformDef();
blendModeDef();

/**
 * Basket
 * @type {{init, get, add, update, updateBasketSumm}}
 */
var basket = (function () {
  var that = this,
    link = '/basket',
    cart_html = null,
    cart = [];

  function start() {
    $.get(link+'/show')
      .done(function (data) {
        cart = data.items;
        cart_html = data.html;
        showCostBasket();
      })
      .fail(function (data) {
        console.error('Fail load basket data');
      })
      .always(function (data) {
        return cart;
      });
  }

  function showCostBasket() {

    var summ = 0;
    _.each(cart, function (item) {
      summ = parseInt(summ) + item.count * item.price;
    });

    $('.header-nav').replaceWith(cart_html);
    if ($('#cartTotal').length) {
      $('#cartTotal').text(summ);
      if (summ == 0) {
        window.location.href = '/';
      }
    }
  }

  function update(id, cnt) {
    saveUpdatedItem(id, cnt);
  }

  function findByid(id) {
    return _.find(cart, {id: id});
  }

  function findBySizeColor(id, size,color) {
    var result = _.find(cart, function (o) {
      return o.goods_id == id && o.size == size && o.color == color
    });
    //  console.log(cart, result, id, size,color);
    return result;
  }

  function seeGoods(id, cnt, size,color, call) {

    var item = findBySizeColor(id, size,color);
    if (_.isUndefined(item)) { // если такого нету - добавляем
      // console.log('addToBasket', [id, cnt, size,color]);
      addToBasket(id, cnt, size,color, call);
    } else { // иначе - обновляем
      // console.log('updateItem', [id, cnt, size,color]);
      item.count = parseInt(item.count) + parseInt(cnt);  // обновляем кол-во
      saveUpdatedItem(item, call);
    }

  }

  /**
   * item - object товара в корзине,
   * callback - ф-ция, срабатывающая после сохранения на сервере
   * **/
  function saveUpdatedItem(id, cnt) {

    $.post(link + '/' + id, {'id':id,'count':cnt})
      .done(function (data) {
        console.log(data)

        $('.total-basket-main').html(data.html);

        // item = data.item;
        // cart_html = data.html;
      })
      .fail(function (data) {
        console.error('Fail update item in basket');
      });
  }

  /**
   * goods_id - ID товара,
   * cnt - +/- количество,
   * size - размер
   * **/
  function addToBasket(price_id,count) {
    var data = {'price_id': price_id, 'count': count};
    $.ajax({
      type: "PUT",
      url: link,
      data: data
    })
      .done(function (data) {
        cart.push(data.item);
        // cart_html = data.html;
      })
      .fail(function (data) {
        console.error('Fail put item to basket');
      });
  }


  /**
   * goods_id - ID товара,
   * cnt - количество удаляемого товара,
   * size - размер
   * **/
  function removeItem(goods_id) {
    removeFromBasket(goods_id)
  }

  /**
   * goods_id - ID товара,
   * cnt - +/- количество,
   * size - размер
   * **/
  function removeFromBasket(id) {
    $.ajax({
      type: "DELETE",
      url: link + '/' + id,
    })
      .done(function (data) {
        // cart = _.reject(cart, function (o) {
        //   return o.id == item.id;
        // });
        //console.log(data);
        // cart_html = data.html;
        // callback(true);
      })
      .fail(function (data) {
        console.error('Fail put item to basket');
        // callback(false);
      });
  }

  return {
    init: function () {
      start();
    },
    get: function () {
      return cart;
    },
    add: function (id,count) {
      addToBasket(id,count);
    },
    remove: function (id) {
      removeItem(parseInt(id));
    },
    update: function (id, cnt) {
      update(parseInt(id), parseInt(cnt));
    },
    updateBasketSumm: function () {
      showCostBasket();
    }
  }
}());

$(document).ready(function(){
  if(!document.querySelector('html.mobile-platform') && !(document.querySelector('body.card'))){
    mainScroll = Scrollbar.init(document.getElementById('main-scrollbar'), {damping: 0.2});
  }

  if($(document).scrollTop()) $('header:not(.scroll)').addClass('scroll');
  else                        $('header.scroll').removeClass('scroll');

  $(window).on('scroll', function(){
    if($(document).scrollTop()) $('header:not(.scroll)').addClass('scroll');
    else                        $('header.scroll').removeClass('scroll');
  });

  //Add to cart
  $('body').on('click','#add_to_cart',function () {
    var $_price_id = $('.swiper-slide.wrap-card-price.active').find('.card-price').attr('data-id') || false;
    var $_count = 1;

    basket.add($_price_id,$_count);
  });

  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  //subscribe
  $('body').on('submit','#subscribe',function () {
    var _form = $(this),
        _action = _form.attr('action'),
        mail = _form.find('input.email-input').val() || false;

    console.log('_action');
    console.log(_action);
    console.log(mail);
    if(mail && validateEmail(mail)){
      alert('subscribe success mail');
      $.get(_action+'?email='+mail, function( data ) {
        alert( "subscribe success SEND" );
      });
    }
    return false;
  });
});

$('.wrap-login-side a').on('click', function(e){
  e.preventDefault();

  $('#modal-log_reg').removeClass('hide').addClass('show');
  $('.wrap-left-nav').removeClass('show');
  $('.nav-icon').removeClass('open');
  $(document.body).addClass('overfl-h');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  $('header').removeClass('show-top-menu')
    .removeClass('show-left-menu');
});


// !body.card
if(!document.querySelector('body.card')) {

  scrollbars = !$('body').hasClass('about');


  $(window).on('resize', function(){
    //RESIZE TOPDROPMENU
    var thentisDropMenu = $('.top-menu-box.show');
    var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
    if(newTopMenuHeight > window.innerHeight)  newTopMenuHeight = window.innerHeight;
    if(thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0,0);
    docum.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
  });

  $(document).ready(function () {
    jQuery.Color.hook("fill stroke");

    if(!document.querySelector('body.main')){
      setTimeout(function(){  initWaves()  }, 1500);
    }

    if(!document.querySelector('html.mobile-platform')) {

      mainScroll.addListener(function(status){
        if(wavesBg_1) {
          if(wavesBg_1.playing) wavesBg_1.pause();
          else if(!document.querySelector('main.scrolling')) wavesBg_1.play();
        }

        if(document.querySelector('body.press-design'))  return;

        if (status.offset.y != 0) $('header:not(.scroll)').addClass('scroll');
        else $('header.scroll').removeClass('scroll');

        if ($('header').hasClass('show-top-menu')) {
          $('header').removeClass('show-top-menu');
          $('.btn-top-menu.active').removeClass('active');
          $('.top-menu-box.show').removeClass('show');
        }
      });
    }


    // // CLOSE MODAL LOG_REG
    // $(document).on('click', '#modal-log_reg', function(event){
    //   if (!$(event.target).closest('.inner-zone-col-modal').length) {
    //     $('#modal-log_reg').toggleClass('hide show');
    //     $('body').toggleClass('overfl-h');
    //   }
    // });
    //
    // // CLOSE MODAL
    // $(document).on('click', '#zones-mobal', function(event){
    //   if (!$(event.target).closest('.inner-zone-col-modal').length) {
    //     $('#zones-mobal').toggleClass('hide show');
    //     $('body').toggleClass('overfl-h');
    //   }
    // });


    showElements();

    var timeOTopImg;
    $('.top-menu-box.collection li >a').on('mouseenter', function(){
      var index = $(this).closest('li').index();

      var showedImg = document.querySelector('.top-menu-box.collection .wrap-coll-top-menu-img.show');
      var willShowImg = $(this).next();

      if(willShowImg.hasClass('show'))  return;

      var lastSritedImgEl = $('.sprite-wrap-coll-top-menu-img .last');
      var firstSritedImgEl = $('.sprite-wrap-coll-top-menu-img .first');

      var firstSritedImgUrl = firstSritedImgEl.css('background-image');


      var wrapSprite = document.querySelector('.sprite-wrap-coll-top-menu-img');
      wrapSprite.setAttribute('style', '');


      if(firstSritedImgUrl != 'none'){
        lastSritedImgEl.css('background-image', firstSritedImgUrl);
      }

      firstSritedImgEl
        .css('background-image', willShowImg.css('background-image'));


      setTimeout(function(){
        wrapSprite.style.transition = 'transform .4s ease, -webkit-transform .4s ease';
        wrapSprite.style.transform = 'translate(0, 50%)';
        wrapSprite.style['-webkit-transform'] = 'translate(0, 50%)';
      }, 1);


      var menuImgDelay = 0;
      if(showedImg) {
        showedImg.classList.remove('show');
        menuImgDelay = 250;
      }

      clearTimeout(timeOTopImg);
      timeOTopImg = setTimeout(function(){
        willShowImg.addClass('show');
      }, menuImgDelay);
    });


    document.addEventListener('click', function(event){
      if ($('header').hasClass('show-left-menu') && $(event.target).hasClass('wrap-left-nav')) {

        $('header').removeClass('show-left-menu');
        $('.nav-icon').removeClass('open');
        $('.wrap-left-nav').removeClass('show');
        // mainScroll && mainScroll.enable();

        $(document.body).removeClass('overfl-h');
      }
    });

    $('.btn-top-menu').on('mouseenter', function(){

      var thisDropMenu = $('#' + this.getAttribute('for'));
      var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
      if(newTopMenuHeight > window.innerHeight)  newTopMenuHeight = window.innerHeight;
      if(thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0,0);


      if (!$('header').hasClass('show-top-menu')) {
        $('header').addClass('show-top-menu');

        thisDropMenu.removeClass('show');
        setTimeout(function(){  thisDropMenu.addClass('show')  }, 2);

        $('.btn-top-menu[for=' + this.getAttribute('for') + ']').addClass('active');
        document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
        return;
      }

      if ($('.btn-top-menu.active')[0] != this) {
        $('.btn-top-menu.active').removeClass('active');
        $('.top-menu-box.show').removeClass('show');
        this.classList.add('active');

        thisDropMenu.addClass('show');
        document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
      }
    });


    $('header').on('mouseleave', function(){  hideTopMenu()  });
    $('.nav-icon, .svg-main-logo, .lang-panel, .open-modal-login, .svg-stash').on('mouseenter', function(){
      hideTopMenu()
    });


    // hideTopMenu
    var newTopMenuHeight = $('#menu-products .wrap-menus').height() + $('header').height();
    if(newTopMenuHeight > window.innerHeight)  newTopMenuHeight = window.innerHeight;
    document.querySelector('.forTopMenuScroll').style.height = newTopMenuHeight+'px';
    topMenuScroll = Scrollbar.init(document.querySelector('.topMenuScroll'), { alwaysShowTracks: true });
    $('.forTopMenuScroll').attr('style', '');


    $('.nav-icon').on('click', function(){
      $(this).toggleClass('open');
      $('.wrap-left-nav').toggleClass('show');
      $('.btn-top-menu.active').removeClass('active');
      $('.top-menu-box.show').removeClass('show');
      $('header').removeClass('show-top-menu')
        .toggleClass('show-left-menu');

      $(document.body).toggleClass('overfl-h');
    });

    $('.drop-item > a').on('click', function(event){
      event.preventDefault();
      $(this).closest('.drop-item').toggleClass('show');
    });

    $('.wrap-left-nav-col-side > a').on('click', function(event){
      event.preventDefault();
      $(this).closest('.wrap-left-nav-col-side').toggleClass('show');
    });

    initLogRegSwiper();
  });

  function showElements() {}

  document.addEventListener("DOMContentLoaded", function(){
    $('.nav-icon').removeClass('hide');

    setTimeout(function(){   $('.short-nav-item:eq(0)').removeClass('hide')   }, 150);
    setTimeout(function(){   $('.short-nav-item:eq(1)').removeClass('hide')   }, 400);
    setTimeout(function(){   $('.wrap-login').removeClass('hide')             }, 550);
    setTimeout(function(){   $('.wrap-stash-ico').removeClass('hide')         }, 700);
    setTimeout(function(){   $('.wrap-banner-cont:eq(0)').addClass('show')    }, 900);

    setTimeout(function(){   $('.svg-main-logo').removeClass('hide')          }, 450);
    setTimeout(function(){   $('.lang-panel').removeClass('hide')             }, 480);
  });

  $('.wrap-search input').on('focus blur', function(){
    if (window.innerWidth > 1024) $(this).closest('.wrap-search').toggleClass('full-w');
  });

  $('.drop-down').on('click', function(){
    $(this).toggleClass('open');
  });

  $('.drop-down li a').on('click', function(e){
    e.preventDefault();

    var dropDown = $(this).closest('.drop-down');
    var dispCurrVal = $(dropDown).find('.curr-news-type');
    $(dropDown).find('li.active').removeClass('active');
    $(this).closest('li').addClass('active');

    $(dispCurrVal).text($(this).text());
  });

  $('.open-modal-login').on('click', function (event) {
    event.preventDefault();

    $('#modal-log_reg').removeClass('hide').addClass('show');
    $('body').toggleClass('overfl-h');
  });
}


//MAIN
if(document.querySelector('body.main')){
  console.log('Main page');

  var intervalNewProdDot;
  var timeChangeAutoNewProdDot = 7000;

  var bannerCircleDelayStart = 100;
  var collectionCarousel;
  var slidesPerViewPrev;

  var wrapRSlidebox = {};

  var itemOffsetOurPhil;
  var itemOffsetCollection;

  var cardModalSwip;

  var ourPhilosophyTitle;
  var shopByCollection;
  var collCarous;

  $('.new-products-right-side').on({
    'mousemove' : function(){ if(mainScroll) mainScroll.options.speed = 0; var currValScrollUndBanner = $(this).find('.new-products-right-item:not(.hide)').offset().left; },
    'mouseenter': function(){ if(mainScroll) mainScroll.options.speed = 0; clearInterval(intervalNewProdDot); },
    'mouseleave': function(){ if(mainScroll) mainScroll.options.speed = 1; },
    'mousewheel': function(event){
      if(!mainScroll)  return;

      var currValScrollUndBanner = $(this).find('.new-products-right-item:not(.hide)').offset().left;

      if(currValScrollUndBanner == prevValScrollUndBanner){
        mainScroll.options.speed = 1;
      }

      if(prevValScrollUndBanner == currValScrollUndBanner && event.deltaY==-1){
        mainScroll.options.speed = 1;
      }

      if(prevValScrollUndBanner != currValScrollUndBanner){
        mainScroll.options.speed = 0;
      }


      var razn = $(this).offset().left - currValScrollUndBanner;
      var delta = parseInt(event.originalEvent.wheelDelta || -event.originalEvent.detail);
      if(razn-event.deltaY > razn)  razn += 80;
      var self = this;
      // $('html, body').animate({scrollLeft: $(currentElement).offset().left}, 800);
      // $(this).finish();
      // $(this).animate({scrollLeft: razn-event.deltaY*100 }, 100);
      $(this).scrollLeft( razn-event.deltaY*100 );


      prevValScrollUndBanner = currValScrollUndBanner;// - razn-event.deltaY*100;
    }
  });

  var prevValScrollUndBanner = 0;

  $('.inner-logo a').on('click', function(e){
    if(!$(this).hasClass('lang-item')){
      e.preventDefault();

      if (mainScroll && mainScroll.offset.y == 0)  return;

      if (mainScroll) mainScroll.scrollTo(0, 0, mainScroll.offset.y / 4, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
      else  $('body').animate({scrollTop: 0}, $('body').scrollTop() / 5);
    }
  });


  $(window).on({
    'resize': function(){
      initCollectionCarousel();
      itemOffsetCollection = $($('#shop-by-collection')[0]).offset().top - (window.innerHeight*0.1);
    },
    'scroll': function(event){
      if(!mainScroll){
        var currScrolled = $(document).scrollTop();
        var percVisOurPhil = -($('#our-philosophy').offset().top - currScrolled-window.innerHeight)/window.innerHeight;
        var percVisShopByColl = -($('#shop-by-collection').offset().top - currScrolled-window.innerHeight)/window.innerHeight;
        var brPShopByColl = $('#shop-by-collection').offset().top;
        var percVisShopByCat = -($('#shop-by-cat').offset().top - currScrolled-window.innerHeight)/window.innerHeight;
        var percVisShopByCatBtn = -($('.wrap-btn-more').offset().top - currScrolled-window.innerHeight)/window.innerHeight;


        if(itemOffsetOurPhil !== true)  itemOffsetOurPhil = brPShopByColl - (window.innerHeight*1.1) - currScrolled;
        itemOffsetCollection = brPShopByColl - (window.innerHeight*0.1) - currScrolled;


        if(0 < itemOffsetCollection){
          document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;  }
        else{   document.getElementById('wrapper-bg').style.opacity = 2.4-(80 - itemOffsetCollection) / 730;  }




        if(percVisOurPhil > 0.2) $('#our-philosophy h3.section-title').addClass('show');
        if(percVisOurPhil > 0.4) $('.wrap-philosophy.a').addClass('show');
        if(percVisOurPhil > 0.6) $('.phil-right').addClass('show')


        if(percVisShopByColl > 0.4) {
          $('#shop-by-collection h3.section-title').addClass('show');
          if(percVisShopByColl > 0.55)  $('#shop-by-collection').removeClass('hide');
        }


        if(percVisShopByCat > 0.25){
          $('#shop-by-cat h3.section-title').addClass('show');


          $('.cat.hide').each(function(key){
            var thisVis = -($(this).offset().top - currScrolled-window.innerHeight)/window.innerHeight;

            if(thisVis > 0.2) $(this).removeClass('hide');
          });
        }

        if(percVisShopByCatBtn > 0.1)  $('#shop-by-cat .wrap-btn-more').removeClass('hide');
      }
    }
  });

  $(document).on({
    'mousemove': function(event){
      if(wrapRSlidebox.target){
        var razn = event.clientX - wrapRSlidebox.x;
        $(wrapRSlidebox.target).scrollLeft( -razn );
      }
    },
    'mouseup': function(event){
      wrapRSlidebox.target = undefined;
    }
  });

  function initCollectionCarousel(){
    var slidesPerView = 4;
    var windWidth = window.innerWidth;

    $('.item-coll.coll-swiper-arr.right').removeClass('coll-swiper-arr right');

    if(850 < windWidth && windWidth <= 1024)  slidesPerView = 2.5;
    if(750 < windWidth && windWidth <= 850 )  slidesPerView = 2.0;
    if(640 < windWidth && windWidth <= 750 )  slidesPerView = 1.8;
    if(windWidth <= 640)                      slidesPerView = 1.5;

    console.log(slidesPerViewPrev, slidesPerView)
    if(slidesPerViewPrev != slidesPerView){
      $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
      if(!slidesPerViewPrev) slidesPerViewPrev = slidesPerView;
      collectionCarousel && collectionCarousel.destroy();
      collectionCarousel = new Swiper ('.collection-carousel', {
        slidesPerView: slidesPerView,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 20,
        loop: true,
      });
    }



    if(window.innerWidth > 1024){
      collectionCarousel && collectionCarousel.destroy();
      collectionCarousel = new Swiper('.collection-carousel', {
        slidesPerView: slidesPerView,
        centeredSlides: true,
        loopAdditionalSlides: 1,
        runCallbacksOnInit: false,
        loop: true,
        prevButton: '.zc-modal-swip-arrow.prev',
        nextButton: '.zc-modal-swip-arrow.next',
        onSlideChangeEnd: function(){
          if(window.innerWidth > 1024) {

            $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
            var collPrevSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-prev');
            var collNextSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-next').next().next();
            collPrevSlides.addClass('coll-swiper-arr left');
            collNextSlides.addClass('coll-swiper-arr right');

            beCollScrolled = true;
          }
        },
        onInit: function(){
          $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
          var collPrevSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-prev');
          var collNextSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-next').next().next();
          collPrevSlides.addClass('coll-swiper-arr left');
          collNextSlides.addClass('coll-swiper-arr right');
        }
      });
    }
  }

  $(document).on('click', '.item-coll.coll-swiper-arr', function(event){
    event.preventDefault();

    if($(event.target).closest('.item-coll').hasClass('right')){
      collectionCarousel.slideNext();
      // collectionCarousel.slideTo(collectionCarousel.activeIndex + 2);
    }
    if($(event.target).closest('.item-coll').hasClass('left')){
      collectionCarousel.slidePrev();
      // collectionCarousel.slideTo(collectionCarousel.activeIndex - 2);
    }
  });

  $(document).on('mouseenter mouseleave', '.coll-swiper-arr', function(e){
    var collItemWrap = $(e.target).closest('.coll-swiper-arr');

    if(e.type == 'mouseenter'){
      if(collItemWrap.hasClass('left')){
        $('.coll-carousel-arr .prev').addClass('hov');
      }
      if(collItemWrap.hasClass('right')){
        $('.coll-carousel-arr .next').addClass('hov');
      }
    }

    if(e.type == 'mouseleave'){
      if(collItemWrap.hasClass('left')){
        $('.coll-carousel-arr .prev').removeClass('hov');
      }
      if(collItemWrap.hasClass('right')){
        $('.coll-carousel-arr .next').removeClass('hov');
      }
    }
  });

  $(document).on('mouseenter mouseleave', '.zc-modal-swip-arrow', function(e){
    if(e.type == 'mouseenter'){
      if($(e.target).hasClass('prev')){
        $('.coll-swiper-arr.left').addClass('hov');
      }
      if($(e.target).hasClass('next')){
        $('.coll-swiper-arr.right').addClass('hov');
      }
    }

    if(e.type == 'mouseleave'){
      if($(e.target).hasClass('prev')){
        $('.coll-swiper-arr.left').removeClass('hov');
      }
      if($(e.target).hasClass('next')){
        $('.coll-swiper-arr.right').removeClass('hov');
      }
    }
  });

  $(document).on('mouseenter mouseleave','.banner-circle.showed', function(e){

    clearInterval(intervalNewProdDot);

    var sircleStroke = $(this).find('circle.stroke');
    var sircleFilled = $(this).find('circle.filled');
    sircleStroke.stop();
    sircleFilled.stop();


    var sircleStrokeAnimEnterVal = { r1: 14 };
    var sircleStrokeAnimLeaveVal = { r1: 17.5 };
    var sircleFilledAnimEnterVal = { r1:  8 };
    var sircleFilledAnimLeaveVal = { r1:  7 };


    if(e.type == 'mouseenter'){
      $(sircleStrokeAnimEnterVal).animate({
        r1: 17.5
      }, {
        duration: 400,
        step: function(now, fx){  sircleStroke.attr('r', now);  }
      });


      $(sircleFilledAnimEnterVal).animate({
        r1: 7
      }, {
        duration: 400,
        step: function(now, fx){  sircleFilled.attr('r', now);  },
      });
    }

    if(e.type == 'mouseleave'){
      $(sircleStrokeAnimLeaveVal).animate({
        r1: 14
      }, {
        duration: 400,
        step: function(now, fx){  sircleStroke.attr('r', now);  }
      });


      $(sircleFilledAnimLeaveVal).animate({
        r1: 8
      }, {
        duration: 400,
        step: function(now, fx){  sircleFilled.attr('r', now);  }
      });
    }
  });

  function animBannerCircle( container ) {
    if(window.innerWidth <= 1024)  return;

    //  ==== HIDE ===
    $(container).find('.banner-circle').removeClass('showed');
    $(container).find('.banner-circle .svg-banner-circle path').finish().attr('d', '');
    $(container).find('.banner-circle .svg-banner-circle circle.filled').finish().attr('cx', 30).attr('cy', 30).attr('r', 0);
    // END  ==== HIDE ===


    $(container).find('.banner-circle').each(function (key, el) {

      var currSvg_circle = $(el).find('.svg-banner-circle circle.filled')[0];
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
            percent: 100,
          }, {
            duration: 400,
            easing: $.bez([.13,.24,.73,.38]),
            step: function(now, fx){
              var calcRadius = 26+((now/100)*(-12));
              drawCircle(this, 360, calcRadius);
            },
            complete: function () {
              var self = this;
              setTimeout(function(){   $(self).closest('.banner-circle').addClass('showed');   },100);

              this.percent = 0;
            }
          });
        }
      });


      currSvg_circle.r1 = 0;
      $(currSvg_circle).delay(delay).animate({
        r1: 11,
        fill: 'white',
      }, {
        duration: 900,
        easing: $.bez([.52,.02,.26,.87]),
        step: function (now, fx) {
          if(fx.prop == 'r1')  this.setAttribute('r', now);
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
              if(fx.prop == 'r1')  this.setAttribute('r', 11-now);
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

  function autoChangeActiveNewProdDot() {
    intervalNewProdDot = setInterval(function(){
      var nextNewProdDot = $('.new-products-dots .new-prod-dot.active').next()[0];
      if(!nextNewProdDot) nextNewProdDot = $('.new-products-dots .new-prod-dot').eq(0);

      var indexNewProd = $(nextNewProdDot).index();


      $('.new-prod-dot.active').removeClass('active');
      $(nextNewProdDot).addClass('active');


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


      setTimeout(function(){  $('.new-products-right-side').scrollLeft( 0 );  }, 130);
      $(wrapRightSlidexbox).find('.new-products-right-item').each(function (key, el) {
        setTimeout(function () {   el.classList.remove('hide');   },130*key);
      });

    }, timeChangeAutoNewProdDot);
  }

  $('.new-products-right-inner-item').on('click', function(event){
    event.preventDefault();

    zcScroll = Scrollbar.init(document.getElementById('zones-mobal'),{  damping: 0.2  });
    zcScroll.setPosition(0,0);

    var slidesPerView = 1.1;
    var spaceBetween = 120;
    if(window.innerWidth <= 1400){ spaceBetween = 70; }
    if(window.innerWidth <= 1024){ spaceBetween = 0; slidesPerView = 1.2; }


    cardModalSwip && cardModalSwip.destroy();
    cardModalSwip = new Swiper ('.wrap-carousel-card', {
      slidesPerView: slidesPerView,
      loopAdditionalSlides: 3,
      centeredSlides: true,
      speed: 700,
      // autoHeight: true,
      // autoplay: 4000,
      spaceBetween: spaceBetween,
      loop: true,
      effect: "coverflow",
      coverflow: { slideShadows : false },
    });

    $(document).on('click', '.card-modal-slide', function(event){
      if($(event.target).closest('.card-modal-slide').hasClass('swiper-slide-prev'))  cardModalSwip.slidePrev();
      if($(event.target).closest('.card-modal-slide').hasClass('swiper-slide-next'))  cardModalSwip.slideNext();
    });

    $('#zones-mobal').removeClass('hide').addClass('show');
    $('body').toggleClass('overfl-h');
    // wavesBg_1.appendTo(document.querySelector('#zones-mobal .inner-zone-col-modal'));
  });

  $('.new-products-dots .new-prod-dot').on('click', function(event){
    if($(this).hasClass('active'))  return;

    clearInterval(intervalNewProdDot);

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


    setTimeout(function(){  $('.new-products-right-side').scrollLeft( 0 );  }, 130);
    $(wrapRightSlidexbox).find('.new-products-right-item').each(function (key, el) {
      setTimeout(function () {   el.classList.remove('hide');   },130*key);
    });
  });

  $('.item-coll .img-back svg').each(function(key, el){
    var posX = Math.random() * (40 - 10) + 10;
    var posY = Math.random() * (40 - 10) + 10;
    var rotDeg = 270 * Math.random();

    var transformVal = 'translate(-'+ posX +'%,-'+ posY +'%) rotate('+ rotDeg +'deg)';
    $(el).css({
      '-webkit-transform': transformVal,
      'transform': transformVal
    });
  });

  $('.new-products-right-side').on('mousedown', function(event){
    wrapRSlidebox.target = this;

    var posFirstEl = $(this).offset().left - $(this).find('.new-products-right-item:not(.hide)').offset().left+70;
    wrapRSlidebox.x = event.clientX + posFirstEl;

    event.preventDefault();
  });

  function scrollFunc(){
    mainScroll.addListener(function(status){
      if (itemOffsetOurPhil !== true) itemOffsetOurPhil = $('.wrap-philosophy.a').offset().top - (window.innerHeight * 0.7);
      itemOffsetCollection = $('#shop-by-collection').offset().top - (window.innerHeight * 0.1);

      if (0 < itemOffsetCollection) {
        document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;
      }
      else {
        document.getElementById('wrapper-bg').style.opacity = 2.4 - (80 - itemOffsetCollection) / 730;
      }

      if (itemOffsetOurPhil < 0 && itemOffsetOurPhil !== true) {
        itemOffsetOurPhil = true;

        $('.wrap-philosophy.a').addClass('show');
        setTimeout(function(){  $('.phil-right').addClass('show')  }, 170);


        setTimeout(function(){  initWaves()  }, 500);
      }


      if(mainScroll.isVisible( ourPhilosophyTitle )) $('#our-philosophy h3.section-title').addClass('show');


      if(mainScroll.isVisible( collCarous )){
        $('#shop-by-collection h3.section-title').addClass('show');

        var pxVisibledSwiper = -($(collCarous).offset().top - window.innerHeight);
        var dispUpperSwiper = (pxVisibledSwiper > $(collCarous).height()*40/100);

        if(dispUpperSwiper)  $(shopByCollection).removeClass('hide');
      }


      if(mainScroll.isVisible( document.querySelector('#shop-by-cat') )){
        var percViewCatTitle = (-($('#shop-by-cat h3.section-title').offset().top-window.innerHeight))/window.innerHeight;
        var percViewCatTable = (-($('#shop-by-cat .cat-wrapper').offset().top-window.innerHeight))/window.innerHeight;
        var percViewCatButtn = (-($('#shop-by-cat .wrap-btn-more').offset().top-window.innerHeight))/window.innerHeight;


        if(percViewCatTitle > 0.2)   $('#shop-by-cat h3.section-title').addClass('show');
        if(percViewCatTable > 0.25){
          $('#shop-by-cat .cat.hide').removeClass('hide');
          $('#shop-by-cat .cat-wrapper').removeClass('hide');
        }
        if(percViewCatButtn > 0.08)  $('#shop-by-cat .wrap-btn-more').removeClass('hide');
      }
    });
  }

  $(document).ready(function(){
    ourPhilosophyTitle = document.querySelector('#our-philosophy .wrap-philosophy');
    shopByCollection = document.getElementById('shop-by-collection');
    collCarous = document.querySelector('.collection-carousel');

    initCollectionCarousel();

    if(mainScroll)  scrollFunc();

    animBannerCircle(document.querySelector('.banner-top-item'));

    setTimeout(function(){   $('.new-products-left-side').removeClass('hide')   },1);
    setTimeout(function(){   $('.new-products-right-side, .wrap-new-products-gradiet').removeClass('hide')    },300);

    // AUTO CLICK NewProdDot =========
    autoChangeActiveNewProdDot();
    // ===============================

    setTimeout(function(){   if($('body').hasClass('poppup')) showMainPopup()  }, 2000);
  });
}

//ABOUT
if(document.querySelector('body.about')){
  console.log('About page');

  var indicArrow = document.getElementById('indicator-arrow');
  var aboutPageLen = $($('#about-mood')[0]).offset().top;

  $('.indicator a').on('click', function(event){
    event.preventDefault();

    var durationScroll = Math.abs($(this.getAttribute('href')).offset().top) * 0.3;
    if(mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $(this.getAttribute('href')).offset().top, durationScroll/2, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
    }
    else{
      $('body').animate({ scrollTop: $(this.getAttribute('href')).offset().top }, durationScroll);
    }

  });


  $('.banner-cont-read a').on('click', function(event){
    event.preventDefault();
    var durationScroll = Math.abs($($(this.getAttribute('href'))[0]).offset().top) * 0.3;

    if(mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $(this.getAttribute('href')).offset().top - 100, durationScroll, function(){
        if (wavesBg_1) wavesBg_1.play();
      });
    }
    else{
      $('body').animate({ scrollTop: $(this.getAttribute('href')).offset().top - 100 }, durationScroll / 3);
    }
  });

  $(document).ready(function () {
    if(window.innerWidth > 1024){
      checkIndicators();

      setTimeout(function(){  $('#wrap-page-indicators.hide').removeClass('hide');  },700);
      setTimeout(function(){  $($('#about-history .wrap-banner-cont')[0]).addClass('show');  },500);
    }

    if(mainScroll)  scrollFunc();
  });

  var footerBeVis = false;

  function scrollFunc() {
    mainScroll.addListener(function(){

      var wrapImgUnderHistoryLeft = $('.wrap-img-under-history-left').offset().top - (window.innerHeight*0.77);
      var wrapTextUnderHistoryRight = $('.wrap-text-under-history-right').offset().top - (window.innerHeight*0.77);
      var wrapImgUnderHistoryRight = $('.wrap-img-under-history-right').offset().top - (window.innerHeight*0.77);
      var wrapTextUnderHistoryLeft = $('.wrap-text-under-history-left').offset().top - (window.innerHeight*0.8);


      var aboutPhilCont = $('#about-philosofhy .banner-center').offset().top - (window.innerHeight*0.55);
      var aboutMoodCont = $('#about-mood .banner-center').offset().top - (window.innerHeight*0.55);


      var itemOffsetAboutPhil = $('#about-philosofhy').offset().top - (window.innerHeight*0.1);
      var itemOffsetAboutMood = $('#about-mood').offset().top - (window.innerHeight*0.1);


      var wrap2ColUnderPhil = $('#wrap-2-col-under-phil').offset().top - (window.innerHeight*0.7);
      var itemOffsetAboutRomb = $('#about-romb').offset().top - (window.innerHeight*0.7);
      var itemOffsetMoodBig = $('#inner-mood-big').offset().top - (window.innerHeight*0.7);

      var colUnderMoodText = $('.col-under-mood-text').offset().top - (window.innerHeight*0.7);


      if(0 < itemOffsetAboutPhil){
        document.getElementById('wrapper-bg-philosofhy').style.opacity = (1200 - itemOffsetAboutPhil) / 730;  }
      else {
        document.getElementById('wrapper-bg-mood').style.opacity = (1200 - itemOffsetAboutMood) / 730;        }


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



      var notWaveToTop = false;
      if($('#about-history').offset().top - (window.innerHeight) > 0){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
        notWaveToTop = true;
      }
      if($('#about-philosofhy').offset().top - (window.innerHeight) < 0){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[1]);
        notWaveToTop = true;
      }
      if($('#about-mood').offset().top - (window.innerHeight) < 0){
        notWaveToTop = true;
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[2]);
      }
      if(!notWaveToTop){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
      }

      if(mainScroll.isVisible(document.querySelector('footer')) && !footerBeVis){
        $('#wrap-page-indicators').addClass('hide');;
        footerBeVis = true;
      }
      if(!mainScroll.isVisible(document.querySelector('footer')) && footerBeVis){
        $('#wrap-page-indicators.hide').removeClass('hide');
        footerBeVis = false;
      }

      checkIndicators();
    });
  }

  $(window).on('scroll', function(event){
    if(!mainScroll){
      var currScrolled = $(document).scrollTop();

      var heightVisHist = $('#about-history').offset().top + $('#about-history').height() - currScrolled;
      var heightVisPhil = $('#about-philosofhy').offset().top + $('#about-philosofhy').height() - currScrolled;
      var heightVisMood = $('#about-mood').offset().top + $('#about-mood').height() - currScrolled;



      var wrapImgUnderHistoryLeft = $('.wrap-img-under-history-left').offset().top - (window.innerHeight*0.7) - currScrolled;
      var wrapTextUnderHistoryRight = $('.wrap-text-under-history-right').offset().top - (window.innerHeight*0.7) - currScrolled;
      var wrapImgUnderHistoryRight = $('.wrap-img-under-history-right').offset().top - (window.innerHeight*0.7) - currScrolled;
      var wrapTextUnderHistoryLeft = $('.wrap-text-under-history-left').offset().top - (window.innerHeight*0.9) - currScrolled;

      var aboutPhilCont = $('#about-philosofhy .banner-center').offset().top - (window.innerHeight*0.7) - currScrolled;
      var aboutMoodCont = $('#about-mood .banner-center').offset().top - (window.innerHeight*0.7) - currScrolled;

      var itemOffsetAboutPhil = $('#about-philosofhy').offset().top - (window.innerHeight*0.1) - currScrolled;
      var itemOffsetAboutMood = $('#about-mood').offset().top - (window.innerHeight*0.1) - currScrolled;

      var wrap2ColUnderPhil = $('#wrap-2-col-under-phil').offset().top - (window.innerHeight*0.6) - currScrolled;
      var itemOffsetAboutRomb = $('#about-romb').offset().top - (window.innerHeight*0.7) - currScrolled;
      var itemOffsetMoodBig = $('#inner-mood-big').offset().top - (window.innerHeight*0.7) - currScrolled;


      // ==== PHIL ====
      var moodItem0 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(0)').offset().top - (window.innerHeight*0.7) - currScrolled;
      var moodItem1 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(1)').offset().top - (window.innerHeight*0.7) - currScrolled;
      var moodItem2 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(2)').offset().top - (window.innerHeight*0.7) - currScrolled;
      var moodItem3 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(3)').offset().top - (window.innerHeight*0.7) - currScrolled;
      var moodItem4 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(4)').offset().top - (window.innerHeight*0.7) - currScrolled;
      // ==============


      var colUnderMoodText = $($('.col-under-mood-text')[0]).offset().top - (window.innerHeight*0.7) - currScrolled;

      if(0 < itemOffsetAboutPhil){
        document.getElementById('wrapper-bg-philosofhy').style.opacity = (1200 - itemOffsetAboutPhil) / 730; }
      else{
        document.getElementById('wrapper-bg-mood').style.opacity = (1200 - itemOffsetAboutMood) / 730;  }

      if(0 > wrapImgUnderHistoryLeft) $('.wrap-img-under-history-left').addClass('show');
      if(0 > wrapTextUnderHistoryRight) $('.wrap-text-under-history-right').addClass('show');

      if(0 > aboutPhilCont) $('#about-philosofhy .wrap-banner-cont').addClass('show');
      if(0 > aboutMoodCont) $('#about-mood .wrap-banner-cont').addClass('show');

      if(0 > wrapImgUnderHistoryRight) $('.wrap-img-under-history-right').addClass('show');
      if(0 > wrapTextUnderHistoryLeft) $('.wrap-text-under-history-left').addClass('show');
      if(0 > wrap2ColUnderPhil)    $('#wrap-2-col-under-phil').addClass('show');
      if(0 > itemOffsetAboutRomb)  $('#about-romb').addClass('show');
      if(0 > itemOffsetMoodBig)    $('.mood-big').addClass('show');

      // ==== MOOD ====
      if(0 > moodItem0)   $('.wrap-images-under-mood .anim-img-corn-bg:eq(0)').addClass('show');
      if(0 > moodItem1)   $('.wrap-images-under-mood .anim-img-corn-bg:eq(1)').addClass('show');
      if(0 > moodItem2)   $('.wrap-images-under-mood .anim-img-corn-bg:eq(2)').addClass('show');
      if(0 > moodItem3)   $('.wrap-images-under-mood .anim-img-corn-bg:eq(3)').addClass('show');
      if(0 > moodItem4)   $('.wrap-images-under-mood .anim-img-corn-bg:eq(4)').addClass('show');
      // ==============

      if(0 > colUnderMoodText)     $('.col-under-mood-text').addClass('show');


      // ===
      if(heightVisHist > 0){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
      }
      if(heightVisHist < 0 && heightVisPhil > 0){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[1]);
      }
      if(heightVisPhil < 0 && heightVisMood > 0){
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[2]);
      }


      if(window.innerWidth > 1024)  checkIndicators();
    }
  });

  function checkIndicators(){
    if($('#about-philosofhy').offset().top - (window.innerHeight * 0.55) > 0) {
      if(!$('#indicator-1').hasClass('active')){
        $('.indicator.active').removeClass('active');
        $('#indicator-1').addClass('active');
      }
    }

    else if($('#about-mood').offset().top - (window.innerHeight * 0.55) > 0) {
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
    if(!inStartFooter && !scrolledBottom && mainScroll && mainScroll.directionY==-1) $('#wrap-page-indicators').removeClass('hide');
  }
}

//faq
if(document.querySelector('body.faq')){
  console.log('FAQ page');


  $(document).ready(function () {
    setTimeout(function(){  $($('.wrap-banner-cont')[0]).addClass('show');  },500);

    setQaBgWavePos();

    if(mainScroll)  scrollFunc();

    $('.ac-item.hide').each(function(key, el){
      var timeOStart = 800;
      var timeODelay = 300;
      var acElPos = $(el).offset().top - (window.innerHeight*1.5);
      if(0 > acElPos) {
        setTimeout(function(){   $(el).removeClass('hide');   }, timeOStart + timeODelay);
        timeOStart*=2;
      }
    });
  });


  $('.ac-item input[type=checkbox]').on('change', function(){
    if(mainScroll)  setTimeout(function(){ mainScroll.update(); }, 500);
  });


  $(window).on('scroll', function(event){
    if(!mainScroll){
      var currScrolled = $(document).scrollTop();
      var mainOffset = $('main').offset().top - currScrolled;

      var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1) - currScrolled;
      document.getElementById('wrapper-bg-faq').style.opacity = (1 - (1 / (lenFooterPath / -mainOffset)));



      $('.ac-item.hide').each(function(key, el){
        var acElPos = $(el).offset().top - (window.innerHeight*1.4) - currScrolled;

        if(0 > acElPos)  $(el).removeClass('hide');
      });

    }
  });


  function setQaBgWavePos() {
    $('.qa-item-wave-bg').each(function(key, el) {
      var posY = Math.random() * 100;
      var rotDeg = 270 * Math.random();
      $(el).css('background-position', '50% '+ posY+'%');
    })
  }


  function scrollFunc() {
    mainScroll.addListener(function(){
      $('.ac-item.hide').each(function(key, el){
        var acElPos = $(el).offset().top - (window.innerHeight*1.4);

        if(0 > acElPos)  el.classList.remove('hide');
      });


      var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1);
      document.getElementById('wrapper-bg-faq').style.opacity = -(1200 - lenFooterPath) / 730;
    })
  }

}

//news
if(document.querySelector('body.news')){

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

    if(mainScroll)  scrollFunc();


    var newsTypeList = $('#wrap-news-type');
    newsTypeList.find('.curr-news-type').text( newsTypeList.find('ul.news-types-list li.active a').text() );
  });


  function scrollFunc() {
    mainScroll.addListener(function(){
      var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1);
      document.getElementById('wrapper-bg-news').style.opacity = -(1200 - lenFooterPath) / 730;
    })
  }


  $(window).on('scroll', function(event){
    if(!mainScroll){
      var currScrolled = $(document).scrollTop();

      var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1) - currScrolled;
      document.getElementById('wrapper-bg-news').style.opacity = -(1200 - lenFooterPath) / 730;
    }
  });


  function initNewsGrid() {
    newsItems = $('#news-list .news-item');

    for(var i=0;i<numbCol;i++){
      $("#news-list").append("<div class='news-col'></div>");
    }

    newsItems.each(function(key, el) {
      $(".news-col").eq(key%numbCol).append(el);
    });

    $('.news-col').each(function() {
      var $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
    });

    if(mainScroll)  mainScroll.update();
  }

  $('.news-item a').on('click', function(e){
    e.preventDefault();


    zcScroll = Scrollbar.init(document.getElementById('zones-mobal'),{  damping: 0.2  });
    zcScroll.setPosition(0,0);

    $('#zones-mobal').removeClass('hide').addClass('show');
    $('body').toggleClass('overfl-h');
  });
}

//zone-col
if(document.querySelector('body.zone-col')){
  console.log('zol-col page');

  var zcScroll;
  var zcModalSwip;
  var lenFooterPath;

  $(document).ready(function () {
    setTimeout(function(){  $($('.wrap-banner-cont')[0]).addClass('show');  },500);
    setTimeout(function(){  $($('.zon-col-list')[0]).addClass('show');      },1300);

    lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight);


    // if(mainScroll) {
    // mainScroll.destroy();
    // zcScroll = Scrollbar.init(document.getElementById('zones-mobal'),{
    //     damping: 0.23,
    // });
    // zcScroll = new IScroll('.wrapper-zone-col-modal', {
    //   probeType: 3,
    //   scrollbars: true,
    //   mouseWheel: true,
    //   scrollX: false,
    //   interactiveScrollbars: true,
    //   shrinkScrollbars: 'scale',
    //   disablePointer: true, // important to disable the pointer events that causes the issues
    //   disableTouch: false, // false if you want the slider to be usable with touch devices
    //   disableMouse: true // false if you want the slider to be usable with a mouse (desktop)
    // });
    // }

    setBgSvgPos();

    if(mainScroll)  scrollFunc();
  });


  function setBgSvgPos() {
    $('.img-back svg').each(function(key, el) {
      var posX = Math.random() * (70 - 20) + 20;
      var posY = Math.random() * (70 - 20) + 20;
      var rotDeg = 270 * Math.random();
      $(el).css('transform', 'scale(0.7) translate(-'+posX+'%,-'+posY+'%) rotate('+rotDeg+'deg)');
    })
  }



  $(window).on('resize', function(){
    var mainOffset = $($('main')[0]).offset().top;
    lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight);

    document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
  });



  function scrollFunc() {
    mainScroll.addListener(function(){
      var mainOffset = $($('main')[0]).offset().top;

      document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
    })
  }

  $(window).on('scroll', function(event){
    if(!mainScroll){
      var currScrolled = $(document).scrollTop();
      var mainOffset = $($('main')[0]).offset().top - currScrolled;

      document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
    }
  });

  $('.item-coll.to_modal a').on('click', function(event){
    // event.preventDefault();

    $('#zones-mobal').removeClass('hide').addClass('show');
    $('body').toggleClass('overfl-h');


    // if(zcScroll) zcScroll.destroy();
    zcScroll = Scrollbar.init(document.getElementById('zones-mobal'),{  damping: 0.2  });
    zcScroll.setPosition(0,0);
    zcModalSwip && zcModalSwip.destroy();
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
  });
}

//catalogue
if(document.querySelector('body.catalogue')){
  console.log('Catalogue page');

  $(document).ready(function () {
    setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
    setTimeout(function(){   $('.wrap-catal.hide').removeClass('hide')   }, 500);
    setTimeout(function(){   if(mainScroll) mainScroll.update();   }, 100);

    if(window.innerWidth > 1024){
      var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
      $('.zon-col-list-catal').hide();
      $('.zon-col-list-catal.'+activeZonColList).show()
    }
  });


  $('.catal-filter-head').on('click', function(){
    var catalSide = $(this).closest('.catal-side');
    var filterHeadHeight = 85;
    if(window.innerWidth <= 640)  filterHeadHeight = 55;

    if(catalSide.hasClass('relative')){
      catalSide.attr('data-prevTop', catalSide.offset().top - $(document).scrollTop())
        .css('top', catalSide.offset().top - $(document).scrollTop())
        .toggleClass('pos-fix-fltr relative');

      catalSide.animate({
        top: 0,
        height: '100%'
      }, 400);
    }
    else{
      catalSide.animate({
        top: catalSide.attr('data-prevTop'),
        height: filterHeadHeight,
      }, {
        duration: 400,
        complete: function(){
          catalSide.toggleClass('pos-fix-fltr relative').css('top', 0);
        }
      });
    }

    $(document.body).toggleClass('overfl-h');
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
      if(mainScroll) setTimeout(function(){ mainScroll.update(); }, 1000);
    }
  });

  $('ul.catal-perc li').on('click', function(e){
    if($(this).hasClass('active'))  return;

    $(this).siblings('.active').removeClass('active');
    this.className += ' active';
  });

  //  Pagination ======
  $('ul.list-pagination li').on('click', function(e){
    if($(this).hasClass('active'))  return;

    $(this).siblings('.active').removeClass('active');
    this.className += ' active';
  });
  //  END PAgination ===
}

//contacts
if(document.querySelector('body.contacts')){
  console.log('Contacts page');

  $(document).ready(function () {
    setTimeout(function(){   $($('#cont-text-r-t')[0]).addClass('show');   }, 1000);
    setTimeout(function(){   $($('#wrap-cont-map')[0]).addClass('show');   }, 1600);
    setTimeout(function(){ initMap() }, 1200);

    if(mainScroll)  scrollFunc();
  });


  $(window).on('scroll', function(){
    if(!mainScroll){
      var currScrolled = $(document).scrollTop();
      var mainOffset = $('main').offset().top - currScrolled;
      var lenFooterPath = $('footer').offset().top - (window.innerHeight);

      var wrapFormMail= $('#form-mail').offset().top - (window.innerHeight*0.7) - currScrolled;
      var itemAnimContBot= $('.cont-bot .anim-img-corn-bg').offset().top - (window.innerHeight*0.7) - currScrolled;


      if(0 > wrapFormMail)    $('#form-mail').addClass('show');
      if(0 > itemAnimContBot) $('.cont-bot .anim-img-corn-bg').addClass('show');

      document.getElementById('wrapper-bg-contacts').style.opacity = (0.55 - (1 / (lenFooterPath / -mainOffset))) / 0.55; // 0.55 only for contacts bg
    }
  });


  function scrollFunc() {
    mainScroll.addListener(function(){

      var wrapContMap= $('#wrap-cont-map').offset().top - (window.innerHeight*0.7);
      var wrapImgContRightBot= $('.wrap-img-cont-r-b').offset().top - (window.innerHeight*0.7);
      var wrapImgContBot= $('.wrap-cont-b').offset().top - (window.innerHeight*0.7);
      // var wrapContTextRightTop= $('#cont-text-r-t').offset().top - (window.innerHeight*0.7);
      var wrapFormMail= $('#form-mail').offset().top - (window.innerHeight*0.7);



      if(0 > wrapContMap) $('.wrap-cont-map').addClass('show');
      if(0 > wrapImgContRightBot) $('.wrap-img-cont-r-b').addClass('show');
      if(0 > wrapImgContBot) $('.wrap-cont-b').addClass('show');
      // if(0 > wrapContTextRightTop) $('#cont-text-r-t').addClass('show');
      if(0 > wrapFormMail) $('#form-mail').addClass('show');



      var lenFooterPath = $('footer').offset().top - (window.innerHeight*0.1);

      document.getElementById('wrapper-bg-contacts').style.opacity = -(1700 - lenFooterPath) / 100 / 6;
    })
  }


  function initMap() {
    var maxZoom = 5;
    var centerMap = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      minZoom: 2,
      center: centerMap,
      disableDefaultUI: true,
      styles: [
        {
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "saturation": 36
            },
            {
              "color": "#000000"
            },
            {
              "lightness": 40
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "visibility": "on"
            },
            {
              "color": "#000000"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            },
            {
              "weight": 1.2
            }
          ]
        },
        {
          "featureType": "landscape",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 21
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 29
            },
            {
              "weight": 0.2
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 18
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 19
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            }
          ]
        }
      ],
    });

    var marker = new google.maps.Marker({
      position: centerMap,
      icon: '../images/marker.png',
      map: map
    });
  }
}

//pres-design
if(document.querySelector('body.press-design')){
  console.log('pres-design page');

  $(document).ready(function(){
    var swiperPresDesKitg = new Swiper('.wrap-swiper-press_design', {
      slidesPerView: 1,
      centeredSlides: true,
      speed: 700,
      spaceBetween: 240,
      followFinger: false,
      simulateTouch: false,
      autoHeight: true,
      effect: "coverflow",
      coverflow: { slideShadows : false },
      prevButton: '.item-log_reg-toggle.log',
      nextButton: '.item-log_reg-toggle.reg',
    });

    setTimeout(function(){ $('.pres-des-conteiner').removeClass('hide') }, 500);
  });

  $('.table-press-design .td span.wrap-for_arrow').on('click', function(e){
    var keySort = $(this).closest('.td').attr('data-keySort');
    var neadSort = false;


    var presDesData = $(this).closest('.table-press-design').find('.tr.data');


    presDesData.sortDomElements(function(a,b){
      var akey = $(a).attr(keySort);
      var bkey = $(b).attr(keySort);
      if (akey == bkey) return 0;
      if (akey < bkey) return -1;
      if (akey > bkey) { neadSort=true; return 1; }
    });


    $(this).closest('.thead-press-design').find('span.wrap-for_arrow').removeClass('down up');


    if(!neadSort){
      presDesData.sortDomElements(function(b,a){
        var akey = $(a).attr(keySort);
        var bkey = $(b).attr(keySort);
        if (akey == bkey) return 0;
        if (akey < bkey) return -1;
        if (akey > bkey) return 1;
      });

      $(this).removeClass('up').addClass('down');
    } else  $(this).removeClass('down').addClass('up');


    // console.log(neadSort, keySort, prevSortArrow);


    presDesData.each(function(key, el){   $(el).find('.numb').text(key+1)  });
  });
}

//privacy-policy
if(document.querySelector('body.privacy-policy')){
  console.log('privacy-policy page');

  $(document).ready(function () {
    setTimeout(function(){   $('.wrap-privacy-policy.hide').removeClass('hide')   }, 300);
  });
}

//finish-tissue
if(document.querySelector('body.finish-tissue')){
  console.log('finish-tissue page');

  var swiperFinTis;

  $(document).ready(function () {
    setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
    setTimeout(function(){   $('.wrap-catal.hide').removeClass('hide')   }, 500);
    setTimeout(function(){   if(mainScroll) mainScroll.update();   }, 100);

    if(window.innerWidth > 1024){
      var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
      $('.zon-col-list-catal').hide();
      $('.zon-col-list-catal.'+activeZonColList).show()
    }

    swiperFinTis = new Swiper('.catal-content-inner', {
      slidesPerView: 1,
      speed: 700,
      followFinger: false,
      simulateTouch: false,
      autoHeight: true,
      effect: "fade",
    });

    $('.zon-col-side-toggle a.arr-fin_tis').on('click', function(event){
      event.preventDefault();

      if($(this).hasClass('fin')) swiperFinTis.slidePrev();
      if($(this).hasClass('tis')) swiperFinTis.slideNext();
    });
  });


  $('.catal-filter-head').on('click', function(){
    var catalSide = $(this).closest('.catal-side');
    var filterHeadHeight = 85;
    if(window.innerWidth <= 640)  filterHeadHeight = 55;

    if(catalSide.hasClass('relative')){
      catalSide.attr('data-prevTop', catalSide.offset().top - $(document).scrollTop())
        .css('top', catalSide.offset().top - $(document).scrollTop())
        .toggleClass('pos-fix-fltr relative');

      catalSide.animate({
        top: 0,
        height: '100%'
      }, 400);
    }
    else{
      catalSide.animate({
        top: catalSide.attr('data-prevTop'),
        height: filterHeadHeight,
      }, {
        duration: 400,
        complete: function(){
          catalSide.toggleClass('pos-fix-fltr relative').css('top', 0);
        }
      });
    }

    $(document.body).toggleClass('overfl-h');
  });


  $('.disactive-item').on('click', function(){
    $(this).closest('.active').removeClass('active')
  });


  $('ul.zon-col-list-catal li a').on('click', function(e){
    e.preventDefault();

    var offsetEl = $(this.getAttribute('href')).offset().top;

    if(mainScroll)  mainScroll.scrollTo(0, offsetEl-50+mainScroll.offset.y, offsetEl/2);
    else  $('html, body').animate({   scrollTop: offsetEl-50   }, offsetEl/2);
  });


  //'.zon-col-side-toggle a:not(.active)'
  $('.zon-col-side-toggle a').on('click', function(e){
    e.preventDefault();

    if(!$(this).hasClass('active')){
      $('.zon-col-side-toggle a').toggleClass('active');
      $('.zon-col-list-catal').toggle(700);
      if(mainScroll) setTimeout(function(){ mainScroll.update(); }, 1000);
    }
  });
}

//profile
if(document.querySelector('body.profile')){
  console.log('Profile page');

  var swiperProfile;

  $(document).ready(function () {
    setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
    setTimeout(function(){   $('.wrap-catal.hide').removeClass('hide')   }, 500);
    setTimeout(function(){   if(mainScroll) mainScroll.update();   }, 100);

    if(window.innerWidth > 1024){
      var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
      $('.zon-col-list-catal').hide();
      $('.zon-col-list-catal.'+activeZonColList).show()
    }

    swiperProfile = new Swiper('.wrap-profile-swiper', {
      slidesPerView: 1,
      centeredSlides: true,
      speed: 700,
      spaceBetween: 240,
      followFinger: false,
      simulateTouch: false,
      // autoHeight: true,
      effect: "coverflow",
      coverflow: { slideShadows : false },
      prevButton: '.item-log_reg-toggle.log',
      nextButton: '.item-log_reg-toggle.reg',
    });
  });

  $('.row-short-data').on('click', function(event){
    $(this).closest('.row-order_list').toggleClass('close open');

    // var self = this;
    // var prevH;
    // var int = setInterval(function(){
    //   console.log(prevH, $(self).closest('.row-order_list').height());
    //
    //   if(prevH != $(self).closest('.row-order_list').height()){
    //     swiperProfile.update();
    //     prevH = $(self).closest('.row-order_list').height();
    //   }
    //   else clearInterval(int);
    // }, 50);
    // swiperProfile.update();
    // setTimeout(function(){
    //   swiperProfile.update();
    // //   console.log(123)
    // //   swiperProfile.update();
    // //   // swiperProfile.updateContainerSize();
    // }, 300)

  })
}

//stash
if(document.querySelector('body.stash')){
  console.log('stash page');

  $(document).ready(function () {
    setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
    setTimeout(function(){   $('.wrap-catal.hide').removeClass('hide')   }, 500);
    setTimeout(function(){   if(mainScroll) mainScroll.update();   }, 100);
  });


  $('#order-now').on('click', function(e){
    $('#modal-order').removeClass('hide').addClass('show');
    $(document.body).addClass('overfl-h');
  });


  $('.kick-ord_it').on('click', function(e){
    var itemStash = $(this).closest('.item-detail-order-data-wrap_anim');
    var priceid = $(this).attr('data-priceid');
    alert(priceid);
    basket.remove(priceid);
    itemStash.addClass('remove');

    setTimeout(function(e){   itemStash.remove()  }, 600);
  });


  $('.calc_it').on('click', function(e){
    if($(this).hasClass('disabled'))  return;

    var itemNumbValEl = $(this).siblings(".ord_it-numb-val");
    var priceOfItem = $(this).parents('.wrap-calc_price').find(".ord_it-price").find('span');
    var price_id = $(this).siblings(".ord_it-numb-val").attr('data-priceid') || false;
    var price = $(this).siblings(".ord_it-numb-val").attr('data-price') || false;
    var total = 0;


    var plusVal = 1;
    itemNumbValEl.removeClass('plus minus');
    if($(this).hasClass('minus')) {
      plusVal = -1;
      setTimeout(function(){   itemNumbValEl.addClass('minus')   },1);
    } else{
      setTimeout(function(){   itemNumbValEl.addClass('plus')   },1);
    }
    var totalCnt = +itemNumbValEl.text()+plusVal;

    if(price_id){
      console.log('basket.update',price_id,totalCnt);
      basket.update(price_id,totalCnt);
    }

    if(price){
      total = parseFloat(price)*parseFloat(totalCnt);
    }
    itemNumbValEl.text(totalCnt);
    console.log('priceOfItem');
    console.log(priceOfItem);
    priceOfItem.text(total);

    var btnMinus = $(this).closest(".ord_it-numb").find('.calc_it.minus');

    if(+itemNumbValEl.text() <= 1)   btnMinus.addClass('disabled');
    else                             btnMinus.removeClass("disabled");
  });


  // CLOSE MODAL ORDER
  $(document).on('click', '#modal-order', function(event) {
    if (!$(event.target).closest('.inner-zone-col-modal').length) {
      $('#modal-order').toggleClass('hide show');
      $('body').toggleClass('overfl-h');
    }
  });


  $('#order-in_stash').on('click', function(e){
    e.preventDefault();

    $('#modal-order').toggleClass('hide show');
    $('#modal-thank_you').removeClass('hide').addClass('show');
    $('body').addClass('overfl-h');
  });

  $('#ty-ok').on('click', function(e){
    e.preventDefault();

    $('#modal-thank_you').toggleClass('hide show');
    $('body').toggleClass('overfl-h');
  });
}

//showrooms
if(document.querySelector('body.showrooms')){
  console.log('showrooms page');

  $('.item-dealers').addClass('hide');

  var show_RSwip;
  var newsItems = [];
  var numbCol = 1;

  var rombData = {};

  var dealersList = document.getElementById('dealers-list');
  var carouselShowR = document.getElementById('carousel-show_r');

  rombData.wrap = document.getElementById('about-romb');
  rombData.rombRight = document.querySelector('#about-romb .romb-right');
  rombData.rombLeft  = document.querySelector('#about-romb .romb-left');

  var mainShowR = document.getElementById('main-show_r');

  if(window.innerWidth > 1024) numbCol = 4;
  else if(window.innerWidth > 640)  numbCol = 2;

  $(window).on({
    'resize': function(){
      if(window.innerWidth > 1024){
        if(numbCol != 3){ numbCol = 4; initDealersGrid();}
      }
      else if(window.innerWidth > 640){
        if(numbCol != 2){ numbCol = 2; initDealersGrid();}
      }
      else { numbCol = 1; initDealersGrid(); }
    },
    'scroll': function(){
      if(!mainScroll){
        var currScrolled = $(document).scrollTop();
        var mainOffset = $('#about-romb').offset().top - currScrolled - window.innerHeight*0.85;

        // DEALER LIST =========
        $('.item-dealers.hide').each(function(){
          var thisOffset = $(this).offset().top - currScrolled - window.innerHeight*0.85;
          if(thisOffset < 0) $(this).removeClass('hide');
        });
        // END DEALER LIST =========



        // ROMB =========
        var percentRombScroll = 1-($(rombData.wrap).offset().top - currScrolled) / window.innerHeight;
        if(percentRombScroll > 1) percentRombScroll = 1;
        var translateVal = 20*percentRombScroll;


        $('.freedom-under-phil-text').css('opacity', (percentRombScroll-0.3)*2.1);
        rombData.wrap.style.transform = "rotate(45deg) scale("+ (0.7 + 0.3 * percentRombScroll) +")";
        rombData.rombRight.style.transform = "translate("+ (-translateVal) +"px,"+ ( translateVal) +"px)";
        rombData.rombLeft.style.transform  = "translate("+ ( translateVal) +"px,"+ (-translateVal) +"px)";
        //END  ROMB =========


        // mainShowR =======
        var mainShowROffset = $(mainShowR).offset().top - currScrolled - window.innerHeight + $(mainShowR).find('.phil-left').height()*0.5;
        if(mainShowROffset < 0){ $(mainShowR).addClass("show") }

        var mainShowRTextOffset = $(mainShowR).find('.phil-right').offset().top - currScrolled - window.innerHeight;
        if(mainShowRTextOffset < 0){ $(mainShowR).find('.phil-right').addClass('show') }
        // END mainShowR ======
      }
    }
  });

  $(document).ready(function () {

    initDealersGrid();

    setTimeout(function(){   $('.small-page-title.hide').removeClass('hide')   }, 300);
    setTimeout(function(){   $('section#dealers').removeClass('hide')   }, 800);
    setTimeout(function(){   if(mainScroll) mainScroll.update()   }, 100);

    if(mainScroll) scrollFunc();
    else{
      // DEALER LIST =========
      $('.item-dealers.hide').each(function(){
        var thisOffset = $(this).offset().top - $(document).scrollTop() - window.innerHeight*0.85;
        if(thisOffset < 0) $(this).removeClass('hide');
      });
      // END DEALER LIST =========
    }


    show_RSwip && show_RSwip.destroy();
    show_RSwip = new Swiper('.wrap-carousel-show_r', {
      slidesPerView: 1.6,
      loopAdditionalSlides: 2,
      centeredSlides: true,
      speed: 700,
      autoHeight: true,
      // autoplay: 4000,
      spaceBetween: 0,
      loop: true,
      // effect: "coverflow",
      coverflow: { slideShadows : false },
      onInit: function(swiper){
        $(carouselShowR).find('.show_r-slide.swiper-slide-active')
      },
    });
  });

  $(document).on('click', '.show_r-slide', function(event){
    if($(event.target).closest('.show_r-slide').hasClass('swiper-slide-prev'))  show_RSwip.slidePrev();
    if($(event.target).closest('.show_r-slide').hasClass('swiper-slide-next'))  show_RSwip.slideNext();
  });


  var newsTypeList = $('#wrap-letter-list');
  newsTypeList.find('.curr-news-type').text( newsTypeList.find('ul.news-types-list li.active a').text() );

  var checkShow = true;
  function scrollFunc() {
    mainScroll.addListener(function(){

      // DEALER LIST =========
      if(mainScroll.isVisible( dealersList )){
        var percentRombScroll = (-($(rombData.wrap).offset().top - window.innerHeight) / window.innerHeight);
        var translateVal = 30*percentRombScroll;


        if(checkShow){
          checkShow = false;
          $('.dealers-col').each(function(key){
            $(this).find('.item-dealers.hide:eq(0)').removeClass('hide');
          });
        }

        setTimeout(function(){  checkShow = true  }, 600);
      }
      // END DEALER LIST =========


      // carouselShowR =======
      if(mainScroll.isVisible( carouselShowR )){
        // var pxVisibledSwiper = -($(carouselShowR).offset().top - window.innerHeight);
        // var dispUpperSwiper = (pxVisibledSwiper < $(carouselShowR).height()*20/100);
        // var dispUnderSwiper = (pxVisibledSwiper > $(carouselShowR).height()*80/100+window.innerHeight);
        // if(dispUpperSwiper || dispUnderSwiper)   $(carouselShowR).addClass('hide');
        // else $(carouselShowR).removeClass('hide');
      }
      // END carouselShowR ======


      // ROMB =========
      if(mainScroll.isVisible( rombData.wrap )){
        var percentRombScroll = (-($(rombData.wrap).offset().top - window.innerHeight) / window.innerHeight);
        if(percentRombScroll > 1) percentRombScroll = 1;
        var translateVal = 30*percentRombScroll;


        $('.freedom-under-phil-text').css('opacity', (percentRombScroll-0.3)*2.1);
        rombData.wrap.style.transform = "rotate(45deg) scale("+ (0.7 + 0.3 * percentRombScroll) +")";
        rombData.rombRight.style.transform = "translate("+ (-translateVal) +"px,"+ ( translateVal) +"px)";
        rombData.rombLeft.style.transform  = "translate("+ ( translateVal) +"px,"+ (-translateVal) +"px)";
      }
      // END ROMB =========


      // mainShowR =======
      if(mainScroll.isVisible( mainShowR )){
        var pxVisMainShowR = -($(mainShowR).offset().top - window.innerHeight);
        var dispUpperSwiper = (pxVisMainShowR > $(mainShowR).height()*40/100);

        if(dispUpperSwiper)  {
          $(mainShowR).addClass("show");
          $(mainShowR).find('.phil-right').addClass('show');
        }
      }
      // END mainShowR ======
    })
  }

  $('#to-cont_main').on('click', function(){
    var durationScroll = Math.abs($('#main-show_r').offset().top) * 1;

    if(mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $('#main-show_r').offset().top - 100, durationScroll, function(){
        if(wavesBg_1) wavesBg_1.play();
      });
    }
    else{
      $('body').animate({ scrollTop: $('#main-show_r').offset().top - 100 }, durationScroll / 3);
    }
  });

  function initDealersGrid(){
    newsItems = $('#dealers-list .item-dealers');

    for(var i=0;i<numbCol;i++){
      $("#dealers-list").append("<div class='dealers-col'></div>");
    }

    newsItems.each(function(key, el) {
      $(".dealers-col").eq(key%numbCol).append(el);
    });

    $('.dealers-col').each(function() {
      var $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
    });

    if(mainScroll)  mainScroll.update();
  }
}


var swiperCard = [];
var swiperDim = [];
var swiperCardBig;
var swiperCurrDimVal = [];
var typeDim = 0;
var currActiveCardItem;

//card
if(document.querySelector('body.card')){
  zcScroll = Scrollbar.init(document.getElementById('zones-mobal'),{  damping: 0.2  });
  zcScroll.setPosition(0,0);

  $(document).ready(function(){
    $('.card_item-params').each(function(){
      var newListValue = $(this).find('ul.wrap-dimensions-values>li.active  ul.dimensions-values-item>li');

      $(this).find('ul.curr_dimensions_values li').each(function(key){
        // console.log(this)
        $(this).text($(newListValue[key]).text());
      });
    });
  });

  $(window).on('resize', function(){
    cardModalSwip.forEach(function(el){   el.updateContainerSize()  });
  });


  $('.wrap-curr_dim_val-swiper').each(function(key){
    swiperCurrDimVal[key] = new Swiper(this, {
      slidesPerView: 1,
      centeredSlides: true,
      speed: 700,
      followFinger: false,
      simulateTouch: false,
      longSwipes: false,
      shortSwipes: false,
      effect: "fade",
    });
  });


  var cardModalSwip = [];
  $('.wrap-carousel-card').each(function(key){
    cardModalSwip[key] && cardModalSwip[key].destroy();
    cardModalSwip[key] = new Swiper (this, {
      slidesPerView: 1.25,
      loopAdditionalSlides: 3,
      centeredSlides: true,
      speed: 700,
      nested: true,
      spaceBetween: 0,
      loop: true,
    });

    $(document).on('click', '.card-modal-slide', function(event){
      var indexOuterSwiper = $('.wrap-bigest-swiper .outer-slide.swiper-slide-active').index();
      if($(event.target).closest('.card-modal-slide').hasClass('swiper-slide-prev'))  cardModalSwip[indexOuterSwiper].slidePrev();
      if($(event.target).closest('.card-modal-slide').hasClass('swiper-slide-next'))  cardModalSwip[indexOuterSwiper].slideNext();
    });
  });

  $('#zones-mobal').removeClass('hide').addClass('show');
  $('body').toggleClass('overfl-h');


  //  =====
  swiperCard[0] = new Swiper('.wrap-bigest-swiper',{
    slidesPerView: 1,
    speed: 700,
    initialSlide: $('ul.card-varians-list >li.active').attr('data-photo'),
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    spaceBetween: 0,
    effect: "fade",
    fade:{ crossFade: false }
  });

  swiperCard[1] = new Swiper('.wrap-swiper-related',{
    slidesPerView: 1,
    speed: 700,
    initialSlide: $('ul.card-varians-list >li.active').attr('data-photo'),
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    longSwipes: false,
    shortSwipes: false,
    spaceBetween: 0,
  });

  swiperDim = new Swiper('.wrap-dim-swiper',{
    slidesPerView: 1,
    speed: 700,
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    spaceBetween: 0,
    effect: 'fade',
    cube: {
      slideShadows: false,
      shadow: false,
      shadowOffset: 20,
      shadowScale: 0.94
    }
  });

  swiperCardBig = new Swiper('.wrap-card-params-right',{
    slidesPerView: 1,
    initialSlide: 1,
    speed: 700,
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    longSwipes: false,
    shortSwipes: false,
    effect: 'fade',
    onInit: function(swiper){
      currActiveCardItem = $('.wrap-card-params-right .card_item-params.swiper-slide-active');
      setTimeout(function(){   swiper.update()   }, 100);
    }
  });
  //  =====
}


$(document).on('submit', 'form.callback', function(e){
  e.preventDefault();

  $('#modal-thank_you-message').removeClass('hide').addClass('show');
  $('body').addClass('overfl-h');
});

function showMainPopup() {
  $('#index-popup').addClass('show');
  $('body').toggleClass('overfl-h');
}

function initShowRMap(){
  // var maxZoom = 5;
  var centerMap = {lat: 44, lng: 13};
  var map = new google.maps.Map(document.getElementById('wrap-banner-img-box'), {
    zoom: 4,
    minZoom: 2,
    center: centerMap,
    disableDefaultUI: true,
    styles: [
      {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "saturation": 36
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 40
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "visibility": "on"
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 50
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          },
          {
            "weight": 1.2
          }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 21
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      },
      {
        "featureType": "road",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      }
    ],
    scrollwheel: false,
    // navigationControl: false,
    // mapTypeControl: false,
    // scaleControl: false,
    // draggable: false,
  });

  var markersPos = [
    {lat: 42, lng: 12},       //Italy
    {lat: 50.46, lng: 30.52}, //Kyiv
    {lat: 40.36, lng: 47.1},  //Azerbaijan
    {lat: 47.32, lng: 58.44}, //Kazakstan
  ];


  for(var posM=0; markersPos.length > posM; posM++ ){
    new google.maps.Marker({
      position: markersPos[posM],
      icon: '../images/marker-s_r.png',
      map: map
    });
  }

  google.maps.event.addListenerOnce(map, 'idle', function(){
    $('#banner').removeClass('hide');
  });
}

$('form').on('submit', function(e){
  e.preventDefault();

  var isValid = true;

  $(this).find('input').each(function(key){
    if(this.value == ''){  $(this).addClass('input-error'); isValid = false;  }
    // if(this.getAttribute('type') == 'email' && !validateEmail(this.value)) $(this).addClass('input-error');
  });


  // document.querySelector('.input-error').focus();
  if(isValid){
    if($(this).hasClass('form-submit')){
      $('#modal-thank_you-subs').removeClass('hide').addClass('show');
      $('body').addClass('overfl-h');
    }
  }
});

$('input').on('keyup', function(){
  $(this).removeClass('input-error');
});

$('input').on('blur', function(){
  if(!$(this).hasClass('input-error'))  return;

  $('.input-error').removeClass('input-error');
});



$('ul.card-varians-list >li').on('click', function(e){
  if($(this).hasClass('active'))  return;

  var indexCurr = $('ul.card-varians-list li.active').index();
  var indexNew  = $(this).index();
  var curPhotoId = $('ul.card-varians-list li.active').attr('data-photo');
  var newPhotoId = $(this).attr('data-photo');
  var curChildId = $(" ul.wrap-dimensions-values >li.active").attr('data-child');



  $('ul.card-varians-list li').eq(indexCurr).removeClass('active');
  $('ul.card-varians-list li').eq(indexNew).addClass('active');

  $('.wrap-card-view .wrap-curr-card-view').eq(indexCurr).toggleClass('hide show');
  $('.wrap-card-view .wrap-curr-card-view').eq(indexNew).toggleClass('hide show');

  // slide all swipers =========
  $(".wrap-swiper-card_price .wrap-card-price").removeClass('active');
  $(".wrap-swiper-card_price .wrap-card-price[data-photo='"+ newPhotoId +"'][data-child='"+ curChildId +"']").addClass('active');



  var idCartSlide = $(".card_item-params[data-photo='"+ newPhotoId +"'][data-child='"+ curChildId +"']").index();


  swiperCard.forEach(function(el){  el.slideTo(newPhotoId)  });
  swiperCardBig.slideTo(idCartSlide);
  //  ===========================
});

$('ul.wrap-dimensions-values >li').on('click', function(){
  if($(this).hasClass('active'))  return;


  var indexCurr = $(this).closest('.swiper-slide.card_item-params').find('ul.wrap-dimensions-values >li.active').attr('data-child');
  var indexNew  = $(this).attr('data-child');
  var curPhotoId = $("ul.card-varians-list li.active").attr('data-photo');

  // $("ul.wrap-dimensions-values >li.active").removeClass('active');
  // $("ul.wrap-dimensions-values >li[data-child='"+ indexNew +"']").addClass('active');

  $(this).siblings('li.active').removeClass('active');
  $(this).addClass('active');

  console.log(indexNew, curPhotoId)


  $(".wrap-swiper-card_price .wrap-card-price").removeClass('active');
  $(".wrap-swiper-card_price .wrap-card-price[data-photo='"+ curPhotoId +"'][data-child='"+ indexNew +"']").addClass('active');



  var idCartSlide = $(".card_item-params[data-photo='"+ curPhotoId +"'][data-child='"+ indexNew +"']").index();

  swiperCardBig.slideTo(idCartSlide);
});


$('.toggle-cent_inch .toggle-inner-length').on('click', function(e){
  if($(this).hasClass('active'))  return;

  $(this).siblings('.toggle-inner-length.active').removeClass('active');
  this.className += ' active';

  if($(this).index() == 0){
    swiperDim.forEach(function(el){  el.slidePrev()  });
    typeDim = 0;
    swiperCurrDimVal.forEach(function(el){  el.slidePrev()  });
  }
  else{
    swiperDim.forEach(function(el){  el.slideNext()  });
    typeDim = 1;
    swiperCurrDimVal.forEach(function(el){  el.slideNext()  });
  }

  $('.toggle-inner-length').removeClass('active');

  var self = this;
  $('.toggle-cent_inch').each(function(){
    $(this).find('.toggle-inner-length').eq($(self).index()).addClass('active');
  });
});


// CLOSE MODALS
$(document).on('click', '.zone-col-modal, .close-modal', function(event) {
  var isModalSider = !$(event.target).closest('.inner-zone-col-modal').length;

  if(isModalSider || $(event.target).hasClass('btn-close-modal')) {
    $(this).removeClass('show').addClass('hide');
    $('body').removeClass('overfl-h');


    // RESET AND CLEAR FORM DATA =========
    var self = this;

    setTimeout(function(){
      $(self).find('form').each(function(){
        this.reset();
        $(this).find('input.input-error').removeClass('input-error');
      });
    }, 500);
    //END RESET AND CLEAR FORM DATA =========
  }
});

window.onload = function(){
  $('.item-fin_tis').each(function(key){
    var self = this;
    setTimeout(function(){   self.classList.remove('hide')    }, 700+100*key);
  });
}

function platformDef() {

  // vars to identify the platform
  var hl = $('html'),
    ua = navigator.userAgent;

  // desktop platform
  if (ua.search(/Trident/) > -1 || ua.search(/MSIE/) > -1) {
    hl.addClass('ie');
    return false;
  }

  // mobile platform
  if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(ua) ||
    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(ua.substr(0, 4))) {
    hl.addClass('mobile-platform');
    return true;
  }
}

function hideTopMenu(){
  $('header').removeClass('show-top-menu');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  document.getElementById('top-menu').style.height = 0;
}

function hideLeftMenu(){
  $('.nav-icon').removeClass('open');
  $('.wrap-left-nav').removeClass('show');
  $('header').removeClass('show-left-menu');
  $(document.body).toggleClass('overfl-h');
}

function blendModeDef() {
  /*! modernizr 3.5.0 (Custom Build) | MIT *
   * https://modernizr.com/download/?-backgroundblendmode-setclasses !*/
  !function (e, n, t) {
    function r(e, n) {
      return typeof e === n
    }

    function o() {
      var e, n, t, o, i, s, a;
      for (var l in C)if (C.hasOwnProperty(l)) {
        if (e = [], n = C[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length))for (t = 0; t < n.options.aliases.length; t++)e.push(n.options.aliases[t].toLowerCase());
        for (o = r(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++)s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), h.push((o ? "" : "no-") + a.join("-"))
      }
    }

    function i(e) {
      var n = x.className, t = Modernizr._config.classPrefix || "";
      if (_ && (n = n.baseVal), Modernizr._config.enableJSClass) {
        var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
        n = n.replace(r, "$1" + t + "js$2")
      }
      Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), _ ? x.className.baseVal = n : x.className = n)
    }

    function s(e) {
      return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
        return n + t.toUpperCase()
      }).replace(/^-/, "")
    }

    function a(e, n) {
      return !!~("" + e).indexOf(n)
    }

    function l() {
      return "function" != typeof n.createElement ? n.createElement(arguments[0]) : _ ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments)
    }

    function f(e, n) {
      return function () {
        return e.apply(n, arguments)
      }
    }

    function u(e, n, t) {
      var o;
      for (var i in e)if (e[i] in n)return t === !1 ? e[i] : (o = n[e[i]], r(o, "function") ? f(o, t || n) : o);
      return !1
    }

    function d(e) {
      return e.replace(/([A-Z])/g, function (e, n) {
        return "-" + n.toLowerCase()
      }).replace(/^ms-/, "-ms-")
    }

    function p(n, t, r) {
      var o;
      if ("getComputedStyle" in e) {
        o = getComputedStyle.call(e, n, t);
        var i = e.console;
        if (null !== o) r && (o = o.getPropertyValue(r)); else if (i) {
          var s = i.error ? "error" : "log";
          i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate")
        }
      } else o = !t && n.currentStyle && n.currentStyle[r];
      return o
    }

    function c() {
      var e = n.body;
      return e || (e = l(_ ? "svg" : "body"), e.fake = !0), e
    }

    function m(e, t, r, o) {
      var i, s, a, f, u = "modernizr", d = l("div"), p = c();
      if (parseInt(r, 10))for (; r--;)a = l("div"), a.id = o ? o[r] : u + (r + 1), d.appendChild(a);
      return i = l("style"), i.type = "text/css", i.id = "s" + u, (p.fake ? p : d).appendChild(i), p.appendChild(d), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), d.id = u, p.fake && (p.style.background = "", p.style.overflow = "hidden", f = x.style.overflow, x.style.overflow = "hidden", x.appendChild(p)), s = t(d, e), p.fake ? (p.parentNode.removeChild(p), x.style.overflow = f, x.offsetHeight) : d.parentNode.removeChild(d), !!s
    }

    function v(n, r) {
      var o = n.length;
      if ("CSS" in e && "supports" in e.CSS) {
        for (; o--;)if (e.CSS.supports(d(n[o]), r))return !0;
        return !1
      }
      if ("CSSSupportsRule" in e) {
        for (var i = []; o--;)i.push("(" + d(n[o]) + ":" + r + ")");
        return i = i.join(" or "), m("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
          return "absolute" == p(e, null, "position")
        })
      }
      return t
    }

    function g(e, n, o, i) {
      function f() {
        d && (delete N.style, delete N.modElem)
      }

      if (i = r(i, "undefined") ? !1 : i, !r(o, "undefined")) {
        var u = v(e, o);
        if (!r(u, "undefined"))return u
      }
      for (var d, p, c, m, g, y = ["modernizr", "tspan", "samp"]; !N.style && y.length;)d = !0, N.modElem = l(y.shift()), N.style = N.modElem.style;
      for (c = e.length, p = 0; c > p; p++)if (m = e[p], g = N.style[m], a(m, "-") && (m = s(m)), N.style[m] !== t) {
        if (i || r(o, "undefined"))return f(), "pfx" == n ? m : !0;
        try {
          N.style[m] = o
        } catch (h) {
        }
        if (N.style[m] != g)return f(), "pfx" == n ? m : !0
      }
      return f(), !1
    }

    function y(e, n, t, o, i) {
      var s = e.charAt(0).toUpperCase() + e.slice(1), a = (e + " " + b.join(s + " ") + s).split(" ");
      return r(n, "string") || r(n, "undefined") ? g(a, n, o, i) : (a = (e + " " + z.join(s + " ") + s).split(" "), u(a, n, t))
    }

    var h = [], C = [], S = {
      _version: "3.5.0",
      _config: {classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0},
      _q: [],
      on: function (e, n) {
        var t = this;
        setTimeout(function () {
          n(t[e])
        }, 0)
      },
      addTest: function (e, n, t) {
        C.push({name: e, fn: n, options: t})
      },
      addAsyncTest: function (e) {
        C.push({name: null, fn: e})
      }
    }, Modernizr = function () {
    };
    Modernizr.prototype = S, Modernizr = new Modernizr;
    var x = n.documentElement, _ = "svg" === x.nodeName.toLowerCase(), w = "Moz O ms Webkit", b = S._config.usePrefixes ? w.split(" ") : [];
    S._cssomPrefixes = b;
    var E = function (n) {
      var r, o = prefixes.length, i = e.CSSRule;
      if ("undefined" == typeof i)return t;
      if (!n)return !1;
      if (n = n.replace(/^@/, ""), r = n.replace(/-/g, "_").toUpperCase() + "_RULE", r in i)return "@" + n;
      for (var s = 0; o > s; s++) {
        var a = prefixes[s], l = a.toUpperCase() + "_" + r;
        if (l in i)return "@-" + a.toLowerCase() + "-" + n
      }
      return !1
    };
    S.atRule = E;
    var z = S._config.usePrefixes ? w.toLowerCase().split(" ") : [];
    S._domPrefixes = z;
    var P = {elem: l("modernizr")};
    Modernizr._q.push(function () {
      delete P.elem
    });
    var N = {style: P.elem.style};
    Modernizr._q.unshift(function () {
      delete N.style
    }), S.testAllProps = y;
    var k = S.prefixed = function (e, n, t) {
      return 0 === e.indexOf("@") ? E(e) : (-1 != e.indexOf("-") && (e = s(e)), n ? y(e, n, t) : y(e, "pfx"))
    };
    Modernizr.addTest("backgroundblendmode", k("backgroundBlendMode", "text")), o(), i(h), delete S.addTest, delete S.addAsyncTest;
    for (var T = 0; T < Modernizr._q.length; T++)Modernizr._q[T]();
    e.Modernizr = Modernizr
  }(window, document);
}

function initWaves() {
  // if(document.querySelector('body.showrooms'))  return;
  var svgWaveWrap = document.querySelector('h3.section-title:not(.no-wave):not(.modal)');
  var viewBoxHeight = 460;
  var viewBoxWidthStart = 40;
  var viewBoxWidth = 580;
  if (document.querySelector('body.main')) {
    svgWaveWrap = document.querySelector('.wrap-philosophy');
    viewBoxWidthStart = 150;
    viewBoxWidth = 340;
    viewBoxHeight = 480;
  }
  if (document.querySelector('body.showrooms')) {
    svgWaveWrap = document.querySelector('#dealers');
  }
  if(document.querySelector('body.showrooms')) svgWaveWrap = document.querySelector('#waves-content');
  if (document.querySelector('body.catalogue')      ||
    document.querySelector('body.press-design')   ||
    document.querySelector('body.finish-tissue')  ||
    document.querySelector('body.privacy-policy') ||
    document.querySelector('body.profile')        ||
    document.querySelector('body.stash')) {

    svgWaveWrap = document.querySelector('#top-waves');
    viewBoxHeight = 500;
  }



  var type = /(canvas|webgl)/.test(url.type) ? url.type : 'svg';
  wavesBg_1 = new Two({
    type: Two.Types['svg'],
    fullscreen: false
  });


  wavesBg_1.appendTo(svgWaveWrap);


  $(svgWaveWrap).find('>svg:last-child').addClass('bg-wave hide');
  setTimeout(function(){  $('.bg-wave').removeClass('hide')  }, 100);

  $('.bg-wave').attr('viewBox', viewBoxWidthStart + ' 0 ' + viewBoxWidth + ' ' + viewBoxHeight);


  var mass = 100;
  var radius = wavesBg_1.height / 2.7;
  var strength = 0.002;
  var drag = 0.0;

  var background_1 = wavesBg_1.makeGroup();

  var physics = new Physics();
  var points = [];

  Two.Resolution = 13;

  for (var i = 0; i < Two.Resolution; i++) {

    var pct = i / Two.Resolution;
    var theta = pct * Math.PI * 2;//NO

    var ax = radius * Math.cos(theta);
    var ay = radius * Math.sin(theta);

    var variance = Math.random() * 0.48 + 0.73;

    var bx = variance * ax;
    var by = variance * ay;

    var origin = physics.makeParticle(mass, ax, ay);
    var particle = physics.makeParticle(Math.random() * mass * 0.8 + mass * 0.4, bx, by);
    var spring = physics.makeSpring(particle, origin, strength, drag, 0);

    origin.makeFixed();

    particle.shape = wavesBg_1.makeCircle(particle.position.x, particle.position.y);
    particle.shape.noStroke().fill = '#fff';
    particle.position = particle.shape.translation;

    points.push(particle.position);
  }


  var wave = [];
  for (var i = 0; i < 23; i++) {
    wave[i] = new Two.Path(points, true, true);
    wave[i].stroke = 'rgba(181, 99, 73, 0.3)';
    wave[i].fill = 'none';
    wave[i].scale = 1 - i * 0.04;
    wave[i].linewidth = 0.7 + i * 0.04;

    background_1.add(wave[i]);
  }

  resize();

  wavesBg_1
    .bind('resize', resize)
    .bind('update', function () {
      // if(document.querySelector('html.mobile-platform'))   wavesBg_1.pause();
      physics.update();
    })
    .play();


  function resize() {
    background_1.translation.set(wavesBg_1.width / 2, wavesBg_1.height / 2);
  }
}

function initLogRegSwiper() {
  var swiperLogReg = new Swiper('#modal-log_reg .wrap-swiper-log_reg', {
    slidesPerView: 1,
    centeredSlides: true,
    speed: 700,
    spaceBetween: 140,
    roundLengths: true,
    // followFinger: false,
    simulateTouch: false,
    // autoHeight: true,
    effect: "coverflow",
    coverflow: { slideShadows : false },
    prevButton: '.item-log_reg-toggle.log',
    nextButton: '.item-log_reg-toggle.reg',
  });
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

jQuery.fn.sortDomElements = (function() {
  return function(comparator) {
    return Array.prototype.sort.call(this, comparator).each(function(i) {
      this.parentNode.appendChild(this);
    });
  };
})();
