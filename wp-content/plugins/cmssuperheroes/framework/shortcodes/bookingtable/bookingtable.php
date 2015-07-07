<?php
/*
 * Remove defualt scripts
 */
add_action('wp_print_scripts', 'cs_booking_dequeue_script');
function cs_booking_dequeue_script(){
	wp_deregister_style('pickadate-default');
	wp_dequeue_style('pickadate-default');
	wp_deregister_style('pickadate-date');
	wp_dequeue_style('pickadate-date');
	wp_deregister_style('pickadate-time');
	wp_dequeue_style('pickadate-time');
	wp_deregister_style('rtb-booking-form');
	wp_dequeue_style('rtb-booking-form');

	wp_deregister_script('pickadate');
	wp_dequeue_script('pickadate');
	wp_deregister_script('pickadate-date');
	wp_dequeue_script('pickadate-date');
	wp_deregister_script('pickadate-time');
	wp_dequeue_script('pickadate-time');
	wp_deregister_script('pickadate-legacy');
	wp_dequeue_script('pickadate-legacy');
	wp_deregister_script('rtb-booking-form');
	wp_dequeue_script('rtb-booking-form');
}
add_shortcode( 'cs-booking-form', 'cs_booking_form' );
function cs_booking_form($params, $content = null) {
	global $rtb_controller;

	extract(shortcode_atts(array(
    	'phone' => '',
    	'message' => '',
    	'recaptcha' => '',
    	'recaptcha_key' => '',
	    ), $params));


	wp_enqueue_style("jquery-datetimepicker");
	wp_enqueue_script('jquery-datetimepicker');
	wp_register_script('booking-form', CSCORE_PLUGIN_URL . "framework/shortcodes/bookingtable/js/booking-form.js",array(),"1.0.0");
	wp_enqueue_script('booking-form');

	// Only allow the form to be displayed once on a page
	if ( $rtb_controller->form_rendered === true ) {
		return;
	} else {
		$rtb_controller->form_rendered = true;
	}

	// Enqueue assets for the form
	rtb_enqueue_assets();

	// Allow themes and plugins to override the booking form's HTML output.
	$output = apply_filters( 'rtb_booking_form_html_pre', '' );
	if ( !empty( $output ) ) {
		return $output;
	}

	// Process a booking request
	if ( !empty( $_POST['action'] ) && $_POST['action'] == 'booking_request' ) {

		if ( empty( $rtb_controller->request ) ) {
			require_once( RTB_PLUGIN_DIR . '/includes/Booking.class.php' );
			$rtb_controller->request = new rtbBooking();
		}

		$rtb_controller->request->insert_booking();
	}

	// Set up a dummy request object if no request has been made. This just
	// simplifies the display of values in the form below
	if ( empty( $rtb_controller->request ) ) {
		$request = new stdClass();
		$request->request_processed = false;
		$request->request_inserted = false;
	} else {
		$request = $rtb_controller->request;
	}

	// Define the form's action parameter
	$booking_page = $rtb_controller->settings->get_setting( 'booking-page' );
	if ( !empty( $booking_page ) ) {
		$booking_page = get_permalink( $booking_page );
	}

	ob_start();

	?>

<div class="cs-booking-form">
	<?php if ( $request->request_inserted === true ) : ?>
	<div class="cs-message">
		<p><?php echo $rtb_controller->settings->get_setting( 'success-message' ); ?></p>
	</div>
	<?php else : ?>
	<form method="POST" action="<?php echo esc_attr( $booking_page ); ?>">
		<input type="hidden" name="action" value="booking_request">
		<div class="row">
			<div class="cs-bookTable-date col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="rtb-date">
					<?php _e( 'When would you like to book?', CSCORE_NAME ); ?>
				</label>
				<?php echo rtb_print_form_error( 'date' ); ?>
				<span class="Selectoptions">
					<input type="text" name="rtb-date" id="rtb-date" value="<?php if(!empty($request->request_date)){ echo esc_attr( $request->request_date ); } else { echo date('m/d/Y'); } ?>">
				</span>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="row">
					<div class="cs-bookTable-party col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<label for="rtb-party">
							<?php _e( 'Party Size :', CSCORE_NAME ); ?>
						</label>
						<span class="Selectoptions">
							<select name="rtb-party" id="rtb-party">
								<?php for($i=0 ; $i <= 20 ; $i++): ?>
									<option value="<?php echo $i; ?>" <?php if(!empty($request->party) && $request->party == $i){ echo "selected"; } ?>><?php echo $i; ?></option>
								<?php endfor; ?>
							</select>
						</span>
						<?php echo rtb_print_form_error( 'party' ); ?>
					</div>
					<div class="cs-bookTable-time col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<label for="rtb-time">
							<?php _e( 'Preferred dining time:', CSCORE_NAME ); ?>
						</label>
						<span class="Selectoptions">
							<input type="text" name="rtb-time" id="rtb-time" value="<?php if(!empty( $request->request_time )){ echo esc_attr( $request->request_time ); } else { echo date('H:i'); } ?>">
						</span>
						<?php echo rtb_print_form_error( 'time' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="name col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<input type="text" name="rtb-name" id="rtb-name" placeholder="<?php _e('Name', CSCORE_NAME); ?>" value="<?php echo empty( $request->name ) ? '' : esc_attr( $request->name ); ?>">
				<?php echo rtb_print_form_error( 'name' ); ?>
			</div>
			<div class="email col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<input type="text" name="rtb-email" id="rtb-email" placeholder="<?php _e('Email', CSCORE_NAME); ?>" value="<?php echo empty( $request->email ) ? '' : esc_attr( $request->email ); ?>">
				<?php echo rtb_print_form_error( 'email' ); ?>
			</div>
		</div>
		<div class="row">
			<?php if($phone): ?>
			<div class="phone col-xs-12 col-sm-6 col-md-6 col-lg-6">
    		    <?php echo rtb_print_form_error( 'phone' ); ?>
    		    <input type="text" name="rtb-phone" id="rtb-phone" placeholder="<?php _e('Your phone number', CSCORE_NAME); ?>" value="<?php echo empty( $request->phone ) ? '' : esc_attr( $request->phone ); ?>">
			</div>
			<?php endif; ?>
			<?php if($message): ?>
			<div class="message col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php echo rtb_print_form_error( 'message' ); ?>
				<input type="text" name="rtb-message" id="rtb-message" placeholder="<?php _e('Message', CSCORE_NAME); ?>" value="<?php echo empty( $request->message ) ? '' : esc_attr( $request->message ); ?>">
			</div>
			<?php endif; ?>
		</div>
		<div class="cs-bookTable-submit">
			<button class="btn btn-default" type="submit"><?php _e( 'BOOK MY TABLE', CSCORE_NAME ); ?></button>
			<span class="des-text"><?php echo _e('Please submit your reservation details and we will contact you to confirm your booking ',CSCORE_NAME);?></span>
		</div>
	</form>
	<?php endif; ?>
</div>

	<?php

	$output = ob_get_clean();

	$output = apply_filters( 'rtb_booking_form_html_post', $output );

	return $output;
}