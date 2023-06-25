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
if (!defined('ABSPATH'))
	exit;
// Plugin name
define('GNHORIZONT_NAME', 'GN Horizontal Timeline');

// Plugin version
define('GNHORIZONT_VERSION', '1.0.0');

// Plugin Root File
define('GNHORIZONT_PLUGIN_FILE', __FILE__);

// Plugin base
define('GNHORIZONT_PLUGIN_BASE', plugin_basename(GNHORIZONT_PLUGIN_FILE));

// Plugin Folder Path
define('GNHORIZONT_PLUGIN_DIR', plugin_dir_path(GNHORIZONT_PLUGIN_FILE));

// Plugin Folder URL
define('GNHORIZONT_PLUGIN_URL', plugin_dir_url(GNHORIZONT_PLUGIN_FILE));

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
function GNHORIZONT()
{
	return Gn_Horizontal_Timeline::instance();
}
function timeline_slider_enqueue_scripts()
{
	// Enqueue SwiperJS library
	wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '6.8.4', true);

	// Enqueue SwiperJS styles
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '6.8.4');

	// Enqueue custom styles
	wp_enqueue_style('timeline-slider-css', plugin_dir_url(__FILE__) . 'core/includes/assets/css/timeline-slider.css', array(), '1.0');

	// Enqueue custom script for initializing the slider
	wp_enqueue_script('timeline-slider-script', plugin_dir_url(__FILE__) . 'core/includes/assets/js/timeline-slider.js', array('swiper-js'), '1.0', true);

	// Pass additional settings to the JavaScript file
	$settings = array(
		'autoplay' => true,
		// Enable autoplay
		'autoplayDelay' => 5000, // Set autoplay delay to 5000 milliseconds (5 seconds)
	);
	wp_localize_script('timeline-slider-script', 'timelineSliderSettings', $settings);
}

add_action('wp_enqueue_scripts', 'timeline_slider_enqueue_scripts');

function timeline_slider_shortcode()
{
	ob_start(); ?>

	<div class="timeline-slider-wrapper">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">1957</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">1967</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">1989</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">1996</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">2001</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">2014</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>

				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">2017</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>
				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">2022</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>
				<div class="timeline-slide swiper-slide">
					<div class="timeline-content">
						<div class="image">
							<img src="/wp-content/uploads/2023/06/item1-.svg" alt="Slide Image">
						</div>
						<div class="content">
							<h2 class="year">2023</h2>
							<p>Ο Παρνασσός Στροβόλου έχει ήδη σελίδα στο Facebook και Instagram όπου δημοσιοποιούνται
								διαρκώς τα νέα της ομάδας, διάφορες φωτογραφίες από αγώνες, προπονήσεις και εκδηλώσεις.</p>
						</div>
					</div>
				</div>
				<!-- Add other timeline-slide elements similarly -->
			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
		<div class="timeline-bar">
			<ul class="timeline-years">
				<li class="timeline-year" data-slide="0">1957</li>
				<li class="timeline-year" data-slide="1">1967</li>
				<li class="timeline-year" data-slide="2">1989</li>
				<li class="timeline-year" data-slide="3">1996</li>
				<li class="timeline-year" data-slide="4">2001</li>
				<li class="timeline-year" data-slide="5">2014</li>
				<li class="timeline-year" data-slide="6">2017</li>
				<li class="timeline-year" data-slide="7">2022</li>
				<li class="timeline-year" data-slide="8">2023</li>
			</ul>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

add_shortcode('timeline_slider', 'timeline_slider_shortcode');



add_shortcode('timeline_slider', 'timeline_slider_shortcode');
GNHORIZONT();