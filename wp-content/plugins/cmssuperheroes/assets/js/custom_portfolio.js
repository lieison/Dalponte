(function ($) {
    "use strict";
    $(window).bind('load', function () {
        var $porfolios = $('div.cs-portfolio');
        $porfolios.each(function () {
            var $this = $(this),
                type = $this.data('type'),
                options = {
                    itemSelector: '.cs-portfolio-item'
                },
                $filter = $this.parent().find('.cs_portfolio_filters');

            if (type == 'grid') {
                options.layoutMode = 'fitRows';
            }
            $this.isotope(options);
            $filter.find('a').click(function(e){
                e.preventDefault();
                $filter.find("li").removeClass('active');
                $(this).parent().addClass('active');
                var data_filter = $(this).data('filter');
                $this.isotope({
                    filter: data_filter
                });
            });
        });
    });
})(jQuery);
