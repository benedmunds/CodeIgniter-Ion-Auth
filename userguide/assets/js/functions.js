//$(document).ready(function () {
  var mNavbar = '.m-navbar .title, .m-navbar .title-toc';

  $("#toggle_toc").click(function() {
    $('#nav').toggleClass('collapsed');
  })

  $(".togglebar").click(function() {
    $(this).toggleClass('change');
    $('body').toggleClass('show-m-menu');
    $(mNavbar).toggleClass('hide');
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
    $('#cheatsheet').removeClass('hide');
    $('#content').removeClass('hide').addClass('hide');
    $('#nav').addClass('collapsed');
    $(mNavbar).toggleClass('hide');

    if($('#cheatsheet').hasClass('hide') == false) {
      $('body').removeClass('show-m-menu');
      $(".togglebar").removeClass('change');
      $('#content').addClass('hide');
    }
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

  var $elScroll = $('.go-top-btn, .m-navbar')
  window.onscroll = function() {
    $elScroll.addClass('op');
    setTimeout(function() {
      $elScroll.removeClass('op');
    }, 5000);
  }
//});
