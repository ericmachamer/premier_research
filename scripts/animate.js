var $ = require('jquery');

function init() {
    inView( '.animate' ).on( 'enter', function(el) {
        $( el ).addClass( 'visible' );
    } );
}
/**
 * Public API
 * @type {Object}
 */
module.exports = {
    init: init
};
