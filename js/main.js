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

function validate_attendance(present_id) {
	var total = document.getElementById('total_classes').value;
	var input = document.getElementById(present_id).value;
	if(input > total) {
		$('#div_total').addClass('has-error');
		alert('Attendance cannot exceed the total classes.')
		document.getElementById(present_id).value = '';
	} else if (input <= total) {
		if($('#div_total').hasClass('has-error')) {
			$('#div_total').removeClass('has-error');
		}
	}
}
