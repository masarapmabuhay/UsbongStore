// Wrap IIFE around your code
(function($, viewport){
    $(document).ready(function() {

        // gives the tallest height of product-item-div as min height to all product-item-div's
        function resizeProductItemDivs() {
            var maxHeight = 0;
            // get maxHeight of all product-item-div
            $("[data='product-item-div']").each(function(index) {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            // set height for all product-item-div
            $("[data='product-item-div']").each(function(index) {
                if (viewport.is('xs')) {
                    $(this).css('min-height', '');
                } else {
                    $(this).css('min-height', maxHeight);
                }
            });
        }
        
        // if main-pane is taller than right-pane, gives the height of main-pane to right-pane
        function resizeRightPane() {
            // clear all height formatting of right pane
            $("[data='right-pane']").css('height', '');
            // collect data
            var mainPaneHeight = $("[data='main-pane']").height();
            var rightPaneHeight = $("[data='right-pane']").height();
            if (viewport.is('>sm')) {
                if (mainPaneHeight > rightPaneHeight) {
                    $("[data='right-pane']").css('height', mainPaneHeight);
                }
            }
        }        

        // init
        resizeProductItemDivs();
        resizeRightPane();
        
        // Execute code each time window size changes
        $(window).resize(
            viewport.changed(function() {
                resizeProductItemDivs();
                resizeRightPane();
            })
        );
    });
})(jQuery, ResponsiveBootstrapToolkit);