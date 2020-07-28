function scrollToForm() {
    var offTop = $('#ContactForm').offset().top - 43;
    $(window).scrollTop(offTop);
}

$(function() {
    if ($('#ContactForm').data('contactSuccess')) {
        $.toast.success($('#ContactForm').data('contactSuccess'));
        scrollToForm();
    }
    if ($('#ContactForm').data('contactError')) {
        $.toast.danger($('#ContactForm').data('contactError'));
        scrollToForm();
    }
});