
<!DOCTYPE html>
<html>
	<head>
		<title>Notification</title>
	</head>
	<body>
		<p>Hi,</p>
		<p>This mail is to inform you that a new <b>{{$data['role']}}</b> has registerd on ArtViaYou.</p>
		<p>Below are the details:-</p>
		<p>Artist Name:- {{$data['first_name']}} {{$data['last_name']}}</p>
		<p>Artist Username: {{$data['user_name']}}</p>
		<p>Artist Email:- {{$data['email']}}</p>
		<p>Thanks & Regards</p>
		<p>ArtViaYou Team</p>
	</body>
</html>