<?php
/**
 * GN Horizontal Timeline
 *
 * @package       GNHORIZONT
 * @author        George Nicolaou
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   GN Horizontal Timeline
 * Plugin URI:    https://www.georgenicolaou.me/plugins/gn-horizontal-timeline
 * Description:   Allows you to create a specific horizontal timeline.
 * Version:       1.0.0
 * Author:        George Nicolaou
 * Author URI:    https://www.georgenicolaou.me/
 * Text Domain:   gn-horizontal-timeline
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with GN Horizontal Timeline. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'GNHORIZONT_NAME',			'GN Horizontal Timeline' );

// Plugin version
define( 'GNHORIZONT_VERSION',		'1.0.0' );

// Plugin Root File
define( 'GNHORIZONT_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'GNHORIZONT_PLUGIN_BASE',	plugin_basename( GNHORIZONT_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'GNHORIZONT_PLUGIN_DIR',	plugin_dir_path( GNHORIZONT_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'GNHORIZONT_PLUGIN_URL',	plugin_dir_url( GNHORIZONT_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once GNHORIZONT_PLUGIN_DIR . 'core/class-gn-horizontal-timeline.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  George Nicolaou
 * @since   1.0.0
 * @return  object|Gn_Horizontal_Timeline
 */
function GNHORIZONT() {
	return Gn_Horizontal_Timeline::instance();
}

GNHORIZONT();
