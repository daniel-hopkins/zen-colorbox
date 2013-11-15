/**
 * Zen Colorbox
 *
 * @author niestudio (daniel [dot] niestudio [at] gmail [dot] com)
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: uninstall.sql 2012-04-30 niestudio $
 */

DELETE FROM `configuration` WHERE `configuration_key` LIKE 'ZEN_COLORBOX_%';
DELETE FROM `configuration_group` WHERE `configuration_group_title` = 'Zen Colorbox';