var $ = require('jquery');

function init() {
    $('form[name=resource-search]').submit(function(e) {
        var search = $(this).find('input[type=search]').val();
        $('.search-filters select').each(function() {
            $(this).prop('selectedIndex',0);
        });
        $('select').selectric();
        ajax('', search);
       e.preventDefault('init');
    });

    if($("#card-holder, #recent-posts").length) {
        $( ".search-filters select option:selected" ).each(function() {
            if($(this).val() != '') {
                $(this).closest('.filter-wrap').find('label').hide();
            }  else {
                $(this).closest('.filter-wrap').find('label').show();
            }
        });
        ajax('');
        $('.search-filters select').change(function() {
            var str = "";
            var runs = 1;
            $( ".search-filters select option:selected" ).each(function() {
                if($(this).val() != '') {
                    $(this).closest('.filter-wrap').find('label').hide();
                }  else {
                    $(this).closest('.filter-wrap').find('label').show();
                }
                if(runs > 1) {
                    str += ',';
                }
                str += $( this ).val();
                runs++;
            });
            console.log(str);
            var search = $('form[name=resource-search] input[type=search]').val();
            if($('#recent-posts').length) {
                recent_posts(str, search);
            } else {
                ajax(str, search);
            }
        });

        $('#load-more-btn').on('click', function() {
            var str = "";
            var runs = 1;
            $( ".search-filters select option:selected" ).each(function() {
                if(runs > 1) {
                    str += ',';
                }
                str += $( this ).val();
                runs++;
            });
            console.log(str);
            var search = $('form[name=resource-search] input[type=search]').val();
            ajax_more(str, search);
        })
    }

    if($("#career-holder").length) {
        ajax_careers('');

        $('.careers-filters select').change(function() {
            var str = "";
            var runs = 1;
            str = $( ".careers-filters select option:selected" ).val();
            console.log(str);
            ajax_careers(str);
        })
    }
    if($("#related-articles").length) {
        if($('.tab-link.active').data('related-content') === 1) {
            $('.related-articles-title').show();
            var tab = $('.tab-link.active').data('controls');;
            var page_id = $('.tab-link.active').data('page-id');;
            ajax_related_posts(tab, page_id);
            ajax_related_experts(tab, page_id);
        } else {
            $('.related-articles-title').hide();
            $('#related-articles').html('');
            $('#related-experts').html('');
        }
    }
    $('.tab-link').on('click', function() {
        $('.nav-tabs.mobile .nav-item, .nav-tabs.desktop .nav-item').removeClass('hidden');
        var tab_index = $(this).parent('li').index()+1;
        var runs = 0;
        while(runs < tab_index) {
            runs++;
            $('.nav-tabs.mobile .nav-item:nth-child('+runs+')').addClass('hidden');
        }
        //skip over current tab
        runs = runs+1;
        while(runs > tab_index && runs < 4) {
            $('.nav-tabs.desktop .nav-item:nth-child('+runs+')').addClass('hidden');
            runs++;
        }
        if($(this).data('related-content') === 1) {
            $('.related-articles-title').show();
            var tab = $(this).data('controls');
            var page_id = $(this).data('page-id');
            ajax_related_posts(tab, page_id);
            ajax_related_experts(tab, page_id);
        } else {
            $('.related-articles-title').hide();
            $('#related-articles').html('');
            $('#related-experts').html('');
        }
    })
}
/**
 * Public API
 * @type {Object}
 */
module.exports = {
    init: init
};

function ajax(filters, search) {
    $.ajax({
        type: "post",
        //dataType: 'json',
        url: urls.ajax,
        data: {
            action: "load_sorted_posts",
            filters: filters,
            search: search
        },
        beforeSend: function() {
            $('.loading-holder').show();
            $('#card-holder').hide();
            $('#load-more-btn').hide();
        },
        success: function (response) {
            //console.log(response);
            $("#card-holder").html(response);
            $(document).ready(function() {
                $('.loading-holder').hide();
                $("#card-holder").show();
            });
            if(urls.current_page < $('.max-posts').data('max-posts')) {
                $('#load-more-btn').show();
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            console.log(errorMessage);
        }
    });
}

function recent_posts(filters, search) {
    var pathArray = window.location.pathname.split('/');
    var filtersArray = filters.split(',');
    var filter_path = '/'+pathArray[1]+'/'+pathArray[2]+'?filters=true&expertise='+filtersArray[0]+'&functional='+filtersArray[1];
    window.location.href = filter_path;
}

function ajax_more(filters, search) {
    $.ajax({
        type: "post",
        //dataType: 'json',
        url: urls.ajax,
        data: {
            action: "load_sorted_posts",
            filters: filters,
            search: search,
            page: urls.current_page
        },
        beforeSend: function() {
            $('.loading-holder').show();
            $('#load-more-btn').hide();
        },
        success: function (response) {
            //console.log(response);
            $("#card-holder").append(response);
            $(document).ready(function() {
                $('.loading-holder').hide();
            });
            urls.current_page++;
            if(urls.current_page < $('.max-posts').data('max-posts')) {
                $('#load-more-btn').show();
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            console.log(errorMessage);
        }
    });
}

function ajax_careers(location) {
    $.ajax({
        type: "post",
        //dataType: 'json',
        url: urls.ajax,
        data: {
            action: "load_jobs_by_location",
            location: location
        },
        beforeSend: function() {
            $('.loading-holder').show();
            $('#career-holder .careers').hide();
        },
        success: function (response) {
            //console.log(response);
            $("#career-holder .careers").html(response);
            $(document).ready(function() {
                $('.loading-holder').hide();
                $("#career-holder .careers").show();
            });
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            console.log(errorMessage);
        }
    });
}

function ajax_related_posts(tab, page_id) {
    $.ajax({
        type: "post",
        //dataType: 'json',
        url: urls.ajax,
        data: {
            action: "load_related_posts",
            tab: tab,
            page_id: page_id
        },
        beforeSend: function() {
            $('#related-articles').hide();
        },
        success: function (response) {
            //console.log(response);
            $("#related-articles").html(response);
            $(document).ready(function() {
                $("#related-articles").show();
                inView( '.animate' ).on( 'enter', function(el) {
                    $( el ).addClass( 'visible' );
                } );
            });
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            console.log(errorMessage);
        }
    });
}

function ajax_related_experts(tab, page_id) {
    $.ajax({
        type: "post",
        //dataType: 'json',
        url: urls.ajax,
        data: {
            action: "load_related_experts",
            tab: tab,
            page_id: page_id
        },
        beforeSend: function() {
            $('.experts-loading-holder').show();
            $('#related-experts, .tab-content').hide();
        },
        success: function (response) {
            //console.log(response);
            $("#related-experts").html(response);
            $(document).ready(function() {
                $('.experts-loading-holder').hide();
                $("#related-experts, .tab-content").show();
                inView( '.animate' ).on( 'enter', function(el) {
                    $( el ).addClass( 'visible' );
                } );
                $('#slider-tabs-experts-slider').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                infinite: true
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true
                            },
                        },
                    ]
                });
            });
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            console.log(errorMessage);
        }
    });
}

function hideSearchLabel() {
    $( ".search-filters select option:selected" ).each(function() {
        if($(this).val() != '') {
            $(this).closest('.filter-wrap').find('label').hide();
        }  else {
            $(this).closest('.filter-wrap').find('label').show();
        }
        if(runs > 1) {
            str += ',';
        }
        str += $( this ).val();
        runs++;
    });
}