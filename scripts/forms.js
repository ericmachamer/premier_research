/*
 *  Module: carousel
 */

var $ = require('jquery');

/**
 * Initialize carousels
 */
function init() {
    $('.filter-wrap label').on('click', function() {
        var $this = $(this);
        selectricLabel($this);
    });
    $(document).bind('gform_post_render', function(){
        $('select').selectric();
    });

    $(window).on('resize', function() {
        stickyHeader()
    });

    if($('#nav-holder .search-form-holder .search-field').val()) {
        $('#nav-holder .search-form-holder, body').addClass('active');
        stickyHeader()
    }
    $('#nav-holder .search-form-holder .search-field').on('click', function() {
       $('#nav-holder .search-form-holder, body').addClass('active');
    });
    $('#nav-holder .search-form-holder .search-field').blur(function() {
        if(!$(this).val()) {
            $('#nav-holder .search-form-holder, body').removeClass('active');
        }
    });
    $('.search-submit').on('click', function(e) {
        if($(this).hasClass('open') && !$('#nav-holder .search-form-holder .search-field').val()) {
            $(this).removeClass('open');
            $('#nav-holder .search-form-holder').removeClass('active');
            e.preventDefault();
        } else {
            $('#nav-holder .search-form-holder').addClass('active');
            if(!$('#nav-holder .search-form-holder .search-field').val()) {
                $(this).addClass('open');
                e.preventDefault();
                $('#nav-holder .search-form-holder .search-field').focus();
            } else {
                $("#nav-holder .search-form").submit();
            }
        }
    });
}

/**
 * Public API
 * @type {Object}
 */
module.exports = {
    init: init,
};

function selectricLabel($this) {
    console.log($($this).next('.bmd-form-group').find('select').selectric('open'));
}

function stickyHeader() {
    var ww = $( window ).width();
    if ($('.header').hasClass('sticky')) {
        var header_height = $('.header').outerHeight();
        if(ww < 192) {
            var search_height = $('.search-form-holder').outerHeight();
        } else {
            var search_height = 0
        }

        if ($(".header-gap").length) {
            $(".header-gap").css('padding-top', header_height+search_height);
        } else {
            $('.content-wrapper').css('padding-top', header_height+search_height);
        }
    }
}