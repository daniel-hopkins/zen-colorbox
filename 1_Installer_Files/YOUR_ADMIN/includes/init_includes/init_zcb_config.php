<?php
/**
 * Zen Colorbox
 *
 * @copyright 2013 C Jones
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: init_zcb_config.php v1.2 01/20/2014 C Jones $
 */

    $zcb_menu_title = 'Zen Colorbox';
    $zcb_menu_text = 'Configure Zen Colorbox Settings';

    /* find if Zen Colorbox Configuration Group Exists */
    $sql = "SELECT * FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title = '".$zcb_menu_title."'";
    $original_config = $db->Execute($sql);

    if($original_config->RecordCount())
    {
        // if exists updating the existing Zen Colorbox configuration group entry
        $sql = "UPDATE ".TABLE_CONFIGURATION_GROUP." SET 
                configuration_group_description = '".$zcb_menu_text."' 
                WHERE configuration_group_title = '".zcb_menu_title."'";
        $db->Execute($sql);
        $sort = $original_config->fields['sort_order'];
    }else{
        /* Find max sort order in the configuation group table -- add 2 to this value to create the Zen Colorbox configuration group ID */
        $sql = "SELECT (MAX(sort_order)+2) as sort FROM ".TABLE_CONFIGURATION_GROUP;
        $result = $db->Execute($sql);
        $sort = $result->fields['sort'];

        /* Create Zen Colorbox configuration group */
        $sql = "INSERT INTO ".TABLE_CONFIGURATION_GROUP." (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (NULL, '".$zcb_menu_title."', '".$zcb_menu_text."', ".$sort.", '1')";
        $db->Execute($sql);
   }

    /* Find configuation group ID of Zen Colorbox */
    $sql = "SELECT configuration_group_id FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title='".$zcb_menu_title."' LIMIT 1";
    $result = $db->Execute($sql);
        $zcb_configuration_id = $result->fields['configuration_group_id'];

    /* Remove Zen Colorbox items from the configuration table */
    $sql = "DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_group_id ='".$zcb_configuration_id."'";
        $db->Execute($sql);

