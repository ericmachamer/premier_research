var $ = require('jquery');

function init() {
    if($('#thee-style-guide').length) {
        $( ".page-header h1" ).each(function( index ) {
            var src = $( this ).text();
            var id = src.replace(/ /g, "-");
            $('.style-guide-nav ul').append('<li data-src='+id.toLowerCase()+'>'+src+'</li>');
        });
        $('.style-guide-nav ul li').first().addClass('active');
        $('.style-guide-nav ul li').on('click', function() {
            $('.style-guide-nav ul li').removeClass('active');
            $(this).addClass('active');
            var element = $(this).data('src');
            $('.bs-docs-section').hide(300);
            $('#'+element).show(300);
        });
    }
}

module.exports = {
    init: init
};