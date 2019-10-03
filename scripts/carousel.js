/*
 *  Module: carousel
 */

require('../node_modules/slick-carousel/slick/slick');

var $ = require('jquery');

/**
 * Initialize carousels
 */
function init() {
    $('.block-slider').each(function() {
        var slides = 4;
        var mobile_slides = slides/2;
        $(this).slick({
            infinite: true,
            slidesToShow: slides,
            slidesToScroll: slides,
            arrows: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: Math.floor(mobile_slides),
                        slidesToScroll: Math.floor(mobile_slides),
                        infinite: true
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        adaptiveHeight: true
                    },
                },
            ]
        });
    });

    $( ".block-slider" ).each(function() {
        $( this ).css( "opacity", '1' );
    });
}

/**
 * Public API
 * @type {Object}
 */
module.exports = {
    init: init,
};