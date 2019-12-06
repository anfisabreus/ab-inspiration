(function($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#grid-container').cubeportfolio({
        filters: '#filters-container',
        defaultFilter: '*',
        animationType: 'bounceLeft',
        gapHorizontal: 0,
        gapVertical: 30,
        gridAdjustment: 'alignCenter',
        mediaQueries:
        [{width: 1100, cols: 2}, {width: 800, cols: 3}, {width: 480, cols: 2}] ,
        
        caption: 'minimal',
        displayType: 'lazyLoading',
        displayTypeSpeed: 400,
    });

})(jQuery, window, document);