var App = (function () {
  var thatClass = this,
      _showed = false,
      _loadedPages = {};

  function _start() {
    $('body')
      .on('click', 'a', function (e) {
        // alert('click a');
        var $el = $(this),
            isLang = ($el.closest('.lang-panel').length) ? true : false,
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
        if (isRoute && !isLang) {
          console.warn('внутренний переход на',link);
          page(link);

          e.preventDefault();
        } else if (isLang) {
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
    console.log('_hidePopup');
  }

  function _routes() {
    var prevPage = '/';

    console.log(thatClass,'<:|:>')
    _hidePopup();

    page.base('/');
    page('*', function (ctx, next) {
      var prevPath = $('main').attr('data-page'),
        toggleHidenClass = function (isAdd) {
          if(isAdd) {
            $('main')
              .find('.small-page-title,.wrap-catal')
              .addClass('hide');
            $('main .show')
              .removeClass('show');
          } else {
            $('main')
              .find('.zon-col-list,.wrap-banner-cont')
              .addClass('show');
            $('main .hide')
              .removeClass('hide');
          }
        },
        insertInHtml = function (obj) {
          prevPage = ctx.pathname;
          _editHeadHtml(obj.headHtml, function () {
            _editHeadSEO(obj.head);
            _editContentHtml(obj.contentHtml, obj.dataPage, function () {
              setTimeout(function() {
                _reInit(function() {
                  console.info('load done');
                  toggleHidenClass(false);
                  setTimeout(function() {
                    $('main').removeClass('loading');
                  }, 250);
                });
                next();
              }, 0);
            });
          });
        };

      _hidePopup();
      console.info('click *', prevPath, '===', ctx.canonicalPath);
      // if(prevPath === (ctx.pathname + '?' + ctx.querystring)){
      if(prevPath === ctx.canonicalPath){
        return;
      }

      // console.info('load start', prevPath, window.location.pathname, ctx.pathname);
      $('main').addClass('loading');
      // var needPageData = _loadedPages[ctx.pathname];
      var needPageData = _loadedPages[ctx.canonicalPath];

      if (!_.isEmpty(needPageData)) { // если есть в сохраненных достаем из массива
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
            headHtml = $html.find('.header-mob').html(),
            dataPage = $html.find('main').attr('data-page'),
            contentHtml = $html.find('#content').html();

          needPageData = {
            'head': head,
            'headHtml': headHtml,
            'dataPage': dataPage,
            'contentHtml': contentHtml
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

    page('/', function (ctx, next) {
      _home(ctx, next);
    });

    page('*', function (ctx, next){
      _error404(ctx, next);
    });

    page();

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

  function _editHeadHtml(html, clbk) {
    $('.header-mob').html(html);
    clbk();
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

  function _editContentHtml(html, pageName, clbk) {
    $('main .scroll-content').html(html);
    console.info('>>> ',pageName)
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
    }
  }
}());

App.init();