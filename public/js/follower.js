$(document).ready(function(){

	$('#view-followers').click(function(e){

		let username = e.target.value();

		$.ajax({
			type: "POST",
			url: '/list/'+username,
			dataType:"json",
			data: {username:username}
		}).done(function(response)
		{
			if(response.rc)
				window.reload();

		})
	});
	
})