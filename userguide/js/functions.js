//$(document).ready(function () {
    var mNavbar = '.m-navbar .title, .m-navbar .title-toc';
    $("#toggle_toc").click(function() {
        $('#nav').toggleClass('collapsed')
    })

    $(".togglebar").click(function() {
        $(this).toggleClass('change')
        $('body').toggleClass('show-m-menu')
        $(mNavbar).toggleClass('hide')
    })

    $('<div id="cheatsheet" class="container hide"><h2>Cheatsheet</h2><div id="cheatbody"></div></div>').insertBefore('#content');
    $('#content pre.f').each(function(i, el) {
        var desc = $(el).next();
        //console.log(el)
        $(desc).clone().appendTo('#cheatbody');
        $(el).clone().appendTo('#cheatbody');
    });

    $('[href="#cheatsheet"]').bind('click', function() {
        var self = $(this)
        $('#cheatsheet').toggleClass('hide')
        if($('#cheatsheet').hasClass('hide')) {
            $('#content').removeClass('hide')
            self.text('Cheatsheet')
        }
        else {
            $('body').removeClass('show-m-menu')
            $(".togglebar").removeClass('change')
            $('#content').addClass('hide')
            self.text('Hide Cheatsheet')
        }
        $('#nav').addClass('collapsed')
        $(mNavbar).toggleClass('hide')
    });

    function copyText(text) {
        $('body').append('<input style="position: absolute; left: -9999px;" type="text" id="docCopyText" name="doc_copy_text" value="'+text+'"/>');
        $('#docCopyText').select();
        document.execCommand('copy');
        $('#docCopyText').remove();
    }

    $('a[name]').each(function(){
        var self = $(this);
        var te = self.next('h2');
        var name = self.attr('name');
        self.attr('id', name);
        te.html('<span class="wt" style="cursor: pointer;">'+te.text()+' <span title="permalink this title" class="permalink">&#128279;</span></span>')
        te.find('.wt').bind('click', function(){
            location.href="#" + self.attr('name');
            copyText(location.href);
        })
    })

    $('a[href^="#"]:not(.noct)').click(function() {
        $('#content').removeClass('hide')
        $('#cheatsheet').addClass('hide')
        $('#nav').addClass('collapsed')
        $('body').removeClass('show-m-menu')
        $(".togglebar").removeClass('change')
        $(mNavbar).toggleClass('hide')
    })

    //$('.go-top-btn').hide()
    var $elScroll = $('.go-top-btn, .m-navbar')
    window.onscroll = function() {
        $elScroll.addClass('op');
        setTimeout(function() {
            $elScroll.removeClass('op');
        }, 5000);
        //$('.go-top-btn').show().delay(5000).fadeOut(500);
    }
    /*
    $('[data-language]').each(function(i, el) {
        //$(el).wrap('<div class="highlight-wrapper"/>')
        $(el).parent().not('.f').prepend(
            $('<small class="clipboard-copy">[copy]</small>')
            .bind('click', function() {
                var el = $(this)
                var code = el.next().text()
                copyText(code)
                alert('Copied!');
            })
        )
    })
    */

//});