//-- Add Values to Zen Colorbox Configuration Group (Admin > Configuration > Zen Colorbox)
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '<b>Zen Colorbox</b>', 'ZEN_COLORBOX_STATUS', 'true', '<br />If true, all product images on the following pages will be displayed within a lightbox:<br /><br />- document_general_info<br />- document_product_info<br />- page (EZ-Pages)<br />- product_free_shipping_info<br />- product_info<br />- product_music_info<br />- product_reviews<br />- product_reviews_info<br />- product_reviews_write<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 100, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Overlay Opacity', 'ZEN_COLORBOX_OVERLAY_OPACITY', '0.6', '<br />Controls the transparency of the overlay.<br /><br /><b>Default: 0.6</b>', '".$zcb_configuration_id."', 101, NULL, now(), NULL, 'zen_cfg_select_option(array(''0'', ''0.1'', ''0.2'', ''0.3'', ''0.4'', ''0.5'', ''0.6'', ''0.7'', ''0.8'', ''0.9'', ''1''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Resize Duration', 'ZEN_COLORBOX_RESIZE_DURATION', '400', '<br />Controls the speed of the image resizing.<br /><br />Note: This value is measured in milliseconds.<br /><br /><b>Default: 400</b><br />', '".$zcb_configuration_id."', 102, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Initial Width', 'ZEN_COLORBOX_INITIAL_WIDTH', '250', '<br />If Enable Resize Animations is set to true, the lightbox will resize its width from this value to the current image width, when first displayed.<br /><br />Note: This value is measured in pixels.<br /><br /><b>Default: 250</b><br />', '".$zcb_configuration_id."', 103, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Initial Height', 'ZEN_COLORBOX_INITIAL_HEIGHT', '250', '<br />If Enable Resize Animations is set to true, the lightbox will resize its height from this value to the current image height, when first displayed.<br /><br />Note: This value is measured in pixels.<br /><br /><b>Default: 250</b><br />', '".$zcb_configuration_id."', 104, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Display Image Counter', 'ZEN_COLORBOX_COUNTER', 'true', '<br />If true, the image counter will be displayed (below the caption of each image) within the lightbox.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 105, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Close on Overlay Click', 'ZEN_COLORBOX_CLOSE_OVERLAY', 'false', '<br />If true, the lightbox will close when the overlay is clicked.<br /><br /><b>Default: false</b>', '".$zcb_configuration_id."', 106, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Loop', 'ZEN_COLORBOX_LOOP', 'true', '<br />If true, Images will loop in both directions.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 107, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '<b>Slideshow</b>', 'ZEN_COLORBOX_SLIDESHOW', 'false', '<br />If true, Images will display as a slideshow.<br /><br /><b>Default: false</b>', '".$zcb_configuration_id."', 200, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; Slideshow Auto Start', 'ZEN_COLORBOX_SLIDESHOW_AUTO', 'true', '<br />If true, your slideshow will auto start.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 201, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; Slideshow Speed', 'ZEN_COLORBOX_SLIDESHOW_SPEED', '2500', '<br />Sets the speed of the slideshow <br /><br />Note: This value is measured in milliseconds.<br /><br /><b>Default: 2500</b>', '".$zcb_configuration_id."', 202, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; Slideshow Start Text', 'ZEN_COLORBOX_SLIDESHOW_START_TEXT', 'start slideshow', '<br />Link text to start the slideshow.<br /><br /><b>Default: start slideshow</b>', '".$zcb_configuration_id."', 203, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; Slideshow Stop Text', 'ZEN_COLORBOX_SLIDESHOW_STOP_TEXT', 'stop slideshow', '<br />Link text to stop the slideshow.<br /><br /><b>Default: stop slideshow</b>', '".$zcb_configuration_id."', 204, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '<b>Gallery Mode</b>', 'ZEN_COLORBOX_GALLERY_MODE', 'true', '<br />If true, the lightbox will allow additional images to quickly be displayed using previous and next buttons.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 300, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; Include Main Image in Gallery', 'ZEN_COLORBOX_GALLERY_MAIN_IMAGE', 'true', '<br />If true, the main product image will be included in the lightbox gallery.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 301, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '<b>EZ-Pages Support</b>', 'ZEN_COLORBOX_EZPAGES', 'true', '<br />If true, the lightbox effect will be used for linked images on all EZ-Pages.<br /><br /><b>Default: true</b>', '".$zcb_configuration_id."', 400, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";
    $db->Execute($sql);
	$sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, '&nbsp; File Types', 'ZEN_COLORBOX_FILE_TYPES', 'jpg,png,gif', '<br />On EZ-Pages, the lightbox effect will be applied to all images with one of the following file types.<br /><br /><b>Default: jpg,png,gif</b><br />', '".$zcb_configuration_id."', 401, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
    $sql = "INSERT INTO ".TABLE_CONFIGURATION." (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES (NULL, 'Zen Colorbox Version', 'ZEN_COLORBOX_VERSION', '1.0', 'Zen Colorbox Version', '".$zcb_configuration_id."', 0, NULL, now(), NULL, 'zen_cfg_select_option(array(''1.0''),')";
    $db->Execute($sql);

   if(file_exists(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.zcb.php'))
    {
        if(!unlink(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.zcb.php'))
	{
		$messageStack->add('The auto-loader file '.DIR_FS_ADMIN.'includes/auto_loaders/config.zcb.php has not been deleted. For this module to work you must delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.zcb.php file manually.  Before you post on the Zen Cart forum to ask, YES you are REALLY supposed to follow these instructions and delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.zcb.php file.','error');
	};
    }

$messageStack->add('Zen Colorbox v1.3 install completed!','success');

  $zcb_zc_versionck = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
  if ($zcb_zc_versionck) { // BOF - Continue Zen Cart 1.5.0 install ?
	  if (!zen_page_key_exists('configZenColorbox')) { // BOF - First check is there an existing admin page registered?
		  if ((int) $zcb_configuration_id > 0) { // BOF - Second check is the configuration_id greater than 0?
				// Now register Admin Menu for Zen Colorbox Configuration Menu
				zen_register_admin_page('configZenColorbox',
				'BOX_CONFIGURATION_ZEN_COLORBOX', 'FILENAME_CONFIGURATION',
				'gID=' . $zcb_configuration_id, 'configuration', 'Y',
				$admin_page_sort);
		  }
		  // EOF - Second check is the configuration_id greater than 0?
	  }
	  // EOF - First check is there an existing admin page registered?
  }
  // EOF - Continue Zen Cart 1.5.0 install?