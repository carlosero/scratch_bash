<?php
function getRandString($numrands, $min, $max, $preventdupes)
{
  $WSClient = new SoapClient("http://shoutz-rng.azurewebsites.net/RNGService.asmx?wsdl", array("exceptions" => 0,"trace" => 1));
  $params = array("NumValues" => $numrands,
          "MinValue" => $min,
          "MaxValue" => $max,
          "PreventRepeats" => $preventdupes
          );
  
  $rands = $WSClient->GetRandomNumberString($params);
  if (is_soap_fault($rands)) {
    var_dump($rands);
  }
  else
  {
    $rnd = $rands->GetRandomNumberStringResult;
  }

  return $rnd;
}

function getRands($numrands, $min, $max, $preventdupes)
{
  $WSClient = new SoapClient("http://shoutz-rng.azurewebsites.net/RNGService.asmx?wsdl", array("exceptions" => 0,"trace" => 1));
  $params = array("NumValues" => $numrands,
          "MinValue" => $min,
          "MaxValue" => $max,
          "PreventRepeats" => $preventdupes
          );
  
  $rands = $WSClient->GetRandomNumberSequence($params);
  if (is_soap_fault($rands)) {
    var_dump($rands);
  }
  else
  {
    $rnd = $rands->GetRandomNumberSequenceResult;
  }

  return $rnd;
}

?>