<?php 
$CLIENT_SECRET = "YOUR_CLIENT_SECRET"; // Get your client secret from a registered application here https://app.optimizely.com/accountsettings/apps/developers

if (isset($_GET['signed_request'])) { // Check if the signed_request parameter exists
	$signed_request = explode('.', $_GET['signed_request']);
	if (isset($signed_request[0]) && isset($signed_request[1])) { // Validate whether or not there exists a '.' in the signed_request
		$hashed_context = base64_encode(hash_hmac('sha256', $signed_request[1], $CLIENT_SECRET));
		if ($hashed_context == $signed_request[0]) { // Compare the unhashed context hased with $CLIENT_SECRET to the hashed context provided
			$CONTEXT = json_decode(base64_decode($signed_request[1]));
		} else {
			header("HTTP/1.1 401 Unauthorized");
		    exit;
		}		
	} else {
		header("HTTP/1.1 401 Unauthorized");
	    exit;
	}
} else {
	header("HTTP/1.1 401 Unauthorized");
    exit;
}
?>