<!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>Document</title>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
	</head>
	<body>
		<form id='myform' method='post'>
			<input type='text' name='search' id='string' placeholder='Enter Id'>
		</form>
        <!-- <button id="button">click</button> -->
        
		<div id='cat'>
	
		</div>
		<script>
	 $('#myform').keyup(function(e){
		e.preventDefault();
		$.ajax({
	
			url:'searchwithid.php',
			type:'post',
			data:{id:$('#string').val()},
			success:function(res){
				$('#cat').html(res)
			}
		})
	 })
	
	
	</script>
	</body>
	</html>