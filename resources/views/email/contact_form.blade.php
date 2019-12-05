<!DOCTYPE html>
<html>
	<head>
		<title>Contact Form Mail</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					Hello Admin.....
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					Message Received by {{$data['name']}}
				</div>
				<div class="col-sm-6">
					Notification : {{$data['message']}}
				</div>
			</div>
		</div>
   </body>
</html>