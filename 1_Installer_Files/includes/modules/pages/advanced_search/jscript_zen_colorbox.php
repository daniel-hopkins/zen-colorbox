<?php
/**
 * Zen Colorbox
 *
 * @author niestudio (daniel [dot] niestudio [at] gmail [dot] com)
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: jscript_zen_colorbox.php 2012-04-30 niestudio $
 */

if (ZEN_COLORBOX_STATUS == 'true') {
	require_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'zen_colorbox/jquery_colorbox.php');
?>

jQuery(function($) {
  // Search Help on advanced search
  var searchLink = $('a[href*="popupWindow"]');
  var searchUrl = searchLink.attr('href').match(/'(.*?)'/)[1];
  searchLink.attr({
    'href':'#'
  }).colorbox({
    'href':searchUrl,
    width: '550px',
    onComplete: function(){
      $('#cboxLoadedContent').find('a[href*="window.close"]').closest('p').hide();
    }
  });
});
//--></script><?php  } ?>
