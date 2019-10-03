/**
 * Module: ui
 * General ui behaviors
 */
var Masonry = require('../node_modules/masonry-layout/masonry');
var $ = require('jquery');

function init() {
    //Start Bootstrap MD JS
    $('body').bootstrapMaterialDesign();
    setSidebar();

    $('select').selectric();

    $(document).on('click', '[data-href]', function () {
        var href = $(this).data('href');
        window.location.href = href;
    });

    // Toggle active state
    $('[data-toggle-active]').on('click', function (e) {
        e.preventDefault();
        var target = $(this).data('toggle-active');
        $(this).toggleClass('active');
        $(target).toggleClass('active');
    });

    $('[data-toggle]').on('click', function (e) {
        e.preventDefault();
        if ($(this).data('toggle') === 'tab') {
            var link = $(this).data('controls');

            $('.tab-link').removeClass('active show');
            $('.tab-pane').removeClass('active show');

            $('.nav-link[data-controls=' + link + ']').addClass('active show');
            $('#' + link).addClass('active show');
        }
    });

    $('.single-post .content-block iframe').each(function() {
        var src = $(this).attr('src');
        if (src.indexOf("soundcloud.com") < 0) {
            $(this).parent().addClass('has-iframe');
        }
    });

    $(".down.arrow").click(function () {
        $('html,body').animate({scrollTop: $(this).offset().top}, 'slow');
    });

    $('#video-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var videoURL = button.data('video');
        $('#video-modal .modal-body').html('<video controls><source src="' + videoURL + '" type="video/mp4"></video>');
    });

    /*$('body').on('click', '.vjs-big-play-button', function() {
        $(this).siblings('.vjs-tech').css('opacity', 1)
    });*/
    $(document).on('click', '.mejs-overlay-play', function() {
        if(!$(this).closest('.mejs-container').hasClass('active')) {
            $(this).closest('.mejs-container').prepend('<div class="close-btn">X</div>')
            $(this).closest('.wp-video').addClass('playing');
            $(this).closest('.mejs-container').addClass('active').find('.mejs-mediaelement').css('opacity', '1');
        }
    });
    $(document).on('click', '.close-btn', function() {
        $(this).closest('.mejs-container').removeClass('active').find('.mejs-mediaelement').css('opacity', '0');
        $(this).closest('.wp-video').removeClass('playing');
        $(this).remove();
        $(".mejs-pause").trigger('click');
    });

    $('.mobile-nav').on('click', function () {
        $('#nav-holder > ul').toggleClass('active');
        $(this).toggleClass('active');
        $('.header').toggleClass('open-nav');
    });

    $('.header-hero').addClass('active');
    $('html').addClass('ready');


    $('.graphic-columns .col').on('click', function () {
        url = $(this).find('a').attr("href");
        window.location = url;
        return true;
    });

    $('.highlights-titles .title').on('click', function () {
        $('.highlights-titles .title').removeClass('active');
        $(this).addClass('active');
        var target = $(this).attr('id');
        $('.highlights-content .content').removeClass('active');
        $('[data-name="'+target+'"]').addClass('active');
        console.log(target);
    });

    $(document).on('focus click', ".gform_body input, .gform_body textarea, .gform_body select", function () {
        $(this).closest('li').addClass("active");
    });
    $(document).on('blur', ".gform_body input, .gform_body textarea, .gform_body select", function () {
        if (!$(this).val()) {
            $(this).closest('li').removeClass("active");
        }
        $('.bmd-form-group.is-filled').each(function () {
            $(this).closest('li').addClass("active");
        });
    });

    $(".bmd-form-group.is-filled").each(function () {
        if(!$(this).closest('.ginput_container').hasClass("ginput_container_select")) {
            $(this).closest('li').addClass("active");
        } else {
            if($(this).find('.selected').text() != '') {
                $(this).closest('li').addClass("active");
            }
        }
    });

    $(document).bind('gform_post_render', function(){
        $(".bmd-form-group.is-filled").each(function () {
            $(this).closest('li').addClass("active");
        });
    });

    $(document).on('click', '.toggle', function(e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .inner').removeClass('show');
            $this.parent().parent().find('li .inner').slideUp(350);
            $this.next().toggleClass('show');
            $this.next().slideToggle(350);
        }
    });


    //dynamic sticky header
    function stickyHeader() {
        if ($('.header').hasClass('sticky')) {
            var header_height = $('.header').outerHeight();
            if ($(".header-gap").length) {
                $(".header-gap").css('padding-top', header_height);
            } else {
                $('.content-wrapper').css('padding-top', header_height);
            }

        }
    }

    //dynamic sticky footer
    function stickyFooter() {
        if ($('.footer').hasClass('sticky')) {
            var footer_height = $('.footer').outerHeight();
            $('.content-wrapper').css({
                'margin-bottom': '-' + footer_height + 'px',
                'padding-bottom': footer_height + 'px'
            });
        }
    }

    //show hide nav on scroll
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop && st > 100){
            $('.header.sticky').css('top', '-100px').removeClass('show');
        } else {

            $('.header.sticky').addClass('show').css('top', '0');
        }
        lastScrollTop = st;
    });

    function smallOnScroll() {
        var header_height = $('.header').height();
        if ($(window).scrollTop() > header_height) {
            $('.header.sticky').addClass('header-small');
        } else {
            $('.header.sticky').removeClass('header-small');
        }
        if ($('.hero-nav').length) {
            var scrollDistace = $(window).scrollTop() + header_height;
            var subOffset = $('.main').offset().top;
            var containerWidth = $('.container:first').width();
            if (scrollDistace > subOffset) {
                $('.hero-nav').addClass('fixed');
                $('.hero-nav.fixed').css({'width': containerWidth + 'px', 'top': header_height + 'px'});
                $('.header.sticky').addClass('no-shadow');
            } else {
                $('.hero-nav').removeClass('fixed').css({'width': '', 'top': ''});
                $('.header.sticky').removeClass('no-shadow');
            }
        }
    }

    //call sticky header and footer to load
    highlightHeight();
    stickyHeader();
    stickyFooter();
    smallOnScroll();
    paralax();
    mobile_img_swap();
    two_container_min_height();
    $(window).bind('scroll', function () {
        stickyFooter();
        //Turn off if you want header to be same size
        smallOnScroll();
        //Allows for header to shrink when below height
        inViewport();

        heroBackground();

        paralax();

        paralax_img();
    });
    inViewport();
    $(window).resize(function () {
        highlightHeight();
        inViewport();
        paralax();
        mobile_img_swap();
        two_container_min_height();
    });

    //Bootstrap Guide
    $("a[href='#']").click(function (e) {
        e.preventDefault();
    });

    var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function () {
        var html = $(this).parent().html();
        html = cleanSource(html);
        $("#source-modal pre").text(html);
        $("#source-modal").modal();
    });

    $(".bs-component").hover(function () {
        $(this).append($button);
        $button.show();
    }, function () {
        $button.hide();
    });

    function cleanSource(html) {
        html = html.replace(/×/g, "&times;")
            .replace(/«/g, "&laquo;")
            .replace(/»/g, "&raquo;")
            .replace(/←/g, "&larr;")
            .replace(/→/g, "&rarr;");

        var lines = html.split(/\n/);

        lines.shift();
        lines.splice(-1, 1);

        var indentSize = lines[0].length - lines[0].trim().length,
            re = new RegExp(" {" + indentSize + "}");

        lines = lines.map(function (line) {
            if (line.match(re)) {
                line = line.substring(indentSize);
            }

            return line;
        });

        lines = lines.join("\n");

        return lines;
    }

    //Slide Down
    $('.slidedown').click(function(){
        $(this).closest('.card').find('.card-body').slideDown('slow', function() {
            $(this).closest('.card').removeClass('collapsed').addClass('open');
        })
    });

    //Smooth Scroll
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('.tab-link')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    var offset = 0;
                    if($("#child-block").length == 0) {
                        offset = 160;
                    }
                    $('html, body').animate({
                        scrollTop: target.offset().top - offset
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                        return false;
                    });
                }
            }
        });
    $('.show-on-load').css('opacity', '1');
}

