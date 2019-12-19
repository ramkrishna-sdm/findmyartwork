<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password Mail</title>
	</head>
	<body>
		<p>Hi,</p>
		<p></p>
		<p>You can set your new password by clicking <a href="{{url('/password/reset')}}/{{base64_encode($user_info[email])}}"> Here</a>.
		</p>
		<p></p>
		<p></p>
		<p>This email was sent from ArtViaYou</p>
	</body>
</html>