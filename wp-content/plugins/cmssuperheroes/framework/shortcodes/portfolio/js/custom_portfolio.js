(function ($) {
    "use strict";
    $(window).bind('load', function () {
        var $porfolios = $('div.cshero-portfolio');
        var filters = {};
        $porfolios.each(function () {
            var $this = $(this),
                type = $this.data('type'),
                options = {
                    itemSelector: '.cshero-portfolio-item',
                    percentPosition: true,
                    filter: '.page-1',
                    masonry: {
                      columnWidth: '.grid-sizer'
                    }
                },
                $filter = $this.parent().find('.cshero_portfolio_filters');

            if (type == 'grid') {
                options.layoutMode = 'fitRows';
            }
            $this.isotope(options);
            $filter.find('a').click(function(e){
                e.preventDefault();
                $filter.find("a").removeClass('active');
                $(this).addClass('active');
                var $buttonGroup = $(this).parents('.btn-group');
                var filterGroup = $buttonGroup.attr('data-filter-group');
                if(filterGroup=='category'){
                    filters = {};
                }
                // set filter for group
                filters[ filterGroup ] = $(this).attr('data-filter');
                // combine filters
                var filterValue = '';
                for ( var prop in filters ) {
                    filterValue += filters[ prop ];
                }
                /* show pagination*/
                if(filterGroup=='category'){
                    var cat_slug = filters[filterGroup].replace('.','');
                    $(".cshero_portfolio_filters-pagination").hide();
                    $(".filtered-cat-"+cat_slug).show();
                    $('.category-page-1').addClass('active');
                    if(cat_slug==''){
                        filterValue += '.page-1';
                    }
                    else{
                        filterValue += '.page-'+cat_slug+'-1';
                    }
                }
                if(filterGroup=='page-cat' || filterGroup == 'page'){
                    $("html, body").animate({
                        scrollTop: $buttonGroup.parent().parent().offset().top
                    }, 1100);
                }
                /* end */
                // set filter for Isotope
                $this.isotope({ filter: filterValue });
                return false;
            });
        });
    });
})(jQuery);
