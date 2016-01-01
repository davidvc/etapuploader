<?php

// Click here to download the following php files used within this sample code.
require("lib/utils.php");
require("lib/nusoap.php");

// Set login details and initial endpoint
$loginId = "syaoAPIuser";
$password = "WABmJ3Fy0TbE";
$endpoint = "https://sna.etapestry.com/v3messaging/service?WSDL";

// Instantiate nusoap_client
echo "Establishing NuSoap Client...";
$nsc = new nusoap_client($endpoint, true);
echo "Done<br><br>";

// Did an error occur?
checkStatus($nsc);

// Invoke login method
echo "Calling login method...";
$newEndpoint = $nsc->call("login", array($loginId, $password));
echo "Done<br><br>";

// Did a soap fault occur?
checkStatus($nsc);

// Determine if the login method returned a value...this will occur
// when the database you are trying to access is located at a different
// environment that can only be accessed using the provided endpoint
if ($newEndpoint != "")
{
  echo "New Endpoint: $newEndpoint<br><br>";

  // Instantiate nusoap_client with different endpoint
  echo "Establishing NuSoap Client with new endpoint...";
  $nsc = new nusoap_client($newEndpoint, true);
  echo "Done<br><br>";

  // Did an error occur?
  checkStatus($nsc);

  // Invoke login method
  echo "Calling login method...";
  $nsc->call("login", array($loginId, $password));
  echo "Done<br><br>";

  // Did a soap fault occur?
  checkStatus($nsc);
}

// Output results
echo "Login Successful<br><br>";

// Call logout method
stopEtapestrySession($nsc);

?>
