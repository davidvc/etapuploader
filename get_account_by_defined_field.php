<?php

// Click here to download the following php files used within this sample code.
require("lib/utils.php");
require("lib/nusoap.php");

// Instantiate nusoap_client and call login method
$nsc = startEtapestrySession();

// Initialize parameters
$dv = array();
$dv["fieldName"] = "INPUT_FIELD_NAME";
$dv["value"] = "INPUT_VALUE";

// Invoke getAccountByUniqueDefinedValue method
echo "Calling getAccountByUniqueDefinedValue method...";
$response = $nsc->call("getAccountByUniqueDefinedValue", array($dv));
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
