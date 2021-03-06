
<div id="main-chat" class="container-fluid">
        <div class="chat-box">
                <!-- kirim pesan -->
                <ul class="text-right boxs">
                    <li class="chat-single-box card-shadow bg-white active" data-id="1">
                        <div class="had-container">
                            <form action="" id="form-pesan">
                            <div class="chat-header p-10 bg-gray">
                                <div class="user-info d-inline-block f-left">
                                    <div class="box-live-status bg-danger  d-inline-block m-r-10"></div>
                                <a href="#">{{$data->name}}</a>
                                </div>
                                <div class="box-tools d-inline-block">
                                    <a href="#" class="mini">
                                        <i class="icofont icofont-minus f-20 m-r-10"></i>
                                    </a>
                                    <a class="close" href="#">
                                        <i class="icofont icofont-close f-20"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="chat-body p-10">
                                <div class="message-scrooler">
                                    <div class="messages">
                                        <div class="message out no-avatar media">
                                            <div class="body media-body text-right p-l-50">
                                                <div class="content msg-reply f-12 bg-primary d-inline-block">Good morning..</div>
                                                <div class="seen"><i class="icon-clock f-12 m-r-5 txt-muted d-inline-block"></i><span><p class="d-inline-block">a few seconds ago </p></span>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="sender media-right friend-box">
                                                    @if ($data->avatar=' ')
                                                    <a href="javascript:void(0);" title="Me"><img src="{{asset('assets/images/avatar-1.png')}}" class="img-circle img-chat-profile" alt="Me"></a>


                                                  @else
                                                    <a href="javascript:void(0);" title="Me"><img src="{{asset('storage/avatars/')}}/{{$data->avatar}}" class="img-circle img-chat-profile" alt="Me"></a>

                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer b-t-muted">
                                <div class="input-group write-msg">
                                    <input type="text" class="form-control input-value" placeholder="Type a Message">
                                    <span class="input-group-btn">
                      <button  id="paper-btn" class="btn btn-secondary" type="button">
                        <i class="icofont icofont-paper-plane"></i>
                      </button>
                    </span>
                </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- /kirim pesan -->

            </div>
</div>

<script type="text/javascript">
    'use strict';
var placeholder = '<span class="placeholder">{0}</span>';
function ActiveChatBox(selector) {

    $('#main-chat .chat-single-box').removeClass('active');
    $(selector).addClass('active');
}
function removeBoxCollapseClass(selector) {

    if ($(selector).hasClass('collapsed')) {
        $(selector).removeClass('collapsed');
    }
}
function messageScroll() {

    setTimeout(function () {
        if ($('.messages div').length == 0) {
            return;
        }
        $('.message-scrooler').animate({
            scrollTop: $('.messages div:last').offset().top
        }, 0);
    }, 100);
}

function initialTooltip() {

    //tooltip
    $('[data-toggle="tooltip"]').tooltip({ delay: 50 });
    $('[data-toggle="tooltip"]').tooltip({ delay: 50 });
}

function initialTooltipSiderbarUserList() {

    $('[data-toggle="tooltip"]').tooltip({ delay: 50 });
}
function deinitialTooltipSiderbarUserList() {

    $('[data-toggle="tooltip"]').tooltip('dispose');
}

function stickersTab() {

    setTimeout(function () {

        $('.stickers ul.tabs').tabs();
        $('.stickers ul.tabs').css({ 'height': '55px' });

    }, 1);
}

function hideStickerBox() {

    $('#main-chat .chat-single-box .icons').removeClass('show');
    $('#main-chat .chat-single-box .icons').find('.smiles-set').removeAttr('style');
}
function hideMinimizedBox() {

    if ($('#main-chat .boxs .minimized').hasClass('show')) {
        $('#main-chat .boxs .minimized').removeClass('show');
        $('#main-chat .boxs .minimized').find('.dropdown').removeAttr('style');
    }

}
function NewMessage(dataId) {

    $('#main-chat .chat-box .boxs .chat-single-box').each(function () {
        if ($(this).data('id') == dataId) {
            $(this).addClass('new-message');
        }
    });
}
function generatePlaceholder() {

    setTimeout(function () {
        $("#main-chat .textarea").each(function () {
            $(this).html(placeholder.format($(this).data('placeholder')));
        });
    }, 10);
}

