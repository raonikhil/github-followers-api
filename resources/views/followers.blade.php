<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>{{ config('app.name','GitHub Search')}}</title>

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     <script src="<?php echo url("js/waitMe.min.js"); ?>"></script>
     <link href="<?php echo url("css/waitMe.min.css"); ?>" rel="stylesheet">
     <link href="<?php echo url("css/bootstrap.min.css"); ?>" rel="stylesheet">

   </head>

	<body>
		<table class="table table-striped text-center">
	    	<thead class="bg-secondary text-white">
		        <tr>
		            <th> Followers for: {{$username}} </th>
		        </tr>
	    	</thead>
		    <tbody>
		          <tr>
		            <td>
		            	<div class="followers-container"></div>
						<br clear="all" />
						<div class="text-center"><button type="btn btn-success" class="load-more-button">Load More..</button></div>
					</td>
		          </tr>
		   </tbody>
		</table>	
	</body>	
</html>

<script type="text/javascript">
$(document).ready(function(){

    next_page_number = 1;

    $(document).on('click','.load-more-button',function(){
      loadFollowers(next_page_number);
    });

    loadFollowers(next_page_number);
  
});

function loadFollowers(page_number)
{	
	$('.followers-container').waitMe({
		effect : 'stretch',
		text : 'Please wait.. Loading..',
		bg : 'rgba(255,255,255,0.7)',
		color : '#000',
	});

	$.ajax({
		type: "GET",
		url: '<?php echo url("/getFollowers/".$username); ?>/'+next_page_number,
		dataType:"json",
		success:function(response){
		  if(response.length > 0)
		  {
		  	$.each(response,function(index,follower){
		  		$('.followers-container').append(
		  			'<div class="media">'+
			 		 	'<img class="mr-3" src="'+follower.avatar_url+'" alt="Generic placeholder image" width="64" height="64">'+
				  		'<div class="media-body">'+
				    		'<h5 class="mt-0">'+follower.login+'</h5>'+
				  		'</div>'+
					'</div>'
		  		);
		  	});
		    next_page_number++;

    		$('.load-more-button').show();
		  }
		  else
		  {
		  	if(next_page_number == 1)
		  		$('.followers-container').html('<h2>There are no followers for this user</h2>');
		  	else
		  		alert("There are no more followers for this user");
		  }
		$('.followers-container').waitMe('hide');
		}
	});	
}
</script>

<style type="text/css">
.load-more-button {
	display:none;
}
.media {
	width:250px;
	float:left;
	margin:0 10px 10px 0;
	border:1px #d5d5d5 solid;
	padding:10px;
}
.followers-container {
	float:left;
	margin-top:25px;
	margin-left:auto;
	margin-right:auto;
}
</style>