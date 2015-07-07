/* Javascript for Restaurant Reservations booking form */
jQuery(document).ready(function ($) {
	$('#rtb-date').datetimepicker({
		timepicker:false,
		format:'m/d/Y'
	})
	$('#rtb-time').datetimepicker({
		datepicker:false,
		format:'H:i'
	})
});
