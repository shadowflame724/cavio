export default class Router {
  constructor(config) {
    console.log('config: ',config);
    this._showed = false;
    this._loadedPages = {};
    this._init();
  }

  _loadSidebar() {
    var thatClass = this;

    $.get('/basket').then(function (answer) {
      // var $html = $('<div/>').append(answer),
      //   $bar = $('#rightSidebar'),
      //   data = $html.find('aside').html();
      //
      // $bar.html(data);
      // thatClass._reInitSidebar(function() {
      //   setTimeout(function() {
      //     $bar.removeClass('not-load');
      //   }, 50);
      // });
    });
  }

  _clickSee() {
    var thatClass = this;

    //click on links
    $('body').on('click', 'a', function (e) {
      // alert('click a');
      var $el = $(this),
        isLang = ($el.closest('.lang').length) ? true : false,
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
    });
    /**********/

    // search forms

    $('body')
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
    /**********/


  }

  _customSerializeArray(array) {
    var result = '',
        obj = {};

    for (var i = 0, l = array.length; i < l; i++) {
      var one = array[i];
      if (!obj[one.name]) {
        obj[one.name] = [];
      }
      obj[one.name].push(one.value);
    }
    $.each(obj, function (name, val) {
      var and = '',
        oneVal = '';
      for (var j = 0, l = val.length; j < l; j++) {
        if (oneVal === '') {
          oneVal = val[j];
        } else {
          oneVal += ',' + val[j];
        }
      }
      and += (result !== '') ? '&' : '';
      result += and + name + '=' + oneVal;
    });

    return result;
  }

  _routes() {
    var thatClass = this,
        prevPage = '/';

    page.base('/');
    page('*', function (ctx, next) {
      var prevPath = $('main .content').attr('data-page'),
        insertInHtml = function (obj) {
          prevPage = ctx.pathname;
          thatClass._editHeadHtml(obj.headHtml, function () {
            thatClass._editHeadSEO(obj.head);
            thatClass._editContentHtml(obj.contentHtml, obj.dataPage, function () {
              setTimeout(function() {
                thatClass._reInit(function() {
                  console.info('load done');
                  setTimeout(function() {
                    $('main').removeClass('loading');
                  }, 250);
                });
                next();
              }, 0);
            });
          });
        };

      thatClass._hidePopup();
      console.info('click *', prevPath, '===', ctx.canonicalPath);
      // if(prevPath === (ctx.pathname + '?' + ctx.querystring)){
      if(prevPath === ctx.canonicalPath){
        return;
      }

      // console.info('load start', prevPath, window.location.pathname, ctx.pathname);
      $('main').addClass('loading');
      // var needPageData = thatClass._loadedPages[ctx.pathname];
      var needPageData = thatClass._loadedPages[ctx.canonicalPath];

      if (!_.isEmpty(needPageData)) { // если есть в сохраненных достаем из массива
        // console.info('this page is loaded in _loadedPages');
        setTimeout(function () {
          insertInHtml(needPageData);
        }, 250);
      } else {                                                // если нету берем с сервера
        $.get(ctx.canonicalPath).then(function (answer) {
          var $html = $('<div/>').append(answer),
            head = [
              {'name': 'title', 'value': $html.find('title:first').text(), 'attr': false},
              {'name': 'title', 'value': $html.find('meta[name="description"]').attr('content'), 'attr': 'content'},
            ],
            headHtml = $html.find('.header-mob').html(),
            dataPage = $html.find('main .content').attr('data-page'),
            contentHtml = $html.find('main .content').html();

          needPageData = {
            'head': head,
            'headHtml': headHtml,
            'dataPage': dataPage,
            'contentHtml': contentHtml
          };
          thatClass._loadedPages[ctx.canonicalPath] = needPageData;
          insertInHtml(needPageData);

        }).fail(function(mess) {
          console.warn('ajax error: ',mess,':', ctx, ':', prevPage);
          $('#popup404').show();
          $('body').css({'position':'fixed','overflow':'hidden'});
          $('main').removeClass('loading');
          $('.message_link a').click(function(event) {
            var link = $(this).attr('href');
            event.preventDefault();
            thatClass._hidePopup();

            page.redirect(link);
          });
          $('.js-popup-close,.popup__overlay').click(function(event) {
            event.preventDefault();
            thatClass._hidePopup();

            page.redirect(prevPage);
          });
        });

      }

    });
    // page({ dispatch: true });

    page('/', function (ctx, next) {
      thatClass._home(ctx, next);
    });

    page('*', function (ctx, next){
      thatClass._error404(ctx, next);
    });

    page();

  }

  _hidePopup() {
    $('.popup').hide();
    $('body').removeAttr('style');
  }

  _editHeadSEO(html) {
    console.info(html);
    _.forEach(html, function (e) {
      if (e.attr) {
        $(e.name).attr(e.attr, e.value);
      } else {
        $(e.name).text(e.value);
      }
    });
  }

  _editHeadHtml(html, clbk) {
    $('.header-mob').html(html);
    clbk();
  }

  _editContentHtml(html, pageName, clbk) {
    $('main .content').html(html);
    $('main .content').attr('data-page',pageName);
    clbk();
  }

  _home(ctx, next) {
    console.log('home page');
    // setTimeout(next, 0);
  }

  _error404(ctx, next) {
    console.warn('404 page', ctx, next);
  }

  _init() {
    this._loadSidebar();
    this._clickSee();
    this._routes();
  }

  _reInit(clbk) {
    // window.reinit();
    clbk();
  }

}