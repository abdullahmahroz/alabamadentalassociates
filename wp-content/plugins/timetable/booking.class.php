<?php
class TTBooking
{
	public static function getBookings($args)
	{
		$args = shortcode_atts(array(
			'booking_id' => 0,
			'event_id' => 0,
			'per_page' => 0,
			'page_number' => 1,
			'order' => 'ASC',
			'orderby' => '',
		), $args);
		
		global $wpdb;
		
		$query = '';
		$queryArgs = array();
		
		$query .= 
		'SELECT 
			booking.booking_id AS booking_id,
			booking.booking_datetime AS booking_datetime,
			booking.validation_code,
			event.ID AS event_id, 
			event.post_title AS event_title, 
			event_hour.event_hours_id,
			TIME_FORMAT(event_hour.start, "%H:%i") AS start,
			TIME_FORMAT(event_hour.end, "%H:%i") AS end,
			event_hour.before_hour_text as event_description_1, 
			event_hour.after_hour_text as event_description_2, 
			weekday.post_title AS weekday, 
			user.ID AS user_id,
			user.display_name AS user_name,
			user.user_email, 
			guest.guest_id AS guest_id,
			guest.name AS guest_name,
			guest.email AS guest_email,
			guest.phone AS guest_phone,
			guest.message AS guest_message
		FROM 
			' . $wpdb->prefix . 'event_hours_booking AS booking
		LEFT JOIN 
			' . $wpdb->prefix . 'event_hours AS event_hour 
			ON (event_hour.event_hours_id=booking.event_hours_id)
		LEFT JOIN 
			' . $wpdb->posts . ' AS event 
			ON (event.ID=event_hour.event_id)
		LEFT JOIN 
			' . $wpdb->posts . ' AS weekday 
			ON (weekday.ID=event_hour.weekday_id)
		LEFT JOIN 
			' . $wpdb->users . ' AS user 
			ON (user.ID=booking.user_id)
		LEFT JOIN 
			' . $wpdb->prefix . 'timetable_guests AS guest
			ON (guest.guest_id=booking.guest_id)';
		
		if($args['event_id'])
		{
			$query .= 
			' WHERE event_hour.event_id=%d';
			$queryArgs[] = (int)$args['event_id'];
		}
		
		if($args['booking_id'])
		{
			$query .= 
			' WHERE booking.booking_id=%d';
			$queryArgs[] = (int)$args['booking_id'];
		}
		
		$order = ($args && strtolower($args['order'])!='desc' ? 'ASC' : 'DESC');
		if($args['orderby'])
		{
			switch($args['orderby'])
			{
				case 'booking':
					$query .= ' ORDER BY booking_id ' . $order;
					break;
				case 'date':
					$query .= ' ORDER BY weekday.menu_order ' . $order . ', start ' . $order . ', end ' . $order . '';
					break;
				case 'event':
					$query .= ' ORDER BY event_title ' . $order;
					break;
				case 'user':
					$query .= ' ORDER BY user_name ' . $order;
					break;
			}
		}
		else
		{
			$query .= ' ORDER BY booking_id ' . $order;
		}
		
		if($args['per_page'])
		{
			$query .= ' LIMIT %d';
			$queryArgs[] = $args['per_page'];
		}
		
		if($offset = ($args['page_number'] - 1) * $args['per_page'])
		{
			$query .= ' OFFSET %d';
			$queryArgs[] = $offset;
		}		

		$query = $wpdb->prepare($query, $queryArgs);
		$result = $wpdb->get_results($query, 'ARRAY_A');
		return $result;
	}
	
	public static function deleteBooking($booking_id)
	{
		global $wpdb;

		//remove guest associated with the booking
		if($guest_id = $wpdb->get_var($wpdb->prepare('SELECT guest_id FROM `' . $wpdb->prefix . 'event_hours_booking` WHERE booking_id=%d', $booking_id)))
		{
			$query = $wpdb->prepare('DELETE FROM `' . $wpdb->prefix . 'timetable_guests` WHERE guest_id=%d', $guest_id);
			$wpdb->query($query);
		}

		$query = $wpdb->prepare('DELETE FROM `' . $wpdb->prefix . 'event_hours_booking` WHERE booking_id=%d', $booking_id);
		$result = $wpdb->query($query);	
		return $result;
	}

}