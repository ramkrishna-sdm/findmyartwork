<!DOCTYPE html>
<html>
	<head>
		<title>Notification</title>
	</head>
	<body>
		<p>Hi,</p>
		<p>Your order for the <b><?=htmlspecialchars_decode($data['artwork_name'])?></b> is shipped.</p>
		<p>Below are the tracking details:- </p>
		<p>Tracking Number: {{$data['tracking_number']}}</p>
		<p>Carrier: {{$data['carrier']}}</p>
		<p></p>
		<p>Thanks for ordering</p>
		<p>ArtViaYou Team</p>
	</body>
</html>