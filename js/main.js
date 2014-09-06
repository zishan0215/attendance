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
	var start = document.getElementById('fromdate').value.split('-');
	var end = document.getElementById('todate').value.split('-');
	var start_d = parseInt(start[2]);
  	var start_m  = parseInt(start[1]);
  	var start_y = parseInt(start[0]);
  	var end_d = parseInt(end[2]);
  	var end_m  = parseInt(end[1]);
  	var end_y = parseInt(end[0]);
	if(start_y > end_y) {
		$('#div_dates').addClass('has-error');
		alert('From date of period cannot exceed the to date in the time period.')
		$('#todate').val("");
	} else if(start_y == end_y) {
		if(start_m > end_m) {
			$('#div_dates').addClass('has-error');
			alert('From date of period cannot exceed the to date in the time period.')
			$('#todate').val("");
		} else if(start_m == end_m) {
			if(start_d > end_d) {
				$('#div_dates').addClass('has-error');
				alert('From date of period cannot exceed the to date in the time period.')
				$('#todate').val("");
			} else {
				if($('#div_dates').hasClass('has-error')) {
					$('#div_dates').removeClass('has-error');
				}
			}

		} else {
			if($('#div_dates').hasClass('has-error')) {
			$('#div_dates').removeClass('has-error');
			}
		}
	} else {
		if($('#div_dates').hasClass('has-error')) {
			$('#div_dates').removeClass('has-error');
		}
	}
	/*if(start > end) {
		$('#div_dates').addClass('has-error');
		alert('From date of period cannot exceed the to date in the time period.')
		$('#todate').val("");
	} else if (start < end) {
		if($('#div_dates').hasClass('has-error')) {
			$('#div_dates').removeClass('has-error');
		}
	}*/
}
