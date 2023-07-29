<?php
/**
 * Init Configuration
 *
 * @author Jegstudio
 * @package kavana
 * @since 1.0.0
 */

namespace Kavana;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Kavana\Block_Patterns;
use Kavana\Block_Styles;

/**
 * Init Class
 *
 * @package kavana
 */
class Init {

	/**
	 * Instance variable
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Class instance.
	 *
	 * @return Init
	 */
	public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Class constructor.
	 */
	private function __construct() {
		$this->load_hooks();
	}

	/**
	 * Load initial hooks.
	 */
	private function load_hooks() {
		// actions.
		add_action( 'init', array( $this, 'add_theme_templates' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'after_theme_setup', array( $this, 'content_width' ), 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_notices', array( $this, 'notice_install_plugin' ) );
		add_action( 'wp_ajax_kavana_set_admin_notice_viewed', array( $this, 'notice_closed' ) );
		add_action( 'admin_init', array( $this, 'load_editor_styles' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'init', array( $this, 'register_block_patterns' ), 9 );
		add_action( 'init', array( $this, 'register_block_styles' ), 9 );

		add_action( 'admin_enqueue_scripts', array( $this, 'dashboard_scripts' ) );

		// filters.
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'excerpt_elipsis' ) );
		add_filter( 'gutenverse_template_path', array( $this, 'template_path' ), null, 3 );
		add_filter( 'gutenverse_themes_template', array( $this, 'add_template' ), 10, 2 );

		add_filter( 'gutenverse_block_config', array( $this, 'default_font' ), 10 );
		add_filter( 'gutenverse_font_header', array( $this, 'default_header_font' ) );
		add_filter( 'gutenverse_global_css', array( $this, 'global_header_style' ) );
	}

	/**
	 * Generate Global Font
	 *
	 * @param string $value  Value of the option.
	 *
	 * @return string
	 */
	public function global_header_style( $value ) {
		$theme_name      = get_stylesheet();
		$global_variable = get_option( 'gutenverse-global-variable-font-' . $theme_name );

		if ( empty( $global_variable ) ) {
			$font_variable = $this->default_font_variable();
			$value        .= \gutenverse_global_font_style_generator( $font_variable );
		}

		return $value;
	}

	/**
	 * Header Font.
	 *
	 * @param mixed $value  Value of the option.
	 *
	 * @return mixed Value of the option.
	 */
	public function default_header_font( $value ) {
		if ( ! $value ) {
			$value = array(
				array(
					'value'  => 'Alfa Slab One',
					'type'   => 'google',
					'weight' => 'bold',
				),
			);
		}

		return $value;
	}

	/**
	 * Alter Default Font.
	 *
	 * @param array $config Array of Config.
	 *
	 * @return array
	 */
	public function default_font( $config ) {
		if ( ! empty( $config['globalVariable']['fonts'] ) && ! empty( $config['globalVariable']['old_fonts'] ) ) {
			$config['globalVariable']['fonts'] = array_merge( $this->default_font_variable(), $config['globalVariable']['fonts'] );
		}

		if ( empty( $config['globalVariable']['fonts'] ) ) {
			$config['globalVariable']['fonts'] = $this->default_font_variable();
		}
		return $config;
	}



	/**
	 * Default Font Variable.
	 *
	 * @return array
	 */
	public function default_font_variable() {
		return array(
			array(
				'id'   => 'h1-style-1',
				'name' => 'H1 Style 1',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '64',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '60',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '36',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'h1-style-2',
				'name' => 'H1 Style 2',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '64',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '60',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '36',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',
					'style'      => 'Italic',
				),
			),
			array(
				'id'   => 'h2',
				'name' => 'H2',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '34',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '34',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',
					'style'      => 'Italic',
				),
			),
			array(
				'id'   => 'h3',
				'name' => 'H3',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '30',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '28',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',

				),
			),
			array(
				'id'   => 'h4',
				'name' => 'H4',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '25',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '22',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '18',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'h5-style-1',
				'name' => 'H5 Style 1',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '22',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '20',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.3',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'h5-style-2',
				'name' => 'H5 Style 2',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '22',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '18',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '15',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '400',
					'style'      => 'Italic',
				),
			),
			array(
				'id'   => 'h6-style-1',
				'name' => 'H6 Style 1',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '15',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '15',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.2',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.2',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.2',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.0625',
					),
					'weight'     => '400',
					'transform'  => 'Uppercase',
				),
			),
			array(
				'id'   => 'h6-style-2',
				'name' => 'H6 Style 2',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '18',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '17',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '16',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '500',
				),
			),
			array(
				'id'   => 'menu',
				'name' => 'Menu',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '15',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '15',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.0625',
					),
					'weight'     => '400',
					'transform'  => 'Uppercase',
				),
			),
			array(
				'id'   => '404',
				'name' => '404',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '200',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '160',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '120',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '400',
					'style'      => 'Italic',
				),
			),
			array(
				'id'   => 'text-editor-1',
				'name' => 'Text Editor 1',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '16',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '16',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '16',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
					),
					'weight'     => '300',

				),
			),
			array(
				'id'   => 'text-editor-2',
				'name' => 'Text Editor 2',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '28',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '18',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.7',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'text-404',
				'name' => 'Text 404',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '18',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '18',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '16',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
					),
					'weight'     => '300',
				),
			),
			array(
				'id'   => 'text-typography',
				'name' => 'Text Typography',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'label-typography',
				'name' => 'Label Typography',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.6',
						),
					),
					'weight'     => '400',
					'transform'  => 'Capitalize',
				),
			),
			array(
				'id'   => 'heading-typography',
				'name' => 'Heading Typography',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.8',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.8',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.8',
						),
					),
					'weight'     => '500',
				),
			),
			array(
				'id'   => 'category-blog',
				'name' => 'Category Blog ',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.0625',
					),
					'weight'     => '500',
					'transform'  => 'Uppercase',
				),
			),
			array(
				'id'   => 'title-blog-1',
				'name' => 'Title Blog 1',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '23',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '22',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
					),
					'weight'     => '500',
				),
			),
			array(
				'id'   => 'title-blog-2',
				'name' => 'Title Blog 2',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '18',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '23',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '22',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
					),
					'weight'     => '500',
				),
			),
			array(
				'id'   => 'title-blog-4',
				'name' => 'Title Blog 4',
				'font' => array(
					'font'       => array(
						'label' => 'Eb Garamond',
						'value' => 'Eb Garamond',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '24',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '20',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1.5',
						),
					),
					'weight'     => '400',
					'style'      => 'Italic',
				),
			),
			array(
				'id'   => 'text-blog',
				'name' => 'Text Blog',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'read-more',
				'name' => 'Read More',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.0625',
					),
					'weight'     => '400',
					'transform'  => 'Uppercase',
				),
			),
			array(
				'id'   => 'input-style-1',
				'name' => 'Input Style 1',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'input-style-12',
				'name' => 'Input Style 12',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'button-font-1',
				'name' => 'Button Font 1',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.0625',
					),
					'weight'     => '400',
				),
			),
			array(
				'id'   => 'button-font-2',
				'name' => 'Button Font 2',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Tablet'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
						'Mobile'  => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.125',
					),
					'weight'     => '400',
					'transform'  => 'Uppercase',
				),
			),
			array(
				'id'   => 'button-font-3',
				'name' => 'Button Font 3',
				'font' => array(
					'font'       => array(
						'label' => 'Josefin Sans',
						'value' => 'Josefin Sans',
						'type'  => 'google',
					),
					'size'       => array(
						'Desktop' => array(
							'unit'  => 'px',
							'point' => '12',
						),
						'Tablet'  => array(
							'unit'  => 'px',
							'point' => '14',
						),
						'Mobile'  => array(
							'unit'  => 'px',
							'point' => '12',
						),
					),
					'lineHeight' => array(
						'Desktop' => array(
							'unit'  => 'em',
							'point' => '1',
						),
					),
					'spacing'    => array(
						'Desktop' => '0.125',
					),
					'weight'     => '400',
					'transform'  => 'Uppercase',
				),
			),
		);
	}

	/**
	 * Add Template to Editor.
	 *
	 * @param array $template_files Path to Template File.
	 * @param array $template_type Template Type.
	 *
	 * @return array
	 */
	public function add_template( $template_files, $template_type ) {
		$directory = get_template_directory();

		if ( 'wp_template' === $template_type ) {
			$new_templates = array(
				'about',
				'contact',
				'gallery',
			);

			foreach ( $new_templates as $template ) {
				$template_files[] = array(
					'slug'  => $template,
					'path'  => $directory . "/gutenverse-templates/templates/{$template}.html",
					'theme' => get_template(),
					'type'  => 'wp_template',
				);
			}
		}

		return $template_files;
	}

	/**
	 * Use gutenverse template file instead.
	 *
	 * @param string $template_file Path to Template File.
	 * @param string $theme_slug Theme Slug.
	 * @param string $template_slug Template Slug.
	 *
	 * @return string
	 */
	public function template_path( $template_file, $theme_slug, $template_slug ) {
		$directory = get_template_directory();

		switch ( $template_slug ) {
			case '404':
				return $directory . '/gutenverse-templates/templates/404.html';
			case 'archive':
				return $directory . '/gutenverse-templates/templates/archive.html';
			case 'index':
				return $directory . '/gutenverse-templates/templates/index.html';
			case 'page':
				return $directory . '/gutenverse-templates/templates/page.html';
			case 'search':
				return $directory . '/gutenverse-templates/templates/search.html';
			case 'single':
				return $directory . '/gutenverse-templates/templates/single.html';
			case 'home':
				return $directory . '/gutenverse-templates/templates/home.html';
			case 'header':
				return $directory . '/gutenverse-templates/parts/header.html';
			case 'footer':
				return $directory . '/gutenverse-templates/parts/footer.html';
			case 'about':
				return $directory . '/gutenverse-templates/templates/about.html';
			case 'contact':
				return $directory . '/gutenverse-templates/templates/contact.html';
			case 'gallery':
				return $directory . '/gutenverse-templates/templates/gallery.html';
		}

		return $template_file;
	}

	/**
	 * Register Block Pattern.
	 */
	public function register_block_patterns() {
		new Block_Patterns();
	}

	/**
	 * Register Block Style.
	 */
	public function register_block_styles() {
		new Block_Styles();
	}

	/**
	 * Excerpt Elipsis.
	 *
	 * @param string $more .
	 *
	 * @return string
	 */
	public function excerpt_elipsis( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '';
	}

	/**
	 * Excerpt Length.
	 *
	 * @param int $length .
	 *
	 * @return int
	 */
	public function excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return 100;
	}

	/**
	 * Notice Closed
	 */
	public function notice_closed() {
		if ( isset( $_POST['nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'kavana_admin_notice' ) ) {
			update_user_meta( get_current_user_id(), 'gutenverse_install_notice', 'true' );
		}
		die;
	}

	/**
	 * Show notification to install Gutenverse Plugin.
	 */
	public function notice_install_plugin() {
		// Skip if gutenverse block activated.
		if ( defined( 'GUTENVERSE' ) ) {
			return;
		}

		// Skip if gutenverse pro activated.
		if ( defined( 'GUTENVERSE_PRO' ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
			return;
		}

		if ( 'true' === get_user_meta( get_current_user_id(), 'gutenverse_install_notice', true ) ) {
			return;
		}

		$button_text = __( 'Check it Now!', 'kavana' );
		$button_link = wp_nonce_url( self_admin_url( 'themes.php?page=kavana-dashboard' ), 'install-plugin_gutenverse' );
		?>
		<style>
			.install-gutenverse-plugin-notice {
				border: 1px solid #E6E6EF;
				border-radius: 5px;
				padding: 20px;
				position: relative;
				overflow: hidden;
				background-image: url(<?php echo esc_url( KAVANA_URI . '/assets/images/mockup-2x.webp' ); ?>);
				background-position: right top;
				background-repeat: no-repeat;
				border-left: 4px solid #5e81f4;
			}

			.install-gutenverse-plugin-notice .notice-dismiss {
				top: 20px;
				right: 20px;
				padding: 0;
			}

			.install-gutenverse-plugin-notice .notice-dismiss:before {
				content: "\f335";
				font-size: 17px;
				width: 25px;
				height: 25px;
				line-height: 25px;
				border: 1px solid #E6E6EF;
				border-radius: 3px;
			}

			.install-gutenverse-plugin-notice h3 {
				margin-top: 5px;
				font-weight: 700;
				font-size: 18px;
			}

			.install-gutenverse-plugin-notice p {
				font-size: 14px;
				font-weight: 300;
			}

			.install-gutenverse-plugin-notice .gutenverse-bottom {
				display: flex;
				align-items: center;
				margin-top: 20px;
			}

			.install-gutenverse-plugin-notice a {
				text-decoration: none;
				margin-right: 20px;
			}

			.install-gutenverse-plugin-notice a.gutenverse-button {
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
				text-decoration: none;
				cursor: pointer;
				font-size: 12px;
				line-height: 18px;
				border-radius: 17px;
				background: #5e81f4;
				color: #fff;
				padding: 8px 30px;
				font-weight: 300;
			}
		</style>
		<script>
		jQuery( function( $ ) {
			$( 'div.notice.install-gutenverse-plugin-notice' ).on( 'click', 'button.notice-dismiss', function( event ) {
				event.preventDefault();

				$.post( ajaxurl, {
					action: 'kavana_set_admin_notice_viewed',
					nonce: '<?php echo esc_html( wp_create_nonce( 'kavana_admin_notice' ) ); ?>',
				} );
			} );
		} );
		</script>
		<div class="notice is-dismissible install-gutenverse-plugin-notice">
			<div class="gutenverse-notice-inner">
				<div class="gutenverse-notice-content">
					<h3><?php esc_html_e( 'Thank you for installing Kavana!', 'kavana' ); ?></h3>
					<p><?php esc_html_e( 'Kavana theme work best with Gutenverse plugin. By installing Gutenverse plugin you may access Kavana templates built with Gutenverse and get access to more than 40 free blocks.', 'kavana' ); ?></p>
					<div class="gutenverse-bottom">
						<a class="gutenverse-button" href="<?php echo esc_url( $button_link ); ?>">
							<?php echo esc_html( $button_text ); ?>
						</a>
						<a target="__blank" href="https://gutenverse.com/">
							<?php esc_html_e( 'More Info', 'kavana' ); ?>
							<span class="dashicons dashicons-arrow-right-alt"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Add Menu
	 */
	public function admin_menu() {
		add_theme_page(
			'Kavana Template',
			'Kavana Template',
			'edit_theme_options',
			'kavana-dashboard',
			array( $this, 'load_kavana_dashboard' ),
			1
		);
	}

	/**
	 * Kavana Template page
	 */
	public function load_kavana_dashboard() {
		?>
			<?php if ( defined( 'GUTENVERSE_VERSION' ) && version_compare( GUTENVERSE_VERSION, '1.1.1', '<=' ) ) { ?>
			<div class="notice is-dismissible">
				<span>
				<?php echo esc_html_e( 'Please install newer version of Gutenverse plugin! (v1.1.2 and above)', 'kavana' ); ?>
				</span>
			</div>
			<?php } ?>
			<?php do_action( 'gutenverse_after_install_notice' ); ?>
			<div id="gutenverse-theme-dashboard"></div>
		<?php
	}

	/**
	 * Add theme template
	 */
	public function add_theme_templates() {
		add_editor_style( 'block-style.css' );
	}

	/**
	 * Custom Logo Parameter
	 */
	public function custom_logo() {
		return array(
			'height'               => 40,
			'width'                => 200,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true,
		);
	}

	/**
	 * Theme setup.
	 */
	public function theme_setup() {
		load_theme_textdomain( 'kavana', KAVANA_DIR . '/languages' );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', $this->custom_logo() );
		add_theme_support( 'editor-styles' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'kavana' ),
			)
		);

		add_editor_style(
			array(
				'./assets/css/core-add.css',
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );
	}

	/**
	 * Set the content width.
	 */
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'gutenverse_content_width', 960 );
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'kavana-style', get_stylesheet_uri(), array(), KAVANA_VERSION );
		wp_add_inline_style( 'kavana-style', $this->load_font_styles() );

		// enqueue additional core css.
		wp_enqueue_style( 'kavana-core-add', KAVANA_URI . '/assets/css/core-add.css', array(), KAVANA_VERSION );

		// enqueue core animation.
		wp_enqueue_script( 'kavana-animate', KAVANA_URI . '/assets/js/index.js', array(), KAVANA_VERSION, true );
		wp_enqueue_style( 'kavana-animate', KAVANA_URI . '/assets/css/animation.css', array(), KAVANA_VERSION );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function dashboard_scripts() {
		$screen = get_current_screen();

		if ( $screen->id === 'appearance_page_kavana-dashboard' ) {
			// enqueue css.
			wp_enqueue_style(
				'kavana-dashboard',
				KAVANA_URI . '/assets/css/dashboard.css',
				array(),
				KAVANA_VERSION
			);

			// enqueue js.
			wp_enqueue_script(
				'kavana-dashboard',
				KAVANA_URI . '/assets/js/dashboard.js',
				array( 'wp-api-fetch' ),
				KAVANA_VERSION,
				true
			);

			wp_localize_script( 'kavana-dashboard', 'GutenThemeConfig', $this->theme_config() );
		}
	}

	/**
	 * Register static data to be used in theme's js file
	 */
	public function theme_config() {
		return array(
			'images'       => KAVANA_URI . '/assets/img/',
			'title'        => esc_html__( 'Get Advanced Templates for Free!', 'kavana' ),
			'description'  => esc_html__( 'By just installing and activate Gutenverse plugin you will be able to use this theme\'s advanced templates. With Gutenverse plugin installed, you gain access to both advance version of templates and block patterns for free which all built using Gutenverse blocks.', 'kavana' ),
			'title2'       => esc_html__( 'Comparison using Gutenverse vs WordPress Core', 'kavana' ),
			'title3'       => esc_html__( 'Benefits for Installing Kavana\'s Gutenverse Version', 'kavana' ),
			'description3' => esc_html__( 'You can customize your website instantly with powerful and lightweight add-ons plugin for Gutenberg/FSE.', 'kavana' ),
			'note'         => esc_html__( 'Note: Clicking the button will both install and activate Gutenverse plugin and templates for this theme. Please first backup your current templates if you have any changes to it.', 'kavana' ),
			'note2'        => esc_html__( 'Note 2: (Gutenverse version 1.7.0 & above required!)', 'kavana' ),
			'demo'         => esc_html__( 'View Live Demo →', 'kavana' ),
			'demoUrl'      => esc_url( 'https:/gutenverse.com/demo?name=kavana' ),
			'install'      => '',
			'installText'  => esc_html__( 'Install Gutenverse Plugin', 'kavana' ),
			'activateText' => esc_html__( 'Activate Gutenverse Plugin', 'kavana' ),
			'doneText'     => esc_html__( 'Gutenverse Plugin Installed', 'kavana' ),
			'pages'        => array(
				'home'     => KAVANA_URI . '/assets/img/page-home.webp',
				'gallery'  => KAVANA_URI . '/assets/img/page-gallery.webp',
				'about'    => KAVANA_URI . '/assets/img/page-about.webp',
				'contact'  => KAVANA_URI . '/assets/img/page-contact.webp',
				'category' => KAVANA_URI . '/assets/img/page-category.webp',
			),
			'table'        => array(
				'titles'   => array(
					null,
					esc_html__( 'Gutenverse', 'kavana' ),
					esc_html__( 'WordPress Core', 'kavana' ),
				),
				'features' => array(
					esc_html__( 'Advanced Templates', 'kavana' ),
					esc_html__( 'Responsive Styling', 'kavana' ),
					esc_html__( 'Variety of Fonts', 'kavana' ),
					esc_html__( 'Icon Library', 'kavana' ),
					esc_html__( 'Animation Effects', 'kavana' ),
					esc_html__( 'Form Builder', 'kavana' ),
				),
			),
			'benefits'     => array(
				'title'    => esc_html__( 'Features', 'kavana' ),
				'features' => array(
					esc_html__( 'Modern and clean design', 'kavana' ),
					esc_html__( '5+ Ready to use templates', 'kavana' ),
					esc_html__( '15+ template parts', 'kavana' ),
					esc_html__( 'Fully responsive layout', 'kavana' ),
					esc_html__( 'Fully customizable', 'kavana' ),
				),
			),
		);
	}

	/**
	 * Load Font Styles
	 */
	public function load_font_styles() {
		$font_families = array(
			'Eb Garamond:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600',
			'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600',
		);

		$fonts_url = add_query_arg(
			array(
				'family'  => implode( '&family=', $font_families ),
				'display' => 'swap',
			),
			'https://fonts.googleapis.com/css2'
		);

		$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ), 'woff' );

		return "@import url({$contents});";
	}

	/**
	 * Load Editor Styles
	 */
	public function load_editor_styles() {
		wp_add_inline_style( 'wp-block-library', $this->load_font_styles() );
	}
}
