<script>
  $('body').on('change', '[data-type="custom_price_check"] input[type="checkbox"]', function () {
    var $prnt = $(this).closest('[data-type="custom_price_check"]');
    var is_ch = $(this).prop('checked');

    if (is_ch) {
      $prnt.prev().find('input').attr('readonly', 'readonly');
      $prnt.find('input').removeAttr('readonly');
    } else {
      $prnt.prev().find('input').removeAttr('readonly');
      $prnt.find('input').attr('readonly', 'readonly');
    }
  });
  $('body').on('change', '[data-type="photo_radio"] input[type="radio"]', function () {
    var $th = $(this);
    var is_ch = $(this).prop('checked');
    $('[data-type="photo_radio"] input[type="radio"]').each(function (i,el) {
      $(el).prop('checked', false);
    });
    $th.prop('checked', true);
  });
</script>