/**
 * Public API
 * @type {Object}
 */
module.exports = {
    init: init
};
function inViewport(){
    var vewport = $(window).height()-150;
    $('.wp-block-columns').each(function(){
        var divPos = $(this).offset().top,
            topOfWindow = $(window).scrollTop();

        if( divPos < topOfWindow+vewport ){
            $(this).addClass('active');
        }
    });
    $('.waypoint').each(function(){
        var divPos = $(this).offset().top,
            topOfWindow = $(window).scrollTop();

        if( divPos < topOfWindow+vewport ){
            $(this).addClass('active');
        }
    });
    $('.masonry').each(function(){
        var divPos = $(this).offset().top,
            topOfWindow = $(window).scrollTop();

        if( divPos < topOfWindow+vewport ){
            var msnry = new Masonry( '.masonry', {
                itemSelector: '.masonry-item'
            });
        }
    });
}
function setSidebar() {
    var menuArray = [];
    $('.content-holder .menu-item').each(function() {
        menuArray.push($(this).text());
    });
    console.log(menuArray);
    $.each(menuArray, function(index, item) {
        var url = item.replace(/&/g,'and').replace(/ /g, '-').toLowerCase();
        var menu = '<li><a href="#'+url+'">'+item+'</a>';
        $('#sidebar-menu .menu').append(menu);
    });
}

