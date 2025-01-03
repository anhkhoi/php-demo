<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/Models/Invoice.php';

use App\Models\Invoice;

$invoice = new Invoice();

$invoice->abc = 100;


// var_dump($invoice->amount);
echo $invoice->amount . ' ---';

// echo $invoice . PHP_EOL . '<br/>';

// echo $invoice->abc();