function sidebarClosed() {

    var windowWidth = $(window).width();
    if (windowWidth < 1100) {

        $('#main-chat').addClass('sidebar-closed');
    } else {
        $('#main-chat').removeClass('sidebar-closed');
    }
}
//string format function -- use 'hello {0}'.format('demo')  -> result : 'hello demo'
String.prototype.format = String.prototype.f = function () {

    var s = this,
        i = arguments.length;

    while (i--) {
        s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
    }
    return s;
};

$(document).on('click', '#main-chat .chat-single-box .smile-ico', function (e) {

    e.stopPropagation();
    hideMinimizedBox();

    _parent = $(this).parents('.icons');

    if (_parent.hasClass('show')) {

        hideStickerBox(_parent);
    } else {

        _bottom = parseInt(_parent.css('height').replace('px', ''), 0) + 10;
        _source = _parent.data('source');
        _parent.find('.smiles-set').html($('.' + _source).html());

        _parent.find('.smiles-set').css({
            'bottom': _bottom,
            'display': 'block'
        });
        _parent.addClass('show');
        stickersTab();
    }
});
$(document).on('click', '#main-chat .chat-single-box .stickers', function (e) {

    e.stopPropagation();
});
$(document).on('click', '#main-chat .preview-image', function () {

    preview = '<div class="preview-overlay"><div class="preview-placeholder"><img class="preview-image" src="{0}"/><div class="preview-caption">{1}</div></div></div>';
    imgSrc = $(this).attr('src');
    caption = $(this).data('caption');

    imgWidth = $(this).css('width');
    imgHeight = $(this).css('height');

    if ($('#main-chat').hasClass('preview-placeholder')) {

        return;
    }
    $('#main-chat').prepend(preview.format(imgSrc, caption));
    var origin = $('.preview-placeholder .preview-image');

    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;
    var originalWidth = origin.width();
    var originalHeight = origin.height();

    var ratio = 0;
    var widthPercent = originalWidth / windowWidth;
    var heightPercent = originalHeight / windowHeight;
    var newWidth = 0;
    var newHeight = 0;

    if (widthPercent > heightPercent) {

        ratio = originalHeight / originalWidth;
        newWidth = windowWidth * 0.9;
        newHeight = windowWidth * 0.9 * ratio;
    }
    else {

        ratio = originalWidth / originalHeight;
        newWidth = (windowHeight * 0.9) * ratio;
        newHeight = windowHeight * 0.9;
    }

    var _left = $(document).scrollLeft() + windowWidth / 2 - origin.parent('.preview-placeholder').offset().left - newWidth / 2;
    var _top = $(document).scrollTop() + windowHeight / 2 - origin.parent('.preview-placeholder').offset().top - newHeight / 2;


    $('.preview-placeholder').css({

        'max-width': newWidth,
        'width': originalWidth,
        'top': _top
    });


    $('.preview-caption').css({

        'top': (newHeight )
    });

});
$(document).on('click', '#main-chat .preview-overlay:not(".preview-placeholder")', function () {

    $('.preview-overlay').remove();
});
$(document).on('click', '#main-chat .chat-single-box .stickers .tab-content li', function () {


    _sendMsg = $(this).parents('.chat-footer').find('.send-message div');
    //_src = $(this).find('img').attr('src');
    _img = $(this).html();
    if ($(this).parents('.chat-footer').find('.send-message div').html() == '<span class="placeholder">{0}</span>'.format(_sendMsg.data('placeholder'))) {
        _sendMsg.html(_img);
    } else {
        _str = _sendMsg.html();
        //_sendMsg.html(_str + ' ' + '<div class="send-sticker" style="background-image:url({0})"></div>'.format(_src));
        _sendMsg.html(_str + ' ' + _img);
    }
});

