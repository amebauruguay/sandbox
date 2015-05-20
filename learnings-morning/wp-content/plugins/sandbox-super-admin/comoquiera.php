<?php
if (!class_exists('sandbox_add_basic_user')) {
	class sandbox_add_basic_user {

		private static $initiated = false;
       
        /**
		 * Constructor
		 *
		 * @uses add_action() , add_shortcode(), add_filter(), register_activation_hook()
		*/

		function __construct() {
        } 
        
        public static function install(){
            self::init();
            flush_rewrite_rules();
        }   

        public static function deactivate(){
        	remove_role( 'basic_admin2' );
            self::$initiated = false;
            flush_rewrite_rules();
        }
        
        public static function init(){
            if ( ! self::$initiated ) {
			 self::init_hooks();
            }
            self::register_basic_user();
        }
        
        private static function init_hooks() {
            self::$initiated = true;
        }
        
        private static function register_basic_user() {

        	$role='basic_admin2';
			$display_name = 'Basic Admin2';
			$capabilities = array(
			    'read' => true, // True allows that capability
			    'edit_posts' => true,
			    'delete_posts' => false, // Use false to explicitly deny
			);

			add_role( $role, $display_name, $capabilities );
        }
    }
}
?>