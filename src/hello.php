<?php

require_once './ErrorHandler.php';

$working_update = [
    'id' => 123,
    'amount' => 100.50,
    'charges' => [1, 2, 3],
    'credits' => [4, 5],
    'description' => 'Test Payment',
    'account_id' => 456,
    'generated_when' => '2024-12-18',
    'account_name' => 'Sample Account',
    'rounding' => 0.01,
    'gl_category_id' => 789,
];

$working_original = [
    'id' => 123,
    'amount' => 100.50,
    'charges' => [1, 2, 3],
    'credits' => [4, 5],
    'description' => 'Test Payment',
    'account_id' => 456,
    'transaction_method' => 'CC_GATEWAY',
    'transaction_id' => 'XYZ123',
    'voided_when' => null,
    'generated_when' => '2024-12-17',
    'account_name' => 'Sample Account',
    'rounding' => 0.02,
    'gl_category_id' => 789,
];

$result = ErrorHandler::suppressError(function() use ($working_update, $working_original) {
    return array_diff_assoc($working_update, $working_original);
}, null, $error);

var_dump($error);
echo '<pre>';
print_r($result);
echo '</pre>';

exit;
/**
 * Parses HTML content into a SimpleXMLElement object.
 *
 * @param string $html The HTML content to parse.
 * @param DOMDocument $document The DOMDocument object to load the HTML into.
 * @param string|null $error Any error message encountered during parsing.
 * @return ?SimpleXMLElement The parsed SimpleXMLElement object or null on failure.
 */
function parseHTML(string $html, DOMDocument $document, &$error = null): ?SimpleXMLElement
{
    try {
        // Suppress warnings and handle errors properly 
        libxml_use_internal_errors(true);

        if (!is_string($html) || trim($html) === '' || !$document->loadHTML($html)) {
            throw new Exception('Failed to load HTML');
        }

        $xml = simplexml_import_dom($document);
        if (!$xml) {
            throw new Exception('Failed to convert DOM to SimpleXML');
        }

        $libxmlError = libxml_get_last_error();
        if ($libxmlError) {
            throw new Exception($libxmlError->message);
        }

        return $xml;
    } catch (\Exception $e) {
        echo '<pre>';
        print_r('error');
        echo '</pre>';
        $error = $e->getMessage();
        // echo '<pre>';
        // print_r($error);
        // echo '</pre>';
        return null;
    } finally {
        // Clear any XML errors and restore default error handling
        libxml_clear_errors();
        libxml_use_internal_errors(false);
    }
}

$xml = new DOMDocument();
$xml->strictErrorChecking = false;

$report_html = '<table><thead><tbody><tr><td><th><script><h3>';
// script is allowed because it leaves the javascript text behind otherwise
// $report_html = strip_tags($report_html, '<table><thead><tbody><tr><td><th><script><h3>');
// var_dump($report_html);


$xml = parseHTML($report_html, $xml, $parseXMLError);
var_dump($parseXMLError, 'parseXMLError');
echo '<pre>';
print_r($parseXMLError);
echo '</pre>';

var_dump($xml, 'xml'); 
echo '<pre>';
print_r($xml->body[0]);
echo '</pre>';

exit;
