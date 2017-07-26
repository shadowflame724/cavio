<script>
  //Если с английского на русский, то передаём вторым параметром true.
  transliterate = (
    function() {
      var
        rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ ы э а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
        eng = "shh sh ch cz yu ya yo zh - y e a b v g d e z i j k l m n o p r s t u f x -".split(/ +/g)
      ;
      return function(text, engToRus) {
        var x;
        for(x = 0; x < rus.length; x++) {
          text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
          text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());
        }
        return text;
      }
    }
  )();

  $('body')

      .on('change', '[data-type="custom_price_check"] input[type="checkbox"]', function () {
        var $prnt = $(this).closest('[data-type="custom_price_check"]');
        var is_ch = $(this).prop('checked');

        if (is_ch) {
          $prnt.prev().find('input').attr('readonly', 'readonly');
          $prnt.find('input').removeAttr('readonly');
        } else {
          $prnt.prev().find('input').removeAttr('readonly');
          $prnt.find('input').attr('readonly', 'readonly');
        }
      })
      .on('change', '[data-type="photo_radio"] input[type="radio"]', function () {
        var $th = $(this);
        var is_ch = $(this).prop('checked');
        $('[data-type="photo_radio"] input[type="radio"]').each(function (i,el) {
          $(el).prop('checked', false);
        });
        $th.prop('checked', true);
      })
      .on('keyup', '[data-type="dimensions_data"] input', function () {
        var $inp = $(this);
        var $dataWrap = $inp.closest('[data-type="dimensions_data"]');
        var newVal = {};
        $dataWrap.find('input').each(function (i,el) {
            var $el = $(el);
            var val = $el.val();
            var type = $el.attr('data-dimensions');
          newVal[type] = val;
        });

        var $dimInp = $dataWrap.parent().find('[data-name="dimensions"]').val(JSON.stringify(newVal));

      })
      .on('click', '[data-type="generate_slug"]', function () {
        var $btn = $(this);
        var $inp = $btn.closest('.input-group').find('[data-type="replace-slug"]');
        var slug = '';
        var name = false;
        var code = $('[data-type="parent_for_slug"] select').val() || false;

        $('[data-type="input_for_slug"] input').each(function (i, el) {
          var val = $(el).val();
          console.log('>>',val)
          if(val !== '' && !name){
            name = val.toLowerCase();
          }
        });

        if(!code) {
          code = $('[data-type="input-parent-code"]').val() || false;
        }
        if(!code || code == 0) {
          alert('Выберите PARENT_CODE для формирования ссылки');
          $('[data-type="parent_for_slug"] select').select2('open');
          return false;
        } else {
          code = code.toLowerCase();
        }
        if(!name) {
          alert('Введите имя для формирования ссылки');
          return false;
        }
        if(name && code){
          $btn
            .attr('disabled','disabled')
            .find('.fa')
            .removeClass('fa-dot-circle-o')
            .addClass('fa-refresh fa-spin');
          slug = transliterate(code).replace(/\s+/g,'-') + '-' + transliterate(name).replace(/\s+/g,'-');
          $.get('/admin/product/slug/'+slug).done(function (serverFromSlug) {
            $inp.val(serverFromSlug);
          }).fail(function () {
            alert('Ошибка: введите ссылку вручную');
            $inp.focus();
          }).always(function () {
            setTimeout(function () {
              $btn
                .removeAttr('disabled')
                .find('.fa')
                .addClass('fa-dot-circle-o')
                .removeClass('fa-refresh fa-spin');
            }, 250);
          });

        }
      });

  function formatState (state) {
    if (!state.id) { return state.text; }
    var temp = '<div class="pop-img" ' +
      'style="background-image: url(/api/product-image/'+state.text+')">' +
      '<span>'+state.text+'</span></div>';

    var $state = $(temp);
    return $state;
  };
  function formatSelection (state) {
    if (!state.id) { return state.text; }
    var temp = '<div class="pop-sel-img" ' +
      'style="background-image: url(/api/product-image/'+state.text+')">';

    var $state = $(temp);
    return $state;
  };
  $(window).on('load', function () {
    var $photos = $('#photosPopup');

    $.get('/api/product-image/all').done(function (answ) {
      var temp = '<div class="">';
      var data = [];
      $.each(answ, function (i,link) {
        var name = link.split('/')[3];
//        console.warn('>>', i,link,name);
        var tempOne = '<div class="pop-img" style="background-image: url('+link+')"><span>'+name+'</span></div>';
        temp += tempOne;
        data.push({
          id: name,
          text: name,
        });
      });
      temp += '</div>';

      $(".select2.selected_photos").select2({
        data: data,
        templateResult: formatState,
        templateSelection: formatSelection,
        theme: "default forPopup",
        maximumSelectionLength: 2
      });
    });
  });
</script>