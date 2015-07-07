jQuery(document).ready(function($){
    "use strict";
    jQuery('ul.rating-filter > li.filter').click(function(){
        var $filter = $(this);
        var $filter_value = $(this).data('filter');
        var $wraper = $(this).parent().parent().parent().parent().parent().parent();
        $wraper.find('.filter').removeClass('active');
        $filter.addClass('active');
        $wraper.find('.cshero-rating-list').hide();
        $wraper.find('.category-'+$filter_value).show();
    });
});