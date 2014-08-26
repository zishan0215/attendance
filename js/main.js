function validate_total_classes() {
	var total = document.getElementById('diff').value;
	var input = document.getElementById('total_classes').value;
	if(input > total) {
		$('#div_total_classes').addClass('has-error');
		alert('Total Classes cannot exceed the days in the time period.')
		$('#total_classes').val("");
	} else if (input <= total) {
		if($('#div_total_classes').hasClass('has-error')) {
			$('#div_total_classes').removeClass('has-error');
		}
	}
}
function validate_new_period() {
	var start = document.getElementById('fromdate').value;
	var end = document.getElementById('todate').value;
	if(start > end) {
		$('#div_dates').addClass('has-error');
		alert('From date of period cannot exceed the to date in the time period.')
		$('#todate').val("");
	} else if (start < end) {
		if($('#div_dates').hasClass('has-error')) {
			$('#div_dates').removeClass('has-error');
		}
	}
}
