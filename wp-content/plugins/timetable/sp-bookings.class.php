<?php
class SP_Bookings
{
	static $instance;
	public $BookingsList;

	public static function get_instance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __construct()
	{
		add_filter('set-screen-option', array(__CLASS__, 'set_screen'), 10, 3);
		add_action('admin_menu', array($this, 'plugin_menu'));
	}
	
	public static function set_screen($status, $option, $value)
	{
		return $value;
	}
	
	public function plugin_menu()
	{
		$admin_booking_hook = add_menu_page(__('Timetable Bookings', 'timetable'), __('Timetable Bookings', 'timetable'), 'manage_options', 'timetable_admin_bookings', array($this, 'bookings_page'), '', 20);
		add_action('load-' . $admin_booking_hook, array($this, 'screen_option'));
	}
	
	public function screen_option()
	{
		$option = 'per_page';
		$args   = array(
			'label' => 'Bookings',
			'default' => 20,
			'option' => 'bookings_per_page'
		);
		
		add_screen_option($option, $args);
		
		$this->BookingsList = new Bookings_List();
		$this->BookingsList->process_bulk_action();
	}
	
	public function bookings_page()
	{
		?>
		<div class="wrap">
			<h2><?php _e('Bookings list', 'timetable'); ?></h2>
				<form method="post">
					<?php
					$this->BookingsList->prepare_items();
					$this->BookingsList->display();
					?>
				</form>
		</div>
		<?php
	}
	
}
