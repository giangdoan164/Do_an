
// if mobile, set default
//var userAgent = navigator.userAgent.toLowerCase();
var device = Detect({ useUA: true }); // -> 'tablet'


if ($.cookie('wap') == null && device == 'smartphone') { // /iphone|android|windows phone/i.test(userAgent)) {
    $.cookie('wap', 1, { path: '/' });
    window.location.reload(true);
}


function switchMobile() {
    $.cookie('wap', 1, { expires: 1, path: '/' });
    window.location.reload(true);
}


$(document).ready(function () {
    //if (/iphone|android|windows phone/i.test(userAgent)) {
    if (device == 'smartphone') {
        var note = '<a href="javascript:switchMobile();">Bạn có thể chuyển qua <b>phiên bản Mobile</b> của Báo Giáo dục Việt Nam</a>';
        $('#notification').html(note);
    }

});

$('[placeholder]').focus(function () {
    var input = $(this);
    if (input.val() == input.attr('placeholder')) {
        input.val('');
        input.removeClass('placeholder');
    }
}).blur(function () {
    var input = $(this);
    if (input.val() == '' || input.val() == input.attr('placeholder')) {
        input.addClass('placeholder');
        input.val(input.attr('placeholder'));
    }
}).blur();

function sharelink(type) {
    var sns_sharekey;
    if (type == "facebook") { sns_sharekey = 'http://www.facebook.com/sharer.php?u='; }
    else if (type == "zingme") { sns_sharekey = 'http://link.apps.zing.vn/share?url='; }
    else if (type == "googleplus") { sns_sharekey = 'https://plus.google.com/share?url='; }
    u = location.href;
    t = document.title; window.open(sns_sharekey + encodeURIComponent(u) + '&t=' + encodeURIComponent(t), 'sharer', 'toolbar=0,status=0,width=626,height=436');

    return false;
}
var scrollTop = function (target, compare, wrap) {

    if ($(compare).length && $(target).length) {

        var _w = $(target).width();
        var _t1 = $(target).offset().top;

        var _t2 = $(compare).offset().top;

        var _h1 = $(target).height();

        var _h2 = $(compare).height();

        if (_h2 > _h1) {
            $(window).bind("scroll load", function () {

                var _l = $(wrap).offset().left - $(window).scrollLeft();

                var _p = $(window).scrollTop();

                if (_p > _t1 && _p + _h1 < _t2 + _h2) {
                    $(target).css("position", "fixed").css("top", 0).css("left", _l).css("width",_w);
                }
                else
                    if (_p + _h1 >= _t2 + _h2) {
                        $(target).css("position", "absolute").css("top", _t2 + _h2 - _h1);
                    }
                if (_p <= _t1) {
                    $(target).css("position", "static");
                }
            });
        }
    }
};

