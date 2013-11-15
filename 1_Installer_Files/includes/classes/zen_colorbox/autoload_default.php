<?php
/**
 * Zen Colorbox
 *
 * @author niestudio (daniel [dot] niestudio [at] gmail [dot] com)
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: autoload_default.php 2012-04-30 niestudio $
 */
?>
jQuery(function($) {
	$("a[rel^='colorbox']").colorbox({<?php require_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'zen_colorbox/options.php'); ?>});;
  // Disable Colobox on main reviews page image
  $("#productMainImageReview a").removeAttr("rel");
});
// Begin Make ColorBox responsive
jQuery.colorbox.settings.maxWidth  = '95%';
jQuery.colorbox.settings.maxHeight = '95%';

// ColorBox resize function
var resizeTimer;
function resizeColorBox() {
  if (resizeTimer) clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
    if (jQuery('#cboxOverlay').is(':visible')) {
      jQuery.colorbox.load(true);
    }
  }, 300);
}

// Resize ColorBox when resizing window or changing mobile device orientation
jQuery(window).resize(resizeColorBox);
window.addEventListener("orientationchange", resizeColorBox, false);
// End Make ColorBox responsive
//--></script>