$(document).on('click', '#main-chat #paper-btn', function (e) {

        var _box_message = $(this).parents('.chat-single-box').find('.messages');

        var text= $($(e.currentTarget).parent().parent().parent()).find(".input-value").val();
        _box_message.append('<div class="message out no-avatar media">' +
            '<div class="body media-body text-right p-l-50"><div class="content msg-reply f-12 bg-primary d-inline-block">'+ text +'</div><div class="seen"><i class="icon-clock f-12 m-r-5 txt-muted d-inline-block"></i><span><p class="d-inline-block">a few seconds ago </p></span><div class="clear"></div> </div></div>' +
            ' <div class="sender media-right friend-box"><a href="javascript:void(0);" title="Me"><img src="assets/images/avatar-1.png" class="img-circle img-chat-profile" alt="Me"></a> </div>' +
            '</div>');

        hideStickerBox();
        messageScroll();

$($(e.currentTarget).parent().parent().parent()).find(".input-value").val('');
        return false;

});

$(document).on('click',function () {

    hideStickerBox();
    hideMinimizedBox();
});

'use strict';
function boxMinimizedCount() {

    var _count = $('#main-chat .chat-single-box.minimized .chat-dropdown li').length;

    $('#main-chat .chat-single-box.minimized .count span').html($('#main-chat .chat-single-box.minimized .chat-dropdown li').length);

    if (_count == 0) {
        $('#main-chat .chat-single-box.minimized').remove();
    }
}


function boxMinimizedUserAdd() {

    var _boxHidden = $('#main-chat .chat-single-box:not(".minimized"):not(".hidden")').eq(0);
    _boxHidden.addClass('hidden');
    var dataId = _boxHidden.data('id');

    var hasItem = false;
    $('#main-chat .chat-single-box.minimized .chat-dropdown li').each(function () {
        if ($(this).data('id') == dataId) {
            hasItem = true;
        }
    });

    if (!hasItem) {

        var dataUserName = _boxHidden.find('.user-info a').text();
        $('#main-chat .chat-single-box.minimized .chat-dropdown').append(box_minimized_dropdownLi.format(dataId, dataUserName));
    }
}

var box_minimized_dropdownLi = '<li data-id="{0}"><div class="username">{1}</div> <div class="remove">X</div></li>'
function boxMinimized() {

    var _boxDefaultWidth = parseInt($('#main-chat .chat-single-box:not(".minimized")').css('width'));
    var _boxCommonWidth = parseInt($('.chat-box').css('width').replace('px', ''), 10)  + parseInt($('#sidebar').css('width').replace('px', ''), 10);
    var _windowWidth = $(window).width();
    var _hasMinimized = false;

    $('#main-chat .boxs .chat-single-box').each(function (index) {

        if ($(this).hasClass('minimized')) {

                _hasMinimized = true;

        }
    });

    if ((_windowWidth) > (_boxCommonWidth)) {

        if (!_hasMinimized) {
           if((_windowWidth)< 768 ){

                    $(".chat-box").css('margin-right','70px');
                    return;
           }
           else{
                 return;
           }

        }

        var dataId = $('#main-chat .boxs .minimized .chat-dropdown li').last().data('id');
        $('#main-chat .boxs .minimized .chat-dropdown li').last().remove();
        $('#main-chat .boxs .chat-single-box').each(function (index) {

            if ($(this).data('id') == dataId) {
                $(this).removeClass('hidden');
                return false;
            }
        });
    } else {
        if (!_hasMinimized) {

            $('#main-chat .boxs').prepend('<li class="chat-single-box minimized"><div class="count"><span>0</span></div><ul class="chat-dropdown"></ul></li>');
        }

        boxMinimizedUserAdd();

    }

    boxMinimizedCount();
}



$(window).on('resize',function () {

    boxMinimized();
    sidebarClosed();
});
$(function () {

    var waveEffect = $('.user-box').attr('wave-effect');
    var waveColor = $('.user-box').attr('wave-color');
    if (waveEffect == 'true') {

        $('#sidebar .user-box .userlist-box').each(function (index) {
            $(this).addClass('waves-effect ' + waveColor);
        });
    }

    initialTooltip();
    messageScroll();
    generatePlaceholder();

    boxMinimized();
});



