
<!DOCTYPE html>
<html>
	<head>
		<title>Notification</title>
	</head>
	<body>
		<p>Hi,</p>
		<p>Your order is successfully placed for <b><?=htmlspecialchars_decode($data['artwork_detail'])?></b> is placed with payemnt reference# {{$data['patment_id']}} on ArtViaYou.</p>
		<p></p>
		<p></p>
		<p>Thanks & Regards</p>
		<p>ArtViaYou Team</p>
	</body>
</html>