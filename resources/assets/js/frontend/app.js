var App = (function () {
  var thatClass = this,
      _showed = false,
      _catalogParams = {
        'sale': false,
        'zones': [],
        'collections': [],
        'page': 1,
      },
      _loadedPages = {},
      _backFromProduct;

  function _start() {
    $('body')

      .on('click', '[data-filter-name]', function (e) {

        var $el = $(this),
          $prnt = $el.parent(),
          type = $el.attr('data-filter-name'),
          val = $el.attr('data-filter-val'),
          pageNew = false;

        if(typeof _catalogParams[type] !== 'undefined') {
          if (type === 'sale') {
            var prevVal = JSON.stringify(_catalogParams.sale);
            _catalogParams.sale = (val === 'true') ? true : false;
            if (prevVal !== JSON.stringify(_catalogParams.sale)) {
              pageNew = true;
            }
            $prnt.find('li').removeClass('active');
            $el.addClass('active');
          }
          if (type === 'zones' || type === 'collections') {
            var rem = $prnt.hasClass('active') ? false : true,
                prevVal = JSON.stringify(_catalogParams[type]);
            if (rem) {
              var index = _catalogParams[type].indexOf(val);
              if (index > -1) {
                _catalogParams[type].splice(index, 1);
              }
            } else {
              _catalogParams[type].push(val);
            }
            if (prevVal !== JSON.stringify(_catalogParams[type])) {
              pageNew = true;
            }
          }
          if (pageNew) {
            _catalogParams.page = 1;
          }
          if (type === 'page') {
            _catalogParams.page = parseInt(val);
          }
          var link = '';
          $.each(_catalogParams, function (tp, vl) {
            link += (link === '') ? '?' : '';
            link += (link === '?') ? '' : '&';
            link += tp + '=' + vl;
          });

          // console.log('::', link, JSON.stringify(_catalogParams));
          page('/catalogue'+link);
        }
        return false;
      })

      .on('click', 'a', function (e) {
        // alert('click a');
        var $el = $(this),
            isLang = ($el.closest('.lang-panel').length) ? true : false,
            isSocial = ($el.closest('.wrap-login-social').length) ? true : false,
            link = $el.attr('href'),
            notInApp = ['http://', 'https://', '#', 'tel:', 'mailto:'],
            isRoute = true;
        for (var i = 0, l = notInApp.length; i < l; i++) {
          if (link.indexOf(notInApp[i]) > -1) {
            isRoute = false;
          }
        }
        if($el.attr('target') === '_blank'){
          isRoute = false;
        }
        if($el.attr('data-type') === 'notApp') {
          window.location.href = link;
          isRoute = false;
        }
        console.log('location.href', location.pathname, link)
        if(link.indexOf('/product/') !== -1){
          _backFromProduct = location.pathname;
        }
        if (isRoute && !isLang && !isSocial) {
          console.warn('внутренний переход на',link);
          page(link);

          e.preventDefault();
        } else if (isLang || isSocial) {
          window.location.href = link;
        }
        // return false;
      })

      .on('keyup','form[data-type="search"] input',function () {
        var $inp = $(this),
            val = $inp.val(),
            pattern = /[^\wа-яёєї'іÀ-ÿ ]+/gi,
            newV = val.replace(pattern ,'');
        $inp.val(newV);
        return false;
      })

      .on('submit','form[data-type="search"]',function () {
        var $form = $(this),
            serForm = $form.serialize();
        $('#search-live-box').html('');
        console.log('submit search: ',serForm);
        page('/search?'+serForm);
        return false;
      });
  }

  function _hidePopup() {
    // hideTopMenu();
    // hideLeftMenu();
  }

  function _goPage(link) {
    page(link);
  }

  function _routes() {
    var prevPage = '/';

    console.log(thatClass,'<:|:>')
    _hidePopup();

    page.base('/');


    page('*', function (ctx, next) {
      console.log('PAGE ctx (*)', ctx.pathname)
      hideTopMenu();
      hideLeftMenu();
      // console.dir(ctx)
      // console.log(next)
      var prevPath = $('main').attr('data-page'),
      toggleHidenClass = function (isAdd) {
        if(isAdd) {
          console.log('intervalNewProdDot', ctx)
          clearInterval(intervalNewProdDot);
          hideElemsBeforeBack();

          if((ctx.pathname.indexOf('/collections/')  != -1 && (ctx.pathname.split("/").length - 1) == 3) ||
             (ctx.pathname.indexOf('/zones/')        != -1 && (ctx.pathname.split("/").length - 1) == 3) ||
              ctx.pathname.indexOf('/news/')         != -1                                               ||
              ctx.pathname.indexOf('/product/')      != -1                                               ||
              ctx.pathname.indexOf('/press-design') != -1
          )
          {
            hideHeader();
          }
        } else {
          //
        }
      },
      insertInHtml = function (obj) {
        prevPage = ctx.pathname;
        _editHeadHtml(obj.headHtml, function () {
          _editHeadSEO(obj.head);
          _editAfterFooter(obj.afterFooterHtml);
          _editBeforeHeader(obj.beforeHeaderHtml);
          _editContentHtml(obj.contentHtml, obj.dataPage, function () {
            setTimeout(function() {
              _reInit(function() {
                console.info('load done');
                toggleHidenClass(false);
                initPageAfterLoading();
                setTimeout(function() {
                  $('main').removeClass('loading');
                }, 250);
              });
              next();
            }, 0);
          });
        });
      };

      console.info('click *', prevPath, '===', ctx.canonicalPath);
      // if(prevPath === (ctx.pathname + '?' + ctx.querystring)){
      if(prevPath === ctx.canonicalPath){
        return;
      }

      // console.info('load start', prevPath, window.location.pathname, ctx.pathname);
      $('main').addClass('loading');
      // var needPageData = _loadedPages[ctx.pathname];
      var needPageData = _loadedPages[ctx.canonicalPath];

      if (!_.isEmpty(needPageData) && ctx.canonicalPath !== '/basket') { // если есть в сохраненных достаем из массива и это не страница корзины
        // console.info('this page is loaded in _loadedPages');
        toggleHidenClass(true);
        setTimeout(function () {
          insertInHtml(needPageData);
        }, 500);
      } else {                                                // если нету берем с сервера
        toggleHidenClass(true);
        $.get(ctx.canonicalPath).then(function (answer) {
          var $html = $('<div/>').append(answer),
            head = [
              {'name': 'title', 'value': $html.find('title:first').text(), 'attr': false},
              {'name': 'title', 'value': $html.find('meta[name="description"]').attr('content'), 'attr': 'content'},
            ],
            headHtml = $html.find('#header').html(),
            dataPage = $html.find('#content').attr('data-page'),
            contentHtml = $html.find('#content').html(),
            afterFooterHtml = $html.find('#after_footer').html(),
            beforeHeaderHtml = $html.find('#before_header').html();

          needPageData = {
            'head': head,
            'headHtml': headHtml,
            'dataPage': dataPage,
            'contentHtml': contentHtml,
            'afterFooterHtml': afterFooterHtml,
            'beforeHeaderHtml': beforeHeaderHtml
          };
          _loadedPages[ctx.canonicalPath] = needPageData;
          insertInHtml(needPageData);

        }).fail(function(mess) {
          console.warn('ajax error: ',mess,':', ctx, ':', prevPage);
          toggleHidenClass(false);
          $('#popup404').show();
          $('body').css({'position':'fixed','overflow':'hidden'});
          $('main').removeClass('loading');
          $('.message_link a').click(function(event) {
            var link = $(this).attr('href');
            event.preventDefault();
            _hidePopup();

            page.redirect(link);
          });
          $('.js-popup-close,.popup__overlay').click(function(event) {
            event.preventDefault();
            _hidePopup();

            page.redirect(prevPage);
          });
        });
      }
    });
    // page({ dispatch: true });

    // page('/', function (ctx, next) {
    //   _home(ctx, next);
    // });

    page('*', function (ctx, next){
      _error404(ctx, next);
    });

    page();

  }

  function _reInit(clbk) {
    // window.reinit();
    clbk();
  }

  function _home(ctx, clbk) {

    clbk();
  }

  function _error404(ctx, clbk) {

    clbk();
  }

  function _editHeadSEO(html) {
    console.info(html);
    _.forEach(html, function (e) {
      if (e.attr) {
        $(e.name).attr(e.attr, e.value);
      } else {
        $(e.name).text(e.value);
      }
    });
  }

  function _editAfterFooter(html, clbk) {
    $('#after_footer').html(html);
    // clbk();
  }
  function _editBeforeHeader(html, clbk) {
    $('#before_header').html(html);
    // clbk();
  }

  function _editHeadHtml(html, clbk) {
    $('.header-mob').html(html);
    clbk();
  }

  function _editContentHtml(html, pageName, clbk) {
    $('main .scroll-content > *').each(function (i,_el) {
      if(!$(_el).is('footer')){
        $(_el).remove();
      }
    });
    $('main .scroll-content footer').before(html);
    mainScroll.setPosition(0, 0);
    $('main').attr('data-page', pageName);
    clbk();
  }


  return {
    init: function () {
      _start();
      _routes();
    },
    getPages: function () {
      return _loadedPages;
    },
    goToPage: function (link) {
      _goPage(link);
    },
    goPopupBack: function () {
      console.log('_backFromProduct', _backFromProduct)
      if(_backFromProduct) {
        page(_backFromProduct);
        _backFromProduct = undefined;
        return true;
      }

      if(location.pathname.indexOf('product/') != -1) {
        page('/catalogue');
        return true;
      }
      return false;
    },
    goBack: function () {
      history.go(-1);
    }
  }
}());

App.init();