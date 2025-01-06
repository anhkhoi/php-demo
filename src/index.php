<?php

require_once './utils.php';

echo PHP_VERSION . '<br/>';

// declare(strict_types=1);

error_reporting(E_ALL);

$url_headers = [
    'Content-Length' => [],
    'Content-Type' => 'kkk',
];

if (isset($url_headers['Content-Length'])) {
    $size = intval($url_headers['Content-Length']);
    var_dump($size);
}

if (isset($url_headers['Content-Type'])) {
    $type = strtolower($url_headers['Content-Type']);
    var_dump($type);
}



exit;
$xmlString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body><element>value</element></soap:Body></soap:Envelope>';

$response = simplexml_load_string($xmlString);
// $response = simplexml_load_string($xmlString, 'SimpleXMLElement', 0, 'soap');

// $response->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
$response_body = $response->xpath('//soap:Body/element')[0];
echo '<pre>';
print_r($response_body);
echo '</pre>';
echo '---';
// echo '<pre>';
// print_r($response_body->gettransactionResponse);
// echo '</pre>';
// echo '<pre>';
// print_r($response->Body);
// echo '</pre>';

exit;
$wsdl = 'https://membership-api-uat.big4.com.au/MembershipService.svc?singleWsdl'; // forbidden
$wsdl = 'kkk'; // empty
// $wsdl = 'http://apiv3-membership.big4.com.au/MembershipService.svc?wsdl'; // valid
try {
    $soap = new \SoapClient($wsdl, [
        'trace' => true
    ]);
} catch(\SoapFault $soapError) {
    echo 'soapError:: ' . var_dump($soapError->getMessage());
} catch (\Throwable $e) {
    echo 'Exception:: ' . var_dump($e->getMessage());
}


exit;
$rtn = suppressError(function() {
    return array_diff_assoc([
        null,
        'dd' => [
            'k' => null,
            'dd' => new stdClass,
            'ddd' => [
                null,
                'ddd' => false
            ]
        ]
    ], [
        false,
        'kk',
        '',
        'null' => [
            'abc' => new stdClass
        ]
    ]);
}, $err);

var_dump($rtn);
echo '<pre>';
print_r('--error');
echo '</pre>';
var_dump($err);

exit;
$xml = '<node>lorem';
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

set_error_handler(function() {
    throw new ErrorException('Error occurred when load xml');
});
try {
    //code...
    // $loadedXML = parseXmlRequestBody($xml);
    // var_dump($loadedXML);
    // if ($loadedXML === false) {
    
    // }

    $dom->loadXML($xml);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

// $dom->loadXML($xml);
// $xml_output=$dom->saveXML();

try {
    //code...
} catch (\Throwable $th) {
    //throw $th;
}

exit;