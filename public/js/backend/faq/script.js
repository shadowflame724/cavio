var associated = $("select[name='associated-permissions']");
var associated_container = $("#available-permissions");


if (associated.val() == "custom")
    associated_container.removeClass('hidden');
else
    associated_container.addClass('hidden');

associated.change(function() {
    if ($(this).val() == "custom")
        associated_container.removeClass('hidden');
    else
        associated_container.addClass('hidden');
});
$(function()
{
    $('.redactor').redactor({
        buttons: ['format', 'bold', 'italic', 'link']
    });
});
