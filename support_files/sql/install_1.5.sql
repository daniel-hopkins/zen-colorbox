/**
 * Zen Colorbox
 *
 * @author niestudio (daniel [dot] niestudio [at] gmail [dot] com)
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: install_1.5.sql 2012-05-20 niestudio $
 */

INSERT INTO `configuration_group` VALUES (NULL, 'Zen Colorbox', 'Configure Zen Colorbox settings', '0', '1');
UPDATE `configuration_group` SET `sort_order` = LAST_INSERT_ID() WHERE `configuration_group_id` = LAST_INSERT_ID();

SELECT @cgi := `configuration_group_id` FROM `configuration_group` WHERE `configuration_group_title` = 'Zen Colorbox';

INSERT INTO `configuration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES
(NULL, '<b>Zen Colorbox</b>', 'ZEN_COLORBOX_STATUS', 'true', '<br />If true, all product images on the following pages will be displayed within a lightbox:<br /><br />- document_general_info<br />- document_product_info<br />- page (EZ-Pages)<br />- product_free_shipping_info<br />- product_info<br />- product_music_info<br />- product_reviews<br />- product_reviews_info<br />- product_reviews_write<br /><br /><b>Default: true</b>', @cgi, 100, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(NULL, 'Overlay Opacity', 'ZEN_COLORBOX_OVERLAY_OPACITY', '0.6', '<br />Controls the transparency of the overlay.<br /><br /><b>Default: 0.6</b>', @cgi, 101, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''0'', ''0.1'', ''0.2'', ''0.3'', ''0.4'', ''0.5'', ''0.6'', ''0.7'', ''0.8'', ''0.9'', ''1''), '),
(NULL, 'Resize Duration', 'ZEN_COLORBOX_RESIZE_DURATION', '400', '<br />Controls the speed of the image resizing.<br /><br />Note: This value is measured in milliseconds.<br /><br /><b>Default: 400</b><br />', @cgi, 102, NOW(), NOW(), NULL, NULL),
(NULL, 'Initial Width', 'ZEN_COLORBOX_INITIAL_WIDTH', '250', '<br />If Enable Resize Animations is set to true, the lightbox will resize its width from this value to the current image width, when first displayed.<br /><br />Note: This value is measured in pixels.<br /><br /><b>Default: 250</b><br />', @cgi, 103, NOW(), NOW(), NULL, NULL),
(NULL, 'Initial Height', 'ZEN_COLORBOX_INITIAL_HEIGHT', '250', '<br />If Enable Resize Animations is set to true, the lightbox will resize its height from this value to the current image height, when first displayed.<br /><br />Note: This value is measured in pixels.<br /><br /><b>Default: 250</b><br />', @cgi, 104, NOW(), NOW(), NULL, NULL),
(NULL, 'Display Image Counter', 'ZEN_COLORBOX_COUNTER', 'true', '<br />If true, the image counter will be displayed (below the caption of each image) within the lightbox.<br /><br /><b>Default: true</b>', @cgi, 105, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(NULL, 'Close on Overlay Click', 'ZEN_COLORBOX_CLOSE_OVERLAY', 'false', '<br />If true, the lightbox will close when the overlay is clicked.<br /><br /><b>Default: false</b>', @cgi, 106, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(NULL, 'Loop', 'ZEN_COLORBOX_LOOP', 'true', '<br />If true, Images will loop in both directions.<br /><br /><b>Default: true</b>', @cgi, 107, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(NULL, '<b>Slideshow</b>', 'ZEN_COLORBOX_SLIDESHOW', 'false', '<br />If true, Images will display as a slideshow.<br /><br /><b>Default: false</b>', @cgi, 200, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(NULL, '&nbsp; Slideshow Auto Start', 'ZEN_COLORBOX_SLIDESHOW_AUTO', 'true', '<br />If true, your slideshow will auto start.<br /><br /><b>Default: true</b>', @cgi, 201, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(NULL, '&nbsp; Slideshow Speed', 'ZEN_COLORBOX_SLIDESHOW_SPEED', '2500', '<br />Sets the speed of the slideshow <br /><br />Note: This value is measured in milliseconds.<br /><br /><b>Default: 2500</b>', @cgi, 202, NOW(), NOW(), NULL, NULL),
(NULL, '&nbsp; Slideshow Start Text', 'ZEN_COLORBOX_SLIDESHOW_START_TEXT', 'start slideshow', '<br />Link text to start the slideshow.<br /><br /><b>Default: start slideshow</b>', @cgi, 203, NOW(), NOW(), NULL, NULL),
(NULL, '&nbsp; Slideshow Stop Text', 'ZEN_COLORBOX_SLIDESHOW_STOP_TEXT', 'stop slideshow', '<br />Link text to stop the slideshow.<br /><br /><b>Default: stop slideshow</b>', @cgi, 204, NOW(), NOW(), NULL, NULL),
(NULL, '<b>Gallery Mode</b>', 'ZEN_COLORBOX_GALLERY_MODE', 'true', '<br />If true, the lightbox will allow additional images to quickly be displayed using previous and next buttons.<br /><br /><b>Default: true</b>', @cgi, 300, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(NULL, '&nbsp; Include Main Image in Gallery', 'ZEN_COLORBOX_GALLERY_MAIN_IMAGE', 'true', '<br />If true, the main product image will be included in the lightbox gallery.<br /><br /><b>Default: true</b>', @cgi, 301, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(NULL, '<b>EZ-Pages Support</b>', 'ZEN_COLORBOX_EZPAGES', 'true', '<br />If true, the lightbox effect will be used for linked images on all EZ-Pages.<br /><br /><b>Default: true</b>', @cgi, 400, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(NULL, '&nbsp; File Types', 'ZEN_COLORBOX_FILE_TYPES', 'jpg,png,gif', '<br />On EZ-Pages, the lightbox effect will be applied to all images with one of the following file types.<br /><br /><b>Default: jpg,png,gif</b><br />', @cgi, 401, NOW(), NOW(), NULL, NULL);
INSERT INTO `admin_pages` (`page_key` ,`language_key` ,`main_page` ,`page_params` ,`menu_key` ,`display_on_menu` ,`sort_order`)VALUES 
('configZenColorbox', 'BOX_CONFIGURATION_ZEN_COLORBOX', 'FILENAME_CONFIGURATION', CONCAT('gID=',@cgi), 'configuration', 'Y', @cgi);