$(document).on('click', '#main-chat .chat-single-box', function () {

    if ($(this).hasClass('new-message')) {

        $(this).removeClass('new-message');
    }
    ActiveChatBox(this);
});

$(document).on('click', '#main-chat .chat-header .user-info', function () {

    removeBoxCollapseClass($(this).parents('.chat-single-box'));

    messageScroll();
});

$(document).on('click', '#main-chat .chat-single-box .mini', function () {

    parent = $(this).parents('.chat-single-box');

    if ($(parent.children()[0].children[0]).hasClass('custom-collapsed')) {

        $(parent.children()[0].children[0]).removeClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','block');
         $(parent.children()[0].children[2]).css('display','block');
       parent.addClass('bg-white');
       parent.addClass('card-shadow');
        messageScroll();
    } else {
       parent.removeClass('bg-white');
       parent.removeClass('card-shadow');
       $(parent.children()[0].children[0]).addClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','none');
         $(parent.children()[0].children[2]).css('display','none');
    }

});

$(document).on('click', '#main-chat .chat-single-box .close', function () {

    parent = $(this).parents('.chat-single-box');
    if (parent.hasClass('active')) {

        parent.remove();
        setTimeout(function () { $('#main-chat .boxs .chat-single-box:last-child').addClass('active'); }, 1);
    }
    parent.remove();
    parent.find('.close_tooltip').tooltip('dispose');

    boxMinimized();
});

/*Click on username*/
$(document).on('click', '#main-chat #sidebar .user-box .userlist-box', function () {

    var dataId = $(this).attr('data-id');
    var dataStatus = $(this).data('status');
    var dataUserName = $(this).attr('data-username');
    var _return = false;

    $('#main-chat .chat-box .boxs .chat-single-box').each(function (index) {

        if ($(this).attr('data-id') == dataId) {

            removeBoxCollapseClass(this);
            ActiveChatBox(this);
            _return = true;
        }
    });


    if (_return) {

        return;
    }
    if(dataStatus == "online"){

    var newBox = '<li class="chat-single-box card-shadow bg-white active" data-id="{0}"><div class="had-container"><div class="chat-header p-10 bg-gray"><div class="user-info d-inline-block f-left"><div class="box-live-status bg-danger  d-inline-block m-r-10"></div><a href="#">{1}</a></div><div class="box-tools d-inline-block"><a href="#" class="mini"><i class="icofont icofont-minus f-20 m-r-10"></i></a><a class="close" href="#"><i class="icofont icofont-close f-20"></i></a></div></div><div class="chat-body p-10"><div class="message-scrooler"><div class="messages"></div></div></div><div class="chat-footer b-t-muted"><div class="input-group write-msg"><input type="text" class="form-control input-value" placeholder="Type a Message"><span class="input-group-btn"><button  id="paper-btn" class="btn btn-secondary "  type="button"><i class="icofont icofont-paper-plane"></i></button></span></div></div></div></li>';
    }
    else{

        var newBox = '<li class="chat-single-box card-shadow bg-white active" data-id="{0}"><div class="had-container"><div class="chat-header p-10 bg-gray"><div class="user-info d-inline-block f-left"><div class="box-live-status bg-danger  d-inline-block m-r-10"></div><a href="#">{1}</a></div><div class="box-tools d-inline-block"><a href="#" class="mini"><i class="icofont icofont-minus f-20 m-r-10"></i></a><a class="close" href="#"><i class="icofont icofont-close f-20"></i></a></div></div><div class="chat-body p-10"><div class="message-scrooler"><div class="messages"></div></div></div><div class="chat-footer b-t-muted"><div class="input-group write-msg"><input type="text" class="form-control input-value" placeholder="Type a Message"><span class="input-group-btn"><button  id="paper-btn" class="btn btn-secondary "  type="button"><i class="icofont icofont-paper-plane"></i></button></span></div></div></div></li>';
    }

    $('#main-chat .chat-single-box').removeClass('active');
    $('#main-chat .chat-box .boxs').append(newBox.format(dataId, dataUserName, dataStatus));
    generatePlaceholder();
    messageScroll();
    boxMinimized();
    initialTooltip();




});

