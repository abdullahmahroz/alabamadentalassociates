;(function ( $, window, undefined ) {
	
	//	Set OPN ID to VC row
	function set_row_id() {
		var opn_id = $('.opn_row_id').val() || '';
		var vc_id = $('.vc-param-el_id .el_id').val() || '';
		if( vc_id === '' ) {
			$('.vc-param-el_id .el_id').val( opn_id );
			//	Remove temporary opn val - Doesn't remove old OPN id
			//	if user install again old version then it will set.
			// 	$('.opn_row_id').val('');
		}
	}
	$(document).ready(function() {
		set_row_id();
	});
	$(window).load(function() {
		set_row_id();
	});

}(jQuery, window));