function stickySidebar() {
    var length = $('.sidebar').innerHeight() - $('#sidebar-menu').innerHeight() + $('.sidebar').offset().top;
    var scroll = $(this).scrollTop();
    var height = $('#sidebar-menu').outerHeight();
    var width = $('.sidebar').innerWidth() - 30 + 'px';
    var headerHeight = $('.header').outerHeight();
    var contentHolder = $('.content-holder').outerHeight();
    if(contentHolder > height) {
        $('#sidebar-menu').css({
            'width': width
        });
        if (scroll < $('.sidebar').offset().top - headerHeight) {
            $('#sidebar-menu').css({
                'position': 'absolute',
                'top': '0'
            });
        } else if (scroll > length - headerHeight - 30) {
            $('#sidebar-menu').css({
                'position': 'absolute',
                'bottom': '30px',
                'top': 'auto'
            });
        } else {
            $('#sidebar-menu').css({
                'position': 'fixed',
                'top': headerHeight + 'px',
                'height': height + 'px'
            });
        }
    }
}

function unstickSidebar() {
    $('#sidebar-menu').css({
        'position': 'relative',
        'top': '',
        'height': ''
    });
}

function heroBackground() {
    $('.header-hero').each(function() {
        var x = $(this).offset().top - $(window).scrollTop();
        if($(this).hasClass('has-foreground')) {
            var windowWidht = $(window).width();
            if($(this).hasClass('content-right')) {
                if(windowWidht > 991) {
                    $(this).css('background-position', 'bottom ' + parseInt(x / 3) + 'px left' + ', center top ' + parseInt(x / -2 + 70) + 'px');
                }

            } else {
                if(windowWidht > 991) {
                    $(this).css('background-position', 'bottom ' + parseInt(x / 3) + 'px right' + ', center top ' + parseInt(x / -2 + 70) + 'px');
                }
            }
        } else {
            $(this).css('background-position', 'center top ' + parseInt(x / -2 + 70) + 'px');
        }
    });
}

function mobile_img_swap() {
    $('.leadership-block-image').each(function() {
        var windowWidht = $(window).width();
        if(windowWidht <= 992) {
            var html = $(this).html();
            if($(this).is(':empty')) {
            } else {
                $(this).closest('.row').find('.mobile-img').html(html);
                $(this).html('');
            }
        } else {
            if($(this).is(':empty')) {
                var html = $(this).closest('.row').find('.mobile-img').html();
                $(this).closest('.row').find('.mobile-img').html('');
                $(this).html(html);
            }
        }
    });
}

function paralax() {
    var ww = $( window ).width();
    $('.paralax').each(function() {
        if(($(this).hasClass('paralax-no-mobile') && ww > 991) || !$(this).hasClass('paralax-no-mobile')) {
            var x = $(this).offset().top - $(window).scrollTop();
            if (x > 0) {
                x = '-' + x;
            } else {
                x = Math.abs(x);
            }
            $(this).css('background-position', 'center top ' + parseInt(x / 2) + 'px');
        }
    })
}

function paralax_img() {
    var scrolled = $(window).scrollTop();
    var ww = $( window ).width();
    $('.paralax-img').each(function() {
        if(($(this).hasClass('paralax-no-mobile') && ww > 991) || !$(this).hasClass('paralax-no-mobile')) {
            var cssBottom = parseInt($(this).css('bottom'));
            var initY = $(this).offset().top;
            var height = $(this).height();
            var endY = initY + height;
            var diff = Math.round((scrolled / 7) - 64);
            var ratio = Math.round(cssBottom + diff);

            $(this).css('bottom', diff + 'px');
        }
    })
}

function highlightHeight() {
    var hi = 0;
    $(".highlights-content .content").each(function(){
        var h = $(this).outerHeight();
        if(h > hi){
            hi = h;
        }
    });
    $(".highlights-content").css('min-height', hi+'px');
}

function two_container_min_height() {
    var height = 0;
    var ww = $( window ).width();
    if(ww < 992) {
        var runs = 1;
        $('.two-col-content').each(function () {
            height = $(this).outerHeight();
            $(this).closest('.two-column-bg').children('.background-holder').find('.column-' + runs).css('height', height + 'px');
            if (runs === 1) {
                runs = 2;
            } else {
                runs = 1;
            }
        })
    } else {
        var runs = 1;
        $('.two-col-content').each(function () {
            $(this).closest('.two-column-bg').children('.background-holder').find('.column-' + runs).css('height', '');
            if (runs === 1) {
                runs = 2;
            } else {
                runs = 1;
            }
        });
    }
}

function collapseCards() {
    // get the height of the element's inner content, regardless of its actual size
    var ww = $( window ).width();
    $('.card').each(function() {
        if($(this).hasClass('collapsed') && ww < 992) {
            // var sectionHeight = $(this).outerHeight();
            // var innerHeight = $(this).find('.card-body').outerHeight();
            // var collapsedHeight = sectionHeight - innerHeight;
            $(this).find('.card-body').slideUp( "slow", function() {
                // Animation complete.
            });
            //console.log($(this));
        } else {
            $(this).find('.card-body').slideDown( "slow", function() {
                // Animation complete.
            });
        }
    });
}
