/**
 * @file
 * Javascript for Field Time Duration.
 */

/**
 * Provides a color selection for fancier widget.
 */
(function ($) {
  Drupal.behaviors.color_selection_set = {
    attach: function () {

//////////////////////////////////////////////   

$("#color_selection_picker").spectrum({
    preferredFormat: "hex"
});


    
 }
}
})(jQuery);
