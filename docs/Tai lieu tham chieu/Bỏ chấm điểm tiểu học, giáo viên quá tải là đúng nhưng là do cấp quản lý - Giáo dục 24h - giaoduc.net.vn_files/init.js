
$(function () {
    if ($('section.trending .slim-scroll').length) {
        $('section.trending .slim-scroll').slimScroll({
            height: '570px',
            size: 0
        });
    }

    if ($('section#zone .slim-scroll').length) {
        $('section#zone .slim-scroll').slimScroll({
            height: '320px',
            size: 0
        });
    }
    if ($('section#story .article-content').length) {

        $('.article-content .body iframe').width('500');
        $(".article-content .body .caption").each(function () {
            if ($(this).text().trim() == '') $(this).remove();
        });
        $(".article-content .body .pic img").wrap(function () {
            var caption = $(this).parent().parent().parent().find('.caption').text();
            if (caption == null) caption = '';
            return "<a rel='gallery' title='" + caption + "' class='fancybox' href='" + $(this).attr("src") + "' />";
        });

        $(".article-content .body .fancybox").fancybox({
            helpers: {
                title: {
                    type: 'inside'
                },
                thumbs: {
                    width: 50,
                    height: 50
                },
                autoscale: false
            }
        });
        $('.article-content .body img, .article-content .body table').each(function () {
            $(this).removeAttr('width')
            $(this).removeAttr('height');
        });
    }

    $('#searchbox').submit(function () {
        var url = '';
        var keyword = $('#search_keyword').val();

        if (keyword != '' && keyword != 'Tìm kiếm') {
            keyword = keyword.replace(" ", "-");
            url += "/tim-kiem/" + encodeURIComponent(keyword) + '.gd';
        }
        window.location = url;
        return false;
    });

    /* Home mostread */
    $('section.mostread #content_tab1 article').each(function (index) {
        if (index > 4)
            $(this).hide();
    });

    $('section.mostread #content_tab2 li').each(function (index) {
        if (index > 1)
            $(this).hide();
    });

    $("section.mostread a.tab").click(function () {

        $(".active").removeClass("active");
        $(this).addClass("active");
        $(".tab_content").slideUp();
        var content_tabshow = $(this).attr("tabid");
        $("#" + content_tabshow).slideDown();
        $("#" + content_tabshow + " article").show();
        $("#" + content_tabshow + " li").show();

    });
    /* End home mostread */



    $("#ads").click(function () {
        $("#adsdialog").dialog({ width: 550 });
        return;
    });



});


$(window).load(function () {

    if ($('.content-left .article-list').length && $('.content-left').height() + 420 < $('.content-right').height()) {
        $('.stories-fly').html('<section class="article-list">' + $('.content-left .article-list').html() + '</div>');
        scrollTop('.scroll-top', '.content-right', '.content-left');
    }

    if ($("#mostread-origin").length && $('.sidebar').height() + 420 < $('.content-wrap').height()) {
        $("#mostread-copy").html($("#mostread-origin").html());
        scrollTop('#mostread-copy', '.content-wrap', '.sidebar');
    }
});