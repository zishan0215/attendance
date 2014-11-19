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
	var input = document.getElementById('present_id').value;
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

function check_dates() {
	var d1 = new Date();
	var d2 = new Date();
	d1 = document.getElementById('fromdate').value;
	d2 = document.getElementById('todate').value;
	if(d1 >= d2) {
		alert('"From date" must be less than "to date"');
	} else {
		document.getElementById('submit_dates').click();
	}
}

function getXmlResponseObject() {
	//Create a boolean variable to check for a valid Internet Explorer instance.
	var xmlhttp = false;
	//Check if we are using IE.
	try {
		//If the Javascript version is greater than 5.
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		//If not, then use the older active x object.
		try {
			//If we are using Internet Explorer.
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			//Else we must be using a non-IE browser.
			xmlhttp = false;
		}
	}
	
	//If we are using a non-IE browser, create a javascript instance of the object.
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function finalSubmit(subject_code, from_date, to_date) {
/*	$.ajax({
		url: "/jmiams/index.php/teacher/final_submit",
		type: "POST",
		data: {'subject_code': subject_code, 'from_date': from_date, 'to_date': to_date},
		success: function() {
			alert('done');
		}
	});
*/
	var confirm = window.confirm("Do you want to submit the final attendance ?");
	if(confirm == true) {
		var xmlhttp = getXmlResponseObject();
		if(xmlhttp) {
			//alert('Got the object');
			var obj = document.getElementById('success');
			var page = "/jmiams/index.php/teacher/final_submit?subject_code=" + subject_code +"&from_date=" +from_date+"&to_date="+to_date;
			xmlhttp.open("GET", page);
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					obj.innerHTML = xmlhttp.responseText;
					alert('Final Attendance Submitted! For any other changes please contact the administrator');
				} else if(xmlhttp.status == 404) {
					alert('Page not found');
				}
			}
			xmlhttp.send(null);
		}
		ebtn = document.getElementsByClassName('Ebtn');
		for (var i = 0; i < ebtn.length; i++) {
			ebtn[i].disabled = true;
		}
	} 
}

function confirmIncrement() {
	var c = prompt('Do you really want to increment the semester ? (y/n)');
	if(c=='y') {
		var btn = document.getElementById('increment_it');
		btn.click();
	}
}

