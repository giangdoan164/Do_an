var cmt_api_url = "http://" + window.location.hostname + (document.location.port != 80 ? ':' + document.location.port : '') + '/api'


$(function () {
    var commentForm = $("#commentForm");
    commentForm.validate();
    var parentid = 0;

    $('.cmt-new-btn').click(function (event) {
        parentid = 0;
        $(this).hide();
        $(this).after($('.cmt-new-form'));
        $('.cmt-new-form').show();
        $('.cmt-comment').focus();

    });

    $(document).on('click', '.cmt-rep-btn', function () {
        parentid = $(this).attr('pid');

        $('.cmt-new-btn').hide();
        $(this).parent().after($('.cmt-new-form'));
        $('.cmt-new-form').show();
        $('.cmt-comment').focus();
    });

    $(document).on('click', '.cmt-like-btn', function () {

        var id = $(this).attr('cid');
        var liked = $.cookie("liked_" + id);
        var count = parseInt($(this).text()) + 1;
        if (liked)
            alert("Bạn đã bình chọn nội dung này rồi!");
        else {
            $.ajax({
                type: "POST",
                url: cmt_api_url + "/comment.aspx",
                data: 'action=like&id=' + id,
                success: function (string) {
                    count = parseInt(string);
                    $.cookie("liked_" + id, true);
                },
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            $(this).text(count)
            $(this).addClass("liked");
        }
    });


    /* when start writing the comment activate the "add" button */
    $('.cmt-comment').bind('input propertychange', function () {
        $(".cmt-submit-btn").css("font-weight", "normal");
        var checklength = $(this).val().length;
        if (checklength) { $(".cmt-submit-btn").css("font-weight", "bold"); }
    });

    /* on clic  on the cancel button */
    $('.cmt-cancel-btn').click(function () {
        $('.cmt-comment').val('');
        $('.cmt-new-form').fadeOut('fast', function () {
            $('.cmt-new-btn').fadeIn('fast');
        });
    });

    $('.cmt-more-btn').click(function () {
        var contentid = $('.cmt-container').attr('cid');

        var minid = $(this).attr('minid');
        var pagesize = $(this).attr('pagesize');
        $.ajax({
            type: "POST",
            url: cmt_api_url + "/comment.aspx",
            data: 'action=more&contentid=' + contentid + '&minid=' + minid + '&pagesize=' + pagesize,
            success: function (string) {

                var jData = JSON.parse(string);
                var items = [];
                var lastid = 0;
                $.each(jData, function (i, item) {
                    var liked = $.cookie("liked_" + item.id);
                    var temp = '<div class="cmt-item' + (item.parentid > 0 ? ' sub' : '') + '" cid="' + item.id + '"><div class="icon"></div><div class="cmt-item-detail"><h5>' + item.name + '</h5><time>' + item.time + '</time>' + '<a cid="' + item.id + '" class="cmt-like-btn' + (liked ? ' liked' : '') + '">' + item.likecount + '</a>' + (item.parentid == 0 ? '<a class="cmt-rep-btn" pid="' + item.id + '"></a>' : '') + '<br /><p>' + item.comment + '</p></div></div>';
                    items.push(temp);
                    if (item.parentid == 0) lastid = item.id;
                });
                $('.cmt-more-btn').attr('minid', lastid);
                $('.cmt-list').append(items);

                if (lastid == 0 || items.length < pagesize) $('.cmt-more-btn').hide();

            },
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

    });


    // next-page

    $('.cmt-list-full a.nextpage').click(function () {
        var zoneid = $(this).attr('zoneid');
        var pageindex = $(this).attr('pageindex');
        var pagesize = $(this).attr('pagesize');
        $.ajax({
            type: "POST",
            url: cmt_api_url + "/comment.aspx",
            data: 'action=nextpage&zoneid=' + zoneid + '&pageindex=' + pageindex + '&pagesize=' + pagesize,
            success: function (string) {
                var jData = JSON.parse(string);
                var items = [];
                $.each(jData, function (i, item) {
                    var temp = '<li><h5>' + item.name + '<span>(' + item.time + ')<span></h5><span class="text">' + item.comment + '</span><div class="clr"></div><div><span>Trong bài : </span><a href="' + item.link + '">' + item.title + '</a> <span>(' + item.commentcount + ' ý kiến)</span></div></li>';
                    items.push(temp);
                });

                $('.cmt-list-full a.nextpage').attr('pageindex', parseInt(pageindex) + 1);
                $('.cmt-list-full ul').append(items);

                if (items.length < pagesize) $('.cmt-list-full a.nextpage').hide();

            },
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

    });
    $(".cmt-cancel-btn").click(function () {
        commentForm.resetForm();
    });

    // on post comment click 
    $('.cmt-submit-btn').click(function () {
        var contentid = $('.cmt-container').attr('cid');

        var theCom = $('.cmt-comment');
        var theName = $('#cmt-name');
        var theMail = $('#cmt-email');
        if (commentForm.valid()) {
            $.cookie('cmt-name', theName.val());
            $.cookie('cmt-email', theMail.val());
            $.ajax({
                type: "POST",
                url: cmt_api_url + "/comment.aspx",
                data: 'action=submit&contentid=' + contentid + '&parentid=' + parentid + '&name=' + theName.val() + '&email=' + theMail.val() + '&comment=' + theCom.val(),
                success: function (string) {

                    var jData = JSON.parse(string);
                    var refid = 0;
                    var items = [];
                    $.each(jData, function (i, item) {
                        refid = item.parentid;
                        //var temp = '<div class="cmt-item' + (item.parentid > 0 ? ' sub' : '') +
                        //    '" cid="' + item.id + '"><div class="icon"></div><div class="cmt-item-detail"><h5>' +
                        //    item.name + '</h5><time>' + item.time + '</time>' +
                        //    '<a cid="' + item.id + '" class="cmt-like-btn">0</a>' +
                        //    (item.parentid == 0 ? '<a class="cmt-rep-btn" pid="' + item.id + '"></a>' : '') +
                        //    '<br /><p>' + item.comment + '</p><div class="note">Bình luận này của bạn sẽ được kiểm duyệt trước khi đăng.</div></div></div>';
                        alert('Bình luận của bạn sẽ được kiểm duyệt trước khi đăng.');
                        // items.push(temp);
                    });
                    theCom.val('');
                    $('.cmt-new-form').hide('fast', function () {
                        $('.cmt-new-btn').show('fast');
                        if (refid > 0) {
                            var selectCom = $('div.cmt-item[cid=' + refid + ']');
                            selectCom.after(items);
                        }
                        else
                            $('.cmt-list').prepend(items);
                        parentid = 0;
                    })
                },
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
        }
    });
    $('#cmt-name').val($.cookie('cmt-name'));
    $('#cmt-email').val($.cookie('cmt-email'));

    $(".cmt-container a.cmt-like-btn").each(function () {
        var id = $(this).attr("id");
        var liked = $.cookie("liked_" + id);
        if (liked)
            $(this).addClass("liked");
    });

    if ($('.cmt-item').length < 8)
        $('.cmt-more-btn').hide();

    if ($('.cmt-list-full li').length < 30)
        $('.cmt-list-full .nextpage').hide();
});

$(function () {
    var showChar = 250;
    var ellipsestext = "...";
    $('.cmt-collapse .text').each(function () {

        var content = $(this).html();
        if (content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span >' + ellipsestext + '</span><span class="cmt-collapse-hidden"><span>' + h + '</span>&nbsp;<a href="#" class="cmt-collapse-btn expand-icon"></a></span>';
            $(this).html(html);
        }
    });
    $(".cmt-collapse-btn").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            if ($(this).hasClass("cmt-collapse-icon"))
                $(this).removeClass("cmt-collapse-icon");
            $(this).addClass("expand-icon");

        } else {
            $(this).addClass("less");
            if ($(this).hasClass("expand-icon"))
                $(this).removeClass("expand-icon");
            $(this).addClass("collapse-icon");
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});