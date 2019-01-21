$('document').ready(function(){
	$("#student").keyup(function(){
		var std = $("#student").val();
		$.ajax({
			url		: "/fee-collection-student-fee-load",
			method	: "POST",
			data	: {std:std},
			success	: function(data){
				$("#class").val(data);
				console.log(data);
			}
		});
	})
})