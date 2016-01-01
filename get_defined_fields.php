<?php

// Click here to download the following php files used within this sample code.
require("lib/utils.php");
require("lib/nusoap.php");

// Instantiate nusoap_client and call login method
$nsc = startEtapestrySession();

// Initialize parameters
$request = array();
$request["start"] = 0;
$request["count"] = 10;
$request["includeDisabledFields"] = false;
$request["includeDisabledValues"] = false;

// Invoke getDefinedFields method
echo "Calling getDefinedFields method...";
$response = $nsc->call("getDefinedFields", array($request));
echo "Done<br><br>";

// Did a soap fault occur?
checkStatus($nsc);

// Output result
echo "Response: <pre>";
print_r($response);
echo "</pre>";

// Call logout method
stopEtapestrySession($nsc);

?>
