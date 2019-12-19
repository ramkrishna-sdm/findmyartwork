
<!DOCTYPE html>
<html>
	<head>
		<title>Notification</title>
	</head>
	<body>
		<p>Hi,</p>
		<p>A new order is placed by <b>{{$data['user_name']}}</b> for the <b><?=htmlspecialchars_decode($data['artwork_name'])?></b> with payment reference# {{$data['patment_id']}} on ArtViaYou.</p>
		<p></p>
		<p></p>
		<p>Thanks & Regards</p>
		<p>ArtViaYou Team</p>
	</body>
</html>