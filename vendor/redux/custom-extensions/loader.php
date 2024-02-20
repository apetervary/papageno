<?php

// Replace {$redux_opt_name} with your opt_name.
// Also be sure to change this function name!
if ( ! class_exists( 'Redux' ) ) {
    return;
}
$redux_opt_name = 'miraculous_options';

if(!function_exists('miraculous_redux_register_custom_extension')) :
    function miraculous_redux_register_custom_extension($ReduxFramework) {
			$path = dirname( __FILE__ ) . '/extensions/';
            $folders = scandir( $path, 1 );	
            foreach ( $folders as $folder ) {
                if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
                    continue;
                }
                $extension_class = 'ReduxFramework_Extension_' . $folder;
                if ( ! class_exists( $extension_class ) ) {
                    // In case you wanted override your override, hah.
                    $class_file = $path . $folder . '/extension_' . $folder . '.php';
                    $class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
                    if ( $class_file ) {
                        require_once( $class_file );
                    }
                }
                if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
                    $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
                }
            }
    }

    add_action("redux/extensions/{$redux_opt_name}/before", 'miraculous_redux_register_custom_extension', 0);
endif;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux_ThirdParty_Fixes', false ) ) {

	/**
	 * Class Redux_ThirdParty_Fixes
	 */
	class Redux_ThirdParty_Fixes extends Redux_Class {

		/**
		 * Redux_ThirdParty_Fixes constructor.
		 *
		 * @param object $parent ReduxFramework pointer.
		 */
		public function __construct( $parent ) {
			parent::__construct( $parent );
			add_filter( 'redux/extension/' . $this->parent->args['opt_name'] . '/metaboxes', array( $this, 'metaboxes_extension_override' ), 10, 1 );
		}

		/**
		 * Metaboxes extension override.
		 *
		 * @return string
		 */
		public function metaboxes_extension_override(): string {
		    $path = dirname( __FILE__ ) . '/extensions/';
			return $path .'metaboxes/extension_metaboxes.php';
		}
	}
}