/*
 *  Main entry point
 */

require('es5-shim');
require('consolelog');

var $ = require('jquery');
var analytics = require('./analytics.js');
var carousel = require('./carousel.js');
var responsive = require('./responsive.js');
var social = require('./social.js');
var ui = require('./ui.js');
var styleguide = require('./styleguide.js');
var forms = require('./forms.js');
var banner = require('./banner.js');
var ajax = require('./ajax.js');
var animate = require('./animate.js');

/**
 * Initialize the app on DOM ready
 */
$(function () {
    analytics.init({
        addGA: false,
        gtmid: ''
    });
    styleguide.init();
    carousel.init();
    social.init({
        fbAppId: ''
    });
    responsive.init();
    ajax.init();
    ui.init();
    forms.init();
    animate.init();
});