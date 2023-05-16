$('.sidebar a').toArray().forEach(function (e) {
    let loc = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = window.location.href;

    if (link == loc) {
        $('a[href="' + loc + '"]').addClass('active');
        $('a[href="' + loc + '"]').closest('.nav-item[data-page]').addClass('menu-open');
    }
});

$('#uploadImgBtn').click(function (e) {
    $('#imgUploadForm').slideToggle(300);
});

$('.uploadImgBtn').click(function (e) {
    e.preventDefault();
    $(e.currentTarget).closest('.card-wrapper').find('.imgUploadForm').fadeToggle(300);
});

$('.presentationEditBtn').click(function (e) {
    e.preventDefault();
    $(e.currentTarget).closest('.card-wrapper').find('.presentationEditForm').fadeToggle(300);
});