$(document).on('focus', '#main-chat .textarea', function () {

    if ($(this).html() == '<span class="placeholder">{0}</span>'.format($(this).data('placeholder'))) {

       $(this).html('');
    }
});

$(document).on('blur', ' #main-chat .textarea', function () {

    if ($(this).html() == '') {

        $(this).html('<span class="placeholder">{0}</span>'.format($(this).data('placeholder')));
    }
});

$(document).on('click', '#main-chat .sidebar-collapse', function () {

    if ($('#main-chat').hasClass('sidebar-closed')) {

        $('#main-chat').removeClass('sidebar-closed');

        $('#main-chat .search input').attr('placeholder', '');
        $('#main-chat .search').css('display', 'block');


        deinitialTooltipSiderbarUserList();



    } else {

        $('#main-chat').addClass('sidebar-closed');

        $('#main-chat .search input').attr('placeholder', $('.search input').data('placeholder'));
        $('#main-chat .search').css('display', 'none');
        $('#main-chat .search').removeAttr('style');
        $('#main-chat .searchbar-closed').removeAttr('style');


        initialTooltipSiderbarUserList();
    }
});

$(document).on('click', '#main-chat .searchbar-closed', function () {

    $('#main-chat .sidebar-collapse').click();
    setTimeout(function () { $('#main-chat .searchbar input').focus(); }, 50);
    return false;
});

$(document).on('click', '#main-chat .chat-single-box .maximize', function () {

   /* window.open('inbox.html', 'window name', "width=300,height=400,scrollbars=yes");
    $(this).parents('.chat-single-box').remove();
    $('.maximize').tooltip('dispose');*/
     parent = $(this).parents('.chat-single-box');
      $(parent.children()[0].children[0]).removeClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','block');
         $(parent.children()[0].children[2]).css('display','block');
       parent.addClass('bg-white');
       parent.addClass('card-shadow');
        messageScroll();
    return false;
});



$(document).on('click', '#main-chat .boxs .minimized .count', function (e) {

    e.stopPropagation();
    hideStickerBox();
    var _parent = $(this).parents('.minimized');

    if (_parent.hasClass('show')) {

        hideMinimizedBox();
    } else {

        _parent.addClass('show');
        var _bottom = parseInt(_parent.css('height').replace('px', ''),0) + 10;
        _parent.find('.chat-dropdown').css({
            'display': 'block',
            'bottom': _bottom
        });
    }
});

$(document).on('click', '#main-chat .boxs .minimized .chat-dropdown .username', function (e) {

    e.stopPropagation();
    var selectedDataId = $(this).parent().data('id');

    $(this).parent().remove();

    boxMinimizedUserAdd();

    $('#main-chat .boxs .chat-single-box').each(function (index) {

        if ($(this).data('id') == selectedDataId) {

            $(this).removeClass('hidden').removeClass('custom-collapsed');
            ActiveChatBox($(this));
        }
    });
});

$(document).on('click', '#main-chat .boxs .minimized .chat-dropdown .remove', function (e) {

    e.stopPropagation();
    var _parent = $(this).parents('.chat-dropdown li');
    dataId = _parent.data('id');

    $('#main-chat .chat-single-box').each(function () {

        if ($(this).data('id') == dataId) {
            $(this).remove();
        }
    });
    _parent.remove();

    boxMinimizedCount();
});
"use strict";
$(document).ready(function() {
    var chatbg = $(window).height()-57;
    $('.chat-bg').css('min-height', chatbg);
    var a = $(window).height() - 70;
    $(".user-box").slimScroll({
        height: a,
        allowPageScroll: false,
        color: '#000'
    });




});
</